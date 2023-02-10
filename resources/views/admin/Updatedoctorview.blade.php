<x-app-layout>
    {{-- <h1>This is a Admin Panel</h1> --}}
   </x-app-layout>
   
   
   <!DOCTYPE html>
   <html lang="en">
     <head>
       <!-- Required meta tags -->
       <base href="/public">
    
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
                    

                                <form action="{{url('editdoctor',$doctorview->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Doctors Name</label>
                                        <input type="text" name="name" class="form-control bg-dark text-white" value="{{$doctorview->name}}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="">Doctor Phone</label>
                                        <input type="number" name="phone" class="form-control bg-dark text-white" value="{{$doctorview->phone}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Doctors Speciality</label>

                                       <select name="speciality" class="bg-dark text-light">

                                        <option >--Select--</option>
                                        <option value="Skin" 
                                        {{($doctorview->speciality=='Skin') ? 'Selected' : ''}}
                                        >Skin</option>

                                        <option value="Heart"
                                        {{($doctorview->speciality=='Heart') ? 'Selected' : ''}}
                                        >Heart</option>

                                        <option value="Eye"
                                        {{($doctorview->speciality=='Eye') ? 'Selected' : ''}}
                                        >Eye</option>

                                        <option value="Nose"
                                        {{($doctorview->speciality=='Nose') ? 'Selected' : ''}}
                                        >Nose</option>

                                       </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Doctor RoomNO</label>
                                        <input type="number" name="roomno" class="form-control bg-dark text-white" value="{{$doctorview->roomno}}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="">Old Image</label>
                                        <img src="doctorimage/{{$doctorview->image}}" width="50" height="20" alt="">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Doctor Image</label>
                                       <input type="file" name="image" >
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