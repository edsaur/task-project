@extends('layouts.app')

@section('title', isset($task) ? 'Edit your task' : 'Fill the form to create a task')


@section('content')

@isset($task)
<a href="{{route('tasks.show', ['task' => $task->id])}}">Go back</a>    
@endisset

<form action="{{isset($task) ? route('tasks.edit-task', ['task' => $task->id]): route('tasks.store')}}" method="post">
@csrf

@isset($task)
    @method("PUT")
@endisset

<div>
    @error('title')
        <p class="error"> {{$message}} </p>
    @enderror
    <label for="title">
        Title:
    </label>
    <input type="text" name="title" id="title" value="{{$task->title ?? old('title')}}">
</div>

<div>
    @error('description')
        <p class="error"> {{$message}} </p>
    @enderror
    <label for="description">
        Description:
    </label>
    <textarea name="description" id="description" rows="5">{{$task->description ?? old('description')}}</textarea>
</div>

<div>
    @error('long_description')
        <p class="error"> {{$message}} </p>
    @enderror
    <label for="long_description">
        Long Description:
    </label>
    <textarea name="long_description" id="long_description" rows="5">{{$task->long_description ?? old('long_description')}}</textarea>
</div>

    <button type="submit" name="submit" class="btn-success">
        @isset($task)
        Edit Task
        @else 
        Submit            
        @endisset
    </button>
</form>
@endsection