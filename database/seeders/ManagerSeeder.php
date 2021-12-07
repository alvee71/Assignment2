<?php

namespace Database\Seeders;

use App\Models\Manager; // Include this import. Without this, you can not access the Institution model
use Illuminate\Database\Seeder; // This import comes by default
use Illuminate\Support\Facades\DB; // Include this import. Without this, you can not access the institutions database table
use Illuminate\Support\Facades\File;


class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $json_file = File::get('database/data/manager-data.json'); // Get Manager-data.json 
        DB::table('managers')->delete(); // Delete all records from the Managers database table 
        $data = json_decode($json_file); // Convert the array of JSON objects in Manager-data.json to a PHP variable
        foreach ($data as $obj) { // For each object (contains key/value pairs) in the PHP variable, create a new record in the Managers database table 
            Manager::create(array( // Remember an Manager has three values - name, region and country. Make 
                                       // sure your JSON file matches the schema of your database table
                'FirstName' => $obj->FirstName,
                'LastName' => $obj->LastName,
                'email' => $obj->email,
                'phone' => $obj->phone,
                'franchiseID' => $obj->franchiseID
            ));
        } 
    }
}
