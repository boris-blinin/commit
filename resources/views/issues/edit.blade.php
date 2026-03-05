@extends('layouts.app')


@section('main')

    <div class="flex bg-blue-800 h-15">
        <h1 class="text-4xl text-white flex items-center justify-center pl-2.5">Выдачи СИЗ</h1>
    </div>

    <div class="h-screen flex items-center justify-center">
        <div class="grid w-100 h-70 pt-2.5 pr-2.5 border-2 border-b-gray-600 rounded-2xl ">
    <h1 class="flex justify-center font-bold">Редактировать выдачу</h1>

            <div class="pl-2.5">
    <form action="{{ route('issues.update', $issue) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3 flex flex-row justify-between">
            <label>Сотрудник</label>
            <select name="employee_id" class="form-control border-1 border-b-black rounded" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" @if($employee->id == $issue->employee_id) selected @endif>
                        {{ $employee->full_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 flex flex-row justify-between">
            <label>СИЗ / Спецодежда</label>
            <select name="item_id" class="form-control border-1 border-b-black rounded" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" @if($item->id == $issue->item_id) selected @endif>
                        {{ $item->name }} ({{ $item->size }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 flex flex-row justify-between">
            <label>Дата выдачи</label>
            <input type="date" name="issue_date" class="form-control border-1 border-b-black rounded" value="{{ $issue->issue_date }}" required>
        </div>

        <div class="mb-3 flex flex-row justify-between">
            <label>Дата возврата</label>
            <input type="date" name="return_date" class="form-control border-1 border-b-black rounded" value="{{ $issue->return_date }}">
        </div>

        <div class="mb-3 flex flex-row justify-between">
            <label>Количество</label>
            <input type="number" name="quantity" class="form-control border-1 border-b-black rounded" value="{{ $issue->quantity }}" min="1" required>
        </div>

        <button type="submit" class="btn btn-success bg-blue-700 text-white px-2 rounded">Сохранить</button>
        <a href="{{ route('home') }}" class="btn btn-secondary bg-red-500 text-white px-2 rounded">Назад</a>
    </form>
            </div>
        </div>
    </div>
@endsection
