@extends('layouts.admin')

@section('content')
    <h1>Редактировать статус</h1>

    <form method="POST" action="{{ route('admin.statuses.update', $status) }}">
        @csrf
        @method('PUT')
        <label>Slug:</label>
        <input type="text" name="slug" value="{{ $status->slug }}" required>

        <label>Active:</label>
        <select name="active">
            <option value="1" {{ $status->active ? 'selected' : '' }}>Да</option>
            <option value="0" {{ !$status->active ? 'selected' : '' }}>Нет</option>
        </select>

        <label>Название (EN):</label>
        <input type="text" name="name[en]" value="{{ $status->translate('en')->name ?? '' }}" required>

        <label>Название (UK):</label>
        <input type="text" name="name[uk]" value="{{ $status->translate('uk')->name ?? '' }}" required>

        <button type="submit">Сохранить</button>
    </form>
@endsection
