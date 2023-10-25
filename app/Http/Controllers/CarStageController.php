<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarStage;

class CarStageController extends Controller
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
    public function insert()
    {
        return view('admin.car_stage.insert');
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

            session()->flash('success', 'Car Stage inserted successfully.');
        } else {
            session()->flash('error', 'something went wrong.');
        }
        return redirect()->route('car_stage.view');
    }

    /**
     * Display the specified resource.
     */
    public function view()
    {
        $car_stage = CarStage::get();
        return view('admin.car_stage.view',['cat_stage'=> $car_stage]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $car_stage = CarStage::where('car_stage_id',decrypt($id))->first();
        return view('admin.car_stage.edit',['car_stage_edit'=> $car_stage]);
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

            session()->flash('success', 'Car Stage updated successfully.');
        } else {
            session()->flash('error', 'something went wrong..');
        }

        return redirect()->route('car_stage.view');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carStage = CarStage::where('car_stage_id', decrypt($id))->first();
        if ($carStage) {
            $carStage->delete();
            session()->flash('success', 'Car Stage Delete successfully.');
        }
        else{
            session()->flash('error', 'something went wrong.');

        }
        return redirect()->route('car_stage.view');
    }

}
