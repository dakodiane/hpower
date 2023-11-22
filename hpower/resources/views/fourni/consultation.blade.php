@extends('templates.fourni')

@section('document')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Liste des camions</h4>
                        @if(session('success'))
                        <div class="alert alert-success auto-dismiss" id="success">
                            {{ session('success') }}
                        </div>
                    @endif
                        <div class="table-responsive">
                            <table class="tableau">
                                <thead>
                                    <tr>
                                        <th>Nom du chauffeur</th>
                                        <th>Numéro d'immatriculation</th>
                                        <th>Photo de l'immatriculation du camion</th>
                                        <th>Type de produit</th>
                                        <th>Poids net</th>
                                        <th>Nombre de sacs</th>
                                        <th>Heure d'enrégistrement</th>
                                        <th>Destination</th>
                                        <th>Statut du chargement</th>
                                        <th>observation</th>
                                        <th>Prix FCFA/TONNE</th>
                                        <th>Prix HPG FCFA/TONNE</th>
                                        <th>Montant à recevoir</th>
                                        <th>Montant payé par HPG</th>
                                        <th>Paiement</th>
                                       
                                    </tr>
                                </thead> 
        
                                <tbody>
                                     @if ($errors->has('num_immatriculation'))
                                         <div id="error-message" class="alert alert-danger">
                                              {{ $errors->first('num_immatriculation') }}
                                        </div>
                                     @endif

                                    @foreach($fournisseurs as $fournisseur)
                                    <tr>
                                       <td>{{ $fournisseur->cam_nomchauf }}</td>
                                       <td>{{ $fournisseur->num_immatriculation }}</td>     
                                       <td><a href="{{ asset($fournisseur->cam_photo) }}" type="button" class="btn btn-success btn-sm">Voir la photo</a></td>
                                        <td>{{ $fournisseur->type_produit }}</td>
                                        
                                       
                                        
                                           <td>{{ $fournisseur->poids_net }}</td>
                                        

                                        <td>{{ $fournisseur->nombre_sac }}</td>
                                        

                                        
                                        <td>{{ $fournisseur->created_at }}</td>
                                        <td>{{ $fournisseur->destination }}</td>
                                        <td>
                                            @if($fournisseur->statut_dechargement == 1)
                                                En route
                                            @else
                                                Non en route
                                            @endif
                                        </td>

                                        <td>{{ $fournisseur->observation }}</td>
                                        <td>{{ $fournisseur->prix_unit }}</td>

                                  @if (!$fournisseur->paiements->isEmpty())
                                    
                                        <td>{{ $fournisseur->paiements[0]->prix_HPG }}</td>
                                        <td>{{ $fournisseur->paiements[0]->montant_tp }}</td>
                                        <td>{{ $fournisseur->paiements[0]->montant_HPG }}</td>
                                    
                                        <!-- Ajoutez une condition pour afficher "Effectué" si montant_HPG n'est pas null -->
                                        <td style="color: green;">{{ $fournisseur->paiements[0]->montant_HPG !== null ? 'Effectué' : 'En attente' }}</td>
                                    @else
                                        <!-- Si le camion n'a pas de paiements, affichez "Neant" -->
                                        <td>Neant</td>
                                        <td>Neant</td>
                                        <td>Neant</td>
                                       
                                        <!-- Affichez "En attente" si pas de paiement -->
                                        <td style="color: red;">En attente</td>
                                    @endif
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

<script>
        setTimeout(function() {
            document.getElementById('success').style.display = 'none';
        }, 6000);
    </script>
@endsection
