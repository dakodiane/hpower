@extends('templates.servicetrans')

@section('document')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger auto-dismiss">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


            <h4 class="card-title">Valider le paiement</h4>

            <form class="forms-sample" method="POST" action="{{ route('Servicetrans.storepaie', ['transport_id' => $transports->transport_id]) }}" enctype="multipart/form-data">
              @csrf 
              <div class="form-group">
                <label for="exampleInputName1">N° d'immatriculation</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{ isset($transports) ? $transports->num_immatriculation : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleInputName1">Nom du chauffeur</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{ isset($transports) ? $transports->cam_nomchauf : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleInputName1">N° de tel du conducteur</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{ isset($transports) ? $transports->tel_conducteur : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">Matière transportée</label>
                <input type="text" class="form-control" id="type_produit" value="{{ isset($transports) ? $transports->type_produit : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">N° Bordereau du Pont</label>
                <input type="text" class="form-control" id="numerodebord" value="{{ isset($transports) ? $transports->numerodebord : '' }}" readonly >
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">Entreprise bénéficiaire</label>
                <input type="text" class="form-control" id="entreprise_benef" value="{{ isset($transports) ? $transports->entreprise_benef : '' }}" readonly>
              </div>


              <div class="form-group">
                <label for="exampleSelectGender">Avance payée</label>
                <input type="text" class="form-control" id="avancepaye" value="{{ isset($transports) ? $transports->avancepaye : '' }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleInputName1">Reste à payé</label>
                <input type="text" name="rest_paie" class="form-control" id="exampleInputName1" placeholder="" required>
              </div>

              <div class="form-group">
                <label for="exampleInputCity1">Prix {{ isset($transports) ? $transports->entreprise_benef : '' }} (FCFA/Tonne)</label>
                <input type="text" name="prix_tp" class="form-control" id="exampleInputCity1" required>
              </div>

             

              <div class="form-group">
                <label for="exampleInputName1">Prix HPG (FCFA/Tonne)</label>
                <input type="text" name="prix_HPG" class="form-control" id="exampleInputName1" placeholder="" required>
              </div>

             

              <div class="form-group">
                <label for="exampleInputName1">Date du paiement</label>
                <input type="date" name="date_paie" class="form-control" id="exampleInputName1" placeholder="" required>
              </div>

              

              <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
              <button class="btn btn-light" >Annuler</button>
            </form>
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
