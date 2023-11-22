@extends('templates.fourni')

@section('document')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Liste des camions</h4>

                        <div class="table-responsive">
                            <table class="tableau">
                                <thead>
                                    <tr>
                                        <th>Nom du chauffeur</th>
                                        <th>Numéro d'immatriculation</th>
                                        <th>Photo de l'immatriculation du camion</th>
                                        <th>Type de produit</th>
                                        
                                        <th>Poids net</th>
                                        <th>Nombre de sacs</th>
                                        <th>Heure d'enrégistrement</th>
                                        <th>Provenance</th>
                                        <th>Statut du chargement</th>
                                        <th>observation</th>
                                        <th>Paiement</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                     @if ($errors->has('num_immatriculation'))
                                         <div id="error-message" class="alert alert-danger">
                                              {{ $errors->first('num_immatriculation') }}
                                        </div>
                                     @endif

                                    @foreach($fournisseurs as $Fournisseur)
                                    <tr>
                                       <td>{{ $Fournisseur->cam_nomchauf }}</td>
                                       <td>{{ $Fournisseur->num_immatriculation }}</td>     
                                       <td><a href="{{ asset($Fournisseur->cam_photo) }}" type="button" class="btn btn-success btn-sm">Voir la photo</a></td>
                                        <td>{{ $Fournisseur->type_produit }}</td>
                                       
                                        @if($Fournisseur->poids_net == 0)
                                                NEANT
                                            @endif
                                        <td>{{ $Fournisseur->nombre_sac }}</td>
                                        <td>{{ $Fournisseur->created_at }}</td>
                                        <td>{{ $Fournisseur->provenance }}</td>
                                        <td>
                                            @if($Fournisseur->statut_dechargement == 1)
                                                En route
                                            @else
                                                Non en route
                                            @endif
                                        </td>

                                        <td>{{ $Fournisseur->observation }}</td>
                                       
                                        <td>{{ $Fournisseur->statut_paiement }}</td>
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

<script>
    // Attendre 15 secondes après le chargement de la page, puis masquer le message d'erreur
    document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        var errorMessage = document.querySelector('.alert-danger');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 15000); // 15 secondes
});


</script>
@endsection
