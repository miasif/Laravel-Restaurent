<x-app-layout>
    
</x-app-layout>

 <!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
    
  </head>
        <body>
            <div class="container-scroller">
                
            @include('admin.navbar')
            <div class="col-sm-6">

                    @if(Session::get('upload'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('upload')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    @endif
                <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h1>Add FoodMenu Details</h1>
                    <div class="form-group">
                      <label><b>Title</b></label>
                      <input type="text" name="title" class="form-control" " placeholder="Enter Title">
                      <label><b>Price</b></label>
                      <input type="text" name="price" class="form-control" " placeholder="Enter price">
                      <label><b>Image</b></label>
                      <input type="file" name="image" class="form-control" >
                      <label><b>Description</b></label>
                      <input type="text" name="description" class="form-control" " placeholder="Enter description">
                      
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

                     <div>
                     @if(Session::get('update'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{Session::get('update')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @endif
                      <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Food Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Operation</th>
                            </tr>
                          </thead>
                            <tr>

                            </tr>
                            @foreach($data as $data)
                          <tbody>
                                <td>{{$data->title}}</td>
                                <td>{{$data->price}}</td>
                                <td>{{$data->description}}</td>
                                <td><img src="/upload/{{$data->image}}"></td>
                                <td>


                                <form method="POST" action="{{url('/deletemenu',$data->id)}}">
                                         @csrf
                                         <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                        <a href="{{url('/updatefoodmenu',$data->id)}}"" class= "btn btn-info">Edit</a>
                                    </form>
                                  <!-- <a href = "{{url('/deletemenu',$data->id)}}" class="btn btn-danger">Delete</a>
                                  <a href="{{url('/updatefoodmenu',$data->id)}}"" class= "btn btn-info">Edit</a> -->
                                </td>

                          </tbody>
                          @endforeach
                      
                      </table>
                  </div>

            
            </div>
            
            @include('admin.adminjs')
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
      <script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this Food Item?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
</html>