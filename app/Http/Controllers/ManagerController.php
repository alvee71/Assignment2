<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Manager::join('franchises', 'managers.franchiseID', '=', 'franchises.id')
            ->get([
                'managers.FirstName', 
                'managers.LastName',
                'managers.email',
                'managers.phone', 
                'franchises.ownerID',
                'franchises.location'
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
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'franchiseID' => 'required'
        ]);
        return Manager::create($request->all());
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Manager::find($id);

    // SQL equivalent: SELECT * FROM Managers WHERE id = $id;
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
        $Manager = Manager::find($id);
        $Manager->update($request->all());
        return $Manager;

    // SQL equivalent:
    // UPDATE Managers
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
        return Manager::destroy($id);
    
    // SQL equivalent:
    // DELETE FROM Managers 
    // WHERE id = $id;
    }
}
