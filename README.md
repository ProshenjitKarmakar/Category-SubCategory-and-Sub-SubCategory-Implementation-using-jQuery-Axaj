# Category SubCategory and Sub SubCategory Implementation

This is Dynamic Dependency Category SubCategory and Sub SubCategory using jQuery AJAX. 
I take one model named 'Category'. There is a field in "Category" model named "parent_id".
I match Category model's "id" with "parent_id" and findout the result using Query.

## Sub SubCategory Implementation

Now those "parent_id" became Sub SubCategory "id". Again I matched Sub SubCategory "id"
which is mainly from "parent_id" with "parent_id" and findout the product as result 
using Query.

## Installation

Installing this project first download the project and run this command on terminal

```bash
  php artisan serve
```
    
## File management

- There is a controller named "CategoryController". All methods are given there.
```bash
  path : App/Http/Controllers/CategoryController.php
```

- There is one model named "Category".
```bash
  path :  App/Models/Category.php.
```

- There is a file named 'resources/views'. All frontend code are given there.
```bash
  path :  resources/views/product.blade.php.
          resources/views/catShow.blade.php.
          resources/views/subcatShow.blade.php.   
```

## Controller Methods

```javascript
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

```


## jQuery Ajax Dependency Injection

```javascript
<script>
        jQuery(document).ready(function(){
            jQuery('#category').change(function(){
                var category_id = jQuery(this).val();
                // console.log(category_id);

                $.ajax({
                    url     : 'showCategory',
                    type    : 'GET',
                    dataType: 'html',
                    data    :{
                        id : category_id,
                    },

                    success : function(response){
                        // console.log(response);
                        jQuery('#allCategory').html(response);
                    },
                });
            });
        });

        jQuery(document).on('click','.subCatView',function()
        {
            var subCatid = jQuery(this).data('id');
            // console.log(id);

            $.ajax({
                    url     : 'showSubCategory',
                    type    : 'GET',
                    dataType: 'html',
                    data    :{
                        id : subCatid,
                    },
                    success : function(response){
                        // console.log(response);
                        jQuery('#allSubCategory').html(response);
                    },
                });
        });

</script>
```

# Frontend code for category Search"
```javascript
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Dynamic Dependency DropDown</title>
  </head>
  <body>

    <div class="row m-5">
        <div class="col-md-4">
            <div class="form-group">
                <select class="form-control" id="category">
                    <option selected>Open this select menu</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
            </div>
        </div>
        <div class="col-md-4">
            <div id="allCategory">

                //All Sub category will be showed in this div
                
            </div>
        </div>
        <div class="col-md-4">
            <div id="allSubCategory">

                //All Sub Sub category will be showed in this div

            </div>
        </div>
    </div>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</body>
</html>
```

# Category Show
```javascript
@foreach($categories as $category)


        <div>
            <div class="card m-2" style="width: 18rem">
                <img class="card-img-top" src="{{ asset('public/storage/category/',$category->icon) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <a href="#" data-id = {{$category->id}} class="btn btn-sm btn-primary subCatView">View</a>
                </div>
            </div>
        </div>


@endforeach

```

# Sub SubCategory Show
```javascript
@foreach($subCategories as $subCategory)

    <div class="card m-2" style="width: 18rem">
        <img class="card-img-top" src="{{ asset('storage/category/',$subCategory->icon) }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $subCategory->name }}</h5>
            <a href="#" data-id = {{$subCategory->id}} class="btn btn-sm btn-primary subCatView">View</a>
        </div>
    </div>

@endforeach

```


## Screenshots

![App Screenshot](https://via.placeholder.com/468x300?text=App+Screenshot+Here)

