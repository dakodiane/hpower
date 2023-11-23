@extends('templates.app')

@section('document')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tous les paiements</h4>
            <div class="table-responsive">
              <!--    <button id="pdfButton" class="btn btn-primary">Télécharger en PDF</button>-->
              <!--    <table class="tableau">
                <thead>
                  <tr>
                    <th>Date de paiement</th>
                    <th>Numéro de Bordereau HPG</th>
                    <th>Type de facture</th>
                    <th>Bénéficiaire</th>
                    <th>Poids total(Tonne)</th>
                    <th>Prix Unitaire(F CFA)</th>
                    <th>Montant Total</th>
                    <th>Côte/T(F CFA)</th>
                    <th>Prélèvement HPG(F CFA)</th>
                    <th>Montant versé(F CFA)</th>
                    <th>Opérateur</th>
                    <th>Observation</th>
                    <th>Récépiendaire finale</th>
                    <th>N° Pièce d'identité</th>
                    <th>N° Décharge</th>
                    <th>N° Camion</th>
                    <th>N° Bordereau</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

                  </tr>
                </tbody>
              </table>-->
              <table class="table table-hover">
                      <thead>
                      <tr>
                    <th>Date de paiement</th>
                    <th>Bénéficiaire</th>
                    <th>Poids total(Tonne)</th>
                    <th>Prix Unitaire(F CFA)</th>
                    <th>Montant Total</th>      
                    <th>Prélèvement HPG(F CFA)</th>
                    <th>Montant versé(F CFA)</th>
                    <th>Opérateur</th>
                    <th>Observation</th>
                    <th>Récépiendaire finale</th>
                    <th>N° Pièce d'identité</th>
                    <th>N° Décharge</th>
                    <th>N° Camion</th>
                    <th>N° Bordereau</th>
                  </tr>
                      </thead>
                      <tbody>
                      @foreach($paiements as $paiement)
                       
                      <tr>
                    <td>{{ $paiement->date_paie }}</td>

                    <td></td>
                    <td>{{ $paiement->date_paie }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                
                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

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
@endsection