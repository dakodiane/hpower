@extends('templates.app')

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
           
        
                      @foreach($usersOnline as $user)
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->role }}</td>
                          <td> {{ $user->name }}</td>
                          <td>{{ $user->name }}</td>
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