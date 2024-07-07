@extends('layout.task')

@section('title', 'Create')
@section('content')
    <div class="text-center container d-flex flex-column align-items-center">
        <h1>Task List</h1>

        <div class="actions">
            <a href="{{ url()->previous() }}" class="btn btn-primary">👈Go Back</a>
        </div>

        <h3 class="mt-5">Task Form</h3>
        <div class="d-flex flex-column justify-content-center w-50">
            <div>
                @foreach ($errors->all() as $message)
                    <div class="alert alert-warning" role="alert">
                        <span style="color: red">{{ $message }}</span>
                    </div>
                @endforeach
            </div>

            <form action="{{ route('task.store') }}" method="post">
                @csrf

                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Title:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" min="3"
                            max="255" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="body" class="col-sm-2 col-form-label">Body:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="body" id="body" cols="30" rows="10" minlength="3"
                            maxlength="500" required></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="duetime" class="col-sm-2 col-form-label">Target Date:</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control" name="duetime" id="duetime" min="3"
                            max="255" required>
                    </div>
                </div>
                <div class="d-flex flex-row gap-2 justify-content-center">
                    <button type="submit" class="btn btn-outline-secondary">Save</button>
                    <button type="reset" class="btn btn-outline-secondary">Clear</button>
                </div>
            </form>
        </div>
    </div>
@endsection
