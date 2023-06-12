<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;

class ChildrenParentController extends Controller
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

            $phone = $message['contact']['phone_number'] ?? null;
            // Check user exists in DB

//            $this->checkUserExists();

            $response = $this->bot->sendMessage([
                'chat_id' => 1212223737,
                'text' => 'salom',
            ]);
            return $response;

            if($phone === null){
                switch($this->message['text']){
                    case '/start':
                        $this->sendPhoneNumber();
                        break;
                    case "course":
                        $this->getAllCourse();
                        break;
                    default:
                        $this->bot->sendMessage(
                            [
                                'chat_id' => $this->chat_id,
                                'text' => 'Siz nomalum malumot yozdingiz',
                            ]
                        );
                        // $this->message['contact']['phone_number'];
                        // $this->saveContact();
                        break;
                }
            }else{
                $this->saveContact();
                $this->bot->sendMessage(
                    [
                        'chat_id' => $this->chat_id,
                        'text' => 'Contact Saqlandi! Courselarni kurishingiz mumkin',
                        'reply_markup'=> json_encode(['resize_keyboard' => true,'keyboard'=>
                            [
                                [['text' => 'course']]
                            ]
                        ])
                    ]
                );
                exit();
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
        $response = $this->bot->sendMessage([
            'chat_id' => $this->chat_id,
            'text' => json_encode($this->botupdate->message->contact, JSON_PRETTY_PRINT),
        ]);
    }
    public function checkUserExists()
    {
        $model = BotUser::where("chat_id", $this->chat_id)->first();
        if ($model === null)
        {
            $model = new BotUser();
            $model->name = $this->chat['first_name'];
            $model->surname = $this->chat['last_name'] ?? '';
            $model->username = $this->chat['username'];
            $model->chat_id = $this->chat_id;
            $model->save();
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
