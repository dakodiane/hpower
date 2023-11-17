<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Bordereau à remplir</title>
</head>
<body>
    <div class="table-responsive">
        <table class="table-hover table-striped">
          <thead>
            <tr>
              <th>N° Transaction</th>
              <th>Date</th>
              <th>Magasin de <br>Déchargement</th>
              <th>Quantité Reçue</th>
              <th>Prix Unitaire</th>
              <th>Montant</th>
              <th>Fournisseur</th>
              <th>Nature de la <br>Semence</th>
              <th>Type de <br>Certification</th>
              <th>Type de <br>Véhicule</th>
              <th>Matricule du <br>Véhicule</th>
              <th>Bordereau</th>
            </tr>
          </thead>
          @foreach ($semences as $semence)
          @foreach ($paiements as $paiement) 
          <tbody>
            <tr>
              <td>HP202300{{$semence->semence_id}}</td>
              <td>{{ $semence->created_at }}</td>                              
              <td>{{ $semence->sem_magdecht }}</td>
              <td>{{ $semence->sem_qtereçu }}</td>
              <td>{{$semence->sem_prixunit}}</td>
              <td>{{ $paiement->montant_tp }} FCFA</td>
              <td>{{ $semence->sem_nature }}</td>
              <td>{{ $semence->sem_type }}</td>                              
              <td>{{ $semence->sem_deplace }}</td>
              <td>{{ $semence->sem_nummatricul }}</td>
              <td>{{ $semence->sem_bord }}</td>  
              <td>
                <a class="btn btn-success" href="{{ route('telechargement') }}">Exporter en PDF</a>
              </td>                         
            </tr>
          </tbody>
          @endforeach 
          @endforeach 
        </table>
      </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>