<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\MOdels\Category;
use DB;

class ProductController extends Controller
{

    public function index()
    {
        $data = array(
            'products' => Product::with(['category'])->orderBy('id', 'desc')->get()
        );
        return view('admin.product.index', $data);
    }

    public function create()
    {
        $data = array(
            'categories' =>  Category::orderBy('name', 'asc')->get()
        );
        return view('admin.product.create', $data);
    }

    public function store(Request $request)
    {

        // return request();

        $category_id=$request->category_id;
        $name=$request->name;
        $description=$request->description;
        $sell_price=$request->sell_price;
        $buy_price=$request->buy_price;
        $regular_price=$request->regular_price;

        DB::insert('insert into products(category_id,name,description,sell_price,buy_price,regular_price)value(?,?,?,?,?,?)',[$category_id,$name,$description,$sell_price,$buy_price,$regular_price]);

        $count =  count($request->images);
		 $product_last_id = DB::getPdo()->lastInsertId();

		 for ($i = 0; $i < count($request->images); $i++) {
            $images = $request->images;
            $image = $images[$i];
            $name = time() . $i . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('product-image');
            $image->move($destinationPath, $name);
            $image_url = 'product-image/' . $name;
			 DB::insert('insert into product_images(product_id,image_url)value(?,?)',[$product_last_id,$image_url]);
        }
		DB::table('products')
              ->where('id', $product_last_id)
              ->update(['feature_image' => $image_url]);

		 Session::flash('message',' added successfully!');
         return redirect()->route('admin.product.index');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
