<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  {!! SEOMeta::generate() !!}
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!--Ubuntu font-->
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/css/savvystyle.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<div>

</div>

<body onload="myFunction()">
  @include('layouts.nav')
  @yield('content')
  @include('layouts.footer')
  <!-- JQuery -->
  <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="/js/mdb.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="/js/rating.js"></script>
  <script>
    $(function(){
    var $el = $('.parallax');     
    $(window).scroll(function () {
        para($el);
    });
    para($el);
});
var speed = 0.5;
function para($el) {
    var diff = $(window).scrollTop() - $el.offset().top;
    var yPos = -(diff * speed);
    var coords = '50% ' + yPos + 'px';
    $el.css({
        backgroundPosition: coords
    });
}
  </script>

  <script>
    $(function(){
  var $el = $('#parallaxme');     
  $(window).scroll(function () {
      para($el);
  });
  para($el);
});
var speed = 0.5;
function para($el) {
  var diff = $(window).scrollTop() - $el.offset().top;
  var yPos = -(diff * speed);
  var coords = '50% ' + yPos + 'px';
  $el.css({
      backgroundPosition: coords
  });
}
  </script>

  <script>
    $("#review").rating({
        "value": 0,
        "color": "#33b5e5",
        "click": function (e) {
            console.log(e);
            $("#starsInput").val(e.stars);
        }
    });
  </script>
  <script>
    var myVar;
  
  function myFunction() {
    myVar = setTimeout(showPage, 200);
  }
  
  function showPage() {
    document.getElementById("spinner").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
  }
  </script>
  <script>
    AOS.init();
  </script>

  <script>
    // Material Select Initialization
  $(document).ready(function() {
  $('.mdb-select').materialSelect({
    visibleOptions: 1,
    });
});
  </script>

</body>

</html>