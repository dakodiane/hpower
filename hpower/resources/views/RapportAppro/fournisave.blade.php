@extends('templates.user')

@section('document')
<style>
  .no-camion-message {
    color: red; /* Couleur du texte gris */
    font-size: 18px; /* Taille de texte */
    font-weight: bold; /* Gras */
    text-align: center; /* Centrer le texte */
    margin-top: 20px; /* Espacement en haut */
}

</style>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Enregistrement de fournisseur en attente</h4>
            <div class="table-responsive">
           
              <table class="tableau">
                <thead>
                  <tr>
                    <th>Numéro de Bordereau HPG</th>
                    <th>Numéro d'immatriculation</th>
                    <th>Photo d'immatriculation</th>
                    <th>Nom du fournisseur</th>
                    <th>Type de produit</th>
 
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($camions as $camion)
                  <tr>
                  <td>{{ $camion->num_bordereau}}</td>
                    <td>{{ $camion->num_immatriculation }}</td>
                    <td><a href="{{ asset($camion->cam_photo) }}" type="button" class="btn btn-success btn-md">Voir la photo</a></td>
                    <td>{{ $camion->utilisateur->name }}</td>
                    <td>{{ $camion->type_produit }}</td>
             
              
                    <td><a href="{{ route('savefin.fourni', ['fournisseur_id' => $camion->fournisseur_id]) }}" type="button" class="btn btn-success btn-md">Finaliser</a></td>
                  </tr>
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