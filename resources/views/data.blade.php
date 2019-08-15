@extends('base')

@section('title', 'Сервис Secret')
@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
@endsection

@section('content')
    <form action="" method="POST">
        @csrf
        <label for="password">Введите пароль для доступа к данным</label>
        <input name="password" id="password" type="password">
        <span class="help-text error">Неверный пароль, попробуйте еще раз</span>
        <input class="btn" id="access-data" type="submit" value="Получить доступ">
    </form>
    <div class="flex-container">
        <span>Ваши данные</span>
        <span class="data">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid blanditiis,
            deserunt earum eum facilis in iste laudantium maxime nam necessitatibus, nemo nesciunt placeat,
            porro quasi rem sapiente sed veritatis?</span>
        <div class="btn-wrapper">
            <button class="btn delete" onclick="">Удалить</button>
            <button class="btn center">На главную</button>
        </div>
    </div>
    <div class="flex-container hidden">
        <span>Вы уверены, что хотите удалить? Это действие необратимо</span>
        <div class="btn-wrapper">
            <button class="btn delete" id="delete-data">Да, удаляю</button>
            <button class="btn cancel" id="cancel-delete">Отмена</button>
        </div>
    </div>
    <script src="{{ asset('js/data.js')}}"></script>
@endsection  