@extends('backend.layouts.adminmaster')

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">

        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">update user role</h3>
                 @if (session('suc_msg'))
                                    <div class="alert alert-success">
                                        {{ session('suc_msg')  }}
                                    </div>
                                @endif
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('edit/user/post') }}/{{ $user->id }}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">user name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="name" value="{{ $user->username }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">user role</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="name" value="{{ $role->role_id }}" readonly>
                  </div>

               

                 


                  <div class="input-group mb-3">
                  	<div class="input-group-prepend">
                  		<label class="input-group-text" for="inputGroupSelect01">change role</label>
                  	</div>
                  	<select class="custom-select" id="inputGroupSelect01" name="role" >
                  		<option selected>{{ $role->role_id}}</option>
                  		@foreach ($roles as $rolee)
                          <option value="{{ $rolee->id }}">{{ $rolee->role_name }}</option>
                      @endforeach
                  		
                  	</select>
                  </div>

                
                 
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

            </div>
        </div>
          <!-- left column -->
          </div>

        </section>
      

@endsection