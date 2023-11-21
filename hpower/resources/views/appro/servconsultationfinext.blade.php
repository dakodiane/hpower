 @extends('templates.appro') 

@section('document')
<style>
    .no-transport-message {
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
                                        @if(session('success'))
                        <div class="alert alert-success auto-dismiss">
                            {{ session('success') }}
                        </div>
                    @endif

                        <h4 class="card-title">Liste des Transports avec Paiements</h4>
                        <div class="table-responsive">
                            @if ($transports->isEmpty())
                                <p class="no-transport-message">Aucun transport à afficher.</p>
                            @else
                                <table class="tableau">
                                    <thead>
                                        <tr>
                                            <th>N° Transaction HPG</th>
                                            <th>Date reception</th>
                                            <th>Date paiement</th>
                                            <th>Matricule Camion</th>
                                            <th>Image Matricule Camion</th>
                                            <th>Provenance</th>
                                            <th>Nom du Chauffeur</th>
                                            <th>Tel Chauffeur</th>
                                            <th>Produit</th>
                                            <th>Quantité Chargée</th>
                                            <th>Destination</th>
                                            <th>N° Bordereau de Chargement</th>
                                            <th>Image Bordereau de Chargement</th>
                                            <th>Avance Payée</th>
                                            <th>Poids Chargé (Tonne)</th>
                                            <th>Poids Vide (Tonne)</th>
                                            <th>Poids Net (Tonne)</th>
                                            <th>N° Bordereau du Pont</th>
                                            <th>Image Bordereau du Pont</th>
                                            <th>Entreprise Bénéficiaire</th>
                                            <th>Prix de l'entreprise bénéficiaire (FCFA/Tonne)</th>
                                            <th>Prix HPG (FCFA/Tonne)</th>
                                            <th>Montant de l'entreprise bénéficiaire (FCFA)</th>
                                            <th>Montant HPG (FCFA)</th>
                                            <th>Recette HPG (FCFA)</th>
                                            <th>Solde après paiement (FCFA)</th>
                                            <th>Etat du paiement</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transports as $transport)
                                            <tr>
                                                <td>{{ $transport->num_bordereau }}</td>
                                                <td>{{ $transport->heure_arrive }}</td>
                                                <td>{{ $transport->paiements[0]->date_paie }}</td>
                                                <td>{{ $transport->num_immatriculation }}</td>
                                                <td><a href="{{ asset($transport->cam_photo) }}" type="button" class="btn btn-success btn-sm">Voir la photo</a></td>
                                                <td>{{ $transport->provenance }}</td>
                                                <td>{{ $transport->cam_nomchauf }}</td>
                                                <td>{{ $transport->tel_conducteur }}</td>
                                                <td>{{ $transport->type_produit }}</td>
                                                <td>{{ $transport->qte_charge }}</td>
                                                <td>{{ $transport->destination }}</td>
                                                <td>{{ $transport->bordereauchargement }}</td>
                                                <td><a href="{{ asset($transport->cam_photo1) }}" type="button" class="btn btn-success btn-sm">Voir la photo</a></td>
                                                <td>{{ $transport->avancepaye }}</td>
                                                <td>{{ $transport->poids_charge }}</td>
                                                <td>{{ $transport->poids_vide }}</td>
                                                <td>{{ $transport->poids_net }}</td>
                                                <td>{{ $transport->numerodebord }}</td>
                                                <td><a href="{{ asset($transport->cam_photo2) }}" type="button" class="btn btn-success btn-sm">Voir la photo</a></td>
                                                <td>{{ $transport->entreprise_benef }}</td>

                                                <!-- Vérifiez si le transport a des paiements avant d'afficher les valeurs -->
                                                @if (!$transport->paiements->isEmpty())
                                                    <td>{{ $transport->paiements[0]->prix_tp }}</td>
                                                    <td>{{ $transport->paiements[0]->prix_HPG }}</td>
                                                    <td>{{ $transport->paiements[0]->montant_tp }}</td>
                                                    <td>{{ $transport->paiements[0]->montant_HPG }}</td>
                                                    <td>{{ $transport->paiements[0]->recette_HPG }}</td>
                                                    <td>{{ $transport->paiements[0]->paietotal }}</td>
                                                    <td>{{ $transport->paiements[0]->statut_paie }}</td>
                                                @else
                                                    <!-- Si le transport n'a pas de paiements, affichez "Neant" -->
                                                    <td>Neant</td>
                                                    <td>Neant</td>
                                                    <td>Neant</td>
                                                    <td>Neant</td>
                                                    <td>Neant</td>
                                                    <td>Neant</td>
                                                @endif

                                            
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            @endif
                        </div>
<a href="{{ route('exportExcel', ['viewType' => 'servconsultationfin']) }}" class="btn btn-success">Télécharger Excel</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Attendre que le document soit chargé
    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionner l'élément avec la classe auto-dismiss
        var autoDismissElement = document.querySelector('.auto-dismiss');

        // Si l'élément existe
        if (autoDismissElement) {
            // Masquer l'élément après 15 secondes
            setTimeout(function() {
                autoDismissElement.style.display = 'none';
            }, 5000); // 5 secondes en millisecondes
        }
    });
</script>
@endsection
