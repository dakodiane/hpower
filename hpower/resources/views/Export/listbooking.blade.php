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
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Liste de vos bookings</h4>
            <div class="table-responsive">
              <?php if (empty($bookings)) : ?>
                <p class="no-camion-message">Aucun booking enregistré.</p>
              <?php else : ?>
                <table id="table" class="tableau">
                  <thead>
                    <tr>
                    <th>Référence Booking</th>
                  <th>Compagnie Maritime</th>
                  <th>Shipper</th>
                  <th>Date d'émission</th>
                  <th>Nom du navire</th>
                  <th>Port de chargement</th>
                  <th>Destination finale</th>
                  <th>Nombre de conteneur 20'</th>
                  <th>Nombre de conteneur 40'</th>
                  <th>Nombre total de conteneur'</th>

                  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($bookings as $booking) : ?>
                      <tr>
                        <td><?= $booking->ref_booking ?></td>
                        <td><?= $booking->compagnie_maritime ?></td> 
                        <td><?= $booking->shipper ?></td> 
                        <td><?= $booking->date_emission?></td>
                         <td><?= $booking->nom_navire ?></td>
                          <td><?=  $booking->port?></td>
                          <td><?= $booking->destination?></td> 
                          <td><?= $booking->nombre_cts_20?></td>
                           <td><?= $booking->nombre_cts_40?></td>
                           <td><?= $booking->nombre_total?></td>
                           <td><a href="{{ route('create.loading', ['id_booking' => $booking->id_booking]) }}" type="button" class="btn btn-success btn-md">Loading</a>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              <?php endif; ?>

            </div>
          </div>
          <!--    <button id="pdfButton" class="btn btn-primary">Télécharger en PDF</button>-->



        </div>
      </div>
    </div>

  </div>
</div>


</div>



@endsection