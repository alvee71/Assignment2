<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return food::join('franchises', 'food.franchiseID', '=', 'franchises.id')
            ->get([
                'food.foodname', 
                'food.foodID', 
                'food.foodtype', 
                'food.foodcost', 
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
            'foodname' => 'required',
            'foodID' => 'required',
            'foodtype' => 'required',
            'foodcost' => 'required',
            'franchiseID' => 'required'
        ]);
        return Food::create($request->all());
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Food::find($id);

    // SQL equivalent: SELECT * FROM foods WHERE id = $id;
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
        $Food = Food::find($id);
        $Food->update($request->all());
        return $Food;

    // SQL equivalent:
    // UPDATE foods
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
        return Food::destroy($id);
    
    // SQL equivalent:
    // DELETE FROM foods 
    // WHERE id = $id;
    }
}
