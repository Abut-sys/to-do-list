<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->filled('status') ? $request->status : null;

        $tasks = Task::where('user_id', auth()->id())
                    ->when($search, function ($query, $search) {
                        return $query->where('list', 'like', '%' . $search . '%');
                    })
                    ->when($status, function ($query, $status) {
                        return $query->where('status', $status);
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(3)
                    ->onEachSide(5)
                    ->fragment('tasks');

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        Task::create($request->validated() + ['user_id' => auth()->id()]);
        return redirect('tasks')->with('msg', 'Add New Data Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        return view('tasks.edit', [
            'task' => $task,
            'submit' => 'Update',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $task->update($request->validated());
        return redirect('tasks')->with('msg', 'Your Data Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $task->delete();
        return back()->with('msg', 'Your Data Was Successfully Deleted');
    }
}
