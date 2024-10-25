<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TasksImport;

class TaskImportController extends Controller
{
    // Tampilkan form upload
    public function index()
    {
        return view('import');
    }

    // Proses import file Excel
    public function import(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xls,csv,xlsx'
        ]);

        // Mengimpor file Excel menggunakan TasksImport
        Excel::import(new TasksImport, $request->file('file'));

        return redirect('tasks')->with('msg', 'File imported successfully.');
    }
}
