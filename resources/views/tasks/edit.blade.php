@extends('layouts.index')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Edit Task</h2>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-gradient-primary py-3 d-flex justify-content-between">
            <h4 class="mb-0">Task Details</h4>
            <button type="button" class="btn btn-primary" onclick="window.location='{{ route('tasks.index') }}'">
                <i class="fas fa-arrow-left"></i> Back to Tasks
            </button>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                @csrf
                @method('PUT')

                <!-- Task Name -->
                <div class="mb-4">
                    <label for="list" class="form-label">Task Name</label>
                    <input type="text" class="form-control form-control-lg @error('list') is-invalid @enderror"
                           id="list" name="list" placeholder="Enter task name" value="{{ old('list', $task->list) }}">
                    @error('list')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Task Status -->
                <div class="mb-4">
                    <label for="status" class="form-label">Task Status</label>
                    <select name="status" id="status" class="form-select form-select-lg" required>
                        <option value="" disabled selected>Select status</option>
                        <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <!-- Save Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
