<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Data;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class DataController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create_data()
    {
        $messages = [
            'password.required' => 'Необходимо заполнить поле пароля',
            'content.required' => 'Необходимо добавить данные',
            'password.min' => 'Длина пароля не меньше :min символов!',
        ];

        $rules = [
            'password' => ['required', 'min:8'],
            'content' => ['required'],
        ];

        $validator = Validator::make(request(['password', 'content']), $rules, $messages)->validate();

//        if ($validator->fails()) {
//            return response()->json($validator->messages(), 422);
//        }

        $data = Data::create($validator);
        return $data->url_part;
    }

    public function show(Data $data)
    {
        return view('data')->with('data', $data);
    }

    public function get_data(Data $data)
    {
        $messages = [
            'password.required' => 'Необходимо заполнить поле пароля',
            'password.min' => 'Длина пароля не меньше :min символов!',
        ];

        $rules = [
            'password' => ['required', 'min:8'],
        ];

        $validator = Validator::make(request(['password', 'content']), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $new_hash = password_hash(request('password'), PASSWORD_ARGON2I, [
            'memory_cost' => 2048,
            'time_cost' => 4,
            'threads' => 3
        ]);

        if (!password_verify(request('password'), $data->password)) {
            $validator->errors()->add('password', 'Пароли не совпадают, попробуйте еще раз');
            return back()->withErrors($validator);
        }
        else {
            dd(Crypt::decryptString($data->content));
        }
    }

    public function delete(Data $data)
    {
        $data->delete();
        return redirect('/');
    }
}
