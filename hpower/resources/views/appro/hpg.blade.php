@extends('templates.appro')

@section('document')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Bienvenue {{ $user->name}}</h3>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white ">
                     <i class="mdi mdi-calendar"></i> {{ now()->format('d-m-Y') }}
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
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Approvisionnement HPG</h4>
                  <p class="card-description">
                    HPG
                  </p>
                  <form class="forms-sample" method="POST" action="{{ route('hpg')}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Nom chauffeur</label>
                      <input type="text" class="form-control" name="nom" id="exampleInputName1" placeholder="ALASCO Moktar">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Telephone</label>
                      <input type="text" class="form-control" name="tel" id="exampleInputEmail3" placeholder="67656869">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Heure d'arrivée</label>
                      <input type="time" class="form-control" name="heure" id="exampleInputPassword4" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label>Immatriculation</label>
                      <input type="file" name="img[]" name="photo" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Télécharger</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Provenance</label>
                      <input type="text" name="provenance" class="form-control" id="exampleInputCity1" placeholder="Lokossa">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Poids net en tonnes</label>
                      <input type="number" name="qte" class="form-control" id="exampleInputCity1" placeholder="25">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Prix de cession en FCFA</label>
                      <input type="number" name="prix" class="form-control" id="exampleInputCity1" placeholder="Location">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Observation</label>
                      <textarea class="form-control" name="obs" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                    <button class="btn btn-light">Annuler</button>
                  </form>
                </div>
              </div>
            </div>
  @endsection