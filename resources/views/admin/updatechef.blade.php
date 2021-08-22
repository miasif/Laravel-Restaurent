<x-app-layout>
    
</x-app-layout>

 <!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
    @include('admin.admincss')
    
  </head>
        <body>
            <div class="container-scroller">

                
            @include('admin.navbar')
            <div class="col-sm-6">
            <form action="{{url('/updatechef',$data2->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h1>Add FoodMenu Details</h1>
                        <div class="form-group">
                          <label><b>Name</b></label>
                          <input type="text" name="name" class="form-control"  value="{{$data2->name}}">
                          <label><b>Price</b></label>
                          <input type="text" name="speciality" class="form-control"  value="{{$data2->speciality}}">
                          <label><b>Old Image</b></label>
                          <img Height='200' Width='200' src="chefimage/{{$data2->image}}" >
                          <!-- <img height="200" width="200" src="/chefimage/{{$data2->image}}" > -->
                          <label><b>New Image</b></label>
                          <input type="file" name="image" class="form-control" >
                          
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                  

            
            </div>
            
            @include('admin.adminjs')
  </body>
</html>