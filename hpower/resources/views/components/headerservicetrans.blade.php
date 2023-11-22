<div class="container-scroller">
    
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand " style="width: 100px;" href="{{'fourni'}}"><img src="{{asset('images/hpower.jpeg')}}" class="mr-2" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
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
     
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{{'/servicetrans'}}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Tableau de bord</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="{{route('Servicetrans.show')}}" >
              <i class="icon-grid menu-icon mdi mdi-cloud-download"></i>
              <span class="menu-title">Consultation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('Servicetrans.viewfin')}}">
              <i class="icon-grid menu-icon mdi mdi-cloud-download"></i>
              <span class="menu-title">Liste des camions payé</span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="ti-truck menu-icon"></i>
              <span class="menu-title">FOURNISSEUR</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('payefournit')}}">Payé</a></li>
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
      
<!-- Mettez à jour le script dans votre fichier HTML -->


 
