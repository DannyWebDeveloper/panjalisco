@if(isset($whats))
<a href="whatsapp://send?phone=+52{{$whats->numero}}&text={{$whats->msg}}" class="icon-whats"><img src="{{  asset('img/whats.png') }}" class="icon-whats"/></a>
@endif
<div id="social">
    <ul class="sc_menu">
        @foreach($socials as $link)
        <li><a target="_blank" href="{{ $link->link }}" class="tipsytext" title="{{ $link->red }}"><img class="icon-social" src="{{ asset($link->icon) }}"></a></li>
        @endforeach

    </ul>
</div>

  <!-- FOOTER -->
  <div class="container" style="margin-bottom:30px;">
    <div class ="row">
        <div class="col-sm-12">
            <div class="owl-carousel owl-theme enlaces">
                @foreach($enlaces as $link)
                    <div class="item">
                        <a href="{{ $link->link }}" target="_blank">
                            <img src="{{ asset($link->img) }}">
                        </a>
                    </div>
                @endforeach
        </div>
        </div>

    </div>
  </div>


  <div class="link-socials-movil">
    @if(isset($whats))
    <div class="icon-what">
       <a href="whatsapp://send?phone=+52{{$whats->numero}}&text={{$whats->msg}}">
          <img src="{{  asset('img/whats.png') }}" />
        </a>
    </div>
    @endif
    <div class="icon-social">
    <ul>
        @foreach($socials as $link)
        <li><a target="_blank" href="{{ $link->link }}" class="tipsytext" title="{{ $link->red }}"><img class="icon-social" src="{{ asset($link->icon) }}"></a></li>
        @endforeach
    </ul>
    </div>
  </div>

  <footer>
      <div class="container">
          <div class="row">
              <div class="col-sm-1">
                <img src="{{ asset('img/pan_blanco.png') }}" width="70">
              </div>
              <div class="col-sm-6">
              Calle Vidrio 1604 Col. Americana C.P. 44160 <br>Guadalajara, Jalisco <br>
              Tel. (33) 39158000.
            </div>
            <div class="col-sm-4">
            <a href="{{ route('aviso-de-privacidad') }}">Aviso de privacidad</a>
            <p>&copy; 2019 PAN Jalisco</p>
            </div>
            </div>
        </div>
  </footer>


</body>
</html>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{asset('vendor/owl-carousel/owlcarousel/assets/owl.theme.default.min.css') }}">
    <script src="{{ asset('vendor/owl-carousel/vendors/jquery.min.js')}} "></script>
    <script src="{{ asset('vendor/owl-carousel/owlcarousel/owl.carousel.js') }}"></script>


    <script>
        jQuery(function($){
            // $( ".datepicker" ).focus(function(){
                $('.owl-carousel').owlCarousel({
                    loop:false,
                    margin:10,
                    nav:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:5
                        }
                    }
                })
        });
    </script>
