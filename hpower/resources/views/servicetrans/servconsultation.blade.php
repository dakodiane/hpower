@extends('templates.servicetrans')

@section('document')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Liste des Transports </h4>

                        <div class="table-responsive">
                            <table class="tableau">
                                <thead>
                                    <tr>
                                    <th>N° Transaction HPG</th>
                                        <th>Date</th>
                                        <th>Matricule Camion </th>
                                        <th>Image Matricule Camion </th>
                                        <th>Provenance</th>
                                        <th>Nom du Chauffeur</th>
                                        <th>Tel Chauffeur</th>
                                        <th>Produit</th>
                                        <th>Quantité Chargée</th>
                                        <th>Destination</th>
                                        <th>N° Bordereau de Chargement</th>
                                        <th>Image Bordereau de Chargement </th>          
                                        <th>Avance Payée</th>
                                        <th>Poids Chargé (Tonne)</th>
                                        <th>Poids Vide (Tonne)</th>
                                        <th>Poids Net (Tonne)</th>
                                        <th>N° Bordereau du Pont</th>
                                        <th>Image Borderau du pont</th>
                                        <th>Entreprise Bénéficiaire</th>
                                        <th>Action</th>

                                    </tr>
                                </thead> 
                                <tbody>
                                        @foreach($transports as $transport)
                                            <tr>
                                                <td>{{ $transport->num_bordereau}}</td>
                                                <td>{{ $transport->heure_arrive }}</td>
                                                <td>{{ $transport->num_immatriculation }}</td>
                                                <td><a href="{{ asset($transport->cam_photo) }}" type="button" class="btn btn-success btn-sm">Voir la photo</a></td>
                                                <td>{{ $transport->provenance }}</td>
                                                <td>{{ $transport->cam_nomchauf }}</td>
                                                <td>{{ $transport->tel_conducteur }}</td>
                                                <td>{{ $transport->type_produit }}</td>
                                                <td>{{ $transport->qte_charge }}</td>
                                                <td>{{ $transport->destination}}</td>
                                                <td>{{ $transport->bordereauchargement }}</td>
                                                <td><a href="{{ asset($transport->cam_photo1) }}" type="button" class="btn btn-success btn-sm">Voir la photo</a></td>
                                                <td>{{ $transport->avancepaye }}</td>
                                                <td>{{ $transport->poids_charge }}</td>
                                                <td>{{ $transport->poids_vide }}</td>
                                                <td>{{ $transport->poids_net }}</td>
                                                <td>{{ $transport->numerodebord }}</td>
                                                <td><a href="{{ asset($transport->cam_photo2) }}" type="button" class="btn btn-success btn-sm">Voir la photo</a></td>
                                                <td>{{ $transport->entreprise_benef }}</td>
                                                <td>
                                                    <a href="{{ route('Servicetrans.servpaiement', ['transport_id' => $transport->transport_id]) }}" type="button" class="btn btn-success btn-md">Valider paiement</a>
                                                </td>
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
