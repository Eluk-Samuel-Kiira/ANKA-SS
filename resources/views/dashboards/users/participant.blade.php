@extends('dashboards.users.layouts.user_layout')
@section('title','About Participant')
@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">About Participant</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="index.html">Shop</a></li>
                    <li>About Participant</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Item Details -->
<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Participant Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Product</th>
                            <th>D.O.B</th>
                            <th>Joined</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{ $participant->id }}</td>
                            <td>{{ $participant->name }}</td>
                            <td>{{ $participant->product }}</td>
                            <td>{{ $participant->date_of_birth }}</td>
                            <td>{{ $time->diffForHumans()}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
