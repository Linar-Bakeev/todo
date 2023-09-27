@extends('layouts.app')

@section('content')
    <h1>Task list</h1>

    @foreach($tasks as $task)
        <div class="card @if($task->isCompleted()) border-success @endif" style="margin-bottom: 20px; border-color: aquamarine;">
            <div class="card-body">
                <p>
                    @if($task->isCompleted())
                        <span class="badge bg-success">Completed</span>
                    @endif
                    {{$task->description}}
                </p>

                @if(!$task->isCompleted())
                    <form action="/tasks/{{$task->id}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-secondary" type="submit">Complete</button>
                        </div>
                    </form>
                @else
                    <form action="/tasks/{{$task->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-danger" type="submit">Delete</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    @endforeach

    <div class="d-grid gap-2">
        <a href="/tasks/create" class="btn btn-primary btn-lg">New Task</a>
    </div>
@endsection
