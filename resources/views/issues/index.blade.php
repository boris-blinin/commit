@extends('layouts.app')

@section('main')
    <div class="flex bg-blue-800 h-15">
    <h1 class="text-4xl text-white flex items-center justify-center pl-2.5">Выдачи СИЗ</h1>
    </div>
    <div class="px-5 py-10 ">
    <a href="{{ route('issues.create') }}" class="btn btn-primary mb-3 text-white bg-blue-700 hover:bg-blue-900 px-5 py-3 rounded-lg transition duration-300">Добавить новую выдачу</a>
    </div>
    <div class="px-5">
        <div class="flex font-bold">
            <p class="w-50 text-center border-r-stone-500 border-r-1">Сотрудник</p>
            <p class="w-50 text-center border-r-stone-500 border-r-1">СИЗ / Спецодежда</p>
            <p class="w-20 text-center border-r-stone-500 border-r-1">Размер</p>
            <p class="w-40 text-center border-r-stone-500 border-r-1">Дата выдачи</p>
            <p class="w-40 text-center border-r-stone-500 border-r-1">Дата возврата</p>
            <p class="w-30 text-center border-r-stone-500 border-r-1">Количество</p>
            <p class="w-60 text-center">Действия</p>
        </div>

        <div class="flex flex-col">
            @foreach($issues as $issue)
                <div class="flex py-2 border-b-stone-500 border-b-1 items-center">
                    <p class="w-50 text-center">{{ $issue->employee->full_name }}</p>
                    <p class="w-50 text-center">{{ $issue->item->name }}</p>
                    <p class="w-20 text-center">{{ $issue->item->size }}</p>
                    <p class="w-40 text-center">{{ $issue->issue_date }}</p>
                    <p class="w-40 text-center">{{ $issue->return_date ?? '-' }}</p>
                    <p class="w-30 text-center">{{ $issue->quantity }}</p>
                    <p class="w-40 flex justify-center">
                        <a href="{{ route('issues.edit', $issue) }}" class="btn btn-sm btn-warning bg-blue-700 text-white px-2 rounded">Редактировать</a>
                    </p>
                    <form action="{{ route('issues.destroy', $issue) }}" method="POST" class="w-20 flex justify-center">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Удалить запись?')" class="bg-red-500 text-white px-2 rounded">Удалить</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
