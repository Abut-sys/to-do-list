@extends('layouts.index')

@section('title', 'Tasks')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Tasks</h1>

        <!-- Card for buttons -->
        <div class="card shadow-lg mb-4 border-0">
            <div class="card-header bg-gradient text-white py-3 d-flex justify-content-between">
                <button type="button" class="btn btn-primary me-2" onclick="window.location='{{ route('tasks.create') }}'">
                    <i class="fas fa-plus-square"></i> Add New
                </button>
                <div>
                    <button type="button" class="btn btn-secondary"
                        onclick="window.location='{{ route('tasks.pdf', ['search' => request('search'), 'status' => request('status')]) }}'">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </button>
                    <button type="button" class="btn btn-secondary me-3"
                        onclick="window.location='{{ route('tasks.excel', ['search' => request('search'), 'status' => request('status'), 'format' => 'excel']) }}'">
                        <i class="fas fa-file-csv"></i> Export Excel
                    </button>
                    <!-- Button to go to import page -->
                    <button type="button" class="btn btn-success" onclick="window.location='{{ route('import.index') }}'">
                        <i class="fas fa-file-import"></i> Import Tasks
                    </button>
                </div>
            </div>
            <div class="card-body">

                <!-- Search and Status Filter Form -->
                <form action="{{ route('tasks.index') }}" method="GET">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label for="search" class="form-label">Search Tasks</label>
                            <input type="text" class="form-control form-control-lg"
                                value="{{ request()->get('search') }}" placeholder="Search tasks Barayaa..." name="search"
                                autofocus>
                        </div>
                        <div class="col-md-4">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select form-select-lg">
                                <option value="" disabled selected>Select status</option>
                                <option value="Pending" {{ request()->get('status') == 'Pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="In Progress"
                                    {{ request()->get('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Completed" {{ request()->get('status') == 'Completed' ? 'selected' : '' }}>
                                    Completed</option>
                            </select>
                            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                                <i class="fas fa-check-double"></i> Apply Filter
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Tasks Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nomor = 1 + ($tasks->currentPage() - 1) * $tasks->perPage();
                            @endphp
                            @foreach ($tasks as $task)
                                <tr>
                                    <th>{{ $nomor++ }}</th>
                                    <td>{{ $task->list }}</td>
                                    <td>
                                        @php
                                            $statusClasses = [
                                                'Pending' => 'badge bg-danger',
                                                'In Progress' => 'badge bg-warning',
                                                'Completed' => 'badge bg-success',
                                            ];
                                            $statusClass = $statusClasses[$task->status] ?? 'badge bg-secondary';
                                        @endphp
                                        <span class="{{ $statusClass }}">{{ $task->status }}</span>
                                    </td>
                                    <td>{{ $task->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button onclick="window.location='{{ route('tasks.edit', $task->id) }}'"
                                                type="button" class="btn btn-info btn-sm me-2">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            @if ($tasks->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tasks->previousPageUrl() }}">Back</a>
                                </li>
                            @endif

                            @foreach ($tasks->getUrlRange(1, $tasks->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $tasks->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($tasks->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tasks->nextPageUrl() }}">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection
