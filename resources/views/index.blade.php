@extends('base')

@section('title', 'Сервис Secret')

@section('content')
    <h1>Добро пожаловать на сервис Secret</h1>
    <div class="create-data">
        <p class="description">
            Здесь Вы можете  секретный контент, он будет храниться в зашифрованном виде.
            Достаточно заполнить форму ниже:
        </p>
        <form action="" method="POST">
            @csrf
            <label for="password">Введите пароль доступа</label>
            <input name="password" id="password" type="password" >
            <span class="help-text">Рекомендуемая длина пароля: от 8 символов,
                рекомендуемый пароль состоит из цифр, букв в разных регистрах и спецсимволов</span>
            <label for="data">Введите данные</label>
            <textarea name="data" id="data" cols="30" rows="10"></textarea>
            <input class="btn non-flex" id="create-data" type="submit" value="Отправить">
        </form>
    </div>
    <div class="saved-data">
        <p class="description">Ваши данные сохранены и доступны по ссылке:</p>
        <a class="non-flex" href="#">http://secret.arealidea.ru/fgh8b5</a>
    </div>
@endsection