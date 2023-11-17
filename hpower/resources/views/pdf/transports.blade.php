<!DOCTYPE html>
<html>
<head>
<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
</head>
<body>

<h1>Liste des Transports avec Paiements</h1>

@if ($transports->isEmpty())
    <p>Aucun transport à afficher.</p>
@else
    <table id="customers">
        <thead>
        <tr>
        
        <tr>
                                            <!-- Ajoutez les colonnes de la table Transports -->
                                            <th>N° Transaction HPG</th>
                                            <th>Date</th>
                                            <th>Matricule Camion</th>
                                            <th>Provenance</th>
                                            <th>Nom du Chauffeur</th>
                                            <th>Tel Chauffeur</th>
                                            <th>Produit</th>
                                            <th>Quantité Chargée</th>
                                            <th>Destination</th>
                                            <th>N° Bordereau de Chargement</th>
                                            <th>Avance Payée</th>
                                            <th>Poids Chargé (Tonne)</th>
                                            <th>Poids Vide (Tonne)</th>
                                            <th>Poids Net (Tonne)</th>
                                            <th>N° Bordereau du Pont</th>
                                            <th>Entreprise Bénéficiaire</th>

                                            <!-- Ajoutez les colonnes de la table Paiements -->
                                            <th>Prix de l'entreprise bénéficiaire (FCFA/Tonne)</th>
                                            <th>Prix HPG (FCFA/Tonne)</th>
                                            <th>Montant de l'entreprise bénéficiaire (FCFA)</th>
                                            <th>Montant HPG (FCFA)</th>
                                            <th>Recette HPG (FCFA)</th>
                                            <th>Solde (FCFA)</th>

                                        </tr>
        </thead>
        <tbody>
                                        @foreach($transports as $transport)
                                            <tr>
                                                <!-- Affichez les valeurs de la table Transports -->
                                                <td>{{ $transport->num_bordereau }}</td>
                                                <td>{{ $transport->heure_arrive }}</td>
                                                <td>{{ $transport->num_immatriculation }}</td>
                                                <td>{{ $transport->provenance }}</td>
                                                <td>{{ $transport->cam_nomchauf }}</td>
                                                <td>{{ $transport->tel_conducteur }}</td>
                                                <td>{{ $transport->type_produit }}</td>
                                                <td>{{ $transport->qte_charge }}</td>
                                                <td>{{ $transport->destination }}</td>
                                                <td>{{ $transport->bordereauchargement }}</td>
                                                <td>{{ $transport->avancepaye }}</td>
                                                <td>{{ $transport->poids_charge }}</td>
                                                <td>{{ $transport->poids_vide }}</td>
                                                <td>{{ $transport->poids_net }}</td>
                                                <td>{{ $transport->numerodebord }}</td>
                                                <td>{{ $transport->entreprise_benef }}</td>

                                                <!-- Vérifiez si le transport a des paiements avant d'afficher les valeurs -->
                                                @if (!$transport->paiements->isEmpty())
                                                    <td>{{ $transport->paiements[0]->prix_tp }}</td>
                                                    <td>{{ $transport->paiements[0]->prix_HPG }}</td>
                                                    <td>{{ $transport->paiements[0]->montant_tp }}</td>
                                                    <td>{{ $transport->paiements[0]->montant_HPG }}</td>
                                                    <td>{{ $transport->paiements[0]->recette_HPG }}</td>
                                                    <td>{{ $transport->paiements[0]->paietotal }}</td>
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

</body>
</html>
