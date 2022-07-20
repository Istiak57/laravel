<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="m-5"  >
                    
                    <form action="{{ url('/student_update/post') }}/{{$stu_by_id->id}}" method="post">
                        @csrf
                        <div> 
                            <h3 class="text-center"style="color: green">Update form</h3>
                        </div>

                         <div>
                            

                            
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="user_name" value="{{$stu_by_id->username}}">
                        
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="user_email" value="{{$stu_by_id->useremail}}">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        name="password" value="{{$stu_by_id->password}}">
                    </div>

                     <div class="form-group">
                        <label for="exampleInputPassword1">address</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="address"
                        name="address" value="{{$stu_by_id->address}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">phone</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone"
                        name="phone" value="{{$stu_by_id->phone}}">
                    </div>

                     <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                    
                </form>
                </div>
                
               
            </div>
        </div>
    </div>
</body>
</html>