<?php

namespace App\Imports;

use App\Models\Calender;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CalenderImport implements ToModel,WithHeadingRow,WithValidation

{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Calender([
            //
            'home' => $row['home'],
            'away' => $row['away'],
            'week' => $row['week'],
            'stadium' => $row['stadium'],
            'date' => $row['date'],
            'time' => $row['time'],
        ]);
    }
    public function rules(): array
    {
        return [
            'home' => 'required|exists:teams,name',
             // Above is alias for as it always validates in batches
             '*.home' => 'required|exists:teams,name',
             
            'away' => 'required|exists:teams,name',
             // Above is alias for as it always validates in batches
             '*.away' => 'required|exists:teams,name',
             
            'week' => 'required',
             // Above is alias for as it always validates in batches
             '*.week' => 'required',
             
            'stadium' => 'required',
             // Above is alias for as it always validates in batches
             '*.stadium' => 'required',  
           
        ];
    }
}
