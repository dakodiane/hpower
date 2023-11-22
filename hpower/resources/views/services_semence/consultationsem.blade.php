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

    <div id="booking" class="d-flex justify-content-center" style="background: url('{{ asset('images/hpower.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-blend-mode: darken; backdrop-filter: blur(50px); background-color: rgba(0, 0, 0, 0.1);">
        <div class="section-center">
            <div class="container" style="padding-top: 50px">
                <div class="row">
                    <!-- ... Votre formulaire existant ... -->
                </div>

                <!-- Affichage des réceptions enregistrées -->
                <div class="row">
                    <div class="col-md-12">
                        <h2>Réceptions Enregistrées</h2>
                        @if(count($semences) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Semence</th>
                                        <th>Quantité livrée</th>
                                        <th>Fournisseur</th>
                                        <th>Magasin de déchargement</th>
                                        <th>Nature de la semence</th>
                                        <th>Lieu de production</th>
                                        <th>Prix de livraison</th>
                                        <th>Prix unitaire</th>
                                        <th>Date du paiement</th>
                                        <!-- Ajoutez d'autres colonnes si nécessaire -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($semences as $semence)
                                        <tr>
                                            <td>{{ $semence->semence }}</td>
                                            <td>{{ $semence->ql }}</td>
                                            <td>{{ $semence->fournisseur }}</td>
                                            <td>{{ $semence->magasin }}</td>
                                            <td>{{ $semence->nature }}</td>
                                            <td>{{ $semence->lieu }}</td>
                                            <td>{{ $semence->pl }}</td>
                                            <td>{{ $semence->pu }}</td>
                                            <td>{{ $semence->date_paie }}</td>
                                            <!-- Ajoutez d'autres colonnes si nécessaire -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('exportExcel', ['viewType' => 'servconsultation']) }}" class="btn btn-success">Télécharger Excel</a>

                        @else
                            <p>Aucune réception enregistrée.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
