<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="m-5"  >

                   @if (session('delted_msg'))
                                    <div class="alert alert-danger">
                                        {{ session('delted_msg')  }}
                                    </div>
                                @endif

                                @if (session('update_msg'))
                                    <div class="alert alert-success">
                                        {{ session('update_msg')  }}
                                    </div>
                                @endif

                    
                                    <div class="alert alert-danger">
                                        Welcome 
                                    </div>

                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">ID</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Address</th>
                                          <th scope="col">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($lists as $list)
                                         <tr>
                                        <th scope="row">{{ $loop->index+1 }}</th>
                                      <td>{{ $list->username }}</td>
                                      <td>{{ $list->useremail}}</td>
                                      <td>{{ $list->address}}</td>
                                      <td>
                                          <a href="{{ url('student_update') }}/{{ $list->id }} " class="btn btn-primary btn-sm"> update</a>
                                          <a href=" {{ url('student_delete') }}/{{ $list->id }}" class="btn btn-primary btn-sm"> delete</a>
                                      </td>
                                     </tr>
                                    @endforeach
                                   

                              </tbody>
                          </table>                
                                
                    
                    
                </div>
                
               
            </div>
        </div>
    </div>
</body>
</html>