<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Http\Resources\ProductResource;
use Validator;

class ProductsController extends Controller
{
    
    use ApiResponseTrait;

    public function allProudcts() {

        $products =  ProductResource::collection(Product::paginate(5));

        return $this->apiresponse($products, 'ok', 200);
    }


    public function storeProducts(Request $request) {


        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, $validator->errors(), 400);
        }
        
        $product = Product::create($request->all());

        if($product) {
            return $this->apiresponse(new ProductResource($product), 'Product saved', 201);

        }


        return $this->apiresponse(null, 'Product not saved', 400);


    }


    public function editProducts($id) {


       

        
        $product = Product::find($id);

        if($product) {
            return $this->apiresponse(new ProductResource($product), 'ok', 200);

        }


        return $this->apiresponse(null, 'this product is not found', 401);

        
    }


    public function updateProducts(Request $request, $id) {



        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, $validator->errors(), 400);
        }
        
        $product = Product::find($id);


        if(!$product) {
            return $this->apiresponse(null, 'Product not found',  404);

        }

        $product->update($request->all());

        if($product) {
            return $this->apiresponse(new ProductResource($product), 'Product updated', 201);

        }

        // $product->name = $request->input('name'); 
        // $product->price = $request->input('price'); 
        // $product->description = $request->input('description'); 
        // $product->quantity = $request->input('quantity');
        // $product->update(); 







    }



    public function deleteProducts($id) {


        $product = Product::find($id);

        if(!$product) {

            return $this->apiresponse(null, 'Product not found', 404);

        } else {

            $product->delete($id);

            if($product) {
    
                return $this->apiresponse(null, 'This product is deleted', 200);
    
            }

        }

        

        
    }


     public function singleProduct($id) {


       

        
        $product = Product::find($id);

        if($product) {
            return $this->apiresponse(new ProductResource($product), 'ok', 200);

        }


        return $this->apiresponse(null, 'this product is not found', 401);

        
    }

    




}
