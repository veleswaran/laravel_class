<x-app-layout>
    <div class="container" style="margin-top: 70px; min-height:600px">
        <table class="row">
            <div class="col-lg-12">
                <div class="mb-3">Cart Items </div>
                <hr style="border-color:black">
            </div>
            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                @foreach($cart as $item)
                <tr>
                    <td style="width: 100px "><img src="/storage/product/{{ $item->product->image }}" height="75px" alt="{{ $item->product->image }}"></td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->product->newprice }}</td>
                    <td>{{ $item->product_qty }}</td>
                    <td class="amt">{{ $item->total_cost }}</td>
                    <td>
                        <form action="/cart/{{$item->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="subbmit" onclick="return confirm('Are you sure to Remove')" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4">Total Amount</td>
                    <td id="net">0</td>
                </tr>
            </table>
        </table>
    </div>
    <script>
        const nodes = document.querySelectorAll('.amt');
        const arr = Array.from(nodes);
        const res = arr.reduce((acc, curr) => {
            return acc += Number(curr.textContent)
        }, 0);
        document.getElementById('net').innerHTML = 'Rs.' + res
    </script>

</x-app-layout>