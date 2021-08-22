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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">time</th>
                        <th scope="col">message</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      @foreach($data as $data)
                      <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->time}}</td>
                        <td>{{$data->message}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                      
                  </table>
                
                </div>

                </div>
                
                @include('admin.adminjs')

               
      </body>
    </html>