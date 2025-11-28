@extends('layouts.admin')

@section('content')
    <h1>Список статусов</h1>

    <a href="{{ route('admin.statuses.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">
        Добавить статус
    </a>

    <table class="table table-bordered" style="width:100%; border-collapse: collapse;">
        <thead>
        <tr>
            <th>ID</th>
            <th>Slug</th>
            <th>Название (UK)</th>
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
                <td>{{ $status->translate('uk')->name ?? '' }}</td>
                <td>{{ $status->translate('en')->name ?? '' }}</td>
                <td>{{ $status->active ? 'Да' : 'Нет' }}</td>

                <td>
                    <a href="{{ route('admin.statuses.edit', $status->id) }}" class="btn btn-warning btn-sm">
                        Редактировать
                    </a>

                    <form action="{{ route('admin.statuses.destroy', $status->id) }}"
                          method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Удалить статус?')">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
