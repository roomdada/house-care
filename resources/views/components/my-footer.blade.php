<div>
   <div>
    <footer class="footer section section-sm" style="margin: 0;">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <img height="100px" width="100px" src="{{ asset('care/images/logo.jpg') }}" alt="">
          <!-- description -->
          <p class="alt-color">votre interface clients - prestataires préférée pour tous vos besoins se rapportant aux ménages</p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 offset-lg-1 col-md-3">
        <div class="block">
          <h4>Liens</h4>
          <ul>
            <li><a href="{{ route('page.path','home') }}">Accueil</a></li>
            <li><a href="{{ route('page.path','about') }}">A propos</a></li>
            <li><a href="">prestation de service</a></li>
            <li><a href="">Maison en location</a></li>
            <li><a href="{{ route('page.path','contact') }}">Contact</a></li>
           
            <li><a href="{{ route('page.path','terms') }}">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
      <!-- Link list -->
        <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
    <div class="block">
      <h4>Categories</h4>
        <ul>
        	@foreach($category as $item)
           <li><a href="">{{$item->name}}</a></li>
           @endforeach
        </ul>
      </div>	
    </div>
      <!-- Promotion -->
      <div class="col-lg-4 col-md-7">
        <!-- App promotion -->
          <h4 style="color: #FFFFFF;">Annonce</h4>

        <div class="block-2 app-promotion">
            <a href="#">
              <img style="width:70%; width: autopx;" src="{{ asset('care/images/home/hero.jpg') }}" alt="mobile-icon">
            </a>
          
        </div>
      </div>
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-12">
        <!-- Copyright -->
        <div class="copyright">
          <p>Copyright © <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script>. All Rights Reserved <a class="text-primary" href="https://faucondigital.com/" target="_blank">Faucon Digital</a></p>
        </div>
      </div>
      <div class="col-sm-6 col-12">
        <!-- Social Icons -->
        <ul class="social-media-icons text-right">
          <li><a class="fa fa-facebook" href="https://www.facebook.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-twitter" href="https://www.twitter.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-pinterest-p" href="https://www.pinterest.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-vimeo" href="#"></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<!-- JAVASCRIPTS -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('care/plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{asset('care/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('care/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('care/plugins/bootstrap/js/bootstrap-slider.js')}}"></script>
  <!-- tether js -->
<script src="{{asset('care/plugins/tether/js/tether.min.js')}}"></script>
<script src="{{asset('care/plugins/raty/jquery.raty-fa.js')}}"></script>
<script src="{{asset('care/plugins/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{asset('care/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('care/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('care/plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&amp;libraries=places"></script>
<script src="{{asset('care/plugins/google-map/gmap.js')}}"></script>
<script src="{{asset('care/js/script.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f8ff89df91e4b431ec647cd/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->



</body>

</html>

</div>


<script type="text/javascript">
	jQuery(document).ready(function(){
    jQuery(".flash").delay(4000).hide(500);
});


</script>
<style type="text/css">
    .error
    {
        font-size: 14px;
        color: red;
    }
</style>
</div>