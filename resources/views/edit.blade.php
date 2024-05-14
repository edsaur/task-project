@extends('layouts.app')

@section('title', 'Edit your file!')

@section('content')
<form action="{{route('tasks.edit-task', ['task' => $task->id])}}" method="post">
    @csrf

    @method('PUT')
    
    <div>
        @error('title')
            <p class="error"> {{$message}} </p>
        @enderror
        <label for="title">
            Title:
        </label>
        <input type="text" name="title" id="title" value="{{$task->title}}">
    </div>
    
    <div>
        @error('description')
            <p class="error"> {{$message}} </p>
        @enderror
        <label for="description">
            Description:
        </label>
        <textarea name="description" id="description" rows="5">{{$task->description}}</textarea>
    </div>
    
    <div>
        @error('long_description')
            <p class="error"> {{$message}} </p>
        @enderror
        <label for="long_description">
            Long Description:
        </label>
        <textarea name="long_description" id="long_description" rows="5">{{$task->long_description}}</textarea>
    </div>
    
        <button type="submit" name="submit">Submit!</button>
    </form>
@endsection