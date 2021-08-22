<x-app-layout>
    
</x-app-layout>


    <!DOCTYPE html>
    <html lang="en">
      <head>
        @include('admin.admincss');
        
      </head>
            <body>
                <div class="container-scroller">
                @include('admin.navbar')
                <div class="col-sm-6">

                    @if(Session::get('addchef'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('addchef')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                        <form action="{{url('/uploadchefinfo')}}" method="post" enctype="multipart/form-data">
                         @csrf
                        <h1>Add Chefs Details</h1>
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input type="text" name="name" class="form-control" " placeholder="Enter Name">
                            <label><b>Speciality</b></label>
                            <input type="text" name="speciality" class="form-control" " placeholder="Enter Speciality">
                            <label><b>Image</b></label>
                             <input type="file" name="image" class="form-control" > 
                         </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

                     <div>
                <div>
                @if(Session::get('updatechef'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                 {{Session::get('updatechef')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
                  </div>
                  @endif

                      <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Speciality</th>
                                <th scope="col">Image</th>
                                <th scope="col">Operation</th>
                            </tr>
                          </thead>
                            <tr>

                            </tr>
                            @foreach($data as $data)
                          <tbody>
                                <td>{{$data->name}}</td>
                                <td>{{$data->speciality}}</td>
                                <td><img src="/chefimage/{{$data->image}}" class="rounded float-left"></td>
                                <td>

                                    <form method="POST" action="{{url('/deletechef',$data->id)}}">
                                         @csrf
                                         <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                        <a href="{{url('/updatechefview',$data->id)}}" class= "btn btn-info">Edit</a> 
                                    </form>




<!-- 
                                  <a id="form" href = "{{url('/deletechef',$data->id)}}" class="btn btn-danger">Delete</a>-->
                                 
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
              title: `Are you sure you want to delete this Chef Info?`,
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