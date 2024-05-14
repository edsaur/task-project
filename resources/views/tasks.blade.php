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

<a href=" {{route('tasks.edit', ['task' => $task->id])}} ">-> Edit this task</a>
<form action="{{route('tasks.delete-task', ['task' => $task->id])}}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
</form>
@endsection