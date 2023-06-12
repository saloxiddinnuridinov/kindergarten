<?php

namespace App\Http\Controllers;

use App\Models\BotUser;
use App\Models\Category;
use App\Models\Children;
use App\Models\ChildrenParent;
use App\Models\Course;
use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;


class TelegramBotController extends Command
{
    private $bot;
    private $botupdate;
    private $message;
    private $chat_id;
    private $chat;

    public function __construct()
    {
        $this->bot = new Api();
    }

    public function handle()
    {
        try {
            $update = $this->bot->getWebhookUpdate();

            $this->botupdate = $update;

            $message = $update['message'] ?? null;
            $this->message = $message;

            $chat = $message['chat'];
            $this->chat = $chat;

            $this->chat_id = $chat['id'];

//            $this->bot->sendMessage([
//                'chat_id' => $this->chat_id,
//                'text' => json_encode($this->botupdate, JSON_PRETTY_PRINT),
//            ]);

            if ($update['message']['text'] === '/start'){
                $this->bot->sendMessage([
                    'chat_id' => $this->chat_id,
                    'text' => 'Assalomu Alaykum frazandingizni ID raqamini kiriting',
                ]);
            } else {
                $children = $this->checkUserExists($update['message']['text']);
                $this->bot->sendMessage([
                    'chat_id' => $this->chat_id,
                    'text' => json_encode($children, JSON_PRETTY_PRINT),
                ]);
            }


        } catch (\Throwable $th) {
            $response = $this->bot->sendMessage([
                'chat_id' => 1212223737,
                'text' => $th->getMessage() . $th->getLine(),
            ]);
            return $response;
        }
        //kod error berib qolsa errorni ko'rish uchun try catchda yozilgan
    }
    public function sendMe()
    {
         $this->bot->sendMessage([
            'chat_id' => 1212223737,
            'text' => json_encode($this->botupdate->message->contact, JSON_PRETTY_PRINT),
        ]);
    }
    public function checkUserExists($id)
    {
        $model = ChildrenParent::where("tg_id", $this->chat_id)->first();
        if ($model === null)
        {
            $children = Children::select('id', 'name', 'age', 'category_id', 'parent_id')->find($id);
            if($children){

                $children->category_id = Category::select('name')->find($children->category_id);

                $parent = ChildrenParent::select('name', 'phone', 'email', 'tg_id')->find($children->parent_id);

                if ($parent){

                    $model = ChildrenParent::find($children->parent_id);
                    $model->tg_id = $this->chat_id;
                    $model->save();

                    $children->parent_id = $parent;

                    return $children;
                }

            } else {
                return 'Siz Avvalroq Ro`yhatdan o`tgansiz';
            }

        } else {
            return 'Rahmat siz Ro`yhatdan o`tgansiz';
        }
    }
    public function sendPhoneNumber()
    {
        $this->bot->sendMessage(
            [
                'chat_id'=>$this->chat_id,
                'text'=> 'Assalomu alaykum! ' . $this->chat['first_name'] . ' tel raqamingizni yuboring?',
                'reply_markup'=> json_encode(['resize_keyboard' => true,'keyboard'=>
                [
                    [['text' => 'contact', 'request_contact' => true]]
                ]
                ])
            ]
        );
    }
    public function saveContact()
    {
        $model = BotUser::where("chat_id", $this->chat_id)->first();
        if ($model) {
            $model->phone = $this->message['contact']['phone_number'];
            $model->update();
        }
    }
    public function getAllCourse()
    {
        $course = Course::select('title')->get();
        $this->retArray($course);
        // $this->bot->sendMessage(
        //     [
        //         'chat_id'=>$this->chat_id,
        //         'text'=> json_encode($course, JSON_PRETTY_PRINT),
        //     ]
        // );
    }
    public function retArray($array)
    {
        $text = "";
        foreach ($array as $key => $value) {
            $text .= $value->title . "\n";
        }
        $this->bot->sendMessage(
            [
                'chat_id'=>$this->chat_id,
                'text'=> $text,//json_encode($text, JSON_PRETTY_PRINT),
            ]
        );
    }
}
