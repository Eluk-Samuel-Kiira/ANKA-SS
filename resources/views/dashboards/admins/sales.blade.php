@extends('dashboards.admins.layouts.dashboard_layout')
@section('title','Sales')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sales</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Sales</li>
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
              <h3 class="card-title">Table showing all the sales</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Customer</th>
                  <th>Product</th>
                  <th>Price @ each</th>
                  <th>Quantity</th>
                  <th>Description</th>
                  <th>Saler</th>
                </tr>
                </thead>
                <tbody>
                @if (count($sales)!=0)
                    @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->name }}</td>
                        <td>{{ $sale->product }}</td>
                        <td>{{ $sale->price }}</td>
                        <td>{{ $sale->quantitiez }}</td>
                        <td>{{ $sale->description }}</td>
                        <td>{{ $sale->uname }}</td>
                      </tr>
                    @endforeach
                @else
                <tr>
                    <td>No Participants found</td>
                </tr>
                @endif
                </tbody>
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
