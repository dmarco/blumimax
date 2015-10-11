 @include('frontend.partials.header');
    <body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1175538339126248";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

      @include('frontend.partials.navbar')


        <!-- Promo -->
        @yield('promo')


        <!-- Content -->
        <div class="container margin-top">

          @yield('search-keyword')

          @if (Session::has('message'))
            <br />
            <div class="alert {{ Session::get('alert-type') }}" role="alert">{{ Session::get('message') }}</div>
          @endif

          @yield('content')

          @yield('pagination')

        </div>

@include('frontend.partials.footer')