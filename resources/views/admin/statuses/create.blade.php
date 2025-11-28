@extends('layouts.admin')

@section('content')
    <h1>Создать статус</h1>

    <form method="POST" action="{{ route('admin.statuses.store') }}">
        @csrf
        <label>Slug:</label>
        <input type="text" name="slug" required>

        <label>Active:</label>
        <select name="active">
            <option value="1">Да</option>
            <option value="0">Нет</option>
        </select>

        <label>Название (EN):</label>
        <input type="text" name="name[en]" required>

        <label>Название (UK):</label>
        <input type="text" name="name[uk]" required>

        <button type="submit">Сохранить</button>
    </form>
@endsection
