<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\semence;
use App\Models\Paiement;


class semencesExport implements FromCollection, WithHeadings
{
    protected $semences;

    // Ajoutez un constructeur pour accepter la collection de semences
    public function __construct($semences)
    {
        $this->semences = $semences;
    }
    public function headings(): array
    {
        // Afficher les rubriques qui seront prises en charge
        return [
            'N° Transaction',
            'Date',
            'Magasin de Déchargement',
            'Quantité Reçue',
            'Prix Unitaire',
            'Montant',
            'Fournisseur',
            'Nature de la Semence',
            'Type de Certification',
            'Type de Véhicule',
            'Matricule du Véhicule',
            'Bordereau'
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

    foreach ($this->semences as $semence) {
        // Vérifiez si le semence a des paiements avant d'accéder aux colonnes de paiement
        $paiement = $semence->paiements->isNotEmpty() ? $semence->paiements[0] : null;

        $row = [
            $semence->sem_numtrans,
            $semence->sem_nummatricul,
            optional($paiement)->date_paie, // Utilisation de optional pour éviter les erreurs si le paiement n'existe pas
            $semence->sem_client,
            $semence->sem_type,
            $semence->sem_qtereçu,
            $semence->sem_prixunit,
            optional($semence)->sem_qtevendue,
            optional($semence)->sem_prixunitHPG,
            $semence->sem_lieusemi,
            optional($semence)->sem_magdecht,
            $semence->sem_nature,
            $semence->sem_deplace,
            $semence->sem_bord,
            $semence->sem_prove,
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
