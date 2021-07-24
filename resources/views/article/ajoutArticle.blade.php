@extends('app')

@section('content')

<div class="row align-items-center">
    <div class="col-md-12">
        <div class="d-flex justify-content-center h-100">

            <div class="col-md-10 d-flex flex-column">
                @if (session('message_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session('message_success') }}</strong>
                  </div>
                @else

                @endif

                <script>
                  $(".alert").alert();
                </script>
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        Ajouter des articles
                        <div class="pull-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                                +
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Liste( {{ $count }} element(s))</h3>
                        @if ($count > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>nom</th>
                                    <th>estimation(FCFA)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($article as $art)

                                    <tr>
                                        <td scope="row">{{ $art->id}}</td>
                                        <td> {{ $art->nom }} </td>
                                        <td> {{ $art->estimation }} </td>
                                        <td>
                                            <a href="{{url('tourisme/article/edit-article/'.$art->id)}}" class="btn btn-primary"><i class="fas fa fa-edit"></i></a>
                                            <a class="btn btn-danger" onclick="deleteConfirmation('./delete-article/'+{{$art->id}},'article')">
                                                        <i class="fas fa fa-trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else

                            <h4 class="card-text text-center text-muted">Pas d'artilce...</h4>

                        @endif
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-center text-muted text-align-center">
                        <p class="card-text">Pas plus d'article, <div class="btn btn-link" data-toggle="modal" data-target="#modelId">Ajoutez-en?</div></p>
                    </div>
                </div>

            </div>




        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title">Ajouter article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{url('tourisme/article/add-article')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="container col-lg-12 pb-3">
                            <label for="nom" class="font-weight-bold pb-1">Nom:</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder="nom de l'article">
                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nom requis</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="container col-lg-12 pb-3">
                            <label for="desc" class="font-weight-bold pb-1">description:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="desc" placeholder="description de l'article"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Description requise</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="container col-lg-12 pb-3">
                            <label for="estmation" class="font-weight-bold pb-1">estimation :</label><small class="pull-right text-muted font-weight-light">[0 - 1 000 000FCFA]</small>
                            <input type="number" class="form-control @error('estimation') is-invalid @enderror" name="estimation" id="estimation" min="0" max="1000000">
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
</div>

    @include('scripts.swallcall')

@endsection
