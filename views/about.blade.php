@extends('layouts.front')


@section('content')

<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content">
            <h2>About Us</h2>
            <ul class="pages-list">
                <li><a href="index.html">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>

            
<section class="about-area pt-100">
    <div class="container">    
        <div class="row align-items-center">             
            <div class="col-lg-7">
                <div class="hospital-about-content">
                    <?php echo $aboutsetting['description']; ?>
               
                </div>
            </div>
            <div class="col-lg-5">
                <div class="about-image">
                    <img src="{{asset('images/media/'.$aboutsetting['aboutimage']->file)}}" alt="{{$aboutsetting['aboutimage']->alt}}">
                </div>
                
                
            </div>
            <div>
                    <p class="mt-5">Your One-Stop solution for all health complaints that need Homoeopathy! Speciality clinic is an online &telephonialy homeopathic consultation service that you can avail of, from the comfort of your home/office. No more running around for getting an appointment for Homoeopathic treatment, no more waiting in long queues at your doctor’s clinic. The services of an expert MD Homoeopath will now be available for you  by just send an online query or a single call… Dr.Arpit Aarogya super speciality modern homoeopathic clinic Offers online and offline homoeopathic treatment and consultation that will be available to patients situated in any corner of the world. The treatment will no longer be limited by distance or time and the best of Homeopathic services will be All be available at your doorstep. This is, in the true sense of the word, a Global modern superspeciality Clinic .
                    We are offering treatment of more than 300 medical disorders with the new concept of MODERN HOMEOPATHY CURE IN COMPLETE, PERMANENT , EASY, SAFE , FAST & COSTEFFECTIVE MODE. </p>
                    <p class="mt-3"> ⦁	There are 3 ways to consult   1. Face to face consultation at our location (walk-in appointment) 2. Online consultation by submitting the details on WhatsApp number 997052714  & 7999978894</p>
                    <p class="mt-3">भविष्य की होम्योपैथी के जनक  डॉक्टर अर्पित चोपड़ा जैन 
                     डॉक्टर अर्पित चोपड़ा जैन चिकित्सा जगत में आज एक ऐसा नाम है, जिन्होंने अपने 20 सालों के चिकित्सकीय अनुभव और रिसर्च के आधार पर ,होम्योपैथी चिकित्सा को नया आयाम देते हुए अपनी सुपर स्पेशलिटी मॉडर्न होम्योपैथी चिकित्सा पद्धति का आविष्कार करके, अब तक कैंसर, किडनी, कोमा, अप्लास्टिक एनीमिया ,अस्पताल में भर्ती मरीजों और गंभीर सर्जिकल बीमारियों सहित ,लगभग 300 बीमारियों के हजारों लाइलाज ,हताश, निराश और नाउम्मीद रोगियों को पूरी तरह स्वस्थ कर, नया शारीरिक ,मानसिक एवं सामाजिक जीवन दिया है, इस तरह आपने डब्ल्यूएचओ की मान्यताओं को भी पूरा किया है।

                    मरीज की हार को अपनी हार और असंभव को संभव कर देने की जिद और जुनून रखने वाले , डॉक्टर अर्पित चोपड़ा जैन को कई असाध्य, जटिल एवं लाइलाज बीमारियों तथा कोरोना काल में दी गई अपनी विशेष सेवाओं के लिए ,राष्ट्रीय एवं अंतर्राष्ट्रीय स्तर पर कई सम्मान अभी तक प्राप्त हो चुके हैं।
                    पीड़ित मानवता की सेवा को सदैव तत्पर डॉक्टर अर्पित चोपड़ा जैन को उनके कई पेशेंट्स भगवान की तरह मानते हैं और डॉक्टर चोपड़ा भी एक देवदूत की तरह, मानव स्वास्थ्य के माध्यम से ,समाज एवं देश सेवा मे अपना महत्वपूर्ण योगदान दे रहे हैं।

                    19 चिकित्सकों के परिवार से आए डॉक्टर चोपड़ा का कहना है कि, बिना किसी साइड इफेक्ट, बिना किसी परहेज , तुरंत असरकारक और कम खर्चीली सुपर स्पेशलिटी मॉडर्न होम्योपैथी भविष्य की होम्योपैथी है। होम्योपैथी का आविष्कार जरूर जर्मनी में हुआ है, मगर हमारी यह भारतीय क्रांतिकारी, मॉडर्न होम्योपैथि चिकित्सा पद्धति, विश्व के स्वास्थ्य पटल पर ,भारत का नाम सुनहरे अक्षरों में दर्ज करवाएगी। जिसके लिए हम हर संभव प्रयास कर रहे हैं ,और करते रहेंगे।</p>
                </div>
                
        </div>
    </div>
</section>


<div class="hospital-testimonials-area ptb-50">
    <div class="container">
        <div class="section-title with-hospital-color text-start">
            <span>Testimonials</span>
            <h2>Our Clients Feedback</h2>
        </div>
        <div class="hospital-testimonials-slides owl-carousel owl-theme">
            <?php
            foreach($testimonials as $key => $value){
                ?>
            <div class="hospital-testimonials-card">
                <p>“{{$value->description}}”</p>
                <div class="info-content d-flex justify-content-between align-items-center">
                    <div class="info d-flex align-items-center">
                        <img src="assets/images/user.png" class="rounded-circle" alt="image">
                        <div class="title">
                            <h3>{{$value->name}}</h3>
                            <!--<span>SEO - Founder</span>-->
                        </div>
                    </div>
                    <ul class="rating">
                        <li>
                            <i class='bx bxs-star'></i>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                        </li>
                    </ul>
                </div>
            </div>
             <?php
            }
            ?>
            
        </div>
    </div>
</div>

<!-- <p>Your One-Stop solution for all health complaints that need Homoeopathy! Speciality clinic is an online &amp; telephonialy homeopathic consultation service that you can avail of, from the comfort of your home/office. No more running around for getting an appointment for Homoeopathic treatment, no more waiting in long queues at your doctor&rsquo;s clinic. The services of an expert MD Homoeopath will now be available for you at any time by just send an online query or a single call&hellip; Dr. Arpit Homoeopathy modern arogya superspeciality Clinic offers Online &amp; telephonic Homoeopathic Consultation and Treatment that will be available to patients situated in any corner of the world. The treatment will no longer be limited by distance or time and the best of Homeopathic services will be available to you at your doorstep. This is, in the true sense of the word, a Global modern superspeciality Clinic .We are offering treatment of more than 300 medical disorders with the new concept of MODERN HOMEOPATHY CURE IN COMPLETE, PERMANENT , EASY, SAFE , FAST &amp; COSTEFFECTIVE MODE. I wish to inform that almost 300 types of Critical ,Surgical &amp; regular health problems are curable with concept of MODERN HOMEOPATHY CURE IN COMPLETE, PERMANENT , EASY, SAFE , FAST &amp; COSTEFFECTIVE MODE.</p>
<p>&nbsp;</p> -->

@endsection