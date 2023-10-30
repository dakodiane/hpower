@extends('templates.user')

@section('document')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Camions non finalisés</h4>
                 
                  <div class="table-responsive">
                    <table class="tableau">
                      <thead>
                        <tr>
                          <th>Rapporteur de départ</th>
                          <th>Numéro d'immatriculation</th>
                          <th>Nom du chauffeur</th>
                          <th>Heure de départ</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Jacob</td>
                          <td>53275531</td>
                          <td>Yves </td>
                          <td>08h30</td>
                          <td><a href="{{'enregistrerfin'}}" type="button" class="btn btn-success btn-md">Finaliser</a></td>
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