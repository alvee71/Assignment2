<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Franchise;

class FranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Franchise::all();
    
    // SQL equivalent: SELECT * FROM Franchises;
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
            'ownerID' => 'required',
            'location' => 'required'
        ]);
        return Franchise::create($request->all());
    
        // SQL equivalent: 
        // INSERT INTO Franchises 
        // VALUES ($request->name, $request->region, $request->country);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Franchise::find($id);

    // SQL equivalent: SELECT * FROM Franchises WHERE id = $id;
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
        $Franchise = Franchise::find($id);
        $Franchise->update($request->all());
        return $Franchise;

    // SQL equivalent:
    // UPDATE Franchises
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
        return Franchise::destroy($id);
    
    // SQL equivalent:
    // DELETE FROM Franchises 
    // WHERE id = $id;
    }
}
