@extends('templates.app')

@section('document')

<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Créer un produit</h4>
                  
                  <form class="forms-sample" method="POST" action="{{'produit'}}">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nom du produit</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="prod_nom" placeholder="Nom du produit">
                    </div>
           
                    <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                    <button class="btn btn-light">Annuler</button>
                  </form>
                </div>
              </div>
            </div>  </div>  </div>  </div>
@endsection