<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection,WithHeadings
{
    


   public function headings():array{
       return
       [
            'id',
            'name',
            'email',
            'phone',
       ];
   }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        // return Student::all();

        return collect(Student::getstudents());
    }
}
