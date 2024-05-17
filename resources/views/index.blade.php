@extends('layouts.app')

@section('title', 'List of Tasks')


@section('content')

@if (session()->has('success'))
<p> {{session('success')}} </p>
    
@endif

<a href="{{route('tasks.create')}}">Create a new task</a>
@forelse ($tasks as $task)
    <p> <a href="{{route('tasks.show', ['task' => $task->id])}}">Task {{$task->id}} -> {{$task->title}}</a></p>

    @empty
    <h2>There are no tasks!</h2>
@endforelse
{{$tasks->links()}}
@endsection