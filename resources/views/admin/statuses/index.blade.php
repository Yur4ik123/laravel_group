@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список статусов</h1>

        <a href="{{ route('admin.statuses.create') }}" class="btn btn-primary mb-3">Добавить статус</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Название (RU)</th>
                <th>Название (EN)</th>
                <th>Активен</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($statuses as $status)
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->slug }}</td>
                    <td>{{ $status->translate('uk')->name }}</td>
                    <td>{{ $status->translate('en')->name }}</td>
                    <td>{{ $status->active ? 'Да' : 'Нет' }}</td>
                    <td>
                        <a href="{{ route('admin.statuses.edit', $status->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                        <form action="{{ route('admin.statuses.destroy', $status->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Удалить статус?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
