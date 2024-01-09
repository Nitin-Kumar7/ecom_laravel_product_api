<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
      public function index()
    {
        $cacheKey = 'products.index';

        return Cache::remember($cacheKey, 60, function () {
            try {
                // Retrieve all products
                $products = Product::all();

                if ($products->isEmpty()) {
                    return response()->json(['status' => false, 'message' => 'No products found.', 'data' => []], 404);
                }

                return response()->json(['status' => true, 'message' => 'Products fetched successfully.', 'data' => ProductResource::collection($products)], 200);
            } catch (\Exception $e) {
                // Log the error for further investigation
                Log::error($e);

                return response()->json(['status' => false, 'message' => 'Internal Server Error.', 'data' => []], 500);
            }
        });
    }

    public function show($id)
    {
        $cacheKey = "products.show.{$id}";

        return Cache::remember($cacheKey, 60, function () use ($id) {
            try {
                // Retrieve a specific product by ID
                $product = Product::findOrFail($id);
                return response()->json(['status' => true, 'message' => 'Product fetched successfully.', 'data' => new ProductResource($product)], 200);
            } catch (ModelNotFoundException $e) {
                // Handle the case where the product is not found
                return response()->json(['status' => false, 'message' => 'Product not found.', 'data' => []], 404);
            } catch (\Exception $e) {
                // Log the error for further investigation
                Log::error($e);

                // Return a JSON response for other unexpected errors
                return response()->json(['status' => false, 'message' => 'Internal Server Error.', 'data' => []], 500);
            }
        });
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
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            // Return a JSON response with validation errors
            return response()->json(['status' => false, 'message' => 'Invalid data Provide', 'errors' => $validator->errors()], 422);
        }

        // Update the product
        $product->update($request->all());

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
        $cacheKey = 'products.search';

        return Cache::remember($cacheKey, 60, function () use ($request) {
            try {
                $search = $request->json('search');

                // Validate the search parameter
                if (empty($search)) {
                    return response()->json(['status' => false, 'message' => 'Search parameter is required.', 'data' => []], 400);
                }

                // Perform the search query
                $products = Product::where('name', 'like', '%' . $search . '%')->get();

                if ($products->isEmpty()) {
                    return response()->json(['status' => false, 'message' => 'No products found for the given search. for '.$search, 'data' => []], 404);
                }

                return response()->json(['status' => true, 'message' => 'Search successful.', 'data' => ProductResource::collection($products)], 200);
            } catch (\Exception $e) {
                // Log the error for further investigation
                Log::error($e);

                return response()->json(['status' => false, 'message' => 'Internal Server Error.', 'data' => []], 500);
            }
        });
    }

    public function delete($id)
    {
        try {
         // Retrieve a specific product by ID
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
