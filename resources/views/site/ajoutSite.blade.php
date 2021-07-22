@include('header')

<body style="height: 100%;">

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-center h-100">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="acc-setting">
                            <div class="card-header" style="background-color: #e44d3a; color: white">
                                <h3 class="col text-center">Inscrire un site touristique</h3>
                            </div>
                            <br>
                            <div class="row">
                                <img  class="rounded mx-auto d-block" src="{{url('assets/images/logon.png')}}" style="width: 100px;" alt="">
                            </div>
                            <form method="POST" action="{{ url('tourisme/site/create-site') }}">
                                @csrf
                                <br>
                                <div class="form-group row">
                                    <div class="container">
                                        <label for="nom">Nom*</label>
                                        <input id="nom" type="text" placeholder="nom" class="form-control @error('nom') is-invalid
                                        @enderror" name="nom" required autocomplete="current-nom">
                                    </div>
                                </div>
                                <br>
                                
                                <div class="form-group row">
                                    <div class="container">
                                        <label for="ville">Ville*</label>
                                       <select name="ville" id="ville" class="form-control @error('ville') is-valid
                                       @enderror">
                                       @foreach($ville as $element)
                                        <option value=" {{$element->id}} "> {{$element->nom}} </option>
                                       @endforeach
                                       </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="container">
                                        <label for="categorie">Categorie*</label>
                                       <select name="categorie" id="categorie" class="form-control @error('categorie') is-valid
                                       @enderror">
                                       @foreach($categorie as $elem)
                                        <option value=" {{$element->id}} "> {{$elem->nom}} </option>
                                       @endforeach
                                       </select>
                                       </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="container">
                                        <label for="images">Image*</label>
                                       <input type="file" name="images" id="images" accept="image"  class="form-control @error('images') is-valid
                                       @enderror">
                                    </div>
                                </div>
                                <br>
                               
                                       <br>
                                <div class="row">
                                    <div class="form-group container">
                                        <label for="description">Description*</label>
                                       <textarea name="description" id="description" placeholder="description" class="form-control @error('description') is-valid
                                       @enderror" required autocomplete="current-nom"></textarea>
                                    </div>
                                </div>
                                <br>
                                       
                                <div class="form-group row mb-0 pull-right">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ajouter') }}
                                </button>

                               
                            </div>
                        </div>
                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
