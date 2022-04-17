@extends('layouts.app')
@extends('app')

@section('content')
<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                        <div class="main-left-sidebar no-margin">
                            <div class="user-data full-width">
                                <div class="user-profile">
                                    <div class="username-dt">
                                        <div class="usr-pic">
                                            <img src="{{url(Auth::user()->profile)}}"
                                            style="
                                            width: 100px;
                                            height: 100px;
                                            ">
                                        </div>
                                    </div><!--username-dt end-->
                                    <div class="user-specs">
                                        <h3>{{Auth::user()->prenom.' '.Auth::user()->nom}}</h3>
                                        <span>Guide touristique à l'ouest Cameroun</span>
                                    </div>
                                </div><!--user-profile end-->
                                <ul class="user-fw-status">
                                    <li>
                                        <h4>J'aime</h4>
                                        <span>{{$note}}</span>
                                    </li>
                                    <li>
                                        <h4>Commentaire</h4>
                                        <span>{{$commentaire}}</span>
                                    </li>
                                    <li>
                                        <a href="{{url('users/'. Auth::user()->id)}}" title="">Mon profile</a>
                                    </li>
                                </ul>
                            </div><!--user-data end-->
                            <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3>Suggestions</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div><!--sd-title end-->
                                <div class="suggestions-list">

                                    @if ($users)
                                        @foreach ($users as $user)
                                            @if ($user->id == Auth::id())

                                            @else
                                            <div class="suggestion-usd">
                                                <img src="{{ url($user->profile) }}" style="width: 40px;" alt="">
                                                <div class="sgt-text">
                                                    <h4>{{$user->prenom.' '.$user->nom}}</h4>
                                                    <span>Guide touristique</span>
                                                </div>
                                                <span><a href="{{url('users/'. $user->id)}}"><i class="la la-plus"></i></a></span>
                                            </div>
                                            @endif

                                        @endforeach
                                    @else

                                    @endif

                                    <div class="view-more">
                                        <a href="#" title="">View More</a>
                                    </div>
                                </div><!--suggestions-list end-->
                            </div><!--suggestions end-->
                            <div class="tags-sec full-width">
                                <ul>
                                    <li><a href="#" title="">Help Center</a></li>
                                    <li><a href="#" title="">About</a></li>
                                    <li><a href="#" title="">Privacy Policy</a></li>
                                    <li><a href="#" title="">Community Guidelines</a></li>
                                    <li><a href="#" title="">Cookies Policy</a></li>
                                    <li><a href="#" title="">Career</a></li>
                                    <li><a href="#" title="">Language</a></li>
                                    <li><a href="#" title="">Copyright Policy</a></li>
                                </ul>
                                <div class="cp-sec">
                                    <img src="images/logo2.png" alt="">
                                    <p><img src="images/cp.png" alt="">Copyright 2021</p>
                                </div>
                            </div><!--tags-sec end-->
                        </div><!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-6 col-md-8 no-pd">
                        <div class="main-ws-sec">
                            <div class="post-topbar">
                                <div class="user-picy">
                                    Sites Touristiques
                                </div>
                            </div><!--post-topbar end-->
                            @if ($sites->count() > 0)
                                @foreach ($sites as $site)
                                    <div class="posts-section">
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <a href="{{url('users/'. $site->uid)}}" title="">
                                                <div class="usy-dt">
                                                    <img src="{{url($site->poster_profile)}}" style="width: 40px; height: 40px;" alt="">
                                                    <div class="usy-name">
                                                        <h3>{{$site->poster_pname.' '.$site->poster_name}}</h3>
                                                        <span><i class="fa fa-clock-o"> {{$site->created_at->diffForHumans()}}</i></span>
                                                    </div>
                                                </div>
                                                </a>
                                                <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
                                                        <li><a href="#" title="">Edit Post</a></li>
                                                        <li><a href="#" title="">Unsaved</a></li>
                                                        <li><a href="#" title="">Unbid</a></li>
                                                        <li><a href="#" title="">Close</a></li>
                                                        <li><a href="#" title="">Hide</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="epi-sec">
                                                <ul class="bk-links">
                                                    <li><a href="mailto:{{$site->poster_mail}}" title=""><i class="la la-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>{{$site->nom}}</h3>
                                                <ul class="job-dt">
                                                    <li><a href="#" title=""><i class="fa fa-map-marker"> </i>{{$site->ville}}</a></li>
                                                </ul>
                                                <div class="img-responsive" style="width: 100%; height:250px; overflow: hidden;">
                                                    <img class="img-responsive" style="width: 100%;" src="{{url($site->images)}}" alt="" srcset="">
                                                </div>
                                                <p>{{ $site->description }}... <a href="#" title="">view more</a></p>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="#"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                    </li>
                                                </ul>
                                                <a href="{{ url('users/'.$site->uid.'#avis') }}" title="" class="com"><img src="images/com.png" alt=""> Comment</a>
                                            </div>
                                        </div><!--post-bar end-->
                                    </div><!--posts-section end-->
                                @endforeach
                            @else
                                <div class="posts-section">
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            Pas de sites touristique disponibles...
                                        </div>
                                    </div>
                                </div>

                            @endif

                        </div><!--main-ws-sec end-->
                    </div>
                    <div class="col-lg-3 pd-right-none no-pd">
                        <div class="right-sidebar">
                            <div class="widget widget-about">
                                <img src="{{url('assets/images/logon.png')}}" width="150" alt="">
                                <h3> I-tourist</h3>
                                <span>Le tourisme à porter de main</span>
                                <div class="sign_link">

                                    <a href="#" title="">En savoir plus</a>
                                </div>
                            </div><!--widget-about end-->
                            <div class="widget suggestions full-width">
                                <div class="sd-title">
                                    <h3>Vitrine souvenir</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div><!--sd-title end-->
                                <div class="suggestions-list">

                                    @if ($articles && $articles->count() > 0)
                                        @foreach ($articles as $article)
                                            <div class="suggestion-usd">
                                                <img src=" {{ url($article->images) }}" style="width: 40px;" alt="">
                                                <div class="sgt-text">
                                                    <h4>{{ $article->nom }}</h4>
                                                    <span>Estimer à: {{ $article->estimation }} XFA</span>
                                                </div>
                                                <span><i class="la la-eye"></i></span>
                                            </div>
                                        @endforeach
                                    @else
                                            <span class="invalid-feedback">!Pas d'article pour le moment</span>
                                    @endif
                                    <div class="view-more">
                                        <a href="#" title="">View More</a>
                                    </div>
                                </div><!--suggestions-list end-->
                            </div>
                            <div class="widget widget-jobs">
                                <div class="sd-title">
                                    <h3>Top 5 des Guides</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <div class="jobs-list">

                                    @foreach ($users as $us)
                                        <div class="job-info">
                                            <div class="job-details">
                                                <h3> {{$us->prenom.' '.$us->nom}} </h3>
                                                <p> {{$us->bio}} </p>
                                            </div>
                                            <div class="hr-rate">
                                                <span class="text-xs text-muted">suivre</span>
                                            </div>
                                        </div><!--job-info end-->
                                    @endforeach

                                </div><!--jobs-list end-->
                            </div><!--widget-jobs end-->
                            <div class="widget widget-jobs">
                                <div class="sd-title">
                                    <h3>Most Viewed This Week</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <div class="jobs-list">
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior Product Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior UI / UX Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Junior Seo Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                </div><!--jobs-list end-->
                            </div><!--widget-jobs end-->

                        </div><!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>
@endsection
