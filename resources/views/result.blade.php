@extends('app')

@section('content')

    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-md-12 no-pd">
                        <div class="col-md-8 no-pd mx-auto">
                            <div class="main-ws-sec">
                                {{-- debut affichage des users --}}



                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Resultats de la recheche pour <span class="text-primary"> {{$search}} </span></h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div><!--sd-title end-->
                                </div>

                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Total <span class="text-primary"> {{$users->count() + $sites->count() + $articles->count()}} résultat(s)</span></h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div><!--sd-title end-->
                                </div>

                                <div class="suggestions full-width">
									<div class="sd-title">
											<h3>{{$users->count()}} utilisateur(s)</h3>
											<i class="la la-ellipsis-v"></i>
									</div><!--sd-title end-->
									<div class="suggestions-list">

                                        @if ($users && $users->count() > 0)
                                            @foreach ($users as $us)
                                            <div class="suggestion-usd">
												<img src="{{url($us->profile)}}" width="40" alt="">
												<div class="sgt-text">
													<h4><a href="{{url('users/'.$us->id)}}">{{$us->prenom.' '.$us->nom}}</a></h4>
													<span>Guide</span>
												</div>
												<span></span>
											</div>
                                            @endforeach
                                        @else
                                        <div class="sgt-text">
											<p class="mx-4 text-danger">Aucun Utilisateur trouver</p>
									    </div><!--sd-title end-->
                                        @endif



									</div><!--suggestions-list end-->
                                </div>

                                <div class="suggestions full-width">
									<div class="sd-title">
											<h3>{{$sites->count()}} site(s) touristique(s)</h3>
											<i class="la la-ellipsis-v"></i>
									</div><!--sd-title end-->
									<div class="suggestions-list">

                                        @if ($sites && $sites->count() > 0)
                                            @foreach ($sites as $st)
                                            <div class="job_descp">
                                                <h3>{{$st->nom}}</h3>

                                                <ul class="job-dt">
                                                    <li><a href="#" title=""><i class="fa fa-map-marker"> </i> {{$st->ville}}</a></li>
                                                    <li><span>{{$st->categorie}}</span></li>
                                                </ul>
                                                <div class="img-responsive" style="width: 100%; height:250px; overflow: hidden;">
                                                    <img class="img-responsive" style="width: 100%;" src="{{url($st->images)}}" alt="" srcset="">
                                                </div>
                                                <p>{{$st->description}}... <a href="#" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    par: <li><a href="{{url('users/'.$st->uid)}}" title="">{{$st->poster_pname.' '.$st->poster_name}}</a></li>
                                                    <li>{{$st->created_at->diffForHumans()}}</li>
                                                </ul>
                                            </div>
                                            @endforeach
                                        @else
                                        <div class="sgt-text">
											<p class="mx-4 text-danger">Aucun site touristique trouver</p>
									    </div><!--sd-title end-->
                                        @endif



									</div><!--suggestions-list end-->
                                </div>

                                <div class="suggestions full-width">
									<div class="sd-title">
											<h3>{{$articles->count()}} article(s)</h3>
											<i class="la la-ellipsis-v"></i>
									</div><!--sd-title end-->
									<div class="suggestions-list">

                                        @if ($articles && $articles->count() > 0)
                                            @foreach ($articles as $art)
                                            <div class="suggestion-usd">
												<img src="{{url($art->images)}}" width="40" alt="">
												<div class="sgt-text">
													<h4><a href="{{url('users/'.$art->uid)}}">{{$art->nom}}</a></h4>
													<span>{{$art->description}}</span>
												</div>
												<span>{{$art->estimation}}XFA</span>
											</div>
                                            @endforeach
                                        @else
                                        <div class="sgt-text">
											<p class="mx-4 text-danger">Aucun article trouver</p>
									    </div><!--sd-title end-->
                                        @endif



									</div><!--suggestions-list end-->


@endsection
