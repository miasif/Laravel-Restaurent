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
            <form action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h1>Add FoodMenu Details</h1>
                        <div class="form-group">
                          <label><b>Title</b></label>
                          <input type="text" name="title" class="form-control"  value="{{$data->title}}">
                          <label><b>Price</b></label>
                          <input type="text" name="price" class="form-control"  value="{{$data->price}}">
                          <label><b>Description</b></label>
                          <input type="text" name="description" class="form-control" value="{{$data->description}}">
                          <label><b>Old Image</b></label>
                          <img height="200" width="200" src="/upload/{{$data->image}}" >

                          <label><b>New Image</b></label>
                          <input type="file" name="image" class="form-control" >
                          
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                  

            
            </div>
            
            @include('admin.adminjs')
  </body>
</html>