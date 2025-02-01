<?php

namespace App\Http\Controllers;

use App\Action\ResponseProtocol;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use WpOrg\Requests\Response;
use Illuminate\Support\Facades\DB;
use App\Models\SubCategory;

class ProductController

// protected $fillable = [
//     'name',
//     'description',
//     'price',
//     'image',
//   'stock',
//     'sub_category_id',
// ];
// public function subCategory()
// {
//     return $this->belongsTo(SubCategory::class);
// }
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if($request->has('sub_category_id')){
            $product=Product::where('sub_category_id',$request->sub_category_id)->get();
            return ResponseProtocol::success($product);
        }
        if($request->has('search')){
            $product=Product::where('name','like','%'.$request->search.'%')->get();
            return ResponseProtocol::success($product);
        }
        if($request->has('id')){
            $product=Product::find($request->id);
            return ResponseProtocol::success($product);
        }

        $product=Product::with('subCategory')->get();
        return ResponseProtocol::success($product);
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
                'name' => 'required|string|min:3|max:255',
                'description' => 'required|string|min:3|max:255',
                'price' => 'required|numeric',
                'image' => 'required|image',
                'stock' => 'required|numeric',
                'sub_category_id' => 'required|numeric',
            ]);

            //start db transaction
            DB::beginTransaction();

            //store the image in public assets images folder
            $image = $request->file('image');
            $image_name = time() . '.' . $image->extension();
            $image->move(public_path('assets/images'), $image_name);

            //finth the category id for the sub category id
            $sub_category = SubCategory::find($validateData['sub_category_id']);
            $category_id = $sub_category->category_id;


            $product = Product::create([
                'name' => $validateData['name'],
                'description' => $validateData['description'],
                'price' => $validateData['price'],
                'image' => $image_name,
                'stock' => $validateData['stock'],
                'sub_category_id' => $validateData['sub_category_id'],
                'category_id' => $category_id,
            ]);

            //commit db transaction
            DB::commit();

            return ResponseProtocol::success($product, 'Product created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return ResponseProtocol::failed($th->getMessage(), 'Product creation failed');
        }
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        try {
            //code...
            $validateData= $request->validate([
                'name' => 'required|string|min:3|max:255',
                'description' => 'required|string|min:3|max:255',
                'price' => 'required|numeric',
                'image' => 'required|string',
                'stock' => 'required|numeric',
                'sub_category_id' => 'required|numeric',
            ]);

            //start db transaction
            DB::beginTransaction();

            $product = Product::find($request->id);
            $product->update($validateData);

            //commit db transaction
            DB::commit();

            return ResponseProtocol::success($product, 'Product updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return ResponseProtocol::failed($th->getMessage(), 'Product update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        try {
            //code...
           $validateData= $request->validate([
                'id' => 'required|numeric|exists:products,id',
            ]);
            
            //start db transaction
            DB::beginTransaction();

            $product = Product::find($request->id);
            $product->delete();

            //commit db transaction
            DB::commit();
            return ResponseProtocol::success(null, 'Product deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return ResponseProtocol::failed($th->getMessage(), 'Product delete failed');
        }
    }
    public function changeStatus(Request $request)
    {
        try {
            //code...
            $validateData= $request->validate([
                'id' => 'required|numeric',
             
            ]);
            return ResponseProtocol::success($validateData);

            //start db transaction
            DB::beginTransaction();

            $product = Order::find($request->id);
            $product->status ='completed';
            $product->save();

            //commit db transaction
            DB::commit();

            return ResponseProtocol::success($product, 'Product status changed successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return ResponseProtocol::failed($th->getMessage(), 'Product status change failed');
        }
    }
}
