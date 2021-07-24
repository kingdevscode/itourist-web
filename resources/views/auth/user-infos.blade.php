@extends('layouts.app')
@extends('app')
@section('content')
    <section class="cover-sec">
        {{-- <img src="http://via.placeholder.com/1600x400" alt=""> --}}
        <img src="{{url($user->couverture)}}"
                                            style="
                                            width: 1600px;
                                            height: 300px;
                                            padding-top: 0%;
                                            " alt="photo de couverture">
        <a href="#" title="" style="right: 90.5px;"><i class="fa fa-camera"></i>modifier</a>
    </section>
    <main>
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
                                        <a href="#" title=""><i class="fa fa-camera"></i></a>
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
                                            <br><br><br>
                                            <li>
                                                <a href="#"><i class="la la-heart"></i>J'aime</a>
                                                <img src="images/liked-img.png" alt="">
                                                <span class="ml-1">{{$nbNotes}}</span>
                                            </li>
                                            <li>
                                                <a href="#" title="" class="com"><i class="fa fa-comment">Commentaires</i></a>
                                                <img src="images/com.png" alt="">
                                                <span class="ml-1">{{$nbCommentaires}}</span>
                                            </li>
                                        </ul>
                                    </div><!--user_pro_status end-->
                                </div><!--user_profile end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>People Viewed Profile</h3>
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
                                                <h4>Joe doe</h4>
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
                                </div><!--suggestions end-->
                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec">
                                    <h3>{{($user->prenom." ".$user->nom)}}</h3>
                                    <div class="star-descp">
                                        <span>Graphic Designer at Self Employed</span>
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
                                                <a href="#" title="">
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
                                        </ul>
                                    </div><!-- tab-feed end-->
                                </div><!--user-tab-sec end-->
                                <div class="product-feed-tab current animated fadeIn" id="info-dd">
                                   @if ($user['bio'])
                                        <div class="user-profile-ov">
                                            <h3><a href="#" title="" class="overview-open">Bio</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                                            <p>{{$user->bio}}</p>
                                        </div><!--user-profile-ov end-->
                                   @endif

                                    <div class="user-profile-ov st2">
                                        <h3><a href="#" title="" class="esp-bx-open">Téléphone</a><a href="#" title="" class="esp-bx-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="esp-bx-open"><i class="fa fa-plus-square"></i></a></h3>
                                        <span>{{$user->tel}}</span>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="emp-open">Email</a> <a href="#" title="" class="emp-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="emp-open"><i class="fa fa-plus-square"></i></a></h3>
                                        <span>{{$user->email}}</span>
                                    </div><!--user-profile-ov end-->
                                    @if ($user['ville'])
                                        <div class="user-profile-ov">
                                            <h3><a href="#" title="" class="lct-box-open">Ville</a> <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="lct-box-open"><i class="fa fa-plus-square"></i></a></h3>
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
                                                                    <h3>{{$commentaire->user}}</h3>
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
                                                        <input type="text" name="texte" minlength="1" placeholder="Laisser un commentaire">
                                                        <button type="submit"><i class="fa fa-send"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!--comment-section end-->
                                    </div>
                                <div class="product-feed-tab" id="my-bids">
                                    <div class="posts-section">
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                    <div class="usy-name">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images/clock.png" alt="">3 min ago</span>
                                                    </div>
                                                </div>
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
                                                <ul class="descp">
                                                    <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                    <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                    <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>Simple Classified Site</h3>
                                                <ul class="job-dt">
                                                    <li><span>$300 - $350</span></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    <li><a href="#" title="">HTML</a></li>
                                                    <li><a href="#" title="">PHP</a></li>
                                                    <li><a href="#" title="">CSS</a></li>
                                                    <li><a href="#" title="">Javascript</a></li>
                                                    <li><a href="#" title="">Wordpress</a></li>
                                                    <li><a href="#" title="">Photoshop</a></li>
                                                    <li><a href="#" title="">Illustrator</a></li>
                                                    <li><a href="#" title="">Corel Draw</a></li>
                                                </ul>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="#"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                        <span>25</span>
                                                    </li>
                                                    <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                                                </ul>
                                                <a><i class="la la-eye"></i>Views 50</a>
                                            </div>
                                        </div><!--post-bar end-->
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                    <div class="usy-name">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images/clock.png" alt="">3 min ago</span>
                                                    </div>
                                                </div>
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
                                                <ul class="descp">
                                                    <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                    <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                    <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>Ios Shopping mobile app</h3>
                                                <ul class="job-dt">
                                                    <li><span>$300 - $350</span></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    <li><a href="#" title="">HTML</a></li>
                                                    <li><a href="#" title="">PHP</a></li>
                                                    <li><a href="#" title="">CSS</a></li>
                                                    <li><a href="#" title="">Javascript</a></li>
                                                    <li><a href="#" title="">Wordpress</a></li>
                                                    <li><a href="#" title="">Photoshop</a></li>
                                                    <li><a href="#" title="">Illustrator</a></li>
                                                    <li><a href="#" title="">Corel Draw<<a href="#"><i class="la la-heart"></i>J'aime</a>
                                                        <img src="images/liked-img.png" alt="">
                                                        <span class="ml-1">25</span>/a></li>
                                                </ul>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="#"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                        <span>25</span>
                                                    </li>
                                                    <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                                                </ul>
                                                <a><i class="la la-eye"></i>Views 50</a>
                                            </div>
                                        </div><!--post-bar end-->
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                    <div class="usy-name">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images/clock.png" alt="">3 min ago</span>
                                                    </div>
                                                </div>
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
                                                <ul class="descp">
                                                    <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                    <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                    <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>Simple Classified Site</h3>
                                                <ul class="job-dt">
                                                    <li><span>$300 - $350</span></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    <li><a href="#" title="">HTML</a></li>
                                                    <li><a href="#" title="">PHP</a></li>
                                                    <li><a href="#" title="">CSS</a></li>
                                                    <li><a href="#" title="">Javascript</a></li>
                                                    <li><a href="#" title="">Wordpress</a></li>
                                                    <li><a href="#" title="">Photoshop</a></li>
                                                    <li><a href="#" title="">Illustrator</a></li>
                                                    <li><a href="#" title="">Corel Draw</a></li>
                                                </ul>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="#"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                        <span>25</span>
                                                    </li>
                                                    <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                                                </ul>
                                                <a><i class="la la-eye"></i>Views 50</a>
                                            </div>
                                        </div><!--post-bar end-->
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                    <div class="usy-name">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images/clock.png" alt="">3 min ago</span>
                                                    </div>
                                                </div>
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
                                                <ul class="descp">
                                                    <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                    <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                    <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>Ios Shopping mobile app</h3>
                                                <ul class="job-dt">
                                                    <li><span>$300 - $350</span></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    <li><a href="#" title="">HTML</a></li>
                                                    <li><a href="#" title="">PHP</a></li>
                                                    <li><a href="#" title="">CSS</a></li>
                                                    <li><a href="#" title="">Javascript</a></li>
                                                    <li><a href="#" title="">Wordpress</a></li>
                                                    <li><a href="#" title="">Photoshop</a></li>
                                                    <li><a href="#" title="">Illustrator</a></li>
                                                    <li><a href="#" title="">Corel Draw</a></li>
                                                </ul>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="#"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                        <span>25</span>
                                                    </li>
                                                    <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                                                </ul>
                                                <a><i class="la la-eye"></i>Views 50</a>
                                            </div>
                                        </div><!--post-bar end-->
                                        <div class="process-comm">
                                            <a href="#" title=""><img src="images/process-icon.png" alt=""></a>
                                        </div><!--process-comm end-->
                                    </div><!--posts-section end-->
                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="portfolio-dd">
                                    <div class="portfolio-gallery-sec">
                                        <h3>Portfolio</h3>
                                        <div class="gallery_pf">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/271x174" alt="">
                                                        <a href="#" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="#" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="#" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="#" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="#" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="#" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="#" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="#" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="#" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="#" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
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
                                    <a href="#" title=""><i class="fa fa-envelope"></i> Message</a>
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
    </main>
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
