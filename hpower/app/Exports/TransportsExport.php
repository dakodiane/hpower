<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Transport;
use App\Models\paiement;


class TransportsExport implements FromCollection, WithHeadings
{
    protected $transports;

    // Ajoutez un constructeur pour accepter la collection de transports
    public function __construct($transports)
    {
        $this->transports = $transports;
    }
    public function headings(): array
    {
        return [
            'N° Transaction HPG',
            'Date reception',
            'Date paiement',
            'Matricule Camion',
            'Provenance',
            'Nom du Chauffeur',
            'Tel Chauffeur',
            'Produit',
            'Quantité Chargée',
            'Destination',
            'N° Bordereau de Chargement',
            'Avance Payée',
            'Poids Chargé (Tonne)',
            'Poids Vide (Tonne)',
            'Poids Net (Tonne)',
            'N° Bordereau du Pont',
            'Entreprise Bénéficiaire',
            'Prix de l\'entreprise bénéficiaire (FCFA/Tonne)',
            'Prix HPG (FCFA/Tonne)',
            'Montant de l\'entreprise bénéficiaire (FCFA)',
            'Montant HPG (FCFA)',
            'Recette HPG (FCFA)',
            'Solde après paiement (FCFA)',
            'Etat du paiement',
        ];
    }

    public function collection()
    {
        // Retournez une collection avec les données à exporter
        return collect($this->getData());
    }
    private function getData()
{
    // Extraire les données de la vue et les mettre dans un tableau
    $data = [];

    foreach ($this->transports as $transport) {
        // Vérifiez si le transport a des paiements avant d'accéder aux colonnes de paiement
        $paiement = $transport->paiements->isNotEmpty() ? $transport->paiements[0] : null;

        $row = [
            $transport->num_bordereau,
            $transport->heure_arrive,
            optional($paiement)->date_paie, // Utilisation de optional pour éviter les erreurs si le paiement n'existe pas
            $transport->num_immatriculation,
            $transport->provenance,
            $transport->cam_nomchauf,
            $transport->tel_conducteur,
            $transport->type_produit,
            $transport->qte_charge,
            $transport->destination,
            $transport->bordereauchargement,
            $transport->avancepaye,
            $transport->poids_charge,
            $transport->poids_vide,
            $transport->poids_net,
            $transport->numerodebord,
            $transport->entreprise_benef,
            optional($paiement)->prix_tp,
            optional($paiement)->prix_HPG,
            optional($paiement)->montant_tp,
            optional($paiement)->montant_HPG,
            optional($paiement)->recette_HPG,
            optional($paiement)->paietotal,
            optional($paiement)->statut_paie,
        ];

        // Ajoutez la ligne au tableau de données
        $data[] = $row;
    }

    return $data;
}

}
