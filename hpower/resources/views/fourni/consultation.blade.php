@extends('templates.fourni')

@section('document')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Liste des camions</h4>

                        <div class="table-responsive">
                            <table class="tableau">
                                <thead>
                                    <tr>
                                        <th>Ville de départ</th>
                                        <th>Fournisseur</th>
                                        <th>Rapporteur à la destination</th>
                                        <th>Numéro d'immatriculation camion</th>
                                        <th>Nom du chauffeur</th>
                                        <th>Type de produit</th>
                                        <th>Conditionnement</th>
                                        <th>Etat du camion</th>
                                        <th>Heure de départ</th>
                                        <th>Heure d'arrivée</th>
                                        <th>Nombre de sacs endommagés</th>
                                        <th>observation</th>
                                        <th>Paiement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($camions as $camion)
                                    <tr>
                                        <td>{{ $camion->provenance }}</td>
                                        <td>{{ $camion->util_id }}</td>
                                        <td>{{ $camion->destination }}</td>
                                        <td>{{ $camion->num_immatriculation }}</td>
                                        <td>{{ $camion->cam_nomchauf }}</td>
                                        <td>{{ $camion->type_produit }}</td>
                                        <td>{{ $camion->conditionnement }}</td>
                                        <td>{{ $camion->etat_camion }}</td>
                                        <td>{{ $camion->heure_depart }}</td>
                                        <td>{{ $camion->heure_arrive }}</td>
                                        <td>{{ $camion->nombre_sac }}</td>
                                        <td>{{ $camion->observation }}</td>
                                        <td>{{ $camion->statut_paiement }}</td>
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
