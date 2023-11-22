@extends('templates.appro')

@section('document')
<style>
  .no-camion-message {
    color: red; 
    font-size: 18px;
    font-weight: bold; 
    text-align: center;
    margin-top: 20px; 
}

</style>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Liste fournisseurs</h4>
            <div class="table-responsive">
           
              <table class="tableau">
                <thead>
                  <tr>
                  <th>Nom du fournisseur</th>
                    <th>Numéro de Bordereau HPG</th>
                    <th>Numéro de Bordereau de chargement</th>
                    <th>Numéro d'immatriculation</th>
                    <th>Photo d'immatriculation</th>
                    <th>Photo bordereau de chargement</th>
                    <th>Nom du chauffeur</th>
                    <th>Telephone du chauffeur</th>
                    <th>Type de produit</th>
                    <th>Date</th>
                    <th>Provenance</th>
                    <th>Destination</th>
                    <th>Poids chargé</th>
                    <th>Poids vide</th>
                    <th>Poids net</th>
                    <th>Prix fournisseur FCFA/TONNE</th>
                    <th>Prix HPG FCFA/TONNE</th>
                    <th>Montant fournisseur FCFA/TONNE</th>
                    <th>Montant HPG FCFA/TONNE</th>
                    <th>Recette</th>
                    <th>Etat du paiement</th>


                
                  </tr>
                </thead>
                <tbody>
                  @foreach($camions as $camion)
                  <tr>
                  <td>{{  $camion->utilisateur->name}} </td>
                  <td>{{ $camion->num_bordereau}}</td>
                  <td>{{ $camion->bordereauchargement}}</td>
                    <td>{{ $camion->num_immatriculation }}</td>
                    <td><a href="{{ asset($camion->cam_photo) }}" type="button" class="btn btn-success btn-md">Voir la photo</a></td>
                    <td><a href="{{ asset($camion->cam_photo1) }}" type="button" class="btn btn-success btn-md">Voir la photo</a></td>
                    <td>{{ $camion->cam_nomchauf }}</td>
                    <td>{{ $camion->tel_conducteur }}</td>
                    <td>{{ $camion->type_produit }}</td>
                    <td>{{ $camion->updated_at}}</td>
                    <td>{{ $camion->provenance}}</td>
                    <td>{{ $camion->destination}}</td>
                    <td>{{ $camion->poids_charge}}</td>
                    <td>{{ $camion->poids_vide}}</td>
                    <td>{{ $camion->poids_net}}</td>
                      <!-- Vérifiez si le camion a des paiements avant d'afficher les valeurs -->
@if (!$camion->paiements->isEmpty())
    <td>{{ $camion->paiements[0]->prix_unit }}</td>
    <td>{{ $camion->paiements[0]->prix_HPG }}</td>
    <td>{{ $camion->paiements[0]->montant_tp }}</td>
    <td>{{ $camion->paiements[0]->montant_HPG }}</td>
    <td>{{ $camion->paiements[0]->recette_HPG }}</td>
    <!-- Ajoutez une condition pour afficher "Effectué" si montant_HPG n'est pas null -->
    <td>{{ $camion->paiements[0]->montant_HPG !== null ? 'Effectué' : 'En attente' }}</td>
@else
    <!-- Si le camion n'a pas de paiements, affichez "Neant" -->
    <td>Neant</td>
    <td>Neant</td>
    <td>Neant</td>
    <td>Neant</td>
    <td>Neant</td>
    <!-- Affichez "En attente" si pas de paiement -->
    <td>En attente</td>
@endif


                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection