<x-app-layout>
    <div class="container" style="margin-top: 70px;min-height:600px">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">{{$products->name}} Details</div>
                <hr style="border-color:black">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Products</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$products->name}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-4 pic-box">         
                <div class="hot1">Hot</div>
                <img src="/storage/product/{{$products->image}}" class="card-img-top" alt="categories">
            </div>
            <div class="col-8">
                <h5 class="text-success">{{$products->name }}</h5>
                <p>{{$products->name}}</p>
                <p>{{$products->descreption}}</p>
                <h6 class="text-danger">Current Price : Rs. <s>{{$products->oldprice}}</s></h6>
                <h6>Offer Price : Rs. {{$products->newprice}}</h6>
                <div class="mt-3">
                    @if($products->quantity > 0 )
                    <input type="hidden" name="qty" id="pid" value="{{$products->id}}" class="form-control text-center">
                    @csrf
                    <p>
                    <div class="input-group" style="width: 170px;">
                        <div class="input-group-text bg-success text-light" id="btnMinus"><i class="fa fa-minus"></i></div>
                        <input type="text" name="qty" id="txtQty" value="1" class="form-control text-center">
                        <div class="input-group-text bg-success text-light" id="btnPlus"><i class="fa fa-plus"></i></div>
                    </div>
                    </p>
                    <button class="btn btn-primary" id="btnCart"><i class="fa fa-cart-plus"></i> Add to Cart</button>
                    @else
                    <button class="btn btn-primary"><i class="fa fa-minus"></i> Out of Stock</button>
                    @endif
                    <button class="btn btn-danger" id="btnFav"><i class="fa fa-heart"></i></button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>