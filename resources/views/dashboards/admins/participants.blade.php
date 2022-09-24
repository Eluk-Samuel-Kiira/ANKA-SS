@extends('dashboards.admins.layouts.dashboard_layout')
@section('title','Participants')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Participants</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Participants</li>
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
              <h3 class="card-title">Table showing all the participants</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Password</th>
                  <th>Product</th>
                  <th>D.O.B</th>
                </tr>
                </thead>
                <tbody>
                @if (count($participants)!=0)
                    @foreach ($participants as $participant)
                    <tr>
                        <td>{{ $participant->id }}</td>
                        <td>{{ $participant->name }}</td>
                        <td>{{ $participant->password }}</td>
                        <td>{{ $participant->product }}</td>
                        <td>{{ $participant->date_of_birth }}</td>
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
