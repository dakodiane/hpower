@extends('templates.user')

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
            <h4 class="card-title">Camions non finalisés</h4>
            <div class="table-responsive">
           
              <table class="tableau">
                <thead>
                  <tr>
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($camions as $camion)
                  <tr>
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
                    <td><a href="{{ route('savefin.appro', ['appro_id' => $camion->appro_id]) }}" type="button" class="btn btn-success btn-md">Modifier</a></td>
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