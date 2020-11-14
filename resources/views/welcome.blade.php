<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<!-- Mirrored from www.vasterad.com/themes/workscout_2019/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Sep 2020 11:00:41 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title>Kuiah finance</title>
<link rel="icon" href="{{asset('images/logo.jpeg')}}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
<link rel="stylesheet" href="{{asset('/dashboard-2.html')}}">
<link rel="stylesheet" href="{{asset('/css/colors.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

</head>

<body>

<div id="app-vue">
    <wrapper-component></wrapper-component>
    <datatable-component></datatable-component> 
</div>
<!-- Scripts
================================================== -->
<script src="{{mix("/js/app.js")}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/scripts/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('/scripts/jquery-migrate-3.1.0.min.js')}}"></script>
<script src="{{asset('/scripts/custom.js')}}"></script>
<script src="{{asset('/scripts/jquery.superfish.js')}}"></script>
<script src="{{asset('/scripts/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('/scripts/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('/scripts/jquery.themepunch.showbizpro.min.js')}}"></script>
<script src="{{asset('/scripts/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('/scripts/chosen.jquery.min.js')}}"></script>
<script src="{{asset('/scripts/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('/scripts/waypoints.min.js')}}"></script>
<script src="{{asset('/scripts/jquery.counterup.min.js')}}"></script>
<script src="{{asset('/scripts/jquery.jpanelmenu.js')}}"></script>
<script src="{{asset('/scripts/stacktable.js')}}"></script>
<script src="{{asset('/scripts/slick.min.js')}}"></script>
<script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>



</body>
</html>
