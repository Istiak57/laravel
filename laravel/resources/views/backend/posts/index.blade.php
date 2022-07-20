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
                <h3 class="card-title">Add Post</h3>
                 @if (session('suc_msg'))
                                    <div class="alert alert-success">
                                        {{ session('suc_msg')  }}
                                    </div>
                                @endif
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('add/posts/post') }}" method="post" enctype="multipart/form-data" >
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Post name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                  </div>

                  <div class="input-group mb-3">
                  	<div class="input-group-prepend">
                  		<label class="input-group-text" for="inputGroupSelect01">Status</label>
                  	</div>
                  	<select class="custom-select" id="inputGroupSelect01" name="status">
                  		<option selected>Choose...</option>
                  		<option value="active">Active</option>
                  		<option value="inactive">inactive</option>
                  		
                  	</select>
                  </div>

                   <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Category</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="category_id">
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                      
                      
                    </select>
                  </div>
                   <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">tag</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="tag[]" multiple>
                      
                      @foreach ($tags as $tag)
                       <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
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