@foreach($subCategories as $subCategory)

    <div class="card m-2" style="width: 18rem">
        <img class="card-img-top" src="{{ asset('storage/category/',$subCategory->icon) }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $subCategory->name }}</h5>
            <a href="#" data-id = {{$subCategory->id}} class="btn btn-sm btn-primary subCatView">View</a>
        </div>
    </div>

@endforeach
