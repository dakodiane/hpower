<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class approExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $appros;

    public function __construct($appros)
    {
        $this->appros = $appros;
    }

    public function headings(): array
    {
        return [
            'N°',
            'Date',
            'Nom du chauffeur',
            'Telephone',
            'Heure d\'arrivée',
            'Immatriculation',
            'Ville de provenance',
            'Quantité chargée',
            'Prix de cession',
            'Observations',
        ];

    }

    public function collection()
    {
        return collect($this->getData());
    }

    private function getData()
    {
        $data = [];

        foreach ($this->appros as $appro) {
            $paiement = $appro->paiements->isNotEmpty() ? $appro->paiements[0] : null;

            $row = [
                
                $appro->num_bordereau,
                now(),
                $appro->cam_nomchauf,
                $appro->tel_conducteur,
                $appro->heure_arrive,
                $appro->num_immatriculation,
                $appro->provenance,
                $appro->qte_charge,
                optional($paiement)->prix_cession,
                $appro->observation,
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
