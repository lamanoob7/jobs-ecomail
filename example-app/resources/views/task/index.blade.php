@extends('layouts.app')

@section('title', 'Tasks Index')

@section('content')
    <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
        <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
            Tasks
        </div>
        <div class="p-3">
            <x-tasks-listing-index :$tasks />
        </div>
    </div>
@endsection

