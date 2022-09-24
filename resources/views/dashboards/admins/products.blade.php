@extends('dashboards.admins.layouts.dashboard_layout')
@section('title','Products')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table showing all the products</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Participant</th>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @if (count($products)!=0)
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->uname }}</td>
                        <td>{{ $product->product }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->description }}</td>
                      </tr>
                    @endforeach
                @else
                <tr>
                    <td>No Participants found</td>
                </tr>
                @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Participant</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Description</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
