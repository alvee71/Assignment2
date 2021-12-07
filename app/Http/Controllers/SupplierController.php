<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Supplier::join('franchises', 'suppliers.franchiseID', '=', 'franchises.id')
            ->get([
                'suppliers.sname', 
                'suppliers.email',
                'suppliers.phone',
                'suppliers.scompany', 
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
            'sname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'scompany' => 'required',
            'franchiseID' => 'required'
        ]);
        return Supplier::create($request->all());
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Supplier::find($id);

    // SQL equivalent: SELECT * FROM Suppliers WHERE id = $id;
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
        $Supplier = Supplier::find($id);
        $Supplier->update($request->all());
        return $Supplier;

    // SQL equivalent:
    // UPDATE Suppliers
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
        return Supplier::destroy($id);
    
    // SQL equivalent:
    // DELETE FROM Suppliers 
    // WHERE id = $id;
    }
}
