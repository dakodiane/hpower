@extends('templates.user')

@section('document')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">


      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Modifier l'enregistrement</h4>
            <form class="forms-sample" method="POST" action="{{ route('updatefin.transport', ['transport_id' => $camions->transport_id]) }}" enctype="multipart/form-data" >
            @csrf 
              <div class="form-group">
                <label for="exampleInputName1">Nom du chauffeur</label>
                <input type="text" class="form-control" name="cam_nomchauf" id="exampleInputName1" value="{{ isset($camions) ? $camions->cam_nomchauf : '' }}">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Numéro du chauffeur</label>
                <input type="number" class="form-control" id="tel_conducteur" name="tel_conducteur" value="{{ isset($camions) ? $camions->tel_conducteur : '' }}">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Type de produit</label>
                <input type="text" class="form-control" id="type_produit" name="type_produit" value="{{ isset($camions) ? $camions->type_produit : '' }}">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Provenance</label>
                <input type="text" class="form-control" id="provenance" name="provenance" value="{{ isset($camions) ? $camions->provenance : '' }}">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Avance payée</label>
                <input type="text" class="form-control" id="avancepaye" name="avancepaye" value="{{ isset($camions) ? $camions->avancepaye : '' }}">
              </div>   <div class="form-group">
                <label for="exampleSelectGender">Poids chargé</label>
                <input type="text" class="form-control" id="poids_charge" name="poids_charge" value="{{ isset($camions) ? $camions->poids_charge : '' }}">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
              <button class="btn btn-light">Annuler</button>
            </form>
          </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
@endsection