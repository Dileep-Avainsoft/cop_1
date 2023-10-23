<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarStage;

class CarSatgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.car_stage.car_stage_insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'car_stage_name'=>'required'

        ]);
        $carStage = new CarStage;
        if ($carStage) {
            $carStage->car_stage_name = $request->car_stage_name;
            $carStage->save();

            session()->flash('success', 'Data inserted successfully.');
        } else {
            session()->flash('error', 'Data not found or could not be updated.');
        }
        return redirect()->route('carstage.view');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $car_stage = CarStage::get();
        return view('admin.car_stage.car_stage_view',['cat_stage'=> $car_stage]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $car_stage = CarStage::where('car_stage_id',decrypt($id))->first();
        return view('admin.car_stage.car_stage_edit',['car_stage_edit'=> $car_stage]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'car_stage_name'=>'required'

        ]);

        // dd($request->all());
        $carStage = CarStage::where('car_stage_id', decrypt($id))->first();

        if ($carStage) {
            $carStage->car_stage_name = $request->car_stage_name;
            $carStage->save();

            session()->flash('success', 'Data updated successfully.');
        } else {
            session()->flash('error', 'Data not found or could not be updated.');
        }

        return redirect()->route('carstage.view');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carStage = CarStage::where('car_stage_id', decrypt($id))->first();
        if ($carStage) {
            $carStage->delete();
            session()->flash('success', 'Data Delete successfully.');
        }
        else{
            session()->flash('error', 'Data Not Delete successfully.');

        }
        return redirect()->route('carstage.view');
    }

}
