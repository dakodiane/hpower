<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enregistrement/Inscription</title>
    {{-- bootstrap inclusion --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

        <!-- Section: Design Block -->
    <section class="text-center">
      <!-- Background image -->
      <div class="p-5 bg-image" style="
            background: rgb(4, 70, 92) url('{{ asset('images/hpower.png') }}'); background-size: 500px; background-position: center; background-repeat: no-repeat;
            height: 300px;
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
              <h2 class="fw-bold mb-5">Inscription <hr></h2>
              <form action="{{ route('insUser') }}" method="post">
                @if(Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}</div> 
                @endif
                @if(Session::has('fail'))
                  <div class="alert alert-danger">{{ Session::get('fail') }}</div> 
                @endif
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-12 mb-4">
                    <div class="form-outline">
                      <input type="text" name="name" id="form3Example1" class="form-control" placeholder="Cristiano RONALDO" value="{{ old('name') }}"/>
                      <label class="form-label" for="form3Example1">Nom Complet</label>
                      <br><span class="text-danger">@error('name') {{ $message }} @enderror</span>
                    </div>
                  </div>
                
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="form3Example3" class="form-control" placeholder="example@gmail.com" value="{{ old('email') }}"/>
                  <label class="form-label" for="form3Example3">Email</label>
                  <br><span class="text-danger">@error('email') {{ $message }} @enderror
                </div>

                {{-- telephone input --}}
                <div class="form-outline mb-4">
                  <input type="tel" name="telephone" id="form3Example4" class="form-control" placeholder="90 01 02 03" value="{{ old('telephone') }}"/>
                  <label class="form-label" for="form3Example4">Téléphone</label>
                  <br><span class="text-danger">@error('telephone') {{ $message }} @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form3Example4" class="form-control"/>
                  <label class="form-label" for="form3Example4">Mot de passe</label>
                  <br><span class="text-danger">@error('password') {{ $message }} @enderror
                </div>

                {{-- Categories select --}}
                 <select class="form-select" name="role" aria-label="Default select example">
                  <option value="directeur">Directeur</option>
                  <option value="fournisseur">Fournisseur</option>
                  <option value="rapporteur" selected>Rapporteur</option>
                  <option value="servicesemence">Service des Semences</option>
                  <option value="servicetransport">Service des Transports</option>                  
                </select> 

               <br> <select class="form-select" name="ville" aria-label="Default select example">
                  <option value="Cotonou">Cotonou</option>
                  <option value="Parakou">Parakou</option>
                                  
                </select> 
                <!-- Submit button -->
                <br><br><button type="submit" value="inscription" class="btn btn-primary btn-block mb-4">
                  S'inscrire
                </button>                
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>