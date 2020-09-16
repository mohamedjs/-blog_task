<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/bootstrap.css') }}">
    <style>
      p { 
        font-size: 12px !important; 
      }
      .vs-navbar__item{
        font-size: 12px !important; 
      }
    </style>
    <title>Blog Sytem</title>

  </head>
  <body>
    <noscript>
      <strong>We're sorry but Vuesax - Vuejs Admin Dashboard Template doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
    </noscript>
    <div id="app">
    </div>

    <!-- <script src="js/app.js"></script> -->
    <script src="{{ url('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset(mix('js/app.js')) }}"></script>

  </body>
</html>
