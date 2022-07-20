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
              <li class="breadcrumb-item active">Settings</li>
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
                <h3 class="card-title">Add Settings</h3>
                 @if (session('suc_msg'))
                                    <div class="alert alert-success">
                                        {{ session('suc_msg')  }}
                                    </div>
                                @endif
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('add/settings/post') }}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleFormControlFile1">logo</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="logo">
                  </div>
                      @error('image')
                                   <div class="alert alert-danger">
                                    {{ $message }}
                                   </div>
                                 @enderror
                        
                 <div class="form-group">
                    <label for="exampleInputEmail1">Facebook link</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="facebook">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">tweeter link</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="twitter">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">linkedIN link</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="linkedin">
                  </div>

                   

                  <div class="form-group">
                    <label for="exampleInputEmail1">copyright</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="copyright"></textarea>
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