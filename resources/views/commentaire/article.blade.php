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
                                        <h3>{{Auth::user()->nom.' '.Auth::user()->prenom}}</h3>
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
                                    {{-- verifier commentaireArticleController --}}
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
                            @if ($article)
                                    <div class="posts-section">
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <a href="{{url('users/'. $article->uid)}}" title="">
                                                <div class="usy-dt">
                                                    <img src="{{url($article->poster_profile)}}" style="width: 40px; height: 40px;" alt="">
                                                    <div class="usy-name">
                                                        <h3>{{$article->poster_name.' '.$article->poster_pname}}</h3>
                                                        <span><img src="images/clock.png" alt="">{{$article->created_at->diffForHumans()}}</span>
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
                                                    <li><a href="mailto:{{$article->poster_mail}}" title=""><i class="la la-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>{{$article->nom}}</h3>
                                                <ul class="job-dt">
                                                    <li><a href="#" title=""><i class="fa fa-map-marker"> </i>{{$article->ville}}</a></li>
                                                </ul>
                                                <div class="img-responsive" style="width: 100%; height:250px; overflow: hidden;">
                                                    <img class="img-responsive" style="width: 100%;" src="{{url($article->images)}}" alt="" srcset="">
                                                </div>
                                                <p>{{ $article->description }}... <a href="#" title="">view more</a></p>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="#"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="post-comment">
                                                <div class="cm_img">
                                                    <img src="{{url(Auth::user()->profile)}}" style="width: 40px; height: 40px;" alt="">
                                                </div>
                                                <div class="comment_box">
                                                    <form method="POST" action="{{ url('tourisme/commentaire/add-commentaire-article/'.$article->id) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="text" name="texte" minlength="1" style="color:#222;" placeholder="Laisser un commentaire">
                                                        <button type="submit"><i class="fa fa-send"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!--post-bar end-->
                                    </div><!--posts-section end-->
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
                                <img src="images/wd-logo.png" alt="">
                                <h3>Track Time on Workwise</h3>
                                <span>Pay only for the Hours worked</span>
                                <div class="sign_link">
                                    <h3><a href="#" title="">Sign up</a></h3>
                                    <a href="#" title="">Learn More</a>
                                </div>
                            </div><!--widget-about end-->
                            <div class="widget widget-jobs">
                                <div class="sd-title">
                                    <h3>Top 5 Guides</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <div class="jobs-list">
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
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior PHP Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior Developer Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
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
                            <div class="widget suggestions full-width">
                                <div class="sd-title">
                                    <h3>Most Viewed People</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div><!--sd-title end-->
                                <div class="suggestions-list">
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Poonam</h4>
                                            <span>Wordpress Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Bill Gates</h4>
                                            <span>C &amp; C++ Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="view-more">
                                        <a href="#" title="">View More</a>
                                    </div>
                                </div><!--suggestions-list end-->
                            </div>
                        </div><!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>
@endsection
