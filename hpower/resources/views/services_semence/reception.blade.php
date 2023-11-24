@extends('templates.semlayout')

@section('document')
<div>
    @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li> 
      @endforeach                
    </ul>
    @endif
  </div>

<div id="booking" class="d-flex justify-content-center" style="background: url('{{ asset('images/hpower.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-blend-mode: darken; backdrop-filter: blur(50px); background-color: rgba(0, 0, 0, 0.1);">
    <div class="section-center">
        <div class="container" style="padding-top: 50px">
            <div class="row">
                <div class="col-md-5">
                    <div class="booking-cta" style="padding-top: 50px">
                        <br><h1 style="color: navy;">ENREGISTREMENT DES RECEPTIONS </h1>                        
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <div class="booking-form">
 
                        <form method="post" action="{{ route('analyse') }}" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="semence" id="villes" value="{{ old('semence') }}">
                                            @foreach($produits as $produit)
                                            <option value="{{$produit->prod_nom}}">{{$produit->prod_nom}}</option>
                                            @endforeach                      
                                        </select>
                                        <span class="select-arrow"></span>
                                        <span class="form-label">Semences</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="ql" placeholder="11.00" value="{{ old('ql') }}">
                                        <span class="form-label">Quantité livrée</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="fournisseur" placeholder="SODECO" value="{{ old('fournisseur') }}">
                                        <span class="form-label">Fournisseur</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="magasin" value="{{ old('magasin') }}">
                                        <span class="form-label">Magasin de déchargement</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" name="nature" value="{{ old('nature') }}">
                                            <option value="certifiée DPV">certifiée DPV</option>
                                            <option value="bio">bio</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                        <span class="form-label">Nature de la semence</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="lieu" id="villes" value="{{ old('lieu') }}">
                                            <option value="Cotonou">Cotonou</option>
                                            <option value="Abomey-Calavi">Abomey-Calavi</option>
                                            <option value="Porto-Novo">Porto-Novo</option>
                                            <option value="Parakou">Parakou</option>
                                            <option value="Djougou">Djougou</option>
                                            <option value="Bohicon">Bohicon</option>
                                            <option value="Natitingou">Natitingou</option>
                                            <option value="Savé">Savé</option>
                                            <option value="Abomey">Abomey</option>
                                            <option value="Nikki">Nikki</option>
                                            <option value="Lokossa">Lokossa</option>
                                            <option value="Ouidah">Ouidah</option>
                                            <option value="Dogbo-Tota">Dogbo-Tota</option>
                                            <option value="Kandi">Kandi</option>
                                            <option value="Cové">Cové</option>
                                            <option value="Malanville">Malanville</option>
                                            <option value="Pobé">Pobé</option>
                                            <option value="Kérou">Kérou</option>
                                            <option value="Savalou">Savalou</option>
                                            <option value="Sakété">Sakété</option>
                                            <option value="Comè">Comè</option>
                                            <option value="Bembéréké">Bembéréké</option>
                                            <option value="Bassila">Bassila</option>
                                            <option value="Banikoara">Banikoara</option>
                                            <option value="Kétou">Kétou</option>
                                            <option value="Dassa-Zoumè">Dassa-Zoumè</option>
                                            <option value="Tchaourou">Tchaourou</option>
                                            <option value="Allada">Allada</option>
                                            <option value="Aplahoué">Aplahoué</option>
                                            <option value="Tanguiéta">Tanguiéta</option>
                                            <option value="N'Dali">N'Dali</option>
                                            <option value="Segbana">Segbana</option>
                                            <option value="Athiémé">Athiémé</option>
                                            <option value="Grand Popo">Grand Popo</option>
                                            <option value="Kouandé">Kouandé</option>                                                
                                        </select>
                                        <span class="select-arrow"></span>
                                        <span class="form-label">Lieu de production</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="pl" placeholder="en FCFA">
                                        <span class="form-label">Prix de livraison</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="pu" placeholder="en FCFA">
                                        <span class="form-label">Prix unitaire</span>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="transact" disabled>
                                        <span class="form-label">N° Transaction</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="bord" disabled>
                                        <span class="form-label">Bordereau</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="moyen" placeholder="">
                                        <span class="form-label">Moyen de livraison</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="file" name="matricul" placeholder="Télécharger un image">
                                        <span class="form-label">Immatriculation du moyen</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <input class="form-control" type="hidden" name="date" value="{{now()->toDateString('Y-m-d')}}">
                                <button class="btn btn-danger" type="submit">VALIDER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
  @endsection