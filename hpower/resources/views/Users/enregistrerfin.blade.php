@extends('templates.user')

@section('document')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">


      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Finaliser un enregistrement</h4>
            <form class="forms-sample" method="POST" action="{{ route('camion.storefin', ['cam_id' => $camions->cam_id]) }}" enctype="multipart/form-data" >
            @csrf 
              <div class="form-group">
                <label for="exampleInputName1">Nom du chauffeur</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{ isset($camions) ? $camions->cam_nomchauf : '' }}" readonly>
              </div>


              <div class="form-group">
                <label for="exampleSelectGender">Type de produit</label>
                <input type="text" class="form-control" id="type_produit" value="{{ isset($camions) ? $camions->type_produit : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">Ville de depart</label>
                <select class="form-control" name="provenance" id="exampleSelectGender">
                  <option>Cotonou</option>
                  <option>Parakou</option>
                  <option>Banikoara</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group">
                <label for="photo_immatf">Photo de l'immatriculation du camion</label>
                <input type="file" name="cam_photo1" class="file-upload-default" required>
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Charger l'image" required>
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Charger l'image</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Heure d'arrivée</label>
                <input type="date" name="heure_arrive" class="form-control" id="exampleInputCity1">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Nombre de sacs</label>
                <input type="number" name="nombre_sac" class="form-control" id="exampleInputName1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Statut de déchargement</label>
                <select class="form-control" name="statut_dechargement" id="exampleSelectGender">
                  <option>En attente</option>
                  <option>Déchargé</option>

                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Poids à vide (tonnes)</label>
                <input type="text" class="form-control" name="poids_vide" id="exampleInputCity1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Poids chargé(tonnes)</label>
                <input type="text" class="form-control" name="poids_charge" id="exampleInputCity1" placeholder="">
              </div>

              <div class="form-group">
                <label for="exampleTextarea1">Observation</label>
                <textarea class="form-control" name="observation1" id="exampleTextarea1" rows="4"></textarea>
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