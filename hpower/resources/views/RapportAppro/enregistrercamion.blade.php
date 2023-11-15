@extends('templates.user')

@section('document')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">


      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h4 class="card-title">Veuillez entrer les informations du camion</h4>
            <form method="POST" action="{{ route('store.appro') }}" enctype="multipart/form-data">
              @csrf

              <div class="form-group">
                <label for="chauffeur">Nom du chauffeur</label>
                <input type="text" class="form-control" id="chauffeur" name="cam_nomchauf" placeholder="Nom du chauffeur" required>
              </div>
              <div class="form-group">
                <label for="chauffeur">Numéro de téléphone du chauffeur</label>
                <input type="text" class="form-control" id="chauffeur" name="tel_conducteur" placeholder="Numero du chauffeur" required>
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
                <label for="chauffeur">Numero d'immatriculation</label>
                <input type="text" class="form-control" id="chauffeur" name="num_immatriculation" placeholder="Numero d'immatriculation" required>
              </div>
              <div class="form-group">
                <label for="photo_immatf">Photo d'immatriculation</label>
                <div class="input-group">
                  <input type="file" name="cam_photo" class="file-upload-default" id="photo_input" capture="camera" accept="image/*" required>
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Charger l'image" required>
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Charger l'image</button>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="numerodebord">Numéro de bordereau de chargement</label>
                <input type="text" class="form-control" id="bordereauchargement" name="bordereauchargement" placeholder="Numero de bordereau" required>
              </div>

              <div class="form-group">
                <label for="photo_immatf">Photo du bordereau</label>
                <input type="file" name="cam_photo1" class="file-upload-default" required>
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Charger l'image" required>
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Charger l'image</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="heure_depart">Heure d'arrivée</label>
                <input type="datetime-local" class="form-control" id="heure_arrive" name="heure_arrive" placeholder="08h30" required>
              </div>
              <div class="form-group">
                <label for="numerodebord">Quantité chargée</label>
                <input type="text" class="form-control" id="qte_charge" name="qte_charge" placeholder="Avance payée" required>
              </div>
              <div class="form-group">
                <label for="numerodebord">Avance payée</label>
                <input type="text" class="form-control" id="avancepaye" name="avancepaye" placeholder="Avance payée" required>
              </div>

              <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" class="form-control styled-input" id="destination" name="destination" placeholder="Destination" required>
                <ul id="villes-list"></ul>
              </div>

              <div class="form-group">
                <label for="observation">Observation</label>
                <textarea class="form-control" id="observation" name="observation" rows="4"></textarea>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
              <button type="button" class="btn btn-light">Annuler</button>
            </form>

            <script>
              function capturePhoto() {
                var input = document.getElementById('photo_input');
                input.capture = "camera"; // for mobile devices
                input.accept = "image/*";
                input.removeAttribute("capture"); // for non-mobile devices
              }
            </script>



          </div>


        </div>
      </div>

    </div>
  </div>

</div>
<script>
  var input = document.getElementById('destination');
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
<style>
  #villes-list {
    position: absolute;
    background-color: #fff;
    border: 1px solid #ccc;
    max-height: 150px;
    overflow-y: auto;
    width: 38%;
    z-index: 1;
    list-style: none;
    padding: 0;
    margin: 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  }

  #villes-list li {
    padding: 8px 12px;
    cursor: pointer;
  }

  #villes-list li:hover {
    background-color: #f0f0f0;
  }
</style>


@endsection