@extends('templates.eva')

@section('document')
<style>
  .table {
    table-layout: fixed;
}

.table th, .table td {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.table th, .table td, .table button {
    height: 40px; /* Ajustez la hauteur selon vos préférences */
}

.table button {
    width: 100%;
    box-sizing: border-box;
}

.table form {
    border: 1px solid #ddd; /* Couleur de la bordure */
    border-radius: 5px; /* Coins arrondis */
    padding: 5px; /* Espacement intérieur */
    margin-right: 5px; /* Marge entre les formulaires */
}

.table button:hover {
    cursor: pointer;
}


</style>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Utilisateurs connectés</h4>

            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nom Complet</th>
                    <th>Rôle</th>
                    <th>Ville</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                  @foreach($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td> {{ $user->ville }}</td>
                    <td>
                      <div>
                        @if ($user->active == 1)
                        <form method="POST" action="{{ route('user.deactivate', ['id' => $user->id]) }}">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-primary" style="background-color: red;">Désactiver</button>
                        </form>
                        @else
                        <form method="POST" action="{{ route('user.activate', ['id' => $user->id]) }}">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-primary" style="background-color: green;">Activer</button>
                        </form>
                        @endif

                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
@endsection