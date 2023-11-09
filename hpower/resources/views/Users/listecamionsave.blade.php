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
            <h4 class="card-title">Camions non finalisés</h4>
            <div class="table-responsive">
            @if ($camions->isEmpty())
                        <p class="no-camion-message">Aucun camion à finaliser.</p>
                    @else
              <table class="tableau">
                <thead>
                  <tr>
                  <th>Numéro de Bordereau</th>
                    <th>Rapporteur de départ</th>
                    <th>Numéro d'immatriculation</th>
                    <th>Photo d'immatriculation</th>
                    <th>Nom du chauffeur</th>
                    <th>Type de produit</th>
                    <th>Heure de départ</th>
                    <th>Ville de départ</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($camions as $camion)
                  <tr>
                  <td>{{ $camion->num_bordereau}}</td>
                    <td>{{ $camion->cam_nomchauf }}</td>
                    <td>{{ $camion->num_immatriculation }}</td>
                    <td><a href="{{ asset($camion->cam_photo) }}" type="button" class="btn btn-success btn-md">Voir la photo</a></td>
                    <td>{{ $camion->cam_nomchauf }}</td>
                    <td>{{ $camion->type_produit }}</td>
                    <td>{{ $camion->heure_depart }}</td>
                    <td>{{ $camion->provenance }}</td>
                    <td><a href="{{ route('camion.savefin', ['cam_id' => $camion->cam_id]) }}" type="button" class="btn btn-success btn-md">Finaliser</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection