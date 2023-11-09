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
              @csrf 

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
                <input type="datetime-local" class="form-control" id="heure_depart" name="heure_depart" placeholder="08h30" required>
              </div>

              <div class="form-group">
                <label for="destination">Ville de destination</label>
                <input type="text" class="form-control"  id="destination" name="destination" placeholder="Tapez une ville" autocomplete="off">
                <ul id="villes-list"></ul>
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
<script>
      var input = document.getElementById('ville');
      var villesList = document.getElementById('villes-list');


      input.addEventListener('input', function() {

        var recherche = input.value.toLowerCase();

        villesList.innerHTML = '';

        var villes = ['Cotonou', 'Abomey-Calavi', 'Porto-Novo', 'Parakou', 'Djougou', 'Bohicon', 'Natitingou',
          'Savé', 'Abomey', 'Nikki', 'Lokossa', 'Ouidah', 'Dogbo-Tota', 'Kandi', 'Cové', 'Malanville',
          'Pobé', 'Kérou', 'Savalou', 'Sakété', 'Comè', 'Bembéréké', 'Bassila', 'Banikoara', 'Kétou',
          'Dassa-Zoumè', 'Tchaourou', 'Allada', 'Aplahoué', 'Tanguiéta', 'N\'Dali', 'Segbana', 'Athiémé',
          'Grand Popo', 'Kouandé',
        ];

        var villesFiltrees = villes.filter(function(ville) {
          return ville.toLowerCase().includes(recherche);
        });

        villesFiltrees.forEach(function(ville) {
          var li = document.createElement('li');
          li.textContent = ville;
          li.addEventListener('click', function() {
            input.value = ville;
            villesList.innerHTML = '';
          });
          villesList.appendChild(li);
        });
      });
    </script>

@endsection