@extends('layouts.app')

<a href="{{route('tasks.index')}}"><- Go home</a>

@section('title', "Task {$task->id} -> {$task->title}")


@section('content')
@if (session()->has('success'))
    <p> {{session('success')}} </p>
@endif

<p>Uploaded at: {{$task->created_at}}{{$task->created_at == $task->updated_at ? '' : ", Edited at: {$task->updated_at}"}} </p>

<h2> {{$task->description}} </h2>
<h3> {{$task->long_description}} </h3>

<div>
    @if ($task->completed)
        <p>Task is already completed!</p>
    @else
        <p>Task is not yet done!</p>
    <a href=" {{route('tasks.edit', ['task' => $task])}} ">-> Edit this task</a>
    @endif
</div>


<div>
    <form action="{{route('task.task-completed', ['task' => $task])}}" method="POST">
        @csrf
        @method('PUT')

        <button type="submit">Mark as {{$task->completed ? 'not completed' : 'done'}}</button>
    </form>
</div>

<form action="{{route('tasks.delete-task', ['task' => $task->id])}}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
</form>
@endsection