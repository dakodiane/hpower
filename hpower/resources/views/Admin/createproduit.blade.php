@extends('templates.app')

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
<main class="main-panel">

    <div class="container-fluid py-4">
        <div class="row">

            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 mb-4 d-flex align-items-center justify-content-between flex-wrap">
                        <h6>Liste des produits</h6>
                        <div class="buttons d-flex align-items-center">
                            <!--     <form class="d-flex align-items-center" method="get" action="">
                                <input type="text" name="search" class="form-control mx-2" placeholder="Rechercher">
                                <button class="btn btn-primary my-0 d-flex me-2" type="submit" role="button"><i class="fa fa-search me-2"></i> Filter</button>
                            </form>-->
                            <a class="btn btn-success my-0 d-flex" href="{{'enregistrerproduit'}}" type="button" role="button">
                                <i class="fa fa-plus me-2"></i>
                                Ajouter
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-2 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nom du produit
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Quantité Totale Transportée(en tonne)

                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produits as $produit)
                                    <tr class="px-2">
                                        <td>
                                            <div>
                                                <p class="text-xs font-weight-bold mb-0">{{ $produit->prod_nom }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $produit->totalPoidsNet }}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                    @if ($produit->active == 1)
                                                <form method="POST" action="{{ route('produit.deactivate', ['id' => $produit->id]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary" style="background-color: red;">Désactiver</button>
                                                </form>
                                                @else
                                                <form method="POST" action="{{ route('produit.activate', ['id' => $produit->id]) }}">
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
</main>
@endsection