@extends('templates.semlayout')

@section('document')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Semences Vendues </h4>

                        <div class="table-responsive">
                            @if(!is_null($semences) && count($semences) > 0)
                            <table class="tableau">
                                <thead>
                                    <tr>
                                        <th>Date de Paie</th>
                                        <th>Prix Unitaire HPG</th>
                                        <th>Quantité Vendue</th>
                                        <th>Client</th>
                                        <th>Lieu de semi</th>
                                        <th>MontantHPG</th>
                                        <th>Recette</th>
                                    </tr>
                                </thead> 
                                @foreach ($semences as $semence)
                                <tbody>                              
                                    <tr>
                                        <td>{{now()->format('d-m-Y')}}</td>
                                        <td>{{ $semence->sem_prixunitHPG }}</td>
                                        <td>{{ $semence->sem_qtevendue }}</td>
                                        <td>{{ $semence->sem_client }}</td>
                                        <td>{{ $semence->sem_lieusemi }}</td>
                                        <td>{{ $semence->sem_prixunitHPG * $semence->sem_qtevendu }}</td>
                                        <td>{{ $semence->sem_prixunitHPG * $semence->sem_qtevendu - $semence->sem_qtereçu*$semence->sem_prixunit}}</td>
                                    </tr>
       
                                </tbody> 
                                @endforeach
                            </table>
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
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('js/search.js') }}"></script>

@endsection
