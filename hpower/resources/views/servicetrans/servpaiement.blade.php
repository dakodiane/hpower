@extends('templates.servicetrans')

@section('document')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">


      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Valider le payement</h4>

            <form class="forms-sample" method="POST" action="{{ route('Servicetrans.servpaiement', ['cam_id' => $camions->cam_id]) }}" enctype="multipart/form-data">            @csrf 
            <div class="form-group">
                 <label for="exampleInputName1">N° d'immatriculation</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{ isset($camions) ? $camions->num_immatriculation : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleInputName1">Nom du chauffeur</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{ isset($camions) ? $camions->cam_nomchauf : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleInputName1">N° de tel du conducteur</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{ isset($camions) ? $camions->tel_conducteur : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">Matière transportée</label>
                <input type="text" class="form-control" id="type_produit" value="{{ isset($camions) ? $camions->type_produit : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">Poids vide du camion (tonne)</label>
                <input type="text" class="form-control" id="type_produit" value="{{ isset($camions) ? $camions->poids_vide : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">Poids chargé du camion(Kg)</label>
                <input type="text" class="form-control" id="type_produit" value="{{ isset($camions) ? $camions->poids_charge : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">Poids net du produit</label>
                <input type="text" class="form-control" id="poids_net" value="{{ isset($camions) ? $camions->poids_net : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleInputName1">Entreprise bénéficiaire </label>
                <input type="text" name="charge" class="form-control" id="exampleInputName1" placeholder="">
              </div>

              <div class="form-group">
                <label for="exampleInputCity1">Prix(FCFA/Tonne)</label>
                <input type="number" name="prix_tp" class="form-control" id="exampleInputCity1">
              </div>

             
              
              <div class="form-group">
                <label for="exampleInputName1">Prix HPG (FCFA/Tonne)</label>
                <input type="number" name="Prix_HPG" class="form-control" id="exampleInputName1" placeholder="">
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
@endsection