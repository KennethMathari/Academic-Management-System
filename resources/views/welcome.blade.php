@extends('layouts.app')
@include('inc.navbar')

@section('content')
<div class="bgimg-4" id="home">
    <div class="caption">
    <span class="border" style="background-color:transparent;font-size:25px;color: #0b6623;"><b>PRECIOUS CORNERSTONE ACADEMY.</b></span>
    <p style="color:#fff;font-size:20px">A sure and solid foundation.</p>
    </div>
  </div>
  
  <div style="color: #000;background-color:#F5F5F5;text-align:center;padding:30px 60px;">
    <p style="font-size:20px">We provide the Kenyan curriculum education drawing from global best practice with a child centered approach. 
        The school is committed to continue providing a warm and loving environment that is fun, loving, engaging and stimulating – a conductive environment that brings out the BEST in all our learners.</p>
        <div class="row">
            <h3 style="text-align:center;color:#0b6623;">OUR PROMISE</h3>

            <div class="col-md-4">
                <p><img src="/Images/3883244-512.png" width="200" height="200"></p>
                <b style="color:#0b6623;">Amazing learning progress</b>
                <p>Our learners exceed previous expectations of what they can achieve academically and beyond, regardless of their starting point.</p>
            </div>
            <div class="col-md-4">
                <p><img src="/Images/2739090-512.png" width="200" height="200"></p>
                <b style="color:#0b6623;">Ready for work</b>
                <p>We educate the whole child to be ready for life and work in the modern world while aiming to make Precious Cornerstone Academy a world class school.</p>
            </div>
            <div class="col-md-4">
                <p><img src="/Images/confidence.png" width="200" height="200"></p>
                <b style="color:#0b6623;">Confidence</b>
                <p>Our learners are confident in their heritage, self worth, unique voice and ability to make a positive difference in the world.</p>
            </div>
        </div>
  </div>
  
  <div class="bgimg-2">
    <div class="caption">
    <span class="border" style="background-color:transparent;font-size:25px;color: #0b6623;"><b>Amazing Learning Experience.</b></span>
    </div>
  </div>
  
  <div style="position:relative;" id="about">
    <div style="color:#fff;background-color:#282E34;text-align:center;padding:30px 60px;">
        <h3 style="text-align:center;color:#ddd;"><b>ABOUT US</b></h3>
    <p style="font-size:20px">Precious Cornerstone Academy is a private school situated in Ruiru, Kiambu county offering mixed day and boarding.
        We work in a culture of success and achievement – set in a positive ethos of a firm, fair and caring staff. The success of the school is attributed to hard work and team work from 
        the teachers, the support staff and the governing body. These teams ensure high quality learning is implemented and mainatined in the school
    </p>
    <div class="row" >
        <div class="col-md-4">
            <p><img src="/Images/20200514_130412.jpg" width="350" height="300"></p>
        </div>
        <div class="col-md-4">
            <p><img src="/Images/20200514_124759.jpg" width="350" height="300"></p>
        </div>
        <div class="col-md-4">
            <p><img src="/Images/20200514_130125.jpg" width="350" height="300"></p>
        </div>
    </div>
    </div>
  </div>
  
  <div class="bgimg-3">
    <div class="caption">
    <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;"></span>
    </div>
  </div>

  {{-- <div id="map" style="width:100%;height:400px;"></div> --}}
  <div style="position:relative;" id="achievement">
    <div style="color:#fff;background-color:#282E34;text-align:center;padding:30px 60px;">
        <h3 style="text-align:center;color:#fff;"><b>ACHIEVEMENTS & AWARDS</b></h3>
    <div class="row" >
        <div class="col-md-4">
            <p><img src="/Images/gok1.png" width="200" height="200"></p>
            <h4><b>Sub-county Primary Schools Drama Festivals</b></h4>
            <p>Attained second position for modern dance on 19-02-2016.</p>
        </div>
        <div class="col-md-4">
            <p><img src="/Images/kpsa.png" width="200" height="200"></p>
            <h4><b>Kenya Private Schools Association</b></h4>
            <p>The school is an accredited member of KPSA.</p>
        </div>
        <div class="col-md-4">
            <p><img src="/Images/Compuera.jpg" width="200" height="200"></p>
            <h4><b>Compuera Girls' Maths Contest</b></h4>
            <p>Active participants of the Compuera Mang'u Girls School maths contest.</p>
        </div>
    </div>
    </div>
  </div >


  <div class="row" style="margin:0px;" id="contact">
  <iframe class="col-xs-12" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15956.202887471643!2d36.949138084655765!3d-1.1239191858257078!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2a460c80638032e4!2sPrecious%20Corner%20Stone%20Academy%20Primary%20School!5e0!3m2!1sen!2sus!4v1589275330533!5m2!1sen!2sus"  height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
  

  <div  style="color:#000;background-color:#F5F5F5;padding:20px 40px;" >
    
    <h4 style="font-size:40px;color:#0b6623;text-align:center" >Have any questions? Let's get in touch!</h4>        
    <div class="container">
        <form  action=" " method="POST" enctype="multipart/form-data">

            @csrf
            <div class="form-group">        
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="true"  placeholder="Enter Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
            </div>
        
            <div class="form-group">        
                    <input id="phonenumber" type="number" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="true"  placeholder="Enter Phone number">
        
                    @error('phonenumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group " >        
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="true" placeholder="Enter Email">
        
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">        
                    <textarea rows="8" cols="50" id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="true"  placeholder="Enter Message"></textarea>
        
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        
   
        
            <div class="form-group">
                    <p style="text-align:center" ><button type="submit"  class="btn btn-primary" style="width:70%;background-color:#0b6623;">
                        {{ __('Send') }}
                    </button></p>
            </div>
        </form>
        <div  style="font-size:16px;background-color:#F5F5F5">
            <div class="container" >
                <div class="col-md-4"><span class="glyphicon glyphicon-earphone"></span>  +254 716 804 712 | +254 722 346 964</div>
                <div class="col-md-4"><span class="glyphicon glyphicon-envelope"></span>  info@cornerstoneacademy.com</div>
                <div class="col-md-4"><span class="glyphicon glyphicon-time"></span>  Mon-Sat 0800-1700</div>
                                                  
            </div>
          </div>
    </div>
      
</div>
  

  <div style="color:#ddd;background-color:#282E34;text-align: justify;padding:10px 40px">
    <p style="margin:30px;">Copyright <script type="text/javascript">document.write( new Date().getFullYear() );</script> - Precious Cornerstone Academy. All Rights Reserved | Powered by Code & Butter Studios. </p>
 </div>
  
@endsection