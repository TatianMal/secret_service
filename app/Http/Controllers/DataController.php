<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Data;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class DataController extends Controller
{
    protected $messages = [
        'password.required' => 'Необходимо заполнить поле пароля',
        'content.required' => 'Необходимо добавить данные',
        'password.min' => 'Длина пароля не меньше :min символов!',
    ];

    protected $rules = [
        'password' => ['required', 'min:8'],
        'content' => ['required'],
    ];

    public function index()
    {
        return view('index');
    }

    public function create_data()
    {
        $validator = Validator::make(request(['password', 'content']), $this->rules, $this->messages)->validate();

        $data = Data::create($validator);
        return $data->url_part;
    }

    public function show(Data $data)
    {
        return view('data')->with('data', $data);
    }

    public function get_data(Data $data)
    {
        $pass_rules['password'] = $this->rules['password'];
        $validator = Validator::make(request(['password']), $pass_rules, $this->messages);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if (!password_verify(request('password'), $data->password)) {
            $validator->errors()->add('password', 'Пароли не совпадают, попробуйте еще раз');
            return back()->withErrors($validator);
        }
        else {
            return view('show')->with('content', Crypt::decryptString($data->content))->with('data', $data);
        }
    }

    public function delete(Data $data)
    {
        $data->delete();
        return redirect('/');
    }
}
