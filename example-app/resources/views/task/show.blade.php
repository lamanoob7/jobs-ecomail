@extends('layouts.app')

@section('title', 'Tasks Show')

@section('content')

<div>
    <a class="" href="{{ route('task.index') }}">Back to List</a>
</div>
<div class="p-1 flex flex-1 flex-col md:flex-row lg:flex-row justify-between md:mx-2 lg:mx-2">
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $task->name }}</div>
            <p class="text-gray-700 text-base">{{ $task->description }}
            </p>
        </div>
        <div class="px-6 py-4">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-darker mr-2">Priority: {{ $task->priority }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-darker mr-2">Target date: {{ $task->target_date->format('d. m. Y') }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-darker">Finish date: {{ $task->finished_at->format('d. m. Y') }}</span>
        </div>
    </div>
</div>

@endsection
