@extends('layouts.app')

@section('title', 'Tasks Create')

@section('content')

<form action="{{ route('task.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Task name</label>

        <input id="name"
            type="text"
            name="name"
            class="@error('name') is-invalid @enderror"
            value="{{ old('name') }}"
            >

        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="description">Task description</label>

        <input id="description"
            type="text"
            name="description"
            class="@error('description') is-invalid @enderror"
            value="{{ old('description') }}"
            >

        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>

        <label for="priority">Task priority</label>

        <input id="priority"
            type="number"
            name="priority"
            class="@error('priority') is-invalid @enderror"
            value="{{ old('priority') }}"
            >

        @error('priority')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>

        <label for="target_date">Task target date</label>

        <div class="relative max-w-sm">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
              </svg>
            </div>
            <input datepicker id="default-datepicker-target_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date"
            id="target_date"
            name="target_date"
            value="{{ old('target_date') }}"
            @error('target_date') is-invalid @enderror
            >
        </div>


        @error('target_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>

        <label for="finished_at">Task finished</label>

        <div class="relative max-w-sm">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
              </svg>
            </div>
            <input datepicker id="default-datepicker-finished_at" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date"
            id="finished_at"
            name="finished_at"
            value="{{ old('finished_at') }}"
            @error('finished_at') is-invalid @enderror
            >
        </div>

        @error('finished_at')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Submit</button>
</form>



@endsection
