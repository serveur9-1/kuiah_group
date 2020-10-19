<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>   
        <link rel="stylesheet" href=" {{asset('/css/vendor.min.css') }}">
        <link rel="stylesheet" href=" {{asset('/css/elephant.min.css') }}">
        <link rel="stylesheet" href=" {{asset('/css/application.min.css') }}">    
    </head>
    <body>
        <div id="app">
        <div class="layout layout-header-fixed">
                    @include('share.topbar')
                <div class="layout-main">
                    @include('share.sidebar')
                    <div>
                        <div class="layout-content">
                        <router-view></router-view>
                        </div>
                    </div> 
                </div>
                    @include('share.theme')
            </div>
        </div>
        
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{ asset('/js/vendor.min.js') }}"></script>
        <script src="{{ asset('/js/elephant.min.js') }}"></script>
      <script src="{{ asset('/js/application.min.js') }}"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
    </body>
</html>
