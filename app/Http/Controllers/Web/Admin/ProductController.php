<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
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

        $category_id=$request->category_id;
		$buy_price=$request->buy_price;
		$title=$request->title;
		$tags=$request->tag;
		$regular_price=$request->regular_price;
		$price=$request->price;
		$rating=$request->rating;
		$shortdes=$request->shortdes;
		$tag=$request->tag;
		$product_info=$request->product_info;

        DB::insert('insert into products(title,regular_price,price,shortdes,product_info,category_id,buy_price,tag)value(?,?,?,?,?,?,?,?)',[$title,$regular_price,$price,$shortdes,$product_info,$category_id,$buy_price,$tags]);
        $count =  count($request->image);
		 $product_last_id = DB::getPdo()->lastInsertId();

		 for ($i = 0; $i < count($request->image); $i++) {
            $image = $request->image;
            $image = $image[$i];
            $name = time() . $i . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('product');
            $image->move($destinationPath, $name);
            $image_url = 'product/' . $name;
			 DB::insert('insert into product_images(product_id,image_url)value(?,?)',[$product_last_id,$image_url]);


        }

		DB::table('products')
              ->where('id', $product_last_id)
              ->update(['image' => $image_url]);

		 Session::flash('message',' added successfully!');
         return redirect()->route('products.index');
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
