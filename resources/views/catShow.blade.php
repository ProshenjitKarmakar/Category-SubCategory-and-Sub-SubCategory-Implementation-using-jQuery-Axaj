



<div class="inline-block">
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
</div>
