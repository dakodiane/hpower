@extends('templates.app')

@section('document')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
          
         
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Enregistrer un paiement à  </h4>
                  <form class="forms-sample">
                    <div class="form-group">
                      
                    <div class="form-group">
                      <label for="exampleSelectGender">Entreprise</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>H-POWER GROUP</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Beneficiaire</label>
                          <select class="form-control" id="exampleSelectGender">
                            <option>SIPI</option>
                          </select>
                        </div>
                      <label for="exampleInputName1">Date de paiement</label>
                      <input type="date" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Type de facture</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>VENTE</option>
                          <option>ACHAT</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Poids total(tonnes)</label>
                        <input type="number" class="form-control" id="exampleInputName1" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Prix Unitaire(F CFA)</label>
                        <input type="number" class="form-control" id="exampleInputName1" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Côte/T(F CFA)</label>
                        <input type="number" class="form-control" id="exampleInputName1" placeholder="">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputName1">Montant versé (F CFA)</label>
                        <input type="number" class="form-control" id="exampleInputName1" placeholder="">
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