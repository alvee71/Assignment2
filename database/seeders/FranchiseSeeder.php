<?php

namespace Database\Seeders;

use App\Models\Franchise; // Include this import. Without this, you can not access the Institution model
use Illuminate\Database\Seeder; // This import comes by default
use Illuminate\Support\Facades\DB; // Include this import. Without this, you can not access the institutions database table
use Illuminate\Support\Facades\File;


class FranchiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_file = File::get('database/data/Franchise-data.json'); // Get Franchise-data.json 
        DB::table('franchises')->delete(); // Delete all records from the Franchises database table 
        $data = json_decode($json_file); // Convert the array of JSON objects in Franchise-data.json to a PHP variable
        foreach ($data as $obj) { // For each object (contains key/value pairs) in the PHP variable, create a new record in the Franchises database table 
            Franchise::create(array( // Remember an Franchise has three values - name, region and country. Make 
                                       // sure your JSON file matches the schema of your database table
                'ownerID' => $obj->ownerID,
                'location' => $obj->location,
                'parking' => $obj->parking
            ));
        } 
    }
}
    
