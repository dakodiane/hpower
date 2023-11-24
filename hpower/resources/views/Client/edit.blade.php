@extends('templates.client')

@section('document')
<div class="container">
    <form method="post" action="{{ route('update.loading', ['id_loading' => $loadings->id_loading]) }}" enctype="multipart/form-data">
        @csrf


        <input type="hidden" name="id_loading" value="{{ $loadings->id_loading }}">

        <div class="mb-3">
            <label for="shipper_name" class="form-label">Nom de l'enleveur</label>
            <input type="text" name="nom_enleveur" class="form-control" value="{{ $loadings->nom_enleveur }}" readonly>
        </div>

        <div class="mb-3">
            <label for="loading_location" class="form-label">Lieu de chargement</label>
            <input type="text" name="lieu_chargement" class="form-control" value="{{ $loadings->lieu_chargement }}" readonly>
        </div>

        <div class="mb-3">
            <label for="loading_location" class="form-label">Produit chargé</label>
            <input type="text" name="produit" class="form-control" value="{{ $loadings->produit }}" readonly>
        </div>
            <div class="mb-3">
                <label for="num_container" class="form-label">Numéro du Conteneur</label>
                <input type="text" name="num_cts" class="form-control" value="{{ $loadings->num_cts }}" required>
            </div>

            <div class="mb-3">
                <label for="num_sac" class="form-label">Nombre de sacs du Conteneur </label>
                <input type="text" name="nombre_sac" class="form-control" value="{{ $loadings->nombre_sac }}" required>
            </div>

            <div class="mb-3">
                <label for="num_sac" class="form-label">Numero du Seal </label>
                <input type="text" name="num_seal" class="form-control" value="{{ $loadings->num_seal }}" required>
            </div>

            <div class="mb-3">
                <label for="container_weight_empty" class="form-label">Poids du Conteneur (vide)</label>
                <input type="text" name="poids_cts_vide" class="form-control" value="{{ $loadings->poids_cts_vide }}" required>
            </div>

            <div class="mb-3">
                <label for="container_weight_loaded" class="form-label">Poids du Conteneur(chargé)</label>
                <input type="text" name="poids_cts_charge" class="form-control" value="{{ $loadings->poids_cts_charge }}" required>
            </div>

            <div class="mb-3">
                <label for="container_vgm" class="form-label">Poids VGM du Conteneur ${i}</label>
                <input type="text" name="poids_vgm" class="form-control" value="{{ $loadings->poids_vgm }}" required>
            </div>
   

        <button type="submit" class="btn btn-success">Valider</button>
    </form>
</div>






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