@extends('templates.servicetrans')

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
                        <h4 class="card-title">Liste des camions payés</h4>
                        <div class="table-responsive">
                            @if ($camions->isEmpty())
                                <p class="no-camion-message">Aucun camion à finaliser.</p>
                            @else
                                <table class="tableau">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>N° d'immatriculation</th>
                                            <th>Nom du conducteur</th>
                                            <th>N° de tel du conducteur</th>
                                            <th>Matière transportée</th>
                                            <th>Poids vide du camion (kg)</th>
                                            <th>Poids chargé du camion(Kg)</th>
                                            <th>Poids net du produit</th>
                                            <th>N° de bordereau de chargement</th>
                                            <th>Provenance</th>
                                            <th>Entreprise bénéficiaire</th>
                                            <th>Prix Entreprise bénéficiaire(FCFA/Tonne)</th>
                                            <th>Prix HPG (FCFA/Tonne)</th>
                                            <th>Montant Entreprise bénéficiaire</th>
                                            <th>Montant HPG</th>
                                            <th>Recette HPG</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($camions as $camion)
                                            <tr>
                                                <td>{{ $camion->created_at }}</td>
                                                <td>{{ $camion->num_immatriculation }}</td>
                                                <td>{{ $camion->cam_nomchauf }}</td>
                                                <td>{{ $camion->tel_conducteur }}</td>
                                                <td>{{ $camion->type_produit }}</td>
                                                <td>{{ $camion->poids_vide }}</td>
                                                <td>{{ $camion->poids_charge }}</td>
                                                <td>{{ $camion->poids_net }}</td>
                                                <td>{{ $camion->num_bordereau }}</td>
                                                <td>{{ $camion->provenance }}</td>
                                                <td>
                                                    @if (!$camion->paiements->isEmpty())
                                                        {{ $camion->paiements[0]->entrep_benef }}
                                                    @else
                                                        Neant
                                                    @endif
                                                </td>

                                                <td>
                                                    @if (!$camion->paiements->isEmpty())
                                                        {{ $camion->paiements[0]->prix_tp }}
                                                    @else
                                                        Neant
                                                    @endif
                                                </td>

                                                <td>
                                                    @if (!$camion->paiements->isEmpty())
                                                        {{ $camion->paiements[0]->prix_HPG }}
                                                    @else
                                                        Neant
                                                    @endif
                                                </td>

                                                <td>
                                                    @if (!$camion->paiements->isEmpty())
                                                        {{ $camion->paiements[0]->Montant_tp }}
                                                    @else
                                                        Neant
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!$camion->paiements->isEmpty())
                                                        {{ $camion->paiements[0]->Montant_HPG }}
                                                    @else
                                                        Neant
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!$camion->paiements->isEmpty())
                                                        {{ $camion->paiements[0]->Recette_HPG }}
                                                    @else
                                                        Neant
                                                    @endif
                                                </td>
                                               
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
