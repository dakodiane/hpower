@extends('templates.export')

@section('document')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="container">
    <h2 class="my-4">Enregistrement de Booking</h2>

    <!-- Formulaire d'enregistrement -->
    <form action="{{route('store.booking')}}" method="post">
        @csrf

        <!-- Référence Booking -->
        <div class="mb-3">
            <label for="ref_booking" class="form-label">Référence Booking</label>
            <input type="text" class="form-control" name="ref_booking" required>
        </div>

        <!-- Compagnie Maritime -->
        <div class="mb-3">
            <label for="compagnie_maritime" class="form-label">Compagnie Maritime</label>
            <input type="text" class="form-control" name="compagnie_maritime" required>
        </div>

        <!-- Shipper -->
        <div class="mb-3">
            <label for="shipper" class="form-label">Shipper</label>
            <input type="text" class="form-control" name="shipper" required>
        </div>

        <!-- Date Emission -->
        <div class="mb-3">
            <label for="date_emission" class="form-label">Date Emission du Booking</label>
            <input type="date" class="form-control" name="date_emission" required>
        </div>

        <!-- Nom Navire -->
        <div class="mb-3">
            <label for="nom_navire" class="form-label">Nom du Navire</label>
            <input type="text" class="form-control" name="nom_navire" required>
        </div>

        <!-- Port -->
        <div class="mb-3">
            <label for="port" class="form-label">Port de chargement</label>
            <input type="text" class="form-control" name="port" required>
        </div>

        <!-- Destination -->
        <div class="mb-3">
            <label for="destination" class="form-label">Destination finale</label>
            <input type="text" class="form-control" name="destination" required>
        </div>

        <!-- Nombre CTS 20 et Nombre CTS 40 sur la même ligne -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre_cts_20" class="form-label">Nombre conteneur de 20'</label>
                <input type="number" class="form-control" name="nombre_cts_20" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="nombre_cts_40" class="form-label">Nombre conteneur de 40'</label>
                <input type="number" class="form-control" name="nombre_cts_40" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="client_input" class="form-label">Nom du Client</label>
            <input type="text" class="form-control" id="client_input" name="id_client" autocomplete="off" required>
            <ul id="clients-list"></ul>
        </div>

        <!-- Bouton Enregistrer -->
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
    <script>
        var input = document.getElementById('client_input');
        var clientsList = document.getElementById('clients-list');

        input.addEventListener('input', function() {
            var recherche = input.value.toLowerCase();
            clientsList.innerHTML = '';

            $.ajax({
                url: '/rechercher-client',
                method: 'GET',
                data: {
                    term: recherche
                },
                success: function(data) {
                    data.forEach(function(client) {
                        var li = document.createElement('li');
                        li.textContent = client.name;

                        li.addEventListener('mousedown', function() {
                            input.value = client.name;
                            input.setAttribute('data-client-id', client.id);

                            // Assurez-vous de mettre à jour également le champ 'id_client' du formulaire
                            document.querySelector('[name="id_client"]').value = client.id;

                            clientsList.innerHTML = '';
                        });

                        clientsList.appendChild(li);
                    });
                },
                error: function(error) {
                    console.error('Erreur lors de la récupération des clients:', error);
                }
            });
        });
    </script>



    <style>
        #clients-list {
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
            width: 31%;
            z-index: 1;
            list-style: none;
            padding: 0;
            margin: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        #clients-list li {
            padding: 8px 12px;
            cursor: pointer;
        }

        #clients-list li:hover {
            background-color: #f0f0f0;
        }
    </style>
</div>

@endsection