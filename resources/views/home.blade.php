@extends('layouts.index')

@section('title', 'Home Page')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient text-center py-4">
            <h2>Welcome to Your Task Manager</h2>
            <p class="lead">Effortlessly manage your tasks with our simple interface</p>
        </div>
        <div class="card-body text-center">
            <div class="alert alert-success py-4">
                <h5 class="mb-3"><i class="fas fa-tasks"></i> Get Started Today!</h5>
                <p>Track your tasks, update their statuses, and be more productive.</p>
            </div>

            <!-- Additional content with lorem ipsum -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-clipboard-check fa-3x text-primary mb-3"></i>
                            <h4>Organize Your Tasks</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line fa-3x text-success mb-3"></i>
                            <h4>Boost Your Productivity</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to action buttons -->
            <div class="mt-5">
                <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-tasks"></i> View Tasks
                </a>
            </div>
        </div>
    </div>
</div>


@endsection
