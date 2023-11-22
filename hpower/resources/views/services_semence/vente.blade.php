@extends('templates.semlayout')

@section('document')
<div>
  @if($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li> 
    @endforeach                
  </ul>
  @endif
</div>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Effectuer une Vente </h3>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white ">
                     <i class="mdi mdi-calendar"></i>{{ now()->format('d-m-Y') }}

                    </button>
                
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-md-offset-1">
            <div class="booking-form">
                <form method="post" action="{{ route('traitement', ['semence_id' => $semences->semence_id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="semence" id="villes" value="{{ isset($semences) ? $semences->sem_nature : '' }}" readonly>
                                    <option value="soja">sodja</option>
                                    <option value="cajou">cajou</option>
                                    <option value="riz">riz</option>
                                    <option value="coton">coton</option>
                                    <option value="Djougou">noix d'arnacarde</option>
                                    <option value="noix de palme">noix de palme</option>                      
                                </select>
                                <span class="select-arrow"></span>
                                <span class="form-label">Semences</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="number" name="ql" value="{{ isset($semences) ? $semences->sem_qtereçu : '' }}" readonly>
                                <span class="form-label">Quantité livrée</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="number" value="{{ isset($semences) ? $semences->sem_numtrans : '' }}" readonly>
                                <span class="form-label">N° Transaction</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="number" value="{{ isset($paiements) ? $paiements->paie_prixlivraison : '' }}" readonly>
                                <span class="form-label">Prix de livraison</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="date" disabled>
                            <span class="form-label">Date</span>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="number" name="qv" placeholder="11.00" value="{{ old('qv') }}">
                                <span class="form-label">Quantité Vendue</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="number" name="puhpg" placeholder="11,00" value="{{ old('puhpg') }}">
                                <span class="form-label">Prix unitaire</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="number" name="montant" value="{{ old('montant') }}">
                                <span class="form-label">Montant HPG</span>
                            </div>
                        </div>
                    </div>
                                     
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" value="{{ old('client') }}" name="client" placeholder="AJENIYAN Olamide">
                                <span class="form-label">Client</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="lieusemi">
                                <span class="form-label">Lieu de semi</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control" type="number" name="recette" disabled>
                                <span class="form-label">Recette</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-btn">
                        <button class="btn btn-danger" type="submit">VALIDER</button>
                    </div>
                </form>
            </div>
        </div>
      
        </div>    
  @endsection