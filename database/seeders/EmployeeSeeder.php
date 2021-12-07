<?php

namespace Database\Seeders;

use App\Models\Employee; // Include this import. Without this, you can not access the Institution model
use Illuminate\Database\Seeder; // This import comes by default
use Illuminate\Support\Facades\DB; // Include this import. Without this, you can not access the institutions database table
use Illuminate\Support\Facades\File;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $json_file = File::get('database/data/employee-data.json'); // Get Employee-data.json 
        DB::table('employees')->delete(); // Delete all records from the Employees database table 
        $data = json_decode($json_file); // Convert the array of JSON objects in Employee-data.json to a PHP variable
        foreach ($data as $obj) { // For each object (contains key/value pairs) in the PHP variable, create a new record in the Employees database table 
            Employee::create(array( // Remember an Employee has three values - name, region and country. Make 
                                       // sure your JSON file matches the schema of your database table
                'employeeID' => $obj->employeeID,
                'name' => $obj->name,
                'phone' => $obj->phone,
                'franchiseID' => $obj->franchiseID
            ));
        } 
    }
}
