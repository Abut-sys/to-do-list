<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TaskPDFController extends Controller
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

        $pdf = Pdf::loadView('pdf.tasks', compact('tasks'));
        return $pdf->download('tasks.pdf');
    }
}
