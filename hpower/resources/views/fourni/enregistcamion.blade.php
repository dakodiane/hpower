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
                      <label for="exampleInputName1">Nom du chauffeur</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" required name="cam_nomchauf">
                    </div>
                  
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Numéro d'immatriculation</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" required name="num_immatriculation">
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
                        <label for="type_produit">Type de produit</label>
                        <select class="form-control" id="prod_nom" name="type_produit" required>
                          @foreach($produits as $produit)
                          <option value="{{ $produit->prod_nom }}">{{ $produit->prod_nom }}</option>
                          @endforeach
                        </select>
                      </div>
                 
                    <div class="form-group">
                      <label for="exampleInputCity1">Poids à vide</label>
                      <input type="number" class="form-control" id="exampleInputCity1" placeholder="poids à vide du camion" required name="poids_vide">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputCity1">Poids charge</label>
                      <input type="number" class="form-control" id="exampleInputCity1" placeholder="poids du camion et du chargement" required name="poids_charge">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputCity1">Poids net</label>
                      <input type="number" class="form-control" id="exampleInputCity1" placeholder="poids net" required name="poids_net">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputCity1">Nombre de sacs</label>
                      <input type="number" class="form-control" id="exampleInputCity1" placeholder="" required name="nombre_sacs">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputCity1">Heure de départ</label>
                      <input type="datetime-local" class="form-control" id="exampleInputCity1" placeholder="" name="heure_depart">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleSelectGender">Provenance </label>
                        <select class="form-control" id="exampleSelectGender"  name="provenance">
                        <option></option>
                          <option>Cotonou</option>
                          <option>Parakou</option>
                          <option>Banikoara</option>
                          
                        </select>
                      </div>

                      <div class="form-group">
                          <label for="statutChargement">Statut du chargement</label>
                          <select class="form-control" id="statutChargement" name="statutChargement" >
                              <option value="1">Chargé</option>
                              <option value="0">Non chargé</option>
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


@endsection
