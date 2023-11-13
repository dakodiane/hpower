@extends('templates.semlayout')

@section('document')
<div>
    @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li> 
      @endforeach                
    </ul>
  </div>

<div id="booking" class="d-flex justify-content-center" style="background: url('{{ asset('images/hpower.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-blend-mode: darken; backdrop-filter: blur(50px); background-color: rgba(0, 0, 0, 0.1);">
    <div class="section-center">
        <div class="container" style="padding-top: 50px">
            <div class="row">
                <div class="col-md-5">
                    <div class="booking-cta" style="padding-top: 50px">
                        <br><h1 style="color: navy;">ENREGISTREMENT DES SEMENCES </h1>                        
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <div class="booking-form">
                        <form method="post" action="{{ route('paie') }}">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Semences</span>
                                        <select class="form-control" name="semence" id="villes" value="{{ old('semence') }}">
                                            <option value="soja">sodja</option>
                                            <option value="cajou">cajou</option>
                                            <option value="riz">riz</option>
                                            <option value="coton">coton</option>
                                            <option value="Djougou">noix d'arnacarde</option>
                                            <option value="noix de palme">noix de palme</option>                      
                                        </select>
                                        <span class="select-arrow"></span>
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
                                        <input class="form-control" type="tel" name="fournisseur" placeholder="real madrid" value="{{ old('fournisseur') }}">
                                        <span class="form-label">Fournisseur</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="magasin" value="{{ old('magasin') }}">
                                        <span class="form-label">Magasin de vente</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Nature de la semence</span>
                                        <select class="form-control" name="nature" value="{{ old('nature') }}">
                                            <option value="certifiée DPV">certifiée DPV</option>
                                            <option value="bio">bio</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Lieu de production</span>
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
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="pvf" placeholder="en FCFA">
                                        <span class="form-label">Prix de vente fournisseur</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="phpg" placeholder="en FCFA">
                                        <span class="form-label">Prix de vente HPG</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="qv" placeholder="5.20 kg">
                                        <span class="form-label">Quantité vendue</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="recette" placeholder="en FCFA" disabled>
                                        <span class="form-label">Recette</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
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