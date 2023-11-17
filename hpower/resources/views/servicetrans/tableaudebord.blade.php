@extends('templates.servicetrans')

@section('document')

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
                <button class="btn btn-sm btn-light bg-white ">
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
                <p class="fs-30 mb-2" style="color: white;">{{ $transportsAujourdhui }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4" style="color: white;">Camions enregistrés ce mois</p>
                <p class="fs-30 mb-2" style="color: white;">{{ $transportsCeMois }}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
            @foreach($sumPoidsParProvenance as $stat)
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4" style="color: white;">Provenance {{ $stat->provenance }}</p>
                            <p class="fs-30 mb-2" style="color: white;">Poids Net total : {{ $stat->poids_total }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


      </div>
    </div>

  </div>
</div>
</div>
</div>
</div>

@endsection