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
              <li class="breadcrumb-item active">Manage Users</li>
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
                    <th>Email</th>
                    <th>role</th>           
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>

                  	@foreach ($users as $user)

                  	<tr>
                  		<td>{{ $loop->index+1 }}</td>
                  		<td>{{ $user->username }}</td>
                  		<td>{{ $user->email }}</td>
                      <td>@foreach ($user->roles as $role)
                      	    {{ $role->role_name }}
                      @endforeach</td>
                 
                  		<td> 
                  			<a href="{{ url('user/edit') }}/{{ $user->id }}" class="btn-sm btn-info"> update</a>
                  			{{-- <a href="" class="btn-sm btn-danger"> delete</a> --}}
                  		</td>

                  	</tr>
                  		
                  	@endforeach
                 
                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>sl</th>
                    <th>name</th>
                    <th>Email</th>
                    <th>role</th>                  
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