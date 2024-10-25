<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromCollection, WithHeadings
{
    protected $IdUser; // Properti untuk menyimpan ID pengguna

    // Konstruktor untuk menginisialisasi kelas dengan ID pengguna
    public function __construct($IdUser)
    {
        $this->IdUser = $IdUser; // Menyimpan ID pengguna ke dalam properti
    }

    // Metode untuk mengambil koleksi data tugas berdasarkan ID pengguna
    public function collection()
    {
        return $this->IdUser;
    }

    // Metode untuk menentukan judul kolom di file Excel
    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'list',
            'status',
            'created_at',
            'updated_at',
        ];
    }
}
