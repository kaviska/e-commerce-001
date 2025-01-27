<?php

namespace App\Http\Controllers;

use App\Action\ResponseProtocol;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $validateData= $request->validate([
                'name'=>'required',
                'category_id'=>'required',
            ]);
            $subCategory = new SubCategory();
            $subCategory->name = $request->name;
            $subCategory->category_id = $request->category_id;
            $subCategory->save();
            return ResponseProtocol::success($subCategory, 'Sub Category Created');
        } catch (\Throwable $th) {
            //throw $th;
            return ResponseProtocol::failed($th, 'Failed to create Sub Category');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
