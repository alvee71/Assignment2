<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeID');
            $table->string('name');
            $table->integer('phone');
			$table->integer('franchiseID')->unsigned()->index();
            //$table->foreignId('franchiseID')->constrained('franchises')->onDelete('cascade')->onUpdate('cascade');
			$table->foreignId('franchiseID')->references('id')->on('franchises')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Employees');
    }
}
