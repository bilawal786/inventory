<?php

namespace App\Imports;

use App\Comment;
use Maatwebsite\Excel\Concerns\ToModel;

class CommentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Comment([
            'lead_id'     => $row[0],
            'comment'    => $row[1],
        ]);
    }
}
