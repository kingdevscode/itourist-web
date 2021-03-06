@extends('layouts.app')
@extends('app')

@section('content')
        <section class="cover-sec">
            {{-- <img src="http://via.placeholder.com/1600x400" alt=""> --}}
            <img src="{{url($user->couverture)}}"
                                                style="
                                                width: 100%;
                                                height: 300px;
                                                " alt="photo de couverture">
            @if ($user->id == Auth::id())
               <a href="#" title="" style="right: 90.5px;"><i class="fa fa-camera"></i>modifier</a>
            @endif


        </section>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        {{-- <img src="http://via.placeholder.com/170x170" alt=""> --}}
                                        <img src="{{url($user->profile)}}"
                                            style="
                                            width: 200px;
                                            height: 200px;
                                            clip-path:ellipse(50% 50%);
                                            ">
                                            @if ($user->id == Auth::id())
                                                <a href="#" title=""><i class="fa fa-camera"></i></a>
                                            @endif

                                    </div><!--user-pro-img end-->
                                    <div class="user_pro_status">
                                        <ul class="flw-status">
                                            @if ($user['bio'])
                                                <ul class="flw-status">
                                                    @if ($user['bio'])
                                                        <li>
                                                            <p>{{$user->bio}}</p>
                                                        </li>
                                                    @endif
                                                </ul>
                                            @endif
                                            <ul class="user-fw-status">
                                                <li>
                                                    <h4>J'aime</h4>
                                                    <span>{{$nbNotes}}</span>
                                                </li>
                                                <li>
                                                    <h4>Commentaire</h4>
                                                    <span>{{$nbCommentaires}}</span>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div><!--user_pro_status end-->
                                </div><!--user_profile end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>People Viewed Profile</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div><!--sd-title end-->
                                    <div class="suggestions-list">
                                        @if ($users)
                                        @foreach ($users as $item)
                                            @if ($item->id == Auth::id())
                                                {{-- s'il s'agit de l'utilisateur connect?? on ne l'affiche pas --}}
                                            @else
                                                <div class="suggestion-usd">
                                                    <img src="{{ url($item->profile) }}" style="width: 40px;" alt="">
                                                    <div class="sgt-text">
                                                        <h4>{{$item->prenom.' '.$item->nom}}</h4>
                                                        <span>Guide touristique</span>
                                                    </div>
                                                    <span><a href="{{url('users/'. $item->id)}}"><i class="la la-plus"></i></a></span>
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
                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec">
                                    <h3>{{($user->prenom." ".$user->nom)}}</h3>
                                    <div class="star-descp">
                                        <span>Guide touristique</span>
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div><!--star-descp end-->
                                    <div class="tab-feed st2">
                                        <ul>
                                            <li data-tab="info-dd" class="active">
                                                <a href="#" title="">
                                                    <img src="images/ic1.png" alt="">
                                                    <span>Infos</span>
                                                </a>
                                            </li>
                                            <li data-tab="portfolio-dd">
                                                <a href="#" title="">
                                                    <img src="images/ic2.png" alt="">
                                                    <span>Sites</span>
                                                </a>
                                            </li>
                                            <li data-tab="saved-jobs">
                                                <a href="#avis" title="">
                                                    <img src="images/ic4.png" alt="">
                                                    <span>Avis</span>
                                                </a>
                                            </li>
                                            <li data-tab="my-bids">
                                                <a href="#" title="">
                                                    <img src="images/ic5.png" alt="">
                                                    <span>Articles</span>
                                                </a>
                                            </li>
                                            <li data-tab="payment-dd">
                                                <a href="#" title="">
                                                    <img src="images/ic5.png" alt="">
                                                    <span>Logement</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- tab-feed end-->
                                </div><!--user-tab-sec end-->
                                <div class="product-feed-tab current animated fadeIn" id="info-dd">
                                   @if ($user['bio'])
                                        <div class="user-profile-ov">
                                            <h3>
                                                <a href="#" title="" class="overview-open">Bio</a>
                                                @if ($user->id == Auth::id())
                                                    <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a>
                                                @endif

                                            </h3>
                                            <p>{{$user->bio}}</p>
                                        </div><!--user-profile-ov end-->
                                   @endif

                                    <div class="user-profile-ov st2">
                                        <h3><a href="#" title="" class="esp-bx-open">T??l??phone</a>
                                            @if ($user->id == Auth::id())
                                                <a href="#" title="" class="esp-bx-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="esp-bx-open"><i class="fa fa-plus-square"></i></a>
                                            @endif

                                        </h3>
                                        <span>{{$user->tel}}</span>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="emp-open">Email</a>
                                            @if ($user->id == Auth::id())
                                            <a href="#" title="" class="emp-open"><i class="fa fa-pencil"></i></a>
                                            <a href="#" title="" class="emp-open"><i class="fa fa-plus-square"></i></a>
                                            @endif
                                        </h3>
                                        <span>{{$user->email}}</span>
                                    </div><!--user-profile-ov end-->
                                    @if ($user['ville'])
                                        <div class="user-profile-ov">
                                            <h3><a href="#" title="" class="lct-box-open">Ville</a>
                                                @if ($user->id == Auth::id())
                                                <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a>
                                                <a href="#" title="" class="lct-box-open"><i class="fa fa-plus-square"></i></a>
                                                @endif
                                            </h3>
                                            <p>{{$user->ville}}</p>
                                        </div><!--user-profile-ov end-->
                                    @endif
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="emp-open">Membre depuis</a> </h3>
                                        {{-- <span>{{$user->created_at->diffForHumans()}}</span> --}}
                                        <span>{{$user->created_at->format('D, d M Y')}}</span>
                                    </div><!--user-profile-ov end-->
                                </div>
                                <div class="product-feed-tab" id="info-dd">
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="overview-open">Overview</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. Nunc eu augue nec arcu efficitur faucibus. Aliquam accumsan ac magna convallis bibendum. Quisque laoreet augue eget augue fermentum scelerisque. Vivamus dignissim mollis est dictum blandit. Nam porta auctor neque sed congue. Nullam rutrum eget ex at maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget vestibulum lorem.</p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov st2">
                                        <h3><a href="#" title="" class="exp-bx-open">Experience </a><a href="#" title="" class="exp-bx-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="exp-bx-open"><i class="fa fa-plus-square"></i></a></h3>
                                        <h4>Web designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                        <h4>UI / UX Designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id.</p>
                                        <h4>PHP developer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
                                        <p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="ed-box-open">Education</a> <a href="#" title="" class="ed-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a></h3>
                                        <h4>Master of Computer Science</h4>
                                        <span>2015 - 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="lct-box-open">Location</a> <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a></h3>
                                        <h4>India</h4>
                                        <p>151/4 BT Chownk, Delhi </p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="skills-open">Skills</a> <a href="#" title="" class="skills-open"><i class="fa fa-pencil"></i></a> <a href="#"><i class="fa fa-plus-square"></i></a></h3>
                                        <ul>
                                            <li><a href="#" title="">HTML</a></li>
                                            <li><a href="#" title="">PHP</a></li>
                                            <li><a href="#" title="">CSS</a></li>
                                            <li><a href="#" title="">Javascript</a></li>
                                            <li><a href="#" title="">Wordpress</a></li>
                                            <li><a href="#" title="">Photoshop</a></li>
                                            <li><a href="#" title="">Illustrator</a></li>
                                            <li><a href="#" title="">Corel Draw</a></li>
                                        </ul>
                                    </div><!--user-profile-ov end-->
                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="saved-jobs">
                                        <div class="post-bar no-margin">
                                            <div class="job-status-bar">
                                                <ul class="like-com">

                                                    @if ($user->id == Auth::id())

                                                    @else
                                                        <form method="POST" action="{{ url('tourisme/note/add-note/'.$user->id) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="note" value="1">
                                                            <button type="submit">
                                                            <li>
                                                                <a><i class="la la-heart"></i>J'aime</a>
                                                                    <img src="images/liked-img.png" alt="">
                                                                    <span class="ml-1">{{$nbNotes}}</span>
                                                                </li>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    <li>
                                                        <a href="#" title="" class="com"><i class="fa fa-comment">Commentaires</i></a>
                                                        <img src="images/com.png" alt="">
                                                        <span class="ml-1">{{$nbCommentaires}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!--post-bar end-->
                                        <div class="comment-section">
                                            @foreach ($commentaires as $commentaire)
                                                <div class="comment-sec">
                                                    <ul>
                                                        <li>
                                                            <div class="comment-list">
                                                                <div class="bg-img">
                                                                    <img src="{{url($commentaire->profile)}}" style="width: 40px; height: 40px;" alt="">
                                                                </div>
                                                                <div class="comment">
                                                                    @if ($commentaire->uid == Auth::id())
                                                                    <h3>Moi</h3>
                                                                    @else
                                                                    <h3>{{$commentaire->user}}</h3>
                                                                    @endif

                                                                    <span><img src="images/clock.png" alt="">{{$commentaire->created_at->diffForHumans()}}</span>
                                                                    <p>{{$commentaire->texte}}</p>
                                                                    <a href="#" title=""><i class="fa fa-reply-all"></i>Repondre</a>
                                                                </div>
                                                            </div><!--comment-list end-->
                                                        </li>
                                                    </ul>
                                                </div><!--comment-sec end-->
                                            @endforeach
                                            <div class="post-comment">
                                                <div class="cm_img">
                                                    <img src="{{url(Auth::user()->profile)}}" style="width: 40px; height: 40px;" alt="">
                                                </div>
                                                <div class="comment_box">
                                                    <form method="POST" action="{{ url('tourisme/commentaire/add-commentaire/'.$user->id) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="text" name="texte" minlength="1" style="color:#222;" placeholder="Laisser un commentaire">
                                                        <button type="submit"><i class="fa fa-send"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!--comment-section end-->
                                    </div>
                                <div class="product-feed-tab" id="my-bids">
                                    <div class="portfolio-gallery-sec">
                                        @if ($user->id == Auth::id())
                                        <h3>Mes articles</h3>
                                        <p class="col ">
                                            <button class="btn btn-danger " data-toggle="modal" data-target="#article">
                                                <i class="fa fa-plus "></i>
                                            </button>
                                        </p>
                                        @else
                                        <h3>Articles</h3>
                                        @endif

                                        <div class="gallery_pf">
                                            <div class="row">

                                                @if (isset($articles) && $articles->count() > 0)
                                                    @foreach ($articles as $article)
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                            <div class="gallery_pt">
                                                                <img src="{{url($article->images)}}" alt="">
                                                                @if ($user->id == Auth::id())
                                                                    <a href="{{url('tourisme/article/edit-article/'.$article->id)}}" title="" style="transform: scale(2); color: #fff;"><i class="fa fa-edit"></i></a>
                                                                @else
                                                                    <a href="{{url('tourisme/article/show-article/'.$article->id)}}" title="" style="transform: scale(2); color: #fff;"><i class="fa fa-eye"></i></a>
                                                                @endif
                                                            </div><!--gallery_pt end-->
                                                        </div>
                                                    @endforeach
                                                @else
                                                        @if ($user->id == Auth::id())
                                                            <p class="d-flex align-items-center justify-content-center text-muted">Vous n'avez aucun article... ajoutez en</p>
                                                        @else
                                                            <p class="d-flex align-items-center justify-content-center text-muted">Ce guide n'a ajouter aucun article</p>
                                                        @endif

                                                @endif

                                            </div>
                                        </div><!--gallery_pf end-->
                                    </div><!--portfolio-gallery-sec end-->
                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="portfolio-dd">
                                    <div class="portfolio-gallery-sec">
                                        @if ($user->id == Auth::id())
                                        <h3>Mes sites touristiques</h3>
                                        <p class="col ">
                                            <button class="btn btn-danger " data-toggle="modal" data-target="#modelId">
                                                <i class="fa fa-plus "></i>
                                            </button>
                                        </p>
                                        @else
                                        <h3>Sites touristiques</h3>
                                        @endif

                                        <div class="gallery_pf">
                                            <div class="row">

                                                @if (isset($sites) && $sites->count() > 0)
                                                    @foreach ($sites as $site)
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                            <div class="gallery_pt">
                                                                <img src="{{url($site->images)}}" alt="">
                                                                @if ($user->id == Auth::id())
                                                                    <a href="{{url('tourisme/site/edit-site/'.$site->id)}}" title="" style="transform: scale(2); color: #fff;"><i class="fa fa-edit"></i></a>
                                                                @else
                                                                    <a href="{{url('tourisme/site/show-site/'.$site->id)}}" title="" style="transform: scale(2); color: #fff;"><i class="fa fa-eye"></i></a>
                                                                @endif
                                                            </div><!--gallery_pt end-->
                                                        </div>
                                                    @endforeach
                                                @else
                                                        @if ($user->id == Auth::id())
                                                            <p class="d-flex align-items-center justify-content-center text-muted">Vous n'avez aucun site... ajoutez en</p>
                                                        @else
                                                            <p class="d-flex align-items-center justify-content-center text-muted">Ce guide n'a ajouter aucun site</p>
                                                        @endif

                                                @endif

                                            </div>
                                        </div><!--gallery_pf end-->
                                    </div><!--portfolio-gallery-sec end-->
                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="payment-dd">
                                    <div class="billing-method">
                                        <ul>
                                            <li>
                                                <h3>Add Billing Method</h3>
                                                <a href="#" title=""><i class="fa fa-plus-circle"></i></a>
                                            </li>
                                            <li>
                                                <h3>See Activity</h3>
                                                <a href="#" title="">View All</a>
                                            </li>
                                            <li>
                                                <h3>Total Money</h3>
                                                <span>$0.00</span>
                                            </li>
                                        </ul>
                                        <div class="lt-sec">
                                            <img src="images/lt-icon.png" alt="">
                                            <h4>All your transactions are saved here</h4>
                                            <a href="#" title="">Click Here</a>
                                        </div>
                                    </div><!--billing-method end-->
                                    <div class="add-billing-method">
                                        <h3>Add Billing Method</h3>
                                        <h4><img src="images/dlr-icon.png" alt=""><span>With workwise payment protection , only pay for work delivered.</span></h4>
                                        <div class="payment_methods">
                                            <h4>Credit or Debit Cards</h4>
                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="cc-head">
                                                            <h5>Card Number</h5>
                                                            <ul>
                                                                <li><img src="images/cc-icon1.png" alt=""></li>
                                                                <li><img src="images/cc-icon2.png" alt=""></li>
                                                                <li><img src="images/cc-icon3.png" alt=""></li>
                                                                <li><img src="images/cc-icon4.png" alt=""></li>
                                                            </ul>
                                                        </div>
                                                        <div class="inpt-field pd-moree">
                                                            <input type="text" name="cc-number" placeholder="">
                                                            <i class="fa fa-credit-card"></i>
                                                        </div><!--inpt-field end-->
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="cc-head">
                                                            <h5>First Name</h5>
                                                        </div>
                                                        <div class="inpt-field">
                                                            <input type="text" name="f-name" placeholder="">
                                                        </div><!--inpt-field end-->
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="cc-head">
                                                            <h5>Last Name</h5>
                                                        </div>
                                                        <div class="inpt-field">
                                                            <input type="text" name="l-name" placeholder="">
                                                        </div><!--inpt-field end-->
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="cc-head">
                                                            <h5>Expiresons</h5>
                                                        </div>
                                                        <div class="rowwy">
                                                            <div class="row">
                                                                <div class="col-lg-6 pd-left-none no-pd">
                                                                    <div class="inpt-field">
                                                                        <input type="text" name="f-name" placeholder="">
                                                                    </div><!--inpt-field end-->
                                                                </div>
                                                                <div class="col-lg-6 pd-right-none no-pd">
                                                                    <div class="inpt-field">
                                                                        <input type="text" name="f-name" placeholder="">
                                                                    </div><!--inpt-field end-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="cc-head">
                                                            <h5>Cvv (Security Code) <i class="fa fa-question-circle"></i></h5>
                                                        </div>
                                                        <div class="inpt-field">
                                                            <input type="text" name="l-name" placeholder="">
                                                        </div><!--inpt-field end-->
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <h4>Add Paypal Account</h4>
                                        </div>
                                    </div><!--add-billing-method end-->
                                </div><!--product-feed-tab end-->
                            </div><!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">
                                <div class="message-btn">
                                    <a href="mailto:{{$user->email}}" title=""><i class="fa fa-envelope"></i> Message</a>
                                </div>
                                <div class="widget widget-portfolio">
                                    <div class="wd-heady">
                                        <h3>Portfolio</h3>
                                        <img src="images/photo-icon.png" alt="">
                                    </div>
                                    <div class="pf-gallery">
                                        <ul>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        </ul>
                                    </div><!--pf-gallery end-->
                                </div><!--widget-portfolio end-->
                            </div><!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    <footer>
        <div class="footy-sec mn no-margin">
            <div class="container">
                <ul>
                    <li><a href="#" title="">Help Center</a></li>
                    <li><a href="#" title="">Privacy Policy</a></li>
                    <li><a href="#" title="">Community Guidelines</a></li>
                    <li><a href="#" title="">Cookies Policy</a></li>
                    <li><a href="#" title="">Career</a></li>
                    <li><a href="#" title="">Forum</a></li>
                    <li><a href="#" title="">Language</a></li>
                    <li><a href="#" title="">Copyright Policy</a></li>
                </ul>
                <p><img src="images/copy-icon2.png" alt="">Copyright 2018</p>
                <img class="fl-rgt" src="images/logo2.png" alt="">
            </div>
        </div>
    </footer>

@endsection


@if ($user->id == Auth::id())

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un site</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{url('tourisme/site/add-site')}}" method="post" enctype="multipart/form-data">
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
                                @foreach ($cat_site as $cats)
                                    <option value="{{ $cats->id }}">{{ $cats->nom }}</option>
                                @endforeach
                            </select>
                            @error('categorie_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>selectionner une categorie pour ce site</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="container col-lg-12 pb-3">
                            <label for="vil" class="font-weight-bold pb-1">Ville:</label>
                            <select name="ville_id" class="form-control @error('ville_id') is-invalid @enderror" id="vil">
                                <option value="">--selectionner la ville--</option>
                                @foreach ($allVille as $vil)
                                    <option value="{{ $vil->id }}">{{ $vil->nom }}</option>
                                @endforeach
                            </select>
                            @error('ville_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>selectionner une ville pour ce site</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistere</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="article" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{url('tourisme/article/add-article')}}" method="post" enctype="multipart/form-data">
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
                            <label for="test" class="font-weight-bold pb-1">Estimation:</label>
                            <input type="number" class="form-control @error('estimation') is-invalid @enderror" name="estimation" id="est" min="0" max="1000000">
                            @error('estimation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Estimation requise</strong>
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
                                @foreach ($cat_art as $cats)
                                    <option value="{{ $cats->id }}">{{ $cats->nom }}</option>
                                @endforeach
                            </select>
                            @error('categorie_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>selectionner une categorie pour cet article</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistere</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endif

