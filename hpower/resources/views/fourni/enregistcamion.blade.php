@extends('templates.fourni')

@section('document')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
          
         
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                      <h4 class="card-title">Enregistrement de camion </h4>   
                  <form class="forms-sample" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                  @csrf 
                 
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Fournisseur</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" required name="fournisseur">
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputName1">Numéro de bordereau</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" required name="numero_bordereau">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Numéro d'immatriculation</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" required name="numero_imatri">
                    </div>
                    <div class="form-group">
                      <label>Photo de l'immatriculation du camion</label>
                      <input type="file" name="img" class="file-upload-default" required name="photo_immatriculation">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Charger l'image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Charger l'image</button>
                        </span>
                      </div>
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputName1">Nom du chauffeur</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" required name="nom_chauffeur">
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleSelectGender">Type de produit</label>
                        <select class="form-control" id="exampleSelectGender" required name="type_produit">
                        <option></option> 
                          <option>Soja</option>
                          <option>Karité</option>
                          <option>Riz</option>
                          <option>Karité</option>
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
                      <label for="exampleSelectGender">ville de départ </label>
                        <select class="form-control" id="exampleSelectGender"  name="ville_depart">
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