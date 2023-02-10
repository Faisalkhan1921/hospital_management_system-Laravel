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
                                <h1 class="text-center text-light">Add Doctors</h1>
                            </div>

                            <div class="card-body">
                                @if(session()->has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    {{session()->get('message')}}
                                </div>
                                {{-- <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">
                                        x
                                    </button>

                                    {{session()->get('message')}}
                                </div> --}}
                                @endif

                                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Doctors Name</label>
                                        <input  type="text" name="name" class="form-control bg-dark text-white" placeholder="Enter the Doctor Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Doctor Phone</label>
                                        <input type="number" name="phone" class="form-control bg-dark text-white" placeholder="Enter the Doctor Phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Doctors Speciality</label>

                                       <select name="speciality" class="bg-dark text-light">

                                        <option >--Select--</option>
                                        <option value="Skin">Skin</option>
                                        <option value="Heart">Heart</option>
                                        <option value="Eye">Eye</option>
                                        <option value="Nose">Nose</option>

                                       </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Doctor RoomNO</label>
                                        <input type="number" name="roomno" class="form-control bg-dark text-white" placeholder="Enter the Doctor Room no">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Doctor Image</label>
                                        <input type="file" name="image">
                                    </div>

                                    
                                    <div class="form-group">
                                    <input type="submit" value="Add Doctor" class="btn bg-success form-control">    
                                    </div>
                                </form>


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