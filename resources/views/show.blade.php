@extends('base')

@section('title', 'Сервис Secret')
@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
@endsection

@section('content')
    <div class="flex-container center-items" id="showed-data">
        <span>Ваши данные</span>
        <span class="data" id="result">{{ $content }}</span>
        <div class="btn-wrapper">
            <button class="btn delete" id="btn-del">Удалить</button>
            <a href="{{ route('index') }}"><button class="btn center">На главную</button></a>
        </div>
    </div>
    <form class="flex-container hidden" id="confirm-del" method="POST" action="{{ route('delete_data', [$data]) }}">
        @method('DELETE')
        @csrf
        <span>Вы уверены, что хотите удалить? Это действие необратимо</span>
        <div class="btn-wrapper">
            <input class="btn delete" id="delete-data" type="submit" value="Да, удаляю">
            <input class="btn cancel" id="cancel-delete" type="button" value="Отмена">
        </div>
    </form>
    <script src="{{ asset('js/toggles.js')}}"></script>
@endsection