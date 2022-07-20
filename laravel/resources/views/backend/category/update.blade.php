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
              <li class="breadcrumb-item active">Category</li>
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
                <h3 class="card-title">update Category</h3>
                 @if (session('suc_msg'))
                                    <div class="alert alert-success">
                                        {{ session('suc_msg')  }}
                                    </div>
                                @endif
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('update/category/post') }}/{{ $category_by_id->id }}" method="post">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="name" value="{{ $category_by_id->name }}">
                  </div>
                  <div class="input-group mb-3">
                  	<div class="input-group-prepend">
                  		<label class="input-group-text" for="inputGroupSelect01">Status</label>
                  	</div>
                  	<select class="custom-select" id="inputGroupSelect01" name="status" >
                  		<option selected>{{ $category_by_id->status }}</option>
                  		<option value="active">Active</option>
                  		<option value="inactive">inactive</option>
                  		
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