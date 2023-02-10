<div class="page-section" id="doctor"
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

        @foreach($data as $datas)
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="doctorimage/{{$datas->image}}" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$datas->name}}</p>
              <span class="text-sm text-grey">{{$datas->speciality}}</span>
              <h5>Phone: <span>{{$datas->phone}}</span></h5>
              <h5>Roomno: <span>{{$datas->roomno}}</span></h5>
            </div>
          </div>
        </div>
        @endforeach 
      </div>
    </div>
  </div>