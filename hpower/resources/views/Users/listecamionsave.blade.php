@extends('templates.user')

@section('document')
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
                    <th>Rapporteur de départ</th>
                    <th>Numéro d'immatriculation</th>
                    <th>Photo d'immatriculation</th>
                    <th>Nom du chauffeur</th>
                    <th>Type de produit</th>
                    <th>Heure de départ</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($camions as $camion)
                  <tr>
                    <td>{{ $camion->cam_nomchauf }}</td>
                    <td>{{ $camion->num_immatriculation }}</td>
                    <td><a href="{{ asset($camion->cam_photo) }}" type="button" class="btn btn-success btn-md">Voir la photo</a></td>
                    <td>{{ $camion->cam_nomchauf }}</td>
                    <td>{{ $camion->type_produit }}</td>
                    <td>{{ $camion->heure_depart }}</td>
                    <td><a href="{{ route('camion.savefin', ['cam_id' => $camion->cam_id]) }}" type="button" class="btn btn-success btn-md">Finaliser</a></td>
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