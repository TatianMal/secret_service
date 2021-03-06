@extends('base')

@section('title', 'Сервис Secret')

@section('content')
    <h1>Добро пожаловать на сервис Secret</h1>
    <div class="create-data" id="create-container">
        <p class="description">
            Здесь Вы можете  секретный контент, он будет храниться в зашифрованном виде.
            Достаточно заполнить форму ниже:
        </p>
        <form method="POST">
            @csrf
            <label for="password">Введите пароль доступа *</label>
            <input name="password" id="password" type="password" required value="{{ old('password') }}">
            <span class="help-text">Длина пароля: от 8 символов,
                рекомендуемый пароль состоит из цифр, букв в разных регистрах и спецсимволов</span>

            <label for="content">Введите данные *</label>
            <textarea name="content" id="content" cols="30" rows="10" required>{{ old('content') }}</textarea>

            <div id="list-errors"></div>
            <input class="btn center" id="create-data" type="button" value="Отправить">
        </form>
    </div>
    <div class="saved-data hidden" id="saved-data">
        <p class="description">Ваши данные сохранены и доступны по ссылке:</p>
        <a class="center" href="#" id="link"></a>
    </div>
    <script>
        let indexUrl = @json(route('index'));
        let createUrl = @json(route('create_data'));
    </script>
    <script src="{{ asset('js/axios-resp.js')}}"></script>
@endsection