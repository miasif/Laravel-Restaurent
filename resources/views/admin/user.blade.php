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
                <div>
                    <table class="table"> 
                    <thead>
                    
                      <tr >
                      <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Operation</th>
                      </tr>
                      </thead>
                      <tbody>
                    
                      @foreach($data as $data)
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>

                        @if($data->usertype=="0")
                        
                        <td>
                              <form method="POST" action= "{{url('/deleteuser',$data->id)}}">
                                  @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                   
                                </form>
<!--                        
                            <a href = "{{url('/deleteuser',$data->id)}}" class="btn btn-danger">Delete</a> -->
                           
                        </td>
                        @else
                        <td>Not Allowed</td>
                        @endif
                      </tr>
                      @endforeach
                      </tbody>
                      
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
              title: `Are you sure you want to delete this User?`,
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