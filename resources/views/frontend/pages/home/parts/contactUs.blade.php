<section class="contactForm" id="contactUs">
    <div class="container">
        <div class="row align-items-center">
            <!-- data -->
            <div class="col-sm-6 col-md-5 p-2">
                <div class="contactInfo">
                    <!-- Section Title -->
                    <h2 class="sideTitle"> {{__('frontend.contactUs')}} </h2>
                    <!-- info -->
                    <div class="info" data-aos="fade-up">
                        <i class="fa-solid fa-location-dot me-3"></i>
                        <div class="data">
                            <h6> {{__('frontend.ourLocation')}} </h6>
                            <p> {{$settings->address1??"السعودية - الرياض - شارع الوحدة"}} </p>
                        </div>
                    </div>
                    <!-- info -->
                    <div class="info" data-aos="fade-up">
                        <i class="fa-solid fa-mailbox me-3"></i>
                        <div class="data">
                            <h6> {{__('frontend.Email')}} </h6>
                            <p> {{$settings->email1??"mail@mail.com"}} </p>
                        </div>
                    </div>
                    <!-- info -->
                    <div class="info" data-aos="fade-up">
                        <i class="fa-solid fa-headset me-3"></i>
                        <div class="data">
                            <h6> {{__('frontend.PhoneNumbers')}} </h6>
                            <p> {{$settings->phone1??"+996 0123456789"}} </p>
                            <p> {{$settings->phone2??"+996 0123456789"}} </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- form -->
            <div class="col-sm-6 col-md-7 p-2">
                <form  id="Form" class="row needs-validation " action="{{route('front.contact_us_action')}}" method="post" novalidate data-aos="fade-up">
                   @csrf
                    <div class="circleBlur"></div>
                    <div class="circleBlur2"></div>
                    <div class="col-md-12 p-2">
                        <label class="form-label"> <i class="fas fa-user me-2"></i> {{__('frontend.FullName')}}*  </label>
                        <input data-validation="required" id="contact_name" name="name" type="text" class="form-control">

                    </div>
                    <div class="col-md-6 p-2">
                        <label class="form-label"><i class="fas fa-phone-alt me-2"></i>  {{__('frontend.Phone Number')}} *</label>
                        <input onkeypress="return isNumber(event)" data-validation="required" name="phone" type="text" class="form-control">
                    </div>
                    <div class="col-md-6 p-2">
                        <label class="form-label"> <i class="fa-solid fa-comment-lines me-2"></i> {{__('frontend.Subject')}}
                        </label>
                        <input type="text" data-validation="required" name="subject"  class="form-control">
                    </div>
                    <div class="col-md-12 p-2">
                        <label class="form-label"> <i class="fas fa-feather-alt me-2"></i>  {{__('frontend.Your Message')}}* </label>
                        <textarea class="form-control" rows="5" data-validation="required" name="message"></textarea>
                    </div>
                    <div class="col-md-12 text-center pt-2">
                        <button type="submit" class="animatedLink">
                            {{__('frontend.Send Message')}}
                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                        </button>
                    </div>
                </form>
            </div>
            <!-- map -->
            <div class="col-md-12 p-2 pt-4">
                <iframe class="googleMap wow fadeInUp "
                        src="https://maps.google.com/maps?q={{$settings->latitude}},{{$settings->longitude}}&hl=ar&z=14&amp;output=embed">
                </iframe>
            </div>
        </div>
    </div>
</section>
