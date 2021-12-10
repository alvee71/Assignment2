<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return employee::join('franchises', 'employees.franchiseID', '=', 'franchises.id')
            ->get([
                'employees.name', 
                'employees.phone', 
                'franchises.ownerID',
                'franchises.location',
                'franchises.parking'
            ]);
    
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		/*
        $request->validate([
            'employeeID' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'franchiseID' => 'required'
        ]);
		*/
        return Employee::create($request->all());
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Employee::find($id);

    // SQL equivalent: SELECT * FROM Employees WHERE id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Employee = Employee::find($id);
        $Employee->update($request->all());
        return $Employee;

    // SQL equivalent:
    // UPDATE Employees
    // SET name = $request->name, region = $request->region, country = $request->country
    // WHERE id = $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Employee::destroy($id);
    
    // SQL equivalent:
    // DELETE FROM Employees 
    // WHERE id = $id;
    }
}
