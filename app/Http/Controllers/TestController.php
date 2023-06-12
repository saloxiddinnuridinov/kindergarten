<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameCollection;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return GameCollection::collection(Game::all());
    }


    public function store(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $validate = Validator::make($request, $rules);
        if ($validate->fails()) {
            return $validate->messages();
        }

        $model = new Game();
        $model->name = $request->name;
        $model->created_by = auth('api')->user()->id;
        $model->save();
        return response()->json(['message' => 'Muvaffaqiyatli saqlandi'], 200);
    }

    public function show($id)
    {
        $model = Game::find($id);
        if ($model) {
            return new GameCollection($model);
        }
        return response()->json(['errors' => ['Topilmadi']], 404);
    }


    public function update(Request $request, $id)
    {

        $model = Game::find($id);
        if ($model) {
            $model->name = $request->name;
            $model->update();
            return response()->json(['message' => 'Tahrirlandi'], 200);
        }
        return response()->json(['errors' => ['Topilmadi']], 404);
    }


    public function destroy($id)
    {
        $model = Game::find($id);
        if ($model) {
            try {
                $model->delete();
                return response()->json(['message' => "O'chirildi"], 200);
            } catch (\Exception $exception) {
                return response()->json(['errors' => ['O\'chirib bo\'lmadi']], 403);

            }

        }
        return response()->json(['errors' => ['Topilmadi']], 404);
    }
}
