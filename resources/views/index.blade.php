@extends('layouts.app')

@section('title', 'List of Tasks')


@section('content')

@if (session()->has('success'))
<p class="success"> {{session('success')}} </p>
    
@endif

<nav class="mb-4">
    <a href="{{route('tasks.create')}}" class="link">Create a new task</a>
</nav>
@forelse ($tasks as $task)
    <p class="mb-2"> 
        <a href="{{route('tasks.show', ['task' => $task->id])}}" @class(['line-through' => $task->completed])>
            Task {{$task->id}} -> {{$task->title}} 
        </a>
    </p>

    @empty
    <h2>There are no tasks!</h2>
@endforelse
{{$tasks->links()}}
@endsection