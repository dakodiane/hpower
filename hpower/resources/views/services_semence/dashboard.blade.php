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
                  <th scope="col">Fournisseur</th>
                  <th scope="col">Quantité livrée</th>
                  <th scope="col">Prix de livraison</th>
                  <th scope="col">Prix HPG au kg</th>
                  <th scope="col">Quantité vendue</th>
                  <th scope="col">Total des vente HPG</th>
                  <th scope="col">Recette</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Cristiano Ronaldo</td>
                  <td>Al Nassr</td>
                  <td>120 kg</td>
                  <td>1.000.000 FCFA</td>
                  <td>9500 FCFA</td>
                  <td>90 kg</td>
                  <td>855000 FCFA</td>
                  <td>-145000 FCFA</td>
                </tr>
              </tbody>
            </table>
            
            </div>
          </div>
      
        </div>    
  @endsection