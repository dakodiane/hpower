@extends('templates.app')

@section('document')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body col-md-12" style="height: 600px; overflow: auto; width:100%">
                        <h4 class="card-title">Table des appros (vente et réception)</h4>
                        <p class="card-description">
                            <!-- <code><a class="btn btn-success" href="">Exporter en PDF</a></code> -->
                            <!-- <code><a class="btn btn-success" href="{{ '/pdf' }}">Exporter en Excel</a></code> -->
                        </p>
                        <div class="table-responsive">
                            <table class="table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Date</th>
                                        <th>Nom du chauffeur</th>
                                        <th>Telephone</th>
                                        <th>Heure d'arrivée</th>
                                        <th>Immatriculation</th>
                                        <th>Ville de provenance</th>
                                        <th>Quantité chargée</th>
                                        <th>Prix de cession</th>
                                        <th>Observations</th>
                                    </tr>
                                </thead>
                                @foreach ($appro as $appro)
                                <tbody>
                                    <tr>
                                        <td>HP202300{{$appro->appro_id}}</td>
                                        <td>{{ $appro->created_at }}</td>
                                        <td>{{ $appro->cam_nomchauf }}</td>
                                        <td>{{ $appro->tel_conducteur }}</td>
                                        <td>{{ $appro->heure_arrive }}</td>
                                        <td>{{ $appro->num_immatriculation }}</td>
                                        <td>{{ $appro->provenance }} FCFA</td>
                                        <td>{{ $appro->qte_charge }}</td>
                                        <td>{{ $appro->prix_cession }}</td>
                                        <td>{{ $appro->observation }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @endsection