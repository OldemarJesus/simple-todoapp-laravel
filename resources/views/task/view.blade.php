@extends('layout.task')

@section('title', 'List')
@section('content')
    <div class="text-center container">
        <h1>Task List</h1>

        <div class="actions">
            <a href="{{ url()->previous() }}" class="btn btn-primary">👈Go Back</a>
            <a href="{{ route('task.create') }}" class="btn btn-secondary">New Task</a>
        </div>

        <div class="row mt-5 m-2">
            @forelse ($tasks as $task)
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-header">
                            {{ $task->task_title }}
                            @if ($task->task_iscompleted)
                                ✅
                            @endif
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>{{ $task->task_body }}</p>
                                <footer class="blockquote-footer"><cite title="Source Title">Until
                                        {{ $task->task_duetime }}</cite></footer>
                            </blockquote>

                            <div class="d-flex justify-content-center gap-2 mt-2">
                                <form
                                    action="{{ route('task.completed', ['task_id' => $task->task_id, 'cur_task_completion' => $task->task_iscompleted]) }}"
                                    method="post">
                                    @csrf
                                    @method('PATCH')

                                    @if ($task->task_iscompleted)
                                        <button class="btn btn-outline-secondary" type="submit">Mark As Not
                                            Completed</button>
                                    @else
                                        <button class="btn btn-outline-success" type="submit">Mark As Completed</button>
                                    @endif
                                </form>
                                <form action="{{ route('task.edit', $task->task_id) }}" method="get">
                                    <button class="btn btn-outline-secondary" type="submit">Edit</button>
                                </form>
                                <form action="{{ route('task.destroy', $task->task_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <span>No Tasks yet!</span>
            @endforelse
        </div>
    </div>
@endsection
