<div class="container-scroller">
    
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand " style="width: 200px;" href="{{'admin'}}"><img src="{{asset('images/hpower.jpeg')}}"  alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
          
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
           
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
     
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{('serveval')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Tableau de bord</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{'allcamionext'}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Tous les camions</span>
            </a>
          </li>
          
          <!-- Mettez à jour le script dans votre fichier HTML -->

       <!--     <li class="nav-item">
            <a class="nav-link" href="{{'paiements'}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Tous les paiements</span>
            </a>
          </li> -->
        
        
          <li class="nav-item">
            <a class="nav-link" href="{{'serviceapprovisionnementext'}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Service Approvisionnement </span>
            </a>
          </li>  <li class="nav-item">
            <a class="nav-link" href="{{'servicetransportext'}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Service Transport </span>
            </a>
          </li>  <li class="nav-item">
            <a class="nav-link" href="{{'servicesemenceext'}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Service Semence </span>
            </a>
          </li>

     
            
              <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">EXPORT</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('loading') }}">Liste Loading</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('booking') }}">Liste Booking</a></li>


              </ul>
            </div>           
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link" style="border: none; background: none; padding: 0; margin: 0; cursor: pointer;">
                    <i class="icon-paper menu-icon"></i>
            <span class="menu-title">Déconnexion</span>
                </a>
            </form>
        </li>
        </ul>
      </nav>
      
    
 
