<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
 
 
class ProductController extends Controller
{
    public function index(?int $id = null)
    
    {
        try {
            if ($id !== null && !is_numeric($id)) {
                $product = Product::findOrFail($id);
                return response()->json(['status' => true, 'message' => 'Product fetched successfully.', 'data' => new ProductResource($product)], 200);
            }
    
            $products = Product::all();
            return response()->json(['status' => true, 'message' => 'Products fetched successfully.', 'data' => ProductResource::collection($products)], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['status' => false, 'message' => 'Product not found.', 'data' => []], 404);
        } catch (\Exception $e) {
 
            \Log::error($e);
            return response()->json(['status' => false, 'message' => 'Internal Server Error.', 'data' => []], 500);
        }
    }
     
    public function create(ProductCreateRequest $request)
    {
    try {
        // Check if a product with similar attributes already exists
        $existingProduct = Product::where('name', $request->input('name'))
            ->where('product_price', $request->input('product_price'))
            ->where('selling_price', $request->input('selling_price'))
            ->first();

        if ($existingProduct) {
            return response()->json(['status' => false, 'message' => 'Product already exists.', 'data' => []], 409);
        }

        // If no existing product, proceed with creating a new one
        $product = Product::create($request->all());
        return response()->json(['status' => true, 'message' => 'Product added successfully.', 'data' => $product], 201);
        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json(['status' => false, 'message' => 'Product failed to add.', 'data' => []], 422);

            
        }
    }
     

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            // Validate the request data
            $validatedData = $request->validated();

            // Update the product
            $product->update($validatedData);

            // Return a JSON response with the updated product
            return response()->json(['status' => true, 'message' => 'Product updated successfully.', 'data' => $product], 200);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the product is not found
            return response()->json(['status' => false, 'message' => 'Product not found.', 'data' => []], 404);
        } catch (\Exception $e) {
            // Log the error for further investigation
            \Log::error($e);

            // Return a JSON response for other unexpected errors
            return response()->json(['status' => false, 'message' => 'Internal Server Error.', 'data' => []], 500);
        }
    }

    
    public function search(Request $request)
    {
        try {
            $search = $request->json('search');
            // $search = $request->input('search');
            

            // Perform the search query
            $products = Product::where('name', 'like', '%' . $search . '%') ->get();

           
            return response()->json([  'status' => true,  'message' => 'Search successful.',  'data' => $products, ], 200);
        } catch (\Exception $e) {
            // Log the error for further investigation
            \Log::error($e);

           
            return response()->json([ 'status' => false,  'message' => 'Invalid argument. :'.$search,   'data' => [], ], 500);
        }
    }
    public function delete($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
    
            return response()->json(['status' => true, 'message' => 'Product deleted successfully.', 'data' => []], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['status' => false, 'message' => 'Product not found.', 'data' => []], 404);
        } catch (\Exception $e) {
            \Log::error($e);
    
            return response()->json(['status' => false, 'message' => 'No Product found to delete for this id :'.$id, 'data' => []], 500);
        }
    }
    
}
