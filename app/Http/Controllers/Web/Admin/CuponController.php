<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Cupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Session;

class CuponController extends Controller
{

    public function index()
    {
        $data = array(
            'cupons' => Cupon::with(['product'])->orderBy('id', 'desc')->get()
        );
        return view('admin.cupon.index', $data);
    }

    public function create()
    {
        $data = array(
            'products' =>  Product::orderBy('title', 'asc')->get()
        );
        return view('admin.cupon.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' =>'required',
            'name' => 'required',
        ]);


        if ($validated == true) {
            $cupon = new Cupon();
            $cupon->product_id = $request->product_id;
            $cupon->name = $request->name;

            if ($cupon->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'cupon Added successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect()->route('admin.cupon.index');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect()->back()->withInput();
        }
    }

    public function show(Cupon $cupon)
    {
        //
    }

    public function edit(Cupon $cupon)
    {
        $data = array(
            'cupon' => $cupon,
            'categories' =>  Category::orderBy('name', 'asc')->get()
        );
        return view('admin.cupon.edit', $data);
    }

    public function update(Request $request, Cupon $cupon)
    {
        $validated = $request->validate([
            'product_id' =>'required',
            'name' => 'required',
        ]);

        if ($validated == true) {
            $cupon = new Cupon();
            $cupon->product_id = $request->product_id;
            $cupon->name = $request->name;

            if ($cupon->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'cupon Added successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect()->route('admin.cupon.index');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            // return redirect('clients/create');
            return redirect()->back()->withInput();
        }
    }

    public function destroy(Cupon $cupon)
    {
        if ($cupon->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'cupon deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect()->route('admin.cupon.index');
    }
}
