<?php

namespace Database\Seeders;

use App\Models\Supplier; // Include this import. Without this, you can not access the Institution model
use Illuminate\Database\Seeder; // This import comes by default
use Illuminate\Support\Facades\DB; // Include this import. Without this, you can not access the institutions database table
use Illuminate\Support\Facades\File;


class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $json_file = File::get('database/data/supplier-data.json'); // Get supplier-data.json 
        DB::table('suppliers')->delete(); // Delete all records from the suppliers database table 
        $data = json_decode($json_file); // Convert the array of JSON objects in supplier-data.json to a PHP variable
        foreach ($data as $obj) { // For each object (contains key/value pairs) in the PHP variable, create a new record in the suppliers database table 
            Supplier::create(array( // Remember an supplier has three values - name, region and country. Make 
                                       // sure your JSON file matches the schema of your database table
                'sname' => $obj->sname,
                'email' => $obj->email,
                'phone' => $obj->phone,
                'scompany' => $obj->scompany,
                'franchiseID' => $obj->franchiseID
            ));
        } 
    }
}
