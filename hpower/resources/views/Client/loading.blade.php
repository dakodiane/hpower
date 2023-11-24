@extends('templates.client')

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
                        <h4 class="card-title">Loadings</h4>

                        <div class="table-responsive">
                            <?php if (empty($loadings)) : ?>
                                <p class="no-camion-message">Aucun loading enregistré.</p>
                            <?php else : ?>
                                @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

                                <table id="table" class="tableau">
                                    <thead>
                                        <tr>
                                            <th>Nom de l'enleveur</th>
                                            <th>Lieu de chargement</th>
                                            <th>Produit chargé</th>
                                            <th>Numéro Container</th>
                                            <th>Nombre de sacs</th>
                                            <th>Numéro du Seal</th>
                                            <th>Poids vide</th>
                                            <th>Poids chargé</th>
                                            <th>Poids net</th>
                                            <th>Poids VGM</th>
                                            <th>Date de chargement</th>
                                            <th>Date d'entrée au port</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loadings as $loading)
                                        <tr>
                                            <td>{{ $loading->nom_enleveur }}</td>
                                            <td>{{ $loading->lieu_chargement }}</td>
                                            <td>{{ $loading->produit }}</td>
                                            <td>{{ $loading->num_cts }}</td>
                                            <td>{{ $loading->nombre_sac }}</td>
                                            <td>{{ $loading->num_seal }}</td>
                                            <td>{{ $loading->poids_cts_vide }}</td>
                                            <td>{{ $loading->poids_cts_charge }}</td>
                                            <td>{{ $loading->poids_cts_net }}</td>
                                            <td>{{ $loading->poids_vgm }}</td>
                                            <td>{{ $loading->date_chargement }}</td>
                                            <td>{{ $loading->date_port }}</td>
                                            
                                         
                                            <td><a href="{{ route('edit.loading', ['id_loading' => $loading->id_loading]) }}" type="button" class="btn btn-success btn-md">Voir</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            <?php endif; ?>

                        </div>
                        <!--    <button id="pdfButton" class="btn btn-primary">Télécharger en PDF</button>-->



                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var pdfButton = document.getElementById('pdfButton');
        var table = document.getElementById('table');

        pdfButton.addEventListener('click', function() {
            var pdf = new jsPDF();

            // Utilisez la méthode autoTable pour extraire le contenu du tableau
            pdf.autoTable({
                html: '#table'
            });

            // Téléchargez le PDF avec un nom de fichier spécifié
            pdf.save('tableau.pdf');
        });
    });
</script>


@endsection