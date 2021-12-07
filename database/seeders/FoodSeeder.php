<?php

namespace Database\Seeders;

use App\Models\Food; // Include this import. Without this, you can not access the Institution model
use Illuminate\Database\Seeder; // This import comes by default
use Illuminate\Support\Facades\DB; // Include this import. Without this, you can not access the institutions database table
use Illuminate\Support\Facades\File;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_file = File::get('database/data/food-data.json'); // Get food-data.json 
        DB::table('food')->delete(); // Delete all records from the foods database table 
        $data = json_decode($json_file); // Convert the array of JSON objects in food-data.json to a PHP variable
        foreach ($data as $obj) { // For each object (contains key/value pairs) in the PHP variable, create a new record in the foods database table 
            Food::create(array( // Remember an food has three values - name, region and country. Make 
                                       // sure your JSON file matches the schema of your database table
                'foodname' => $obj->foodname,
                'foodID' => $obj->foodID,
                'foodtype' => $obj->foodtype,
                'foodcost' => $obj->foodcost,
                'franchiseID' => $obj->franchiseID

            ));
        } 
    }
}
