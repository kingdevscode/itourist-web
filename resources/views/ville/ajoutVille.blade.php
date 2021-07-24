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
                        Ajouter des villes
                        <div class="pull-right">
                            <a class="post_project btn btn-danger active" href="#" title="">+</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Liste</h3>
                        @if (isset($villes))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>nom</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($villes as $ville)

                                    <tr>
                                        <td scope="row">{{ $ville->id}}</td>
                                        <td> {{ $ville->nom }} </td>
                                        <td>
                                            <a href="{{url('tourisme/ville/edit-ville/'.$ville->id)}}" class="btn btn-primary"><i class="fas fa fa-edit"></i></a>
                                            <a class="btn btn-danger" onclick="deleteConfirmation('./delete-ville/'+{{$ville->id}})">
                                                        <i class="fas fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else

                            <p class="card-text">Pas de villes, <div class="post_project active btn btn-link">Ajoutez-en</div></p>

                        @endif
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-center text-muted text-align-center">
                        <p class="card-text">Pas plus de villes, <div class="post_project active btn btn-link">Ajoutez-en?</div></p>
                    </div>
                </div>

            </div>




        </div>
    </div>
</div>

<div class="post-popup pst-pj">
    <div class="post-project">
        <h3>Ajouter une ville</h3>
        <div class="post-project-fields">
            <form action="{{url('tourisme/ville/add-ville')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <label for="nom">Nom:</label>
                        <input type="text" name="nom" id="nom" placeholder="nom de la ville">
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit">Ajouter</button></li>
                            <li><button type="reset">Cancel</a></li>
                        </ul>
                    </div>
                </div>
            </form>
            <form>
        </div><!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div><!--post-project end-->
</div><!--post-project-popup end-->

    @include('scripts.swallcall')

@endsection
