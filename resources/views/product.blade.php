<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Category</title>


    {{-- <style>
        .product-card-container{
            display: grid;
            grid-auto-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }
    </style> --}}
  </head>
  <body>
    <h1 class="m-5">Show all Categories</h1>
    <hr>
    {{-- <div class="container"> --}}
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

            </div>
        </div>
        <div class="col-md-4">
            <div id="allSubCategory">

            </div>
        </div>
    </div>


    </div>
    {{-- </div> --}}

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

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


  </body>
</html>
