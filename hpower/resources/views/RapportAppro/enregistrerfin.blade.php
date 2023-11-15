@extends('templates.user')

@section('document')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">


      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Finaliser l'enregistrement</h4>
            <form class="forms-sample" method="POST" action="{{ route('storefin.appro', ['appro_id' => $camions->appro_id]) }}" enctype="multipart/form-data" >
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
                <label for="exampleSelectGender">Provenance</label>
                <input type="text" class="form-control" id="provenance" value="{{ isset($camions) ? $camions->provenance : '' }}" readonly>
              </div>
             
              <div class="form-group">
                <label for="numerodebord">Numéro de bordereau de pont</label>
                <input type="text" class="form-control" id="numerodebord" name="numerodebord" placeholder="Numero de bordereau" required>
              </div>
              <div class="form-group">
                <label for="photo_immatf">Photo du bordereau de pont</label>
                <input type="file" name="cam_photo2" class="file-upload-default" required>
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Charger l'image" required>
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Charger l'image</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Poids à vide</label>
                <input type="number" name="poids_vide" class="form-control" id="exampleInputName1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Poids chargé</label>
                <input type="number" name="poids_charge" class="form-control" id="exampleInputName1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Nombre de sacs</label>
                <input type="number" name="nombre_sac" class="form-control" id="exampleInputName1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Nombre de sacs rejetés</label>
                <input type="number" name="nombre_sacs" class="form-control" id="exampleInputName1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Statut de déchargement</label>
                <select class="form-control" name="statut_dechargement" id="exampleSelectGender">
                  <option>En attente</option>
                  <option>Déchargé</option>
                </select>
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