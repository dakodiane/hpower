@extends('templates.user')

@section('document')
<style>
  .no-camion-message {
    color: red;
    /* Couleur du texte gris */
    font-size: 18px;
    /* Taille de texte */
    font-weight: bold;
    /* Gras */
    text-align: center;
    /* Centrer le texte */
    margin-top: 20px;
    /* Espacement en haut */
  }
</style>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Camions finalisés</h4>

            <div class="table-responsive">
              @if ($camions->isEmpty())
              <p class="no-camion-message">Aucun camion finalisé.</p>
              @else
              <table class="tableau">
                <thead>
                  <tr>
                    <th>Numéro de Bordereau HPG</th>
                    <th>Numéro de Bordereau Pont</th>
                    <th>Rapporteur à la destination</th>
                    <th>Numéro d'immatriculation</th>
                    <th>Nom du chauffeur</th>
                    <th>Heure d'arrivée</th>
                    <th>Nombre de sacs</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($camions as $camion)
                  <tr>
                    <td>{{ $camion->num_bordereau }}</td>
                    <td>{{ $camion->numerodebord}}</td>

                    <td>{{ $user->name }} </td>
                    <td>{{ $camion->num_immatriculation }}</td>
                    <td>{{ $camion->cam_nomchauf }}</td>
                    <td>{{ $camion->heure_arrive }}</td>
                    <td>{{ $camion->nombre_sac }}</td>

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