<x-app-layout>
    {{-- <h1>This is a Admin Panel</h1> --}}
   </x-app-layout>
   
   
   <!DOCTYPE html>
   <html lang="en">
     <head>
       <!-- Required meta tags -->
    
     @include('admin.css')

     </head>
     <body>
       <div class="container-scroller">
         <div class="row p-0 m-0 proBanner" id="proBanner">
           <div class="col-md-12 p-0 m-0">
             <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
               <div class="ps-lg-1">
                 <div class="d-flex align-items-center justify-content-between">
                   <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                   <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                 </div>
               </div>
               <div class="d-flex align-items-center justify-content-between">
                 <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                 <button id="bannerClose" class="btn border-0 p-0">
                   <i class="mdi mdi-close text-white me-0"></i>
                 </button>
               </div>
             </div>
           </div>
         </div>
         @include('admin.sidebar')
        
        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">
       
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-danger">
                                <h1 class="text-center text-light">Show Doctors</h1>
                            </div>

                            <div class="card-body">
                                

                                <table class="table">
                                    <thead  align="center">
                                    <tr >
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Speciality</th>
                                        <th>RoomNo</th>
                                        <th>Image</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Update</th>
                                        <th>Remove</th>
                                        {{-- <th>dakdfj</th> --}}
                                    </tr>
                                </thead>
            
                                @foreach($displaydoctor as $displaydoctors)
                                <tbody  align="center">
                                    <tr>
                                        <td >{{$displaydoctors->name}}</td>
                                        <td >{{$displaydoctors->phone}}</td>
                                        <td >{{$displaydoctors->speciality}}</td>
                                        <td >{{$displaydoctors->roomno}}</td>
                                        <td >
                                        <img src="doctorimage/{{$displaydoctors->image}}" width="200" height="150" alt="">
                                        </td>
                                        
                                        {{-- <td>{{$showappointments->status}}</td> --}}
                                        <td >
    
                                          <a  href="{{url('Updatedoctorview',$displaydoctors->id)}}" class="btn btn-sm bg-success text-light">Update</a>
                                        </td>
    
                                        <td>
                                          <a onclick="return confirm('Are you sure want to Delete this')" href="{{url('removedoctor',$displaydoctors->id)}}" class="btn-sm btn bg-danger text-light">Remove</a>
                                        </td>
                                    </tr>
                                </tbody>
                              @endforeach
                                </table>
                                


                            </div>
                        </div>
                    </div>
                </div>
            </div>

         <!-- page-body-wrapper ends -->
       </div>

       @include("admin.script")

     </body>
   </html>