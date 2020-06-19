<?php

namespace App\Http\Controllers\Web\Admin;

use App\MOdels\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;

class CategoryController extends Controller
{

    public function index()
    {
        $data = array(
            'categories' => Category::all()
        );
        return view('admin.category.index', $data);
    }

    public function create()
    {
        $data = array(
            'category' =>  Category::orderBy('name', 'asc')->get()
        );
        return view('admin.category.create', $data);
    }

    public function store(Request $request)
    {
        $categoryData = $this->validateRequest();

        if (Category::create($categoryData)) {
            Session::flash('response', array('type' => 'success', 'message' => 'Category Added successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        $data = array(
            'category' => $category
        );
        return view('admin.category.edit', $data);
    }

    public function update(Request $request, Category $category)
    {
        $categoryData = $this->validateRequest();

        if ($category->update($categoryData)) {
            Session::flash('response', array('type' => 'success', 'message' => 'Caegory Updated successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        if ($category->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'Category deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect()->route('category.index');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' =>'required',
            'code' => 'required',
        ]);
    }
}
