@extends('templates.fourni')

@section('document')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
          
         
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                      <h4 class="card-title">Enregistrement de camion </h4>   
                      <form method="POST" action="{{ route('fourni.store') }}" enctype="multipart/form-data">
                          @csrf <!-- Le CSRF pour la sécurité -->
          
                  
                  
                    <div class="form-group">
                      <label for="exampleInputName1">Nom du conducteur</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom et prenom" required name="cam_nomchauf" required>
                    </div>

                      <div class="form-group">
                          <label for="exampleInputName1">N° de tel du conducteur</label>
                          <input type="text" class="form-control" id="exampleInputName1" placeholder="Telephone" required name="tel_conducteur" pattern="\d{1,8}" required>
                          
                      </div>

                  
                  
                    
                    <div class="form-group">
                      <label for="exampleInputName1">N° d'immatriculation</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="immatriculation" required name="num_immatriculation">
                    </div>
                    <div class="form-group">
                        <label for="photo_immat">Photo de l'immatriculation</label>
                        <input type="file" name="cam_photo" class="file-upload-default" required>
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Charger l'image" required>
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Charger l'image</button>
                          </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="type_produit">Matière transportée</label>
                        <select class="form-control" id="prod_nom" name="type_produit" required>
                          @foreach($produits as $produit)
                          <option value="{{ $produit->prod_nom }}">{{ $produit->prod_nom }}</option>
                          @endforeach
                        </select>
                      </div>
           
                    <div class="form-group">
                      <label for="exampleInputCity1">Nombre de sacs</label>
                      <input type="number" class="form-control" id="exampleInputCity1" placeholder="" required name="nombre_sac" required>
                    </div>   
                    
                    <div class="form-group">
                      <label for="exampleSelectGender">Provenance </label>
                      <input type="text" class="form-control"  id="provenance" name="provenance" placeholder="Tapez une ville" autocomplete="off" required>
                        <ul id="villes-list"></ul>
                      </div>

                     


                      <div class="form-group">
                          <label for="statutChargement">Statut du chargement</label>
                          <select class="form-control" id="statut_dechargement" name="statut_dechargement" required>
                              <option value="1">En route</option>
                              <option value="0">Non en route</option>
                          </select>
                      </div>


                    <div class="form-group">
                      <label for="exampleTextarea1">Observation</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" name="observation"></textarea>
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

      <script>
      var input = document.getElementById('provenance');
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
