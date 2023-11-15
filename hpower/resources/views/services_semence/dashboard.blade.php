@extends('templates.semlayout')

@section('document')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Bienvenue M. BARCKLEY</h3>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white ">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-md-12 grid-margin">
              
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin transparent">
                <div class="row">
                  <div class="col-md-6 mb-4 stretch-card transparent" style="text-align: center;">
                    <div class="card card-tale">
                      <div class="card-body">
                        <p class="mb-4" style="color: white; font-size:2em;">DEPENSES POUR ACHAT</p>
                        <p class="fs-30 mb-2" style="color: white;">4006</p>
                        <a href="/semences" style="color: white;"><small>Voir plus</small></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 stretch-card transparent" style="text-align: center;">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <p class="mb-4" style="color: white; font-size:2em;">QUANTITE VENDUE</p>
                        <p class="fs-30 mb-2" style="color: white;">{{ $produitsVendus }}</p>
                        <a href="/semences" style="color: white;"><small>Voir plus</small></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent" style="text-align: center;">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <p class="mb-4" style="color: white; font-size:2em;">QUANTITE ACHETEE</p>
                        <p class="fs-30 mb-2" style="color: white;">34040</p>
                        <a href="/semences" style="color: white;"><small>Voir plus</small></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 stretch-card transparent" style="text-align: center;">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <p class="mb-4" style="color: white; font-size:2em;">MONTANT DE VENTE</p>
                        <p class="fs-30 mb-2" style="color: white;">47033</p>
                        <a href="/semences" style="color: white;"><small>Voir plus</small></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
           
            
          </div>
        </div>
      
        </div>    
  @endsection 