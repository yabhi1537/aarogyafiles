@extends('layouts.front')

@section('title') {{$contactsetting->meta_title}} @endsection
@section('meta') {{$contactsetting->meta_description}} @endsection


@section('content')

<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content">
            <h2>Contact Us</h2>
            <ul class="pages-list">
                <li><a href="index.html">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>


<section class="contact-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">
                <i class="flaticon-hashtag-symbol"></i>
                Message Us
            </span>
            <h2>Drop Us Message for Any Query</h2>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p> -->
        </div>
        <div class="contact-form">
             @if ($message = Session::get('page_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            <form  action='{{route("contact.query")}}' method='post'>
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" required
                                data-error="Please enter your name" placeholder="Name" >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required
                                data-error="Please enter your email" placeholder="Email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <input type="text" name="phone" id="phone_number" required
                                data-error="Please enter your number" class="form-control" placeholder="Phone">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <input type="text" name="subject" id="msg_subject" class="form-control" required
                                data-error="Please enter your subject" placeholder="Subject">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" id="message" cols="30" rows="5" required
                                data-error="Write your message" placeholder="Your Message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <button type="submit" class="default-btn">Send Message</button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                    </div>
                    
                    <div class=" col-lg-6 main-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14720.13899289557!2d75.8818522!3d22.7269498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962fd40b745a7e5%3A0x179405de69e773a4!2sAarogya%20Superspeciality%20Modern%20Homoeopathic%20Clinic!5e0!3m2!1sen!2sin!4v1676878541729!5m2!1sen!2sin"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
                </div>
            </form>
            
        </div>
        </section>
        
        
        <div class="hospital-information-area pt-100 pb-75">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                <div class="hospital-information-card">
                    <div class="content">
                        <div class="icon">
                            <i class='bx bx-map'></i>
                        </div>
                        <h3>Office Address</h3>
                        <p>102, First Floor, Krishna Tower, Opposite Curewell Hospital, New palasia, (M.P.)</p>
                   </div>
                    <div class="shape">
                        <img src="assets/images/hospital/info-shape.png" alt="image">
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-6">
                <div class="hospital-information-card">
                    <div class="content">
                        <div class="icon">
                            <i class='bx bx-envelope'></i>
                        </div>
                        <h3>Email Us</h3>
                        <p>arpitchopra23@gmail.com</p>
                    </div>
                    <div class="shape">
                        <img src="assets/images/hospital/info-shape.png" alt="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="hospital-information-card">
                    <div class="content">
                        <div class="icon">
                            <i class='bx bx-phone-call'></i>
                        </div>
                        <h3>Contact Us Free</h3>
                        <p>+91 8045132033</p>
                    </div>
                    <div class="shape">
                        <img src="assets/images/hospital/info-shape.png" alt="image">
                    </div>
                </div>
            </div>
            </div>
          </div> 
        </div>



@endsection