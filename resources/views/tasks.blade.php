@extends('layouts.app')


<div class="mb-5">
    <a href="{{route('tasks.index')}}" class="link"><- Go home</a>
</div>

<p class="mb-4 text-sm">Uploaded {{$task->created_at->diffForHumans()}}{{$task->created_at == $task->updated_at ? '' : " • Edited at: {$task->updated_at->diffForHumans()}"}} </p>

@section('title', "Task {$task->id} -> {$task->title}")

@section('content')
@if (session()->has('success'))
    <p> {{session('success')}} </p>
@endif


<p class="mb-4 text-slate-700 text-sm"> {{$task->description}} </p>
<p class="mb-4 text-slate-700 text-2xl"> {{$task->long_description}} </p>

<div class="mb-5">
    @if ($task->completed)
        <p><span class="font-medium text-green-500">Task is already completed!</span></p>
    @else
    <p class="mb-4"><span class="font-medium text-red-500">Task is not yet done!</span></p>
    <a href="{{route('tasks.edit', ['task' => $task])}}" class="rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700 hover:bg-slate-50 text-slate-700">-> Edit this task</a>
    @endif
</div>


<div class="flex gap-2">
    <form action="{{route('task.task-completed', ['task' => $task])}}" method="POST">
        @csrf
        @method('PUT')

        <button type="submit" class="{{$task->completed ? 'btn-danger' : 'btn-success'}}">Mark as {{$task->completed ? 'not completed' : 'Done'}}</button>
    </form>

<form action="{{route('tasks.delete-task', ['task' => $task->id])}}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn-danger">Delete</button>
</form>
@endsection