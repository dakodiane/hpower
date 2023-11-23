<?php


namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Fournisseur;

class FournisseursExport implements FromCollection, WithHeadings
{
    protected $fournisseurs;

    public function __construct($fournisseurs)
    {
        $this->fournisseurs = $fournisseurs;
    }

    public function headings(): array
    {
        return [
            'Nom du chauffeur',
            'Numéro d\'immatriculation',
            'Type de produit',
            'Poids net',
            'Nombre de sacs',
            'Heure d\'enregistrement',
            'Destination',
            'Statut du chargement',
            'Observation',
            'Prix FCFA/TONNE',
            'Prix HPG FCFA/TONNE',
            'Montant à recevoir',
            'Montant payé par HPG',
            'Paiement',
        ];
    }

    public function collection()
    {
        return collect($this->getData());
    }

    private function getData()
    {
        $data = [];

        foreach ($this->fournisseurs as $fournisseur) {
            $row = [
                $fournisseur->id,
                $fournisseur->cam_nomchauf,
                $fournisseur->num_immatriculation,
                $fournisseur->type_produit,
                $fournisseur->poids_net,
                $fournisseur->nombre_sac,
                $fournisseur->created_at,
                $fournisseur->destination,
                $fournisseur->statut_dechargement == 1 ? 'En route' : 'Non en route',
                $fournisseur->observation,
                $fournisseur->prix_unit,
                optional($fournisseur->paiements->first())->prix_HPG,
                optional($fournisseur->paiements->first())->montant_tp,
                optional($fournisseur->paiements->first())->montant_HPG,
                optional($fournisseur->paiements->first())->montant_HPG !== null ? 'Effectué' : 'En attente',
            ];

            $data[] = $row;
        }

        return $data;
    }
}
