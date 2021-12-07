<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;
    protected $fillable = ['ownerID',  'location', 'parking'];
    
    public function employees() {
        return $this->hasMany(Employee::class); // This is an example of a relationship - an institution can have many employee
    }
    public function foods() {
        return $this->hasMany(Food::class); // This is an example of a relationship - an institution can have many employee
    }
    public function suppliers() {
        return $this->hasMany(Supplier::class); // This is an example of a relationship - an institution can have many employee
    }
    public function managers() {
        return $this->hasMany(Manager::class); // This is an example of a relationship - an institution can have many employee
    }
}