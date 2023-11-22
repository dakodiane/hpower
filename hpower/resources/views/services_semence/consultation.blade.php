@extends('templates.semlayout')

@section('document')
    <div>
        @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> 
                @endforeach                
            </ul>
        @endif
    </div>
   
    
    <div class="main-panel" style="height:80em">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body" style="overflow-x: scroll;">
                            <h4 class="card-title">Réception des semences </h4>

                            <div class="table-responsive">
                        <h2>Réceptions Enregistrées</h2>

                         @if(!is_null($semences) && count($semences) > 0)
                            <table  class="table table-striped table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>N° Bordereau</th>
                                        <th>Semence</th>
                                        <th>Quantité livrée</th>
                                        <th>Fournisseur</th>
                                        <th>Magasin de déchargement</th>
                                        <th>Nature de la semence</th>
                                        <th>Lieu de production</th>
                                        <th>Prix unitaire</th>
                                        <th>Prix de livraison</th>                                        
                                        <th>Date du paiement</th>
                                        <th>Transaction Number</th>
                                        <th>Immatriculation</th>
                                        <th>Moyen de deplacement</th>
                                        <th>Action</th>                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($semences as $semence)
                                        <tr>
                                            <td>{{ $semence->sem_bord }}</td>
                                            <td>{{ $semence->sem_nature }}</td>
                                            <td>{{ $semence->sem_qtereçu }}</td>
                                            <td>{{ $semence->sem_fourni }}</td>
                                            <td>{{ $semence->sem_magdecht }}</td>
                                            <td>{{ $semence->sem_type }}</td>
                                            <td>{{ $semence->sem_prove }}</td>
                                            <td>{{ $semence->sem_prixunit }}</td>
                                            <td>{{ $semence->sem_prixunit * $semence->sem_qtereçu }}</td>
                                            <td>{{now()->format('d-m-Y')}}</td>
                                            <td>{{ $semence->sem_numtrans }}</td>
                                            <td><a href="{{ asset($semence->semence_id) }}" type="button" class="btn btn-success btn-md">Voir la photo</a></td>           
                                             <td>{{ $semence->sem_deplace }}</td>
                                             <td><a href="{{ route('vente', ['semence_id' => $semence->semence_id]) }}" class="btn btn-primary">VENDRE</a>   </td>
                                            <!-- Ajoutez d'autres colonnes si nécessaire -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- <a href="{{ route('exportExcel', ['viewType' => 'servconsultation']) }}" class="btn btn-success">Télécharger Excel</a> -->

                        @else
                            <p>Aucune réception enregistrée.</p> 
                        @endif

                        <br><br><div style="width:500px; height: 25px">{{ $semences->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
