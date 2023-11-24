@extends('templates.eva')

@section('document')

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