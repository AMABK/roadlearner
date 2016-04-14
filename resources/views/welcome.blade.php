@extends('layout.main')
@section('title')
Home
@stop
@section('slider')
@include('layout.slider')
@endsection
@section('preloader')
<style>
    /* Paste this css to your style sheet file or under head tag */
    /* This only works with JavaScript, 
    if it's not present, don't show loader */
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(images/page_load/Preloader_8.gif) center no-repeat #fff;
    }
</style>
@endsection
@section('content')
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <center><h3 class="box-title"><b>Why take an online course?</b></h3></center>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                Choosing an online driving course can often be the key to getting a driving permit or avoiding the ramifications of a moving violation driving ticket. We offer a safe, effective and relevant driver safety course online for those that want to study at their own pace. Our courses are available 24 hours a day, seven days a week. With interactive curriculum, online driving courses are very popular with young drivers and busy professionals. With online drivers courses, classes are truly as easy as checking your email or surfing your favorite website.
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <center><h3 class="box-title"><b>Be a Smart Driver, No Classrooms, No Boring Lectures</b></h3></center>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                Smart Digital Driver course is a first in terms of online driving courses, specifically designed for drivers in the modern day road designs and traffic. Being a competent driver will benefit you in terms of discount on your insurance premiums. And you will learn something new along the way. In fact, an evaluation of the course found that 90% of participants changed at least one driving habit as a result of what they learned.
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-8">
        <h2>Driving Licenses</h2>
        <p>
            A driving license is issued as an authority to allow a person to drive a motor vehicle of any class on a road. No person shall be allowed to drive a motor vehicle on road unless he is the holder of a valid driving license or a provisional license endorsed in respect of that class of vehicle. No person shall be entitled to more than one driving license, but a driving license may be endorsed to permit the holder to drive one or more classes of motor vehicle.
        </p>        
        <p>
            Driving licenses shall upon expiry be renewed on production and upon payment of the prescribed fee. The renewal period will either be valid for a period of twelve (12) months or three (3) years from the date of issue at the option of the holder.
        </p>  
        <hr>
        <p>
            No driving license or provisional license shall be granted to any person
        <ol type="1">
            <li>
                Under the age of sixteen years;
            </li>
            <li>
                Under the age of eighteen (18) years, except in respect of motor cycles; or
            </li>
            <li>
                Endorsed in respect of matatus and motor-omnibuses, unless he
                <ol type="i">
                    <li> 
                        Is over the age of twenty four (24) years; and
                    </li>
                    <li>
                        Has for not less than four (4) years held a license endorsed in respect of motor-cars or commercial vehicles.
                    </li>
                </ol>
            </li>
        </ol>
        <p>
            Any person driving a motor vehicle on a road shall carry his driving license or provisional license, and on being so required by a police officer, produce it for examination.
        </p>
        <h3>CONDITIONS FOR GRANTING OF DRIVING LICENSE</h3>
        <hr>
        <p>
            A licensing officer shall not grant an applicant a driving license endorsed in respect of any class of motor vehicle unless the applicant -
        <ol type="1">
            <li>
                Satisfies the licensing officer that-
                <ol>
                    <li>
                        He has passed a test of competence to drive that class of motor vehicle and that he holds a certificate of competence
                    </li>
                    <li>
                        Is the holder of a valid driving license for that class of motor vehicle granted by a competent authority in a member country of the Commonwealth, or
                    </li>
                    <li>
                        Is the holder of an international driving permit
                    </li>
                </ol>
            </li>
            <li>
                Makes a declaration as to whether or not he is suffering from any such disease or physical disability which would be likely to cause the driving by him of a motor vehicle to be a source of danger to the public
            </li>
            <li>
                Is able to read, with glasses if worn, a motor vehicle identification plate at a distance of twenty five (25) metres. A person who is totally blind or blind in one eye is not allowed to hold a driving license.
            </li>
        </ol>
        </p>
        <p>
            If it appears to a licensing officer that there is reason to believe that the applicant for any driving license is suffering from disease or physical disability likely to cause the driving by him of a motor vehicle, of the class or classes in respect of which the application for a license is made, to be a source of danger to the public, such application may be disapproved unless the applicant –
        <ol type="1">
            <li>
                Produces a certificate from a medical practitioner stating that in the opinion of such medical practitioner the applicant is physically fit to drive the class or classes of motor vehicle in question; and
            </li>
            <li>
                Undergoes and passes a driving test
            </li>
        </ol>
        </p>
    </div>
    <div class="col-sm-4">
        <h2>Provisional Driving License (PDL)</h2>
        <p>
            This is issued to an applicant who wants to undergo training in driving. It is endorsed in respect of any class or classes of motor vehicle which if he held a driving license he would be entitled to drive, in order that the applicant may learn to drive such class or classes of vehicle. This license is valid for three (3) months only but may be renewed for further periods of three months on payment of the prescribed fee.
        </p>
        <h3>REQUIREMENTS</h3>
        <hr>
        <ol type="1">
            <li>
                The applicant shall enroll in a licensed driving school and apply on-line.
            </li>
            <li>
                The holder of a PDL shall not be allowed to a drive on a road unless he’s in the company of a qualified driver holding a valid driving license for the class or classes the applicant has been permitted to drive.
            </li>
        </ol>
        <h2>Test Booking</h2>
        <p>
            When an applicant is satisfied that he can take a driving test, he shall be required to book for a test stating the date, time and location he would like to go for the driving test. A test booking certificate shall be issued upon payment of the prescribed fee. All driving tests are undertaken at Driving Test Units (DTU) which are based across the country. The driving tests are conducted by driving test examiners (DTE) and shall include a test of the applicant’s –
        <ol type="1">
            <li>
                Knowledge of the rules of road;
            </li>
            <li>
                Knowledge of recognized road signals and road signs;
            </li>
            <li>
                Knowledge of any authorized road or highway code; and
            </li>
            <li>
                Physical fitness to drive a motor vehicle of the class for which the license is required.
            </li>
        </ol>
        <p>
            Once an applicant has passed a driving test, he shall be issued with a certificate of competence (C of C) indicating the class or classes of motor vehicle he is permitted to drive. The C of C is valid for a period of three (3) months, and upon expiry, it will be at the discretion of the licensing officer to decide whether the applicant will under-go another driving test, or on the contrary approve the application for payment of the driving license.
        </p>
        </p>
    </div>
