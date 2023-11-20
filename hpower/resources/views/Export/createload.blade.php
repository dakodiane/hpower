@extends('templates.export')

@section('document')
<div class="container">
    <form method="post" action="{{ route('store.loading', ['id_booking' => $bookings->id_booking]) }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id_booking" value="{{ $bookings->id_booking }}">

        <div class="mb-3">
            <label for="shipper_name" class="form-label">Nom de l'enleveur</label>
            <input type="text" name="nom_enleveur" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="loading_location" class="form-label">Lieu de chargement</label>
            <input type="text" name="lieu_chargement" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="loading_location" class="form-label">Produit chargé</label>
            <input type="text" name="produit" class="form-control" required>
        </div>

        <button type="button" id="info-containers-btn" class="btn btn-primary mb-3">Infos sur les conteneurs</button>

        <div id="container-info" class="container-info"></div>

        <input type="hidden" id="total-containers" name="total_containers" value="{{ $bookings->nombre_total }}">

        <button type="submit" class="btn btn-success">Enregistrer le chargement</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var infoContainersBtn = document.getElementById('info-containers-btn');
        var containerInfo = document.getElementById('container-info');
        var totalContainers = document.getElementById('total-containers').value;

        infoContainersBtn.addEventListener('click', function() {
            var containerLines = '';
            for (var i = 1; i <= totalContainers; i++) {
                containerLines += `
                
                <div class="container-item border p-3 mb-3">
                        <h3 class="mb-3">Conteneur ${i}</h3>
                        
                        <div class="mb-3">
                            <label for="num_container_${i}" class="form-label">Numéro du Conteneur</label>
                            <input type="text" name="num_cts_${i}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="num_sac_${i}" class="form-label">Nombre de sacs du Conteneur </label>
                            <input type="text" name="nombre_sac_${i}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="num_sac_${i}" class="form-label">Numero du Seal </label>
                            <input type="text" name="num_seal_${i}" class="form-control" required>
                        </div>

                        <div class="mb-3">
    <label for="container_weight_${i}_empty" class="form-label">Poids du Conteneur (vide)</label>
    <input type="text" name="poids_cts_vide_${i}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="container_weight_${i}_loaded" class="form-label">Poids du Conteneur(chargé)</label>
    <input type="text" name="poids_cts_charge_${i}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="container_vgm_${i}" class="form-label">Poids VGM du Conteneur ${i}</label>
    <input type="text" name="poids_vgm_${i}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="date_chargement_${i}" class="form-label">Date de chargement du Conteneur </label>
    <input type="date" name="date_chargement_${i}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="date_entree_port_${i}" class="form-label">Date d'entrée au port du Conteneur </label>
    <input type="date" name="date_port_${i}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="photo_ticket_1_${i}" class="form-label">Photo du Ticket de Conteneur </label>
    <input type="file" name="ticket_container_${i}" class="form-control" accept="image/*" required>
</div>

<div class="mb-3">
    <label for="photo_ticket_2_${i}" class="form-label">Photo du Ticket 2</label>
    <input type="file" name="ticket_2_${i}" class="form-control" accept="image/*" required>
</div>
                        </div>`;
            }

            // Afficher les infos des conteneurs dans le conteneur-info
            containerInfo.innerHTML = containerLines;
        });
    });
</script>


</div>


@endsection


<style>
    .container-info {
        all: initial;
    }

    .container-item {
        width: 700px;

    }

    form {
        all: initial;
    }

    /* Ajoutez d'autres styles selon vos besoins */
</style>