<div class="container-scroller">
    
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand " style="width: 100px;" href="{{'user'}}"><img src="{{asset('images/hpower.jpeg')}}" class="mr-2" alt="logo"/></a>
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
     
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{{'/user'}}}">
              <i class="ti-layout-grid2-alt menu-icon"></i>
              <span class="menu-title">Tableau de bord</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="ti-dropbox menu-icon"></i>
              <span class="menu-title">HPG</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('create.hpg')}}">Enregistrer camion</a></li>
                <li class="nav-item"> <a class="nav-link" href="/listehpgsave">Finaliser camion</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="ti-truck menu-icon"></i>
              <span class="menu-title">Transport</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('create.transport') }}">Enregistrer camion</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{'/listetransportsave'}}">Finaliser camion</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('transport.viewfin') }}">Liste camions finalisés</a></li>


              </ul>
            </div>           
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="ti-control-record menu-icon"></i>
              <span class="menu-title">Semence</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('create.semence') }}"> Enregistrer camion </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{'/listesemencesave'}}"> Finaliser camion </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('semence.viewfin') }}">Liste camions finalisés</a></li>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="ti-shopping-cart menu-icon"></i>
              <span class="menu-title">Approvisionnement</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('create.appro') }}">Enregistrer camion </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{'/listeapprosave'}}"> Finaliser camion </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('appro.viewfin') }}">Liste camions finalisés</a></li>

              </ul>
            </div>
          </li>

      
          <li class="nav-item">
            <a class="nav-link" href="{{'/fournisave'}}">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Fournisseurs</span>
            </a>
          </li>
      

          <li class="nav-item">
            <a class="nav-link" href="{{'logout'}}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Deconnexion</span>
            </a>
          </li>
        </ul>
      </nav>
      
    
 
