 @extends('templates.appro')

@section('document')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Bienvenue {{$user->name}}</h3>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white ">
                     <i class="mdi mdi-calendar"></i> {{ now()->format('d-m-Y') }} 
                    </button>
                
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
           {{-- The statistics of the Seeds Management Service --}}
            <div class="row">
              <div class="col-md-12 grid-margin transparent">
                <div class="row">
                  <div class="col-md-6 mb-4 stretch-card transparent" style="text-align: center;">
                    <div class="card card-tale">
                      <div class="card-body">
                        <p class="mb-4" style="color: white; font-size:2em;">DEPENSES POUR ACHAT</p>
                        <p class="fs-30 mb-2" style="color: white;"><b>{{ $depense }}</b> FCFA</p>
                        <a href="/semences" style="color: white;"><small>Voir plus</small></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 stretch-card transparent" style="text-align: center;">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <p class="mb-4" style="color: white; font-size:2em;">QUANTITE VENDUE</p>
                        <p class="fs-30 mb-2" style="color: white;"><b>{{ $qteVendue }}</b> kg</p>
                        <a href="/semences" style="color: white;"><small>Voir plus</small></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent" style="text-align: center;">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <p class="mb-4" style="color: white; font-size:2em;">QUANTITE ACHETEE</p>
                        <p class="fs-30 mb-2" style="color: white;"><b>{{ $qteAchetee }}</b> kg</p>
                        <a href="/semences" style="color: white;"><small>Voir plus</small></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 stretch-card transparent" style="text-align: center;">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <p class="mb-4" style="color: white; font-size:2em;">MONTANT DES VENTES</p>
                        <p class="fs-30 mb-2" style="color: white;"><b>{{ $Vente }}</b> FCFA</p>
                        <a href="/semences" style="color: white;"><small>Voir plus</small></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            {{-- Tableau de réception des semences --}}
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body col-md-12" style="height: 600px; overflow: auto; width:100%">
                      <h4 class="card-title">Table des Semences (vente et réception)</h4>
                      <p class="card-description">
                         <!-- <code><a class="btn btn-success" href="">Exporter en PDF</a></code> -->
                         <!-- <code><a class="btn btn-success" href="{{ '/pdf' }}">Exporter en Excel</a></code> -->
                      </p>
                      <div class="table-responsive">
                        <table class="table-hover table-striped">
                          <thead>
                            <tr>
                              <th>N° Transaction</th>
                              <th>Date</th>
                              <th>Magasin de <br>Déchargement</th>
                              <th>Quantité Reçue</th>
                              <th>Prix Unitaire</th>
                              <th>Montant de la livraison</th>
                              <th>Fournisseur</th>
                              <th>Nature de la <br>Semence</th>
                              <th>Type de <br>Certification</th>
                              <th>Type de <br>Véhicule</th>
                              <th>Matricule du <br>Véhicule</th>
                              <th>Bordereau</th>
                              <th>Quantité vendue</th>
                              <th>Prix Unitaire HPG</th>
                              <th>Montant HPG</th>
                              <th>Client</th>
                              <th>Lieu de Semi</th>
                              <th>Recette</th> 
                            </tr>
                          </thead>
                          @foreach ($semences as $semence)
                          @foreach ($paiements as $paiement) 
                          <tbody>
                            <tr>
                              <td>HP202300{{$semence->semence_id}}</td>
                              <td>{{ $semence->created_at }}</td>                              
                              <td>{{ $semence->sem_magdecht }}</td>
                              <td>{{ $semence->sem_qtereçu }}</td>
                              <td>{{ $semence->sem_prixunit }}</td>
                              <td>{{ $montant_tp }} FCFA</td>
                              <td>{{ $semence->sem_fournisseur }}</td>
                              <td>{{ $semence->sem_nature }}</td>
                              <td>{{ $semence->sem_type }}</td>                              
                              <td>{{ $semence->sem_deplace }}</td>
                              <td>{{ $semence->sem_nummatricul }}</td>
                              <td>{{ $semence->sem_bord }}</td>
                              @endforeach 
                              @endforeach 
                            @foreach ($semences as $semence)
                            @foreach ($paiements as $paiement) 
                              <td>{{ $semence->sem_qtevendue }}</td>
                              <td>{{ $semence->prixunitHPG }}</td>
                              <td>{{ $montant_HPG }}</td>
                              <td>{{ $semence->sem_client }}</td>
                              <td>{{ $semence->sem_lieusemi }}</td> 
                              <td>{{ $recette_HPG }}</td>                       
                            </tr>
                          </tbody>
                          @endforeach 
                          @endforeach 
                        </table>
                      </div>

           
  @endsection 