@extends('app')

@section('content')

<div class="row align-items-center">
    <div class="col-md-12">
        <div class="d-flex justify-content-center h-100">

            <div class="col-md-10">
                <a href="{{ url('tourisme/ville/create-ville') }}" title="Retourner a la liste" class="btn btn-link"><i class="fas fa fa-arrow-left" aria-hidden="true"></i></a>
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        Modifier la ville
                        <div class="pull-right">
                            <a class="post_project btn btn-primary active" href="#" title=""><i class="fas fa fa-edit"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Informations</h3>
                        @if (isset($ville))
                            <u>Nom:</u> {{ $ville->nom }}
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

<div class="post-popup pst-pj">
    <div class="post-project">
        <h3>Modifier</h3>
        <div class="post-project-fields">
            <form action="{{url('tourisme/ville/update-ville/'.$ville->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <label for="nom">Nom:</label>
                        <input type="text" id="nom" name="nom" value="{{ $ville->nom }}" placeholder="nom de la ville">
                    </div>
                    <div>
                        <ul class="">
                            <li><button class="bg-success active" type="submit">Modifier</button></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div><!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div><!--post-project end-->
</div><!--post-project-popup end-->
@endsection
