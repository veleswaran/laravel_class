<x-app-layout>
    <div class="container mt-5">
        <h1 class="h2">Product Add Form</h1>
        <form action="/product" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name='category_id'>
                    <option selected>Select category</option>
                    @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter product description"></textarea>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
            </div>
            <div class="mb-3">
                <label for="newprice" class="form-label">New Price</label>
                <input type="text" class="form-control" id="newprice" name="newprice" placeholder="Enter new price">
            </div>
            <div class="mb-3">
                <label for="oldprice" class="form-label">Old Price</label>
                <input type="text" class="form-control" id="oldprice" name="oldprice" placeholder="Enter old price">
            </div>
            <div class="mb-3">
                <label for="oldprice" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Enter old price">
            </div>
            <div class="mb-3">
                <label for="trend" class="form-label">Trend</label>
                yes<input type="radio" class="form-control" id="trend" name="trend" value="0" >
                no<input type="radio" class="form-control" id="trend" name="trend" value="1">
            </div>
            <button type="submit" class="btn btn-primary bg-primary mb-4">Submit</button>
        </form>
    </div>

</x-app-layout>