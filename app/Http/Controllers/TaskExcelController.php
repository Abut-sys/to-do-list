<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Export\TaskExport;
use App\Exports\TasksExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TaskExcelController extends Controller
{
    public function export(Request $request)
    {
        $query = Task::where('user_id', auth()->id());

        if ($request->filled('search')) {
            $query->where('list', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $tasks = $query->get();

        return Excel::download(new TasksExport($tasks), 'tasks.xlsx');
    }
}
