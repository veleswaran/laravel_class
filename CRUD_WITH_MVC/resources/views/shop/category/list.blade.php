<x-app-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3 d-inline-block">collections </div>
                <a href="/category/create" class="btn btn-primary">Add Collections</a>
                <hr style="border-color:black">
            </div>
            @foreach($categories as $items)
            <div class="col-md-6 col-lg-3 col-sm-12 mt-3">
                <div class="card card-image">
                    <img src="storage/category/{{$items->image}}" class="card-img-top" alt="categories" width="100%" height="70%">
                    <a href="/category/{{$items->id}}/products" style="text-decoration: none;">
                        <div class="card-body">
                            <h5 class="card-title">{{$items->name}}</h5>
                            <p class="card-text">{{$items->description}}</p>
                            <a href="#" class="btn btn-primary mt-2">Details</a>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>