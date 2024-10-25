@extends('layouts.index')

@section('title', 'Import Tasks')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Import Tasks</h2>

    <!-- Import Form -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Upload Excel File</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Select File</label>
                    <input class="form-control form-control-lg" type="file" name="file" id="file" required>
                    <small class="form-text text-muted">Please upload a valid Excel file (.xls .csv .xlsx).</small>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-upload"></i> Import
                    </button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-arrow-left"></i> Back to Tasks
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional: Bootstrap 5 modal for showing help info -->
<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="helpModalLabel">Import Help</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>To import tasks, please make sure your Excel file has the correct format:</p>
                <ul>
                    <li>First column: Task title</li>
                    <li>Second column: Task description</li>
                    <li>Third column: Status (Pending, In Progress, Completed)</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
