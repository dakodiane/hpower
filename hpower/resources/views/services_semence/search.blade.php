@extends('templates.semlayout')

@section('document')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Bienvenue Cristiano Ronaldo</h3>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white ">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin">
              
            </div>
            <table class="table table-blue table-hover">
              <thead>
                <tr>
                  <th scope="col">Num</th>
                  <th scope="col">Nom et Prénom</th>
                  <th scope="col">Email</th>
                  <th scope="col">Fournisseur</th>
                  <th scope="col">Montant payé</th>
                  <th scope="col">Reste</th>
                  <th scope="col">Etat de paiement</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">2324000</th>
                  <td>Cristiano Ronaldo</td>
                  <td>rmfc@gmail.com</td>
                  <td>Al Nassr</td>
                  <td>10.000.000 FCFA</td>
                  <td>7.000.000 FCFA</td>
                  <td>En attente</td>
                </tr>
              </tbody>
            </table>

            <table class="table table-blue table-hover">
                <thead>
                  <tr>
                    <th scope="col">Fournisseur</th>
                    <th scope="col">Quantité livrée</th>
                    <th scope="col">Nature de la semence</th>
                    <th scope="col">Lieu de production</th>
                    <th scope="col">Magasin de vente</th>                  
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Al Nassr</td>
                    <td>108 kg</td>
                    <td>certifiée DVP</td>
                    <td>Sèmè</td>
                    <td>Cotonou</td>
                  </tr>
                </tbody>
              </table>
            
            </div>
          </div>
      
        </div>    
  @endsection