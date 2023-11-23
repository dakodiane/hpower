<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="manifest" href="{{ asset('manifest.json') }}">
  <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}">
  <meta name="theme-color" content="#ffffff">
  <meta name="description" content="">
  <title>Inscription</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <!-- Section: Design Block -->
  <section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
            background: rgb(4, 70, 92) url('{{ asset('images/hpower.png') }}'); background-size: 400px; background-position: center; background-repeat: no-repeat;
            height: 500px;
            "></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
            margin-top: -100px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter: blur(30px);
         
            ">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Inscription
              <hr>
            </h2>
            <form action="{{ route('inscription') }}" method="post">
              @csrf
              @if(Session::has('success'))
              <div class="alert alert-success">[]</div>
              @endif
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div class="form-outline">
                    <input type="text" name="name" id="form3Example1" class="form-control" placeholder="Saisissez votre nom complet" />
                    <label class="form-label" for="form3Example1">Nom Complet</label>
                    <br><span class="text-danger">@error('name') {{ $message }} @enderror</span>
                  </div>
                </div>

              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="form3Example3" class="form-control" placeholder="Saisissez votre adresse email" />
                <label class="form-label" for="form3Example3">Email</label>
                <br><span class="text-danger">@error('email') {{ $message }} @enderror
              </div>

              {{-- telephone input --}}
              <div class="form-outline mb-4">
                <input type="tel" name="telephone" id="form3Example4" class="form-control" placeholder="Votre votre numéro de telephone" />
                <label class="form-label" for="form3Example4">Téléphone</label>
                <br><span class="text-danger">@error('telephone') {{ $message }} @enderror
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form3Example4" class="form-control" placeholder="Saisissez un mot de passe" />
                <label class="form-label" for="form3Example4">Mot de passe</label>
                <br><span class="text-danger">@error('password') {{ $message }} @enderror
              </div>

              {{-- Categories select --}}
              <br> <select class="form-select" name="role" aria-label="Default select example">
         <option value="directeur">Directeur</option>
                <option value="fournisseur">Fournisseur</option>
                <option value="rapporteur" selected>Rapporteur</option>

             <option value="servicesemence">Service des Semences</option>

                <option value="servicetransport">Service des Transports</option>
                <option value="serviceappro">Service d'approvisionnement</option>
                <option value="export">Export</option>
              </select>
              <label class="form-label" for="form3Example4">Qui êtes-vous?</label>


              <br>
              <div class="form-outline mb-4">
                <br> <input type="text" class="form-control" id="ville" name="ville" placeholder="Tapez une ville" autocomplete="off">
                <label class="form-label" for="form3Example4">Ville</label>

                <ul id="villes-list"></ul>
              </div>

              <br><br><button type="submit" value="inscription" class="btn btn-primary btn-block mb-4">
                S'inscrire
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      var input = document.getElementById('ville');
      var villesList = document.getElementById('villes-list');


      input.addEventListener('input', function() {

        var recherche = input.value.toLowerCase();

        villesList.innerHTML = '';

        var villes = ['Cotonou', 'Abomey-Calavi', 'Porto-Novo', 'Parakou', 'Djougou', 'Bohicon', 'Natitingou',
          'Savé', 'Abomey', 'Nikki', 'Lokossa', 'Ouidah', 'Dogbo-Tota', 'Kandi', 'Cové', 'Malanville',
          'Pobé', 'Kérou', 'Savalou', 'Sakété', 'Comè', 'Bembéréké', 'Bassila', 'Banikoara', 'Kétou',
          'Dassa-Zoumè', 'Tchaourou', 'Allada', 'Aplahoué', 'Tanguiéta', 'N\'Dali', 'Segbana', 'Athiémé',
          'Grand Popo', 'Kouandé',
        ];

        var villesFiltrees = villes.filter(function(ville) {
          return ville.toLowerCase().includes(recherche);
        });

        villesFiltrees.forEach(function(ville) {
          var li = document.createElement('li');
          li.textContent = ville;
          li.addEventListener('click', function() {
            input.value = ville;
            villesList.innerHTML = '';
          });
          villesList.appendChild(li);
        });
      });
    </script>

    <style>
      #villes-list {
        position: absolute;
        background-color: #fff;
        border: 1px solid #ccc;
        max-height: 150px;
        overflow-y: auto;
        width: 65%;
        z-index: 1;
        list-style: none;
        padding: 0;
        margin: 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      }

      #villes-list li {
        padding: 8px 12px;
        cursor: pointer;
      }

      #villes-list li:hover {
        background-color: #f0f0f0;
      }
    </style>
  </section>
  <!-- Section: Design Block -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>