<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="manifest" href="{{ asset('manifest.json') }}">
  <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}">
  <meta name="theme-color" content="#ffffff">
  <meta name="description" content="">
  <title>Connexion</title>
  {{-- bootstrap inclusion --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!-- Section: Design Block -->
  <section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="background: rgb(4, 70, 92) url('{{ asset('images/hpower.png') }}'); background-size: 500px; background-position: center; background-repeat: no-repeat;
            height: 500px;"></div>
    <!-- Background image -->
<!-- Ajoutez ceci à l'endroit où vous voulez afficher l'invite d'installation -->
<div id="installPrompt" class="install-prompt">
    <div class="install-prompt-content">
        <p>Vous souhaitez installer notre application ?</p>
        <button id="installButton">Installer</button>
        <button id="cancelButton">Annuler</button>
    </div>
</div>

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
            margin-top: -100px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter: blur(30px);
            ">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Connexion
              <hr>
            </h2>
            <form method="POST" action="{{('connexion') }}">

              @csrf
              <!-- Display error messages -->
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <div class="form-outline mb-4">
                <input type="email" name="email" id="email" class="form-control" />
                <label class="form-label" for="email">Email</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" name="password" id="password" class="form-control" />
                <label class="form-label" for="password">Mot de passe</label>
              </div>

              <button type="submit" class="btn btn-primary btn-block mb-4">
                Se connecter
              </button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
  /* Ajoutez ceci à votre feuille de style CSS ou dans une balise <style> dans votre vue */
.install-prompt {
    display: none;
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.install-prompt-content {
    text-align: center;
}

#installButton, #cancelButton {
    padding: 10px;
    margin: 10px;
    cursor: pointer;
}
</style>
<script>
window.addEventListener('beforeinstallprompt', (event) => {
    event.preventDefault();
    window.installPromptEvent = event;
    showInstallPrompt(); // Affiche la boîte de dialogue
});

function showInstallPrompt() {
    const installPrompt = document.getElementById('installPrompt');
    if (installPrompt) {
        installPrompt.style.display = 'block';

        const installButton = document.getElementById('installButton');
        const cancelButton = document.getElementById('cancelButton');

        if (installButton) {
            installButton.addEventListener('click', () => {
                window.installPromptEvent.prompt();
                hideInstallPrompt();
            });
        }

        if (cancelButton) {
            cancelButton.addEventListener('click', () => {
                hideInstallPrompt();
            });
        }
    }
}

function hideInstallPrompt() {
    const installPrompt = document.getElementById('installPrompt');
    if (installPrompt) {
        installPrompt.style.display = 'none';
    }
}
</script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>