@extends('templates.app')

@section('document')
<style>
  .no-camion-message {
    color: red;
    /* Couleur du texte gris */
    font-size: 18px;
    /* Taille de texte */
    font-weight: bold;
    /* Gras */
    text-align: center;
    /* Centrer le texte */
    margin-top: 20px;
    /* Espacement en haut */
  }

  @media print {

    /* Ajoutez des styles pour l'impression ici */
    .tableau {
      width: 100%;
      font-size: 12px;
      /* Ajoutez d'autres styles selon vos besoins */
    }
  }
</style>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Liste des camions enregistrés</h4>

            <div class="table-responsive">
              @if ($camions->isEmpty())
              <p class="no-camion-message">Aucun camion à finaliser.</p>
              @else
              <table id="table" class="tableau">
                <thead>
                  <tr>
                    <th>Numéro de Bordereau</th>
                    <th>Ville de départ</th>
                    <th>Rapporteur au départ</th>
                    <th>Rapporteur à la destination</th>
                    <th>Numéro d'immatriculation</th>
                    <th>Nom du chauffeur</th>
                    <th>Heure de départ</th>
                    <th>Heure d'arrivée</th>
                    <th>Nombre de sacs</th>
                    <th>Poids à vide</th>
                    <th>Poids chargé</th>
                    <th>Poids net</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($camions as $camion)
                  <tr>
                    <td>{{ $camion->num_bordereau }}</td>
                    <td>{{ $camion->provenance }}</td>
                    <td>{{ $camion->cam_nomchauf }}</td>
                    <td>{{ $camion->cam_nomchauf }} </td>
                    <td>{{ $camion->num_immatriculation }}</td>
                    <td>{{ $camion->cam_nomchauf }}</td>
                    <td>{{ $camion->heure_depart}}</td>
                    <td>{{ $camion->heure_arrive }}</td>
                    <td>{{ $camion->nombre_sac }}</td>
                    <td>{{ $camion->poids_vide}}</td>
                    <td>{{ $camion->poids_charge }}</td>
                    <td>{{ $camion->poids_net }}</td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>
            <button id="pdfButton" class="btn btn-primary">Télécharger en PDF</button>



          </div>
        </div>
      </div>

    </div>
  </div>


</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var pdfButton = document.getElementById('pdfButton');
        var table = document.getElementById('table');

        pdfButton.addEventListener('click', function () {
            var pdf = new jsPDF();
            
            // Utilisez la méthode autoTable pour extraire le contenu du tableau
            pdf.autoTable({ html: '#table' });

            // Téléchargez le PDF avec un nom de fichier spécifié
            pdf.save('tableau.pdf');
        });
    });
</script>


@endsection