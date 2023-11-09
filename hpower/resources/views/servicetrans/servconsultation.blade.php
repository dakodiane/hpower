@extends('templates.servicetrans')

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
                                        <th>Date</th>
                                        <th>N° d'immatriculation</th>
                                        <th>Photo de l'immatriculation</th>
                                        <th>Nom du conducteur</th>
                                        <th>N° de tel du conducteur</th>
                                        <th>Matière transportée</th>
                                        <th>Poids vide du camion (kg)</th>
                                        <th>Poids chargé du camion(Kg)</th>
                                        <th>Poids net du produit</th>
                                        <th>N° de bordereau de chargement</th>
                                        <th>Provenance</th>
                                        <th>Prix SIPI (FCFA/Kilo)</th>
                                        <th>Prix HPG (FCFA/kilo)</th>
                                        <th>Montant SIPI (FCFA)</th>
                                        <th>Montant HPG (FCFA)</th>
                                        <th>Recette HPG (FCFA)</th>
                                        <th>Charge</th>
                                        <th>Paiement</th>
                                        
                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach($camions as $camion)
                                    <tr>
                                       <td>{{ $camion->created_at }}</td>
                                       <td>{{ $camion->num_immatriculation }}</td>     
                                       <td><a href="{{ asset($camion->cam_photo) }}" type="button" class="btn btn-success btn-sm">Voir la photo</a></td>
                                       <td>{{ $camion->cam_nomchauf }}</td>
                                       <td>{{ $camion->tel_conducteur }}</td>
                                        <td>{{ $camion->type_produit }}</td>
                                        <td>{{ $camion->poids_vide }}</td>
                                        <td>{{ $camion->poids_charge }}</td>
                                        <td>{{ $camion->poids_net }}</td>
                                        <td>{{ $camion->nombre_sac }}</td>
                                        <td>{{ $camion->provenance }}</td>
                                        <td>{{ $camion->provenance }}</td>
                                        <td>{{ $camion->provenance }}</td>
                                        <td>{{ $camion->provenance }}</td>
                                        <td>
                                            @if($camion->statut_dechargement == 1)
                                                Chargé
                                            @else
                                                Non chargé
                                            @endif
                                        </td>

                                        <td>{{ $camion->observation }}</td>
                                        <td></td>
                                        <td><a href="{{ route('servicetrans.servpaiement', ['cam_id' => $camion->cam_id]) }}" type="button" class="btn btn-success btn-md">Valider paiement</a></td>
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
