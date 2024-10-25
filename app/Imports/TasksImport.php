<?php

namespace App\Imports;

use App\Models\task;
use Maatwebsite\Excel\Concerns\ToModel;

class TasksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new task([
            'user_id' => $row[1],
            'list' => $row[2],
            'status' => $row[3],
        ]);
    }
}
