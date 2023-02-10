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
                                <h1 class="text-center text-light">Show Appointment</h1>
                            </div>

                            <div class="card-body">
                              <table style="border: 2px solid grey">
                                <thead  align="center">
                                <tr style="border: 2px solid grey">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Doctor</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Approve</th>
                                    <th>Cancel</th>
                                    <th>Send Email</th>
                                    {{-- <th>dakdfj</th> --}}
                                </tr>
                            </thead>
        
                            @foreach($showappointment as $showappointments)
                            <tbody style="border: 2px solid grey" align="center">
                                <tr>
                                    <td style="border: 2px solid grey">{{$showappointments->name}}</td>
                                    <td style="border: 2px solid grey">{{$showappointments->email}}</td>
                                    <td style="border: 2px solid grey">{{$showappointments->phone}}</td>
                                    <td style="border: 2px solid grey">{{$showappointments->doctor}}</td>
                                    <td style="border: 2px solid grey">{{$showappointments->date}}</td>
                                    <td style="border: 2px solid grey">{{$showappointments->message}}</td>
                                    <td style="border: 2px solid grey">{{$showappointments->status}}</td>
                                    {{-- <td>{{$showappointments->status}}</td> --}}
                                    <td style="border: 2px solid grey">

                                      <a  href="{{url('approve',$showappointments->id)}}" class="btn btn-sm bg-success text-light">Approve</a>
                                    </td>

                                    <td>
                                      <a onclick="return confirm('Are you sure want to Cancel this')" href="{{url('canceled',$showappointments->id)}}" class="btn-sm btn bg-danger text-light">Cancel</a>
                                    </td>

                                    <td>
                                      <a href="{{url('sendmailview',$showappointments->id)}}" class="btn-sm btn bg-info text-light">Email</a>
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