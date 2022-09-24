<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ auth()->user()->name }} | Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>{{ auth()->user()->name }}</h2>
  <p>Items Added To Cart</p>
      <!-- Cart Start -->
      <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       
                    @foreach ($cartlists as $item)
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> {{ $item->product }}</td>
                            <td class="align-middle">{{ $item->price }}</td>
                            <td class="align-middle">
                            <form method="POST" action="{{route('add-quant')}}">
                                {{ csrf_field() }}
                                <input hidden="true" value="{{ $item->product_id }}" name="product_id">
                                <input type="number" value="{{ $item->quantities }}" name="product_quantity">
                                <button type="submit" class="btn btn-sm btn-success">Add</button>
                            </form>
                            </td>
                            <td class="align-middle">{{ $tot = ($item->price*$item->quantities); }}</td>
                            <td class="align-middle">
                            <!--<a href="{{url('dashboard/item', ['id' => $item->id])}}" class="btn btn-danger btn-sm">Remove</a> -->
                           
                            </td>
                        </tr>
                    @endforeach 
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$
                                @php
                                    $sum=0;
                                    foreach ($cartlists as $item){
                                        $sum +=$tot;
                                    }
                                    echo $sum;
                                @endphp
                            </h5>
                        </div>
                        <form method="POST" action="{{route('add-checkout')}}">
                            {{ csrf_field() }}
                            <input hidden="true" value="{{ auth()->user()->id }}" name="user_id">
                            <button type="submit" class="btn btn-block btn-primary font-weight-bold my-3 py-3">CheckOut</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->



</div>

</body>
</html>