<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // The Institution model is the parent of the Student model. The institutions 
                                           // database table must be seeded before the students database table
   // $this->call(FranchiseSeeder::class);
    //$this->call(EmployeeSeeder::class);
    //$this->call(FoodSeeder::class);
    //$this->call(SupplierSeeder::class);
    $this->call(ManagerSeeder::class);
    }
}
