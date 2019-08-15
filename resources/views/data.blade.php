@extends('base')

@section('title', 'Сервис Secret')
@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
@endsection

@section('content')
    <form action="{{ route('get_data', [$data]) }}" method="POST" id="form-get">
        @csrf
        <label for="password">Введите пароль для доступа к данным</label>
        <input name="password" id="password" type="password" required value="{{ old('password') }}">
        @if ($errors->any())
            <div class="list-errors" id="list-errors">
                @foreach ($errors->all() as $error)
                    <span class="help-text error">{{ $error }}</span>
                @endforeach
            </div>
        @endif
        <input class="btn"  type="submit" value="Получить доступ">
    </form>
@endsection  