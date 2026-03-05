@extends('layouts.app')

@section('main')
    <div class="flex bg-blue-800 h-15">
        <h1 class="text-4xl text-white flex items-center justify-center pl-2.5">Выдачи СИЗ</h1>
    </div>
    <div class="h-screen flex items-center justify-center">
    <div class="grid w-100 h-70 pt-2.5 pr-2.5 border-2 border-b-gray-600 rounded-2xl ">
    <h1 class="flex justify-center font-bold">Добавить выдачу СИЗ</h1>

        <div class="pl-2.5">
    <form action="{{ route('issues.store') }}" method="POST">
        @csrf

        <div class="mb-3 flex flex-row justify-between ">
            <label>Сотрудник</label>
            <select name="employee_id" class="form-control border-1 border-b-black rounded" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 flex flex-row justify-between">
            <label>СИЗ / Спецодежда</label>
            <select name="item_id" class="form-control border-1 border-b-black rounded" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->size }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 flex flex-row justify-between">
            <label>Дата выдачи</label>
            <input type="date" name="issue_date" class="form-control border-1 border-b-black rounded" required>
        </div>

        <div class="mb-3 flex flex-row justify-between">
            <label>Дата возврата</label>
            <input type="date" name="return_date" class="form-control border-1 border-b-black rounded">
        </div>

        <div class="mb-3 flex flex-row justify-between">
            <label>Количество</label>
            <input type="number" name="quantity" class="form-control border-1 border-b-black rounded" value="1" min="1" required>
        </div>

        <button type="submit" class="btn btn-success bg-blue-700 text-white px-2 rounded">Сохранить</button>
        <a href="{{ route('home') }}" class="btn btn-secondary bg-red-500 text-white px-2 rounded">Назад</a>
    </form>
        </div>
    </div>
    </div>
@endsection
