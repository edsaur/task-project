@extends('layouts.app')

@section('title', 'List of Tasks')


@section('content')

@if (session()->has('success'))
<p> {{session('success')}} </p>
    
@endif

<nav class="mb-4">
    <a href="{{route('tasks.create')}}" class="bg-sky-500 hover:bg-sky-700">Create a new task</a>
</nav>
@forelse ($tasks as $task)
    <p class="container mt-5 mx-w-lg"> <a href="{{route('tasks.show', ['task' => $task->id])}}">Task {{$task->id}} -> {{$task->title}}</a></p>

    @empty
    <h2>There are no tasks!</h2>
@endforelse
{{$tasks->links()}}
@endsection