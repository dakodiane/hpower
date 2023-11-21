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
                <div class="input-group">
                  <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                    <span class="input-group-text" id="search">
                      <i class="icon-search"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control search" id="navbar-search-input" placeholder="Entrez le numéro d'un camion" aria-label="search" aria-describedby="search" style="width: 250px;">
                </div>
              </li>
            </ul> 
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown">
               
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    <i class="ti-settings text-primary"></i>
                    Paramètres
                  </a>
                  <a class="dropdown-item">
                    <i class="ti-power-off text-primary"></i>
                    Déconnection
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
                <a class="nav-link" href="{{route('hpg')}}">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title">HPG</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('create.transport')}}">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title">RAPPORTEUR</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('fournisave')}}">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title">FOURNISSEUR</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title">SEMENCES</span>
                </a>
              </li>

              
           
              <li class="nav-item">
                <a class="nav-link" href="{{ route('connexion') }}">
                  <i class="icon-paper menu-icon"></i>
                  <span class="menu-title">DECONNEXION</span>
                </a>
              </li>
            </ul>
          </nav>
          
        
     
    