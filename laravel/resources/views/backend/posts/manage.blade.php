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
              <li class="breadcrumb-item active">Manage Posts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                @if (session('delete_msg'))
                                    <div class="alert alert-success">
                                        {{ session('delete_msg')  }}
                                    </div>
                                @endif
                                 @if (session('update_msg'))
                                    <div class="alert alert-success">
                                        {{ session('update_msg')  }}
                                    </div>
                                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>sl</th>
                    <th>name</th>
                    <th>category</th>
                    <th>image</th>
                    <th>status</th>
                    <th>Descroption</th>
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>

                  	@foreach ($posts as $post)

                  	<tr>
                  		<td>{{ $loop->index+1 }}</td>
                  		<td>{{ $post->post_name }}</td>
                      <td>{{ $post->category->name }}</td>
                      <td>
                        <img src=" {{ asset('uploads/post_photos') }}/{{  $post->image }}" width="100">
                     </td>
                  		<td>{{ $post->status }}</td>
                      <td>{{ $post->description }}</td>
                  		<td> 
                  			<a href="{{ url('update/posts') }}/{{ $post->id }}" class="btn-sm btn-info"> update</a>
                  			<a href="{{ url('delete/posts') }}/{{ $post->id }}" class="btn-sm btn-danger"> delete</a>
                  		</td>

                  	</tr>
                  		
                  	@endforeach
                 
                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>sl</th>
                    <th>name</th>
                    <th>category</th>
                    <th>image</th>
                    <th>status</th>
                    <th>Descroption</th>
                    <th>Action</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

             </div >
        </div >
          </div >
       </section>  

@endsection