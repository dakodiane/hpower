<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class SemenceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $semences;

    public function __construct($semences)
    {
        $this->semences = $semences;
    }

    public function headings(): array
    {
        return [
            'N° Transaction',
            'Numéro de Bordereau',
            'Numéro d\'immatriculation',
            'Fournisseur',
            'Type de Semence',
            'Quantité Reçue',
            'Quantité Vendue',
            'Prix Unitaire HPG',
            'Lieu de Semis',
            'Magasin de Déchargement',
            'Nature de la Semence',
            'Déplacement',
            'Bordereau',
            'Provenance',
            'Type de Paiement',
            'Prix TP',
            'Prix HPG',
            'Montant TP',
            'Montant HPG',
            'Recette HPG',
            'Paiement Total',
            'Statut de Paiement',
        ];
    }

    public function collection()
    {
        return collect($this->getData());
    }

    private function getData()
    {
        $data = [];

        foreach ($this->semences as $semence) {
            $paiement = $semence->paiements->isNotEmpty() ? $semence->paiements[0] : null;

            $row = [
                $semence->sem_numtrans,
                $semence->numerodebord,
                $semence->sem_nummatricul,
                $semence->sem_client,
                $semence->sem_type,
                $semence->sem_qtereçu,
                $semence->sem_qtevendue,
                $semence->sem_prixunitHPG,
                $semence->sem_lieusemi,
                $semence->sem_magdecht,
                $semence->sem_nature,
                $semence->sem_deplace,
                $semence->sem_bord,
                $semence->sem_prove,
                $semence->statut_paiement,
                optional($paiement)->prix_tp,
                optional($paiement)->prix_HPG,
                optional($paiement)->montant_tp,
                optional($paiement)->montant_HPG,
                optional($paiement)->recette_HPG,
                optional($paiement)->paietotal,
                optional($paiement)->statut_paie,
            ];

            $data[] = $row;
        }

        return $data;
    }
}