</div>
<!-- /.row -->

<hr>
<center><h2>Transport Related Teams</h2></center>
<hr>

<div class="row">
    <div class="col-sm-4">
        <a href="http://www.ntsa.go.ke" target="_blank"> <img class="img-circle img-responsive img-center" src="/images/ntsa.jpg" height="60px" alt=""></a>
        <h2>National Transport &AMP; Safety Authority (NTSA)</h2>
        <p>
            The National Transport and safety Authority was established through an Act of Parliament; Act Number 33 on 26th October 2012. The objective of forming the Authority was to harmonize the operations of the key road transport departments and help in effectively managing the road transport sub-sector and minimizing loss of lives through road accidents.
        </p>    
    </div>
    <div class="col-sm-4">
        <a href="http://www.transport.go.ke/" target="_blank"><img class="img-circle img-responsive img-center" src="/images/mot.jpeg" height="60px" alt=""></a>
        <h2>Ministry of Transport and Infrastructure</h2>
        <p>The transport sector in Kenya encompasses a transport system comprising of road, rail, air and maritime. The sector is crucial in the promotion of socio-economic activities and development since an efficient and effective, transport system is a mainspring for rapid and sustained development in terms of national, regional and international integration, trade facilitation, poverty reduction and improvement of welfare of the citizen. </p>
    </div>
    <div class="col-sm-4">
        <a href="https://ntsa.ecitizen.go.ke" target="_blank"> <img class="img-circle img-responsive img-center" src="/images/eCitizen.jpg" height="60px" alt=""></a>
        <h2>eCitizen</h2>
        <p>
            Kenyan Citizens and Foreign Residents can now apply for Government to Citizen (G2C) services and pay via mobile money, debit Cards and eCitizen agents.
        </p>  
    </div>
</div>
<!-- /.row -->

<hr>
@endsection
@section('scripts')
@parent
@if($app->environment('local'))
<script src="uikit-2.24.3/js/components/lightbox.min.js"></script>
@else
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/lightbox.min.js"></script>
@endif
<script>
    $(document).ready(function () {
        //   $('#myTable').DataTable();
    });
</script>   
@stop