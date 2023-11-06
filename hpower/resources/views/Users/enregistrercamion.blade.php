@extends('templates.user')

@section('document')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">


      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Enregistrement de camion départ</h4>
            <form method="POST" action="{{ route('camion.store') }}" enctype="multipart/form-data">
              @csrf <!-- Le CSRF pour la sécurité -->

              <div class="form-group">
                <label for="chauffeur">Nom du chauffeur</label>
                <input type="text" class="form-control" id="chauffeur" name="cam_nomchauf" placeholder="Nom du chauffeur" required>
              </div>

              <div class="form-group">
                <label for="type_produit">Type de produit</label>
                <select class="form-control" id="prod_nom" name="type_produit" required>
                  @foreach($produits as $produit)
                  <option value="{{ $produit->prod_nom }}">{{ $produit->prod_nom }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="num_immatriculation">Nom du chauffeur</label>
                <input type="text" class="form-control" id="num_immatriculation" name="num_immatriculation" placeholder="Numero d'immatriculation" required>
              </div>

              <div class="form-group">
                <label for="photo_immat">Photo de l'immatriculation du camion</label>
                <input type="file" name="cam_photo" class="file-upload-default" required>
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Charger l'image" required>
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Charger l'image</button>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label for="heure_depart">Heure de départ</label>
                <input type="date" class="form-control" id="heure_depart" name="heure_depart" placeholder="08h30" required>
              </div>

              <div class="form-group">
                <label for="destination">Ville de destination</label>
                <select class="form-control" id="ville_depart" name="destination" required>
                  <option value="Cotonou">Cotonou</option>
                  <option value="Parakou">Parakou</option>
                  <option value="Banikoara">Banikoara</option>
                </select>
              </div>

              <div class="form-group">
                <label for="observation">Observation</label>
                <textarea class="form-control" id="observation" name="observation" rows="4" ></textarea>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
              <button type="button" class="btn btn-light">Annuler</button>
            </form>


          </div>
        </div>
      </div>

    </div>
  </div>

</div>


@endsection