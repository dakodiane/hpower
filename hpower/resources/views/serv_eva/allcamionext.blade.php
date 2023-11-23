@extends('templates.eva')

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
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Liste des camions enregistrés</h4>

            <div class="table-responsive">
              @if ($transports->isEmpty())
              <p class="no-camion-message">Aucun camion à finaliser.</p>
              @else
              <table id="table" class="tableau">
                <thead>
                  <tr>
                    <th>Numéro de Bordereau</th>     
                    <th>Rapporteur à la destination</th>
                    <th>Numéro d'immatriculation</th>
                    <th>Nom du chauffeur</th>
                    <th>Heure d'arrivée</th>
                    <th>Nombre de sacs</th>
                
                </thead>
                <tbody>
                  @foreach($transports as $transport)
                  <tr>
                    <td>{{ $transport->num_bordereau }}</td>              
                    <td>{{ $transport->utilisateur->name  }} </td>
                    <td>{{ $transport->num_immatriculation }}</td>
                    <td>{{ $transport->cam_nomchauf }}</td>
                    <td>{{ $transport->heure_arrive }}</td>
                    <td>{{ $transport->nombre_sac }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>
          <!--    <button id="pdfButton" class="btn btn-primary">Télécharger en PDF</button>-->



          </div>
        </div>
      </div>
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Liste des camions d'approvisionnement</h4>

            <div class="table-responsive">
              @if ($approvisionnements->isEmpty())
              <p class="no-camion-message">Aucun camion à finaliser.</p>
              @else
              <table id="table" class="tableau">
                <thead>
                  <tr>
                    <th>Numéro de Bordereau</th>     
                    <th>Rapporteur à la destination</th>
                    <th>Numéro d'immatriculation</th>
                    <th>Nom du chauffeur</th>
                    <th>Heure d'arrivée</th>
                    <th>Nombre de sacs</th>
                
                </thead>
                <tbody>
                  @foreach($approvisionnements as $approvisionnement)
                  <tr>
                    <td>{{ $approvisionnement->num_bordereau }}</td>              
                    <td>{{ $approvisionnement->utilisateur->name  }} </td>
                    <td>{{ $approvisionnement->num_immatriculation }}</td>
                    <td>{{ $approvisionnement->cam_nomchauf }}</td>
                    <td>{{ $approvisionnement->heure_arrive }}</td>
                    <td>{{ $approvisionnement->nombre_sac }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>
          <!--    <button id="pdfButton" class="btn btn-primary">Télécharger en PDF</button>-->



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