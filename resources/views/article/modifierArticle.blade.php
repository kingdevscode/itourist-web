@extends('app')

@section('content')

<div class="row align-items-center">
    <div class="col-md-12">
        <div class="d-flex justify-content-center h-100">

            <div class="col-md-10">
                <a href="{{ url('tourisme/article/create-article') }}" title="Retourner a la liste" class="btn btn-link"><i class="fas fa fa-arrow-left" aria-hidden="true"></i></a>
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        Modifier l'article
                        <div class="pull-right">
                            <!-- Button trigger modal -->
                            @if ($errors->has('images') || $errors->has('nom') || $errors->has('estimation') || $errors->has('description') || $errors->has('categorie_id'))
                                <span class="badge badge-pill badge-danger" data-toggle="tooltip" data-placement="top" title="Une erreur est survenue lors de la modification"> ! </span>
                            @endif
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                                <i class="fas fa fa-edit"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Informations</h3>
                        @if (isset($article))
                            <div class="list">
                                <div class="card col-md-6 mx-auto">
                                        <div class="card-header-img">
                                            <img src="{{url($article->images)}}" width="100%" class="rounded">
                                        </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Nom: {{ $article->nom }}</h4>
                                        <p class="list-item"> <span class="font-weight-bold">description:</span> {{ $article->description }}</p>
                                        <p class="list-item"> <span class="font-weight-bold">estimation:</span> {{ $article->estimation }} fcfa</p>
                                    </div>
                                </div>

                            </div>
                        @else

                            <p class="card-text">Pas de données</p>

                        @endif
                    </div>
                    <div class="card-footer text-muted">
                        Footer
                    </div>
                </div>
                {{--
                <div class="card col-md-12">
                    <div class="card-header">
                        Ajouter des villes
                    </div>
                    <div class="card-body" style="margin-bottom: 10%">

                        <div class="">
                            <a class="post_project btn btn-danger active" href="#" title="">+</a>
                        </div>
                    </div>
                </div> --}}

            </div>




        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Editer l'article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{url('tourisme/article/update-article/'.$article->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="container col-lg-12 pb-3">
                            <label for="nom" class="font-weight-bold pb-1">Nom:</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" value="{{$article->nom}}" name="nom" id="nom" placeholder="nom de l'article">
                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nom requis</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="container col-lg-12 pb-3">
                            <label for="desc" class="font-weight-bold pb-1">description:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" value="{{$article->description}}" name="description" id="desc" placeholder="description de l'article"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Description requise</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="container col-lg-12 pb-3">
                            <label for="estmation" class="font-weight-bold pb-1">estimation :</label><small class="pull-right text-muted font-weight-light">[0 - 1 000 000FCFA]</small>
                            <input type="number" class="form-control @error('estimation') is-invalid @enderror" value="{{$article->estimation}}" name="estimation" id="estimation" min="0" max="1000000">
                            @error('estimation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Estimation invalide</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="container col-lg-12 pb-3">
                            <label for="img" class="font-weight-bold pb-1">Image:</label>
                            <input type="file" name="images" class="form-control @error('images') is-invalid @enderror"  id="img">
                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Image requise</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="container col-lg-12 pb-3">
                            <label for="cat" class="font-weight-bold pb-1">Categorie:</label>
                            <select name="categorie_id" class="form-control @error('categorie_id') is-invalid @enderror" id="cat">
                                <option value="">--selectionner une categorie--</option>
                                @foreach ($categorie as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                                @endforeach
                            </select>
                            @error('categorie_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>selectionner une categorie pour l'article</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="suubmit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

@include('scripts.swallcall')

@endsection
