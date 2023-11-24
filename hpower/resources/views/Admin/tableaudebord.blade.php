@extends('templates.app')

@section('document')
<style>
  .reset-styles,
  .reset-styles *,
  .reset-styles *::before,
  .reset-styles *::after {
    margin: 0;
    padding: 0;
    border: 0;
    font: inherit;
    vertical-align: baseline;
    box-sizing: border-box;
    color: inherit;
    text-decoration: none;
    list-style: none;
  }
</style>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            @if (Auth::check())
            <h3 class="font-weight-bold">Bienvenue {{ $user->name }}</h3>
            @else
            <h3 class="font-weight-bold">Bienvenue Invité</h3>
            @endif
          </div>

          <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white">
                  <i class="mdi mdi-calendar"></i> {{ \Carbon\Carbon::now()->format('d M Y') }}
                </button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="{{asset('images/accueil-01.jpg')}}" alt="people">

          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4" style="color: white;">Camions enregistrés aujourd'hui</p>
                <p class="fs-30 mb-2" style="color: white;">{{ $totaltoday }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4" style="color: white;">Camions enregistrés ce mois</p>
                <p class="fs-30 mb-2" style="color: white;">{{ $totalmonth}}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent" class="reset-styles">
              <div class="card card-light-blue">
                  <a href="{{'servicetransport'}}">
                <div class="card-body">
                  <p class="mb-4" style="color: white;">Tranports</p>
                  <p class="fs-30 mb-2" style="color: white;">{{$transportsCeMois}} camions</p>

                </div>
                </a>
              </div>
            </div>
          

          
            <div class="col-md-6 stretch-card transparent" class="reset-styles">
         
              <div class="card card-light-danger">
              <a href="{{'servicesemence'}}">
                <div class="card-body">
                  <p class="mb-4" style="color: white;">Semences</p>
                  <p class="fs-30 mb-2" style="color: white;">{{$semencesCeMois}} camions</p>

                </div>
                </a>
              </div>
            
            </div>
       

        </div> <br><br>
        <a href="{{'serviceapprovisionnement'}}" class="reset-styles">

          <div class="row">
            <div class="col-md-12 mb-4 mb-lg-0 stretch-card transparent">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="mb-4" style="color: white;">Approvisionnements</p>
                  <p class="fs-30 mb-2" style="color: white;">{{$appro}} camions</p>

                </div>
              </div>
            </div>


          </div>
        </a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

@endsection