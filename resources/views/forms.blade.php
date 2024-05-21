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
    <label for="title">
        Title:
    </label>
    @error('title')
        <p class="error"> {{$message}} </p>
    @enderror
    <input type="text" 
    @class(['border-red-500' => $errors->has('title')])
    name="title" 
    id="title" 
    value="{{$task->title ?? old('title')}}">
</div>

<div>
    <label for="description">
        Description:
    </label>
    @error('description')
        <p class="error"> {{$message}} </p>
    @enderror
    <textarea name="description" @class(['border-red-500' => $errors->has('description')]) id="description" rows="5">{{$task->description ?? old('description')}}</textarea>
</div>

<div>
    <label for="long_description">
        Long Description:
    </label>
    @error('long_description')
        <p class="error"> {{$message}} </p>
    @enderror
    <textarea name="long_description" @class(['border-red-500' => $errors->has('long_description')]) id="long_description" rows="5">{{$task->long_description ?? old('long_description')}}</textarea>
</div>

<div class="flex gap-2">
        <button type="submit" name="submit" class="btn-success">
            @isset($task)
            Edit Task
            @else 
            Submit            
            @endisset
        </button>
    </form>

    <a href="{{route('tasks.index')}}" class="btn-danger">Cancel</a>

</div>
@endsection