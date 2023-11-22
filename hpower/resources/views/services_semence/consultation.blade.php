@extends('templates.semlayout')

@section('document')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Réception des semences </h4>

                        <div class="table-responsive">
                            <table class="tableau" >
                                <thead>
                                    <tr>
                                    <th>N° Transaction</th>
                                    <th>Date</th>
                                    <th>Magasin de <br>Déchargement</th>
                                    <th>Quantité Reçue</th>
                                    <th>Prix Unitaire</th>
                                    <th>Montant de la livraison</th>
                                    <th>Fournisseur</th>
                                    <th>Nature de la <br>Semence</th>
                                    <th>Type de <br>Certification</th>
                                    <th>Matricule du <br>Véhicule</th>
                                    <th>photo du <br>Matricule</th>
                                    <th>Action</th>
                                 
                                 
                                            
                                    </tr>
                                </thead> 
                           
                                <tbody>
                              
                                @foreach ($semences as $semence)
    <tr>
        <td>HP202300{{ $semence->semence_id }}</td>
        <td>{{ $semence->created_at }}</td>
        <td>{{ $semence->sem_magdecht }}</td>
        <td>{{ $semence->sem_qtereçu }}</td>
        <td>{{ $semence->sem_prixunit }}</td>
        <td>
            {{ $semence->paiements->isNotEmpty() ? $semence->paiements->first()->paie_prixlivraison : 'Neant' }}
        </td>
        <td>{{ $semence->sem_nature }}</td>
        <td>{{ $semence->sem_type }}</td>
        <td>{{ $semence->sem_deplace }}</td>
        <td><a href="{{ asset($semence->sem_nummatricul) }}" type="button" class="btn btn-success btn-sm">Voir la photo</a></td>
        <td>{{ $semence->sem_nummatricul }}</td>
        <td>{{ $semence->sem_bord }}</td>
        <td>{{ $semence->sem_qtevendue }}</td>
        <td>
            <a href="{{ route('vente', ['semence_id' => $semence->semence_id]) }}" type="button" class="btn btn-success btn-md">Valider paiement</a>
        </td>
    </tr>
@endforeach

                                </tbody>    

                            </table>
                            <!-- <a href="{{ route('exportExcel', ['viewType' => 'servconsultation']) }}" class="btn btn-success">Télécharger Excel</a> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('js/search.js') }}"></script>

@endsection
