<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        return view('product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      // Subcat Show
    public function showCategory(Request $request)
    {
        $cat_id = $request->id;

        $categories = Category::where('parent_id', $cat_id)
                            ->select('name', 'icon','id')
                            ->get();

        // dd($category);
        return view('catShow',compact('categories'));
    }

    // Sub Subcat Show
    public function showSubCategory(Request $request)
    {
        $subCat_id = $request->id;
        // dd($subCat_id);

        $subCategories = Category::where('parent_id', $subCat_id)
                            ->select('name', 'icon','id')
                            ->get();

        // dd($subCategories);
        return view('subCatShow',compact('subCategories'));
    }


}
