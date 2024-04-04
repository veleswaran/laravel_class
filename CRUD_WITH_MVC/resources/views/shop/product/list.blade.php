<x-app-layout>
    <div class="container" style="margin-top: 70px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">{{$category_name}}</div>
                <hr style="border-color:#b8bfc2">
            </div>
            @foreach($products as $items)
            <div class="col-lg-4">
                <div class="card" style="width:18rem">
                    <img src="/storage/product/{{$items->image}}" class="card-img-top" alt="categories">
                    <a href="/product/{{$items->id}}" style="text-decoration: none;">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{$items->name}}</h5>
                            <p class="card-text">
                                <span class="float-start text-danger old-price p-2">
                                    <s> Rs.{{$items->newprice}}</s>
                                </span>
                                <span class="float-end text-success p-1 rounded"> Rs.{{$items->oldprice}}
                                </span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>