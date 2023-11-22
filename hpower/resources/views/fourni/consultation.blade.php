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
                                        <th>Nom du chauffeur</th>
                                        <th>Numéro d'immatriculation</th>
                                        <th>Photo de l'immatriculation du camion</th>
                                        <th>Type de produit</th>
                                        <th>Poids à vide</th>
                                        <th>Poids charge</th>
                                        <th>Poids net</th>
                                        <th>Nombre de sacs</th>
                                        <th>Heure d'enrégistrement</th>
                                        <th>Provenance</th>
                                        <th>Statut du chargement</th>
                                        <th>observation</th>
                                        <th>Paiement</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach($fournisseurs as $Fournisseur)
                                    <tr>
                                       <td>{{ $Fournisseur->cam_nomchauf }}</td>
                                       <td>{{ $Fournisseur->num_immatriculation }}</td>     
                                       <td><a href="{{ asset($Fournisseur->cam_photo) }}" type="button" class="btn btn-success btn-sm">Voir la photo</a></td>
                                        <td>{{ $Fournisseur->type_produit }}</td>
                                        <td>{{ $Fournisseur->poids_vide }}</td>
                                        <td>{{ $Fournisseur->poids_charge }}</td>
                                        <td>{{ $Fournisseur->poids_net }}</td>
                                        <td>{{ $Fournisseur->nombre_sac }}</td>
                                        <td>{{ $Fournisseur->created_at }}</td>
                                        <td>{{ $Fournisseur->provenance }}</td>
                                        <td>
                                            @if($Fournisseur->statut_dechargement == 1)
                                                En route
                                            @else
                                                Non en route
                                            @endif
                                        </td>

                                        <td>{{ $Fournisseur->observation }}</td>
                                       
                                        <td>{{ $Fournisseur->statut_paiement }}</td>
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
