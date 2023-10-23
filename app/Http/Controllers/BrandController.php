<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarStage;
use Illuminate\Support\Facades\Storage;

use App\Models\Brand;
use Image;

class BrandController extends Controller
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
        $CarStage_name = CarStage::get();
        return view("admin.brand.brand_insert", ['CarStage_name' => $CarStage_name]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'car_stage_id' => 'required',
            'brand_name' => 'required',
            'brand_logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            // Remove 'webp' from mimes
        ]);

        // Store the original image
        $uploadedImage = $request->file('brand_logo');
        $imageName = $request->brand_name . '.' . $uploadedImage->getClientOriginalExtension();
        // $uploadedImage->move(public_path('brand') . '/' . $request->brand_name, $imageName);

        // Convert the image to WebP format
        $webpImageName = $request->brand_name . '.webp';
        $imagePath = public_path('brand') . '/' . $request->brand_name . '/' . $imageName;
        $webpImagePath = public_path('brand') . '/' . $request->brand_name . '/' . $webpImageName;

        //  store converted
        $uploadedImage = $request->file('brand_logo');
        $uploadedImage->move(public_path('brand') . '/' . $request->brand_name, $webpImageName);


        // Run the cwebp command to convert the image to WebP
        $cwebpCommand = "cwebp $imagePath -o $webpImagePath -q 80"; // Set quality (adjust as needed)
        exec($cwebpCommand);

        // Create a new Brand record with the WebP image
        $brand = new Brand();
        $brand->car_stage_id = $request->car_stage_id;
        $brand->brand_name = $request->brand_name;
        $brand->brand_logo = $webpImageName;
        $brand->save();


    }

    /**
     * Display the specified resource.
     */
    public function view()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
