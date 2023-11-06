@extends('templates.user')

@section('document')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Camions finalisés</h4>
                 
                  <div class="table-responsive">
                    <table class="tableau">
                      <thead>
                        <tr>
                          <th>Ville de départ</th>
                          <th>Rapporteur au départ</th>
                          <th>Rapporteur à la destination</th>
                          <th>Numéro d'immatriculation</th>
                          <th>Nom du chauffeur</th>
                          <th>Heure de départ</th>
                          <th>Heure d'arrivée</th>
                          <th>Nombre de sacs</th>
                          
                     
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Cotonou</td>
                          <td>Jacob</td>
                          <td>Yves </td>
                          <td>53275531</td>
                          <td>Farid </td>
                          <td>08h30</td>
                          <td>10h</td>
                          <td>10</td>
                        </tr>
                      
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