<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<!-- Mirrored from www.vasterad.com/themes/workscout_2019/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Sep 2020 11:00:41 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title>Work Scout</title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
<link rel="stylesheet" href="{{asset('/dashboard-2.html')}}">
<link rel="stylesheet" href="{{asset('/css/colors.css')}}">
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</head>

<body>
<div id="wrapper">
<!-- Header
================================================== -->
<header class="dashboard-header">
  <div class="container">
    <div class="sixteen columns">
      <!-- Logo -->
      <div id="logo">
        <h1><a href="index.html"><img src="images/logo.png" alt="Work Scout" /></a></h1>
      </div>
      <!-- Menu -->
      <nav id="navigation" class="menu">
        <ul class="responsive float-right">
          <li><a href="dashboard.html"><i class="fa fa-cog"></i> Dashboard</a></li>
          <li><a href="index.html"><i class="fa fa-lock"></i> Log Out</a></li>
        </ul>
      </nav>

      <!-- Navigation -->
      <div id="mobile-navigation">
        <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i></a>
      </div>

    </div>
  </div>
</header>

<div class="clearfix"></div>
<!-- Titlebar
================================================== -->
<!-- Dashboard -->
<div id="dashboard">

    <!-- Navigation
    ================================================== -->
<!-- Responsive Navigation Trigger -->
<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

<div class="dashboard-nav">
  <div class="dashboard-nav-inner">
    <ul data-submenu-title="">
      <li class="active"><router-link to="/home"><span class="ln ln-icon-Dashboard"></span>Tableau de board</router-link></li>
      <li><a><span class="ln ln-icon-Megaphone"></span>Publications</a>
        <ul>
        <li><router-link to="/listpublication">List des publications</router-link></li>
		    <li><router-link to="/confirmpublication">En attente de publication</router-link></li>
        </ul>
      </li>
      <li><a href="dashboard-messages.html"><span class="ln ln-icon-Bulleted-List"></span>Listes des investisseurs</a></li>
      <li><a href="dashboard-messages.html"><span class="ln ln-icon-Bulleted-List"></span>Listes des entrepreneurs</a></li>
      <li><a><span class="ln ln-icon-Chemical"></span>Industries</a>
        <ul>
          <li><a href="dashboard-manage-resumes.html">Liste des industries<span class="nav-tag">2</span></a></li>
          <li><a href="dashboard-job-alerts.html">Ajouter industrie</a></li>
        </ul>
      </li> 
      <li><a><span class="ln ln-icon-Two-Windows"></span>Domaines</a>
        <ul>
          <li><a href="dashboard-manage-resumes.html">Liste des domaines<span class="nav-tag">2</span></a></li>
          <li><a href="dashboard-job-alerts.html">Ajouter domaine</a></li>
        </ul>
      </li> 
      <li><a><span class="ln ln-icon-Globe"></span>Pays</a>
        <ul>
          <li><a href="dashboard-manage-resumes.html">Liste des pays<span class="nav-tag">2</span></a></li>
          <li><a href="dashboard-job-alerts.html">Ajouter pays</a></li>
        </ul>
      </li> 
      <li><a><span class="ln ln-icon-Sand-watch2"></span>Niveau projet</a>
        <ul>
          <li><a href="dashboard-manage-resumes.html">Liste niveau de projet<span class="nav-tag">2</span></a></li>
          <li><a href="dashboard-job-alerts.html">Ajouter Niveau de projet</a></li>
        </ul>
      </li>
      <li><a><span class="ln ln-icon-Handshake"></span>Partenaires</a>
        <ul>
          <li><a href="dashboard-manage-resumes.html">Liste des partenaires<span class="nav-tag">2</span></a></li>
          <li><a href="dashboard-job-alerts.html">Ajouter partenaire</a></li>
        </ul>
      </li>
      <li><a><span class="ln ln-icon-Add-User"></span>Compte client</a>
        <ul>
          <li><a href="dashboard-manage-resumes.html">Liste des comptes<span class="nav-tag">2</span></a></li>
          <li><a href="dashboard-job-alerts.html">Demande de compte</a></li>
        </ul>
      </li> 
      <li><a><span class="ln ln-icon-Administrator"></span>Gestionnaire</a>
        <ul>
          <li><a href="dashboard-manage-resumes.html">Liste des gestionnaires<span class="nav-tag">2</span></a></li>
          <li><a href="dashboard-job-alerts.html">Ajouter gestionnaire</a></li>
        </ul>
      </li>
      <li><a><span class="ln ln-icon-Gears"></span>Paramètres</a>
        <ul>
          <li><a href="dashboard-manage-resumes.html">Liste des gestionnaires<span class="nav-tag">2</span></a></li>
          <li><a href="dashboard-job-alerts.html">Ajouter gestionnaire</a></li>
        </ul>
      </li>
    </ul>
    
  </div>
</div>
    <!-- Navigation / End -->
    <!-- Content
    ================================================== -->
    <div class="dashboard-content">
    <router-view></router-view>
    </div>
    <!-- Content / End -->
</div>
<!-- Dashboard / End -->
</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
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



</body>

<!-- Mirrored from www.vasterad.com/themes/workscout_2019/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Sep 2020 11:00:41 GMT -->
</html>