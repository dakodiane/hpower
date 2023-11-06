@extends('templates.user')

@section('document')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
          
         
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Finaliser un enregistrement</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Nom du chauffeur</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleSelectGender">Type de produit</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Soja</option>
                          <option>Karité</option>
                          <option>Riz</option>
                          <option>Karité</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label>Photo de l'immatriculation du camion</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Charger l'image</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Heure d'arrivée</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="08h30">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Nombre de sac endommagés</label>
                      <input type="number" class="form-control" id="exampleInputName1" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Etat du camion</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Toujours chargé</option>
                          <option>Déchargé</option>
                        
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Poids (tonnes)</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="">
                      </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Ville de depart</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Cotonou</option>
                          <option>Parakou</option>
                          <option>Banikoara</option>
                          <option>...</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Observation</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
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