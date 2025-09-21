<?php

namespace App\Imports;

use App\Models\Aics;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AicsImport implements ToModel, WithHeadingRow
{
    /**
     * Map possible column variations to database fields
     */
    private $map = [
        'first_name' => ['first name', 'firstname', 'fname'],
        'middle_name' => ['middle name', 'middlename', 'mname'],
        'last_name' => ['last name', 'lastname', 'lname'],
        'barangay' => ['barangay', 'brgy'],
        'department_function_code' => ['department function code', 'dept code', 'dfc'],
        'amount' => ['amount', 'amt'],
        'purpose' => ['purpose', 'reason'],
        'assistance_date' => ['assistance date', 'date', 'assist date'],
    ];

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $data = [];

        foreach ($this->map as $field => $possibleHeadings) {
            foreach ($possibleHeadings as $heading) {
                $heading = strtolower(trim($heading)); // normalize
                $rowKeys = array_change_key_case($row, CASE_LOWER); // normalize excel headings

                if (array_key_exists($heading, $rowKeys)) {
                    $data[$field] = $rowKeys[$heading];
                    break;
                }
            }
        }

        return new Aics($data);
    }
}
