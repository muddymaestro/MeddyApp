@extends('layouts.app')

@section('content')

        <div class="row">
    
            <!-- Main Content -->
    
            <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
    
                <div class="ui-block">
                    
                    <!-- News Feed Form  -->
                    
                    <div class="news-feed-form">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">
                    
                                    <svg class="olymp-status-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use></svg>
                    
                                    <span>Status</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link inline-items" data-toggle="tab" href="#profile-1" role="tab" aria-expanded="false">
                    
                                    <svg class="olymp-multimedia-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use></svg>
                    
                                    <span>Multimedia</span>
                                </a>
                            </li>
                    
                            <li class="nav-item">
                                <a class="nav-link inline-items" data-toggle="tab" href="#blog" role="tab" aria-expanded="false">
                                    <svg class="olymp-blog-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-blog-icon"></use></svg>
                    
                                    <span>Blog Post</span>
                                </a>
                            </li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">

                            <form action="{{ route('post.create') }}" method="POST" id="form">
                                        @csrf

                                    <div class="author-thumb">
                                    <img src="{{asset('public/img/author-page.jpg')}}" alt="author">
                                    </div>
                                    <div class="form-group with-icon label-floating is-empty">
                                        <label class="control-label">Share what you are thinking here...</label>
                                        <textarea name="post" class="form-control" placeholder=""></textarea>
                                    </div>
                                    <div class="add-options-message">
                                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                            <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg>
                                        </a>
                                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                            <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                                        </a>
                    
                                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                            <svg class="olymp-small-pin-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use></svg>
                                        </a>
                    
                                        <button type="submit" class="btn btn-primary btn-md-2" id="status">Post Status</button>
                                        <button class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
                    
                                    </div>
                    
                                </form>
                            </div>
                    
                        <!-- unwanted for now 
                            <div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
                            <form action="" method="">
                                    <div class="author-thumb">
                                        <img src="{{asset('public/img/author-page.jpg')}}" alt="author">
                                    </div>
                                    <div class="form-group with-icon label-floating is-empty">
                                        <label class="control-label">Share what you are thinking here...</label>
                                        <textarea class="form-control" placeholder=""  ></textarea>
                                    </div>
                                    <div class="add-options-message">
                                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                            <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg>
                                        </a>
                                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                            <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                                        </a>
                    
                                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                            <svg class="olymp-small-pin-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use></svg>
                                        </a>
                    
                                        <button class="btn btn-primary btn-md-2">Post Status</button>
                                        <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
                    
                                    </div>
                    
                                </form>
                            </div>
                        -->

                        <!-- unwanted for now
                            <div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
                                <form>
                                    <div class="author-thumb">
                                        <img src="{{asset('public/img/author-page.jpg')}}" alt="author">
                                    </div>
                                    <div class="form-group with-icon label-floating is-empty">
                                        <label class="control-label">Share what you are thinking here...</label>
                                        <textarea class="form-control" placeholder=""  ></textarea>
                                    </div>
                                    <div class="add-options-message">
                                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                            <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg>
                                        </a>
                                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                            <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                                        </a>
                    
                                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                            <svg class="olymp-small-pin-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use></svg>
                                        </a>
                    
                                        <button class="btn btn-primary btn-md-2">Post Status</button>
                                        <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
                    
                                    </div>
                    
                                </form>
                            </div>
                        -->
                        </div>
                    </div>   
                    <!-- ... end News Feed Form  -->			
                </div>
    
                <div id="newsfeed-items-grid">
    
                    {{-- <div class="ui-block">
                    
                        <article class="hentry post video">
                        
                            <div class="post__author author vcard inline-items">
                                <img src="{{asset('public/img/avatar7-sm.jpg')}}" alt="author">
                        
                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">Marina Valentine</a> shared a <a href="#">link</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            March 4 at 2:05pm
                                        </time>
                                    </div>
                                </div>
                        
                                <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <ul class="more-dropdown">
                                        <li>
                                            <a href="#">Edit Post</a>
                                        </li>
                                        <li>
                                            <a href="#">Delete Post</a>
                                        </li>
                                        <li>
                                            <a href="#">Turn Off Notifications</a>
                                        </li>
                                        <li>
                                            <a href="#">Select as Featured</a>
                                        </li>
                                    </ul>
                                </div>
                        
                            </div>
                        
                            <p>Hey <a href="#">Cindi</a>, you should really check out this new song by Iron Maid. The next time they come to the city we should totally go!</p>
                        
                            <div class="post-video">
                                <div class="video-thumb">
                                    <img src="{{asset('public/img/video-youtube1.jpg')}}" alt="photo">
                                    <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">
                                        <svg class="olymp-play-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use></svg>
                                    </a>
                                </div>
                        
                                <div class="video-content">
                                    <a href="#" class="h4 title">Iron Maid - ChillGroves</a>
                                    <p>Lorem ipsum dolor sit amet, consectetur ipisicing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua...
                                    </p>
                                    <a href="#" class="link-site">YOUTUBE.COM</a>
                                </div>
                            </div>
                        
                            <div class="post-additional-info inline-items">
                        
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                    <span>18</span>
                                </a>
                        
                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic9.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic10.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic7.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic8.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic11.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                </ul>
                        
                                <div class="names-people-likes">
                                    <a href="#">Jenny</a>, <a href="#">Robert</a> and
                                    <br>18 more liked this
                                </div>
                        
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                        
                                        <span>0</span>
                                    </a>
                        
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                        
                                        <span>16</span>
                                    </a>
                                </div>
                        
                        
                            </div>
                        
                            <div class="control-block-button post-control-button">
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-like-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>
                                </a>
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </a>
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                </a>
                        
                            </div>
                        
                        </article>
                    
                    </div> --}}
    

                    {{-- <div class="ui-block">
    
                        <article class="hentry post">
                        
                            <div class="post__author author vcard inline-items">
                                <img src="{{asset('public/img/avatar10-sm.jpg')}}" alt="author">
                        
                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">Elaine Dreyfuss</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            9 hours ago
                                        </time>
                                    </div>
                                </div>
                        
                                <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <ul class="more-dropdown">
                                        <li>
                                            <a href="#">Edit Post</a>
                                        </li>
                                        <li>
                                            <a href="#">Delete Post</a>
                                        </li>
                                        <li>
                                            <a href="#">Turn Off Notifications</a>
                                        </li>
                                        <li>
                                            <a href="#">Select as Featured</a>
                                        </li>
                                    </ul>
                                </div>
                        
                            </div>
                        
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris consequat.
                            </p>
                        
                            <div class="post-additional-info inline-items">
                        
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                    <span>24</span>
                                </a>
                        
                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic7.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic8.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic9.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic10.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic11.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                </ul>
                        
                                <div class="names-people-likes">
                                    <a href="#">You</a>, <a href="#">Elaine</a> and
                                    <br>22 more liked this
                                </div>
                        
                        
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                                        <span>17</span>
                                    </a>
                        
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                        <span>24</span>
                                    </a>
                                </div>
                        
                        
                            </div>
                        
                            <div class="control-block-button post-control-button">
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-like-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>
                                </a>
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </a>
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                </a>
                        
                            </div>
                        
                        </article>
                        
                        <!-- Comments -->
                        
                        <ul class="comments-list">
                            <li class="comment-item">
                                <div class="post__author author vcard inline-items">
                                    <img src="{{asset('public/img/author-page.jpg')}}" alt="author">
                        
                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
                                        <div class="post__date">
                                            <time class="published" datetime="2004-07-24T18:18">
                                                38 mins ago
                                            </time>
                                        </div>
                                    </div>
                        
                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                        
                                </div>
                        
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>
                        
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                    <span>3</span>
                                </a>
                                <a href="#" class="reply">Reply</a>
                            </li>
                            <li class="comment-item">
                                <div class="post__author author vcard inline-items">
                                    <img src="{{asset('public/img/avatar1-sm.jpg')}}" alt="author">
                        
                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="#">Mathilda Brinker</a>
                                        <div class="post__date">
                                            <time class="published" datetime="2004-07-24T18:18">
                                                1 hour ago
                                            </time>
                                        </div>
                                    </div>
                        
                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                        
                                </div>
                        
                                <p>Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum
                                    quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                                </p>
                        
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                    <span>8</span>
                                </a>
                                <a href="#" class="reply">Reply</a>
                            </li>
                        </ul>
                        
                        <!-- ... end Comments -->
    
                        <a href="#" class="more-comments">View more comments <span>+</span></a>
    
                        
                        <!-- Comment Form  -->
                        
                        <form class="comment-form inline-items">
                        
                            <div class="post__author author vcard inline-items">
                                <img src="{{asset('public/img/author-page.jpg')}}" alt="author">
                        
                                <div class="form-group with-icon-right ">
                                    <textarea class="form-control" placeholder=""></textarea>
                                    <div class="add-options-message">
                                        <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                                            <svg class="olymp-camera-icon">
                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        
                            <button class="btn btn-md-2 btn-primary">Post Comment</button>
                        
                            <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>
                        
                        </form>
                        
                        <!-- ... end Comment Form  -->
                    </div>
    
                    <div class="ui-block">
                        
                        <article class="hentry post has-post-thumbnail">
                        
                            <div class="post__author author vcard inline-items">
                                <img src="{{asset('public/img/avatar5-sm.jpg')}}" alt="author">
                        
                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">Green Goo Rock</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            March 8 at 6:42pm
                                        </time>
                                    </div>
                                </div>
                        
                                <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <ul class="more-dropdown">
                                        <li>
                                            <a href="#">Edit Post</a>
                                        </li>
                                        <li>
                                            <a href="#">Delete Post</a>
                                        </li>
                                        <li>
                                            <a href="#">Turn Off Notifications</a>
                                        </li>
                                        <li>
                                            <a href="#">Select as Featured</a>
                                        </li>
                                    </ul>
                                </div>
                        
                            </div>
                        
                            <p>Hey guys! We are gona be playing this Saturday of <a href="#">The Marina Bar</a> for their new Mystic Deer Party.
                                If you wanna hang out and have a really good time, come and join us. We’l be waiting for you!
                            </p>
                        
                            <div class="post-thumb">
                                <img src="{{asset('public/img/post-thumb1.jpg')}}" alt="photo">
                            </div>
                        
                            <div class="post-additional-info inline-items">
                        
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                    <span>49</span>
                                </a>
                        
                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic9.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic10.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic7.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic8.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic11.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                </ul>
                        
                                <div class="names-people-likes">
                                    <a href="#">Jimmy</a>, <a href="#">Andrea</a> and
                                    <br>47 more liked this
                                </div>
                        
                        
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                                        <span>264</span>
                                    </a>
                        
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                        <span>37</span>
                                    </a>
                                </div>
                        
                        
                            </div>
                        
                            <div class="control-block-button post-control-button">
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-like-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>
                                </a>
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </a>
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                </a>
                        
                            </div>
                        
                        </article>
                    </div>  --}}

                    @foreach ($posts as $post)
                        <div class="ui-block">
                            
                            <article class="hentry post has-post-thumbnail">
                            
                                <div class="post__author author vcard inline-items">
                                    <img src="{{asset('public/img/avatar3-sm.jpg')}}" alt="author">
                            
                                    <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">{{ $post->user->name }}</a>
                                        <div class="post__date">
                                            <time class="published" datetime="2004-07-24T18:18">
                                                {{ $post->created_at }}
                                            </time>
                                        </div>
                                    </div>
                            
                                    <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                        <ul class="more-dropdown">
                                            <li>
                                                <a href="#">Edit Post</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete Post</a>
                                            </li>
                                            <li>
                                                <a href="#">Turn Off Notifications</a>
                                            </li>
                                            <li>
                                                <a href="#">Select as Featured</a>
                                            </li>
                                        </ul>
                                    </div>
                            
                                </div>
                            
                                <p id="postBody">{{ $post->body }}</p>

                                <p class="social-links">
                            
                                    @if(!$post->isLike($post->id))
                                        <a href="" value= {{ $post->id }} id="like">Like</a>
                                    @else
                                        <a href="" value= {{ $post->id }} id="unlike">Unlike</a>
                                    @endif

                                    <a href="" id="comment">Comment</a> 
                                </p>
                            
                                <div class="post-additional-info inline-items">
                            
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>

                                        @if($post->likes->count() > 1)
                                            <span class="likes">{{ $post->likes->count() }} Likes</span>
                                        @else
                                            <span class="like">{{ $post->likes->count() }} Like</span>
                                        @endif
                                    </a>
                            
                                    <div class="comments-shared">
                                        <a href="#" class="post-add-icon inline-items">
                                            <svg class="olymp-speech-balloon-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                                            @if($post->comments->count() > 1)
                                                <span>{{ $post->comments->count() }} Comments</span>
                                            @else
                                                <span>{{ $post->comments->count() }} Comment</span>
                                            @endif
                                        </a>
                            
                                        <a href="#" class="post-add-icon inline-items">
                                            <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                            <span>2 Shares</span>
                                        </a>
                                    </div>            
                            
                                </div>

                                <!-- Comment Form  -->
				
                                <form action="{{route('comment.create', $post->id)}}" method="POST" class="comment-form inline-items" id="comment-form">
                                        @csrf
                                
                                    <div class="post__author author vcard inline-items">
                                        <img src="{{ asset('public/img/author-page.jpg') }}" alt="author">
                                
                                        <div class="form-group with-icon-right ">
                                            <textarea class="form-control" name="comment"></textarea>
                                            <div class="add-options-message">
                                                <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                                                    <svg class="olymp-camera-icon">
                                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <button class="btn btn-md-2 btn-primary" id="commentPost">Post Comment</button>
                                
                                    <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>
                                
                                </form>
                                
                                <!-- ... end Comment Form  -->
                            
                                <div class="control-block-button post-control-button">
                            
                                    <a href="#" class="btn btn-control">
                                        <svg class="olymp-like-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>
                                    </a>
                            
                                    <a href="#" class="btn btn-control">
                                        <svg class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                    </a>
                            
                                    <a href="#" class="btn btn-control">
                                        <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                    </a>
                            
                                </div>

                               <!-- Comments -->
                               
                            @foreach ($post->comments as $comment)
                                <ul class="comments-list">
                                    <li class="comment-item">
                                        <div class="post__author author vcard inline-items">
                                            <img src="{{asset('public/img/author-page.jpg')}}" alt="author">
                                
                                            <div class="author-date">
                                            <a class="h6 post__author-name fn" href="02-ProfilePage.html">{{ $comment->user->name }}</a>
                                                <div class="post__date">
                                                    <time class="published" datetime="2004-07-24T18:18">
                                                        38 mins ago
                                                    </time>
                                                </div>
                                            </div>
                                
                                            <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                                
                                        </div>
                                
                                        <p class="comment">{{ $comment->body }} ({{$loop->iteration}} / {{$loop->count}} / {{$loop->remaining}})</p>
                                
                                        <a href="#" class="post-add-icon inline-items">
                                            <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                            <span>3</span>
                                        </a>
                                        <a href="#" data-target="#reply-to-a-comment" data-toggle="modal" class="reply">Reply</a>
                                    </li>

                                                    <!-- Replies -->
                                                    @foreach ($comment->comments as $comment) 
                                                        <ul class="replies-list">
                                                            <li class="comment-item">
                                                                <div class="post__author author vcard inline-items">
                                                                    <img src="{{asset('public/img/author-page.jpg')}}" alt="author">
                                                        
                                                                    <div class="author-date">
                                                                    <a class="h6 post__author-name fn" href="02-ProfilePage.html">{{ $comment->user->name }}</a>
                                                                        <div class="post__date">
                                                                            <time class="published" datetime="2004-07-24T18:18">
                                                                                38 mins ago
                                                                            </time>
                                                                        </div>
                                                                    </div>
                                                        
                                                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                                                        
                                                                </div>
                                                        
                                                                <p>{{ $comment->body }} ({{$loop->iteration}} / {{$loop->count}} / {{$loop->remaining}})</p>
                                                        
                                                                <a href="#" class="post-add-icon inline-items">
                                                                    <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                                                    <span>3</span>
                                                                </a>
                                                                <a href="#" class="reply">Reply</a>
                                                            </li>
                                                        </ul>
                                            
                                                    <!-- ... end Replies -->
                                                    @endforeach 

                                </ul>                                
                                <!-- ... end Comments -->
                            @endforeach
                         
                            </article>
                        </div>
                    @endforeach
    
                    {{-- <div class="ui-block"> --}}
                        
                        {{-- <article class="hentry post has-post-thumbnail">
                        
                            <div class="post__author author vcard inline-items">
                                <img src="{{asset('public/img/avatar2-sm.jpg')}}" alt="author">
                        
                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">Nicholas Grissom</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            March 2 at 8:34am
                                        </time>
                                    </div>
                                </div>
                        
                                <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <ul class="more-dropdown">
                                        <li>
                                            <a href="#">Edit Post</a>
                                        </li>
                                        <li>
                                            <a href="#">Delete Post</a>
                                        </li>
                                        <li>
                                            <a href="#">Turn Off Notifications</a>
                                        </li>
                                        <li>
                                            <a href="#">Select as Featured</a>
                                        </li>
                                    </ul>
                                </div>
                        
                            </div>
                        
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                accusantium doloremque.
                            </p>
                        
                            <div class="post-additional-info inline-items">
                        
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                    <span>22</span>
                                </a>
                        
                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic9.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic10.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic7.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic8.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('public/img/friend-harmonic11.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                </ul>
                        
                                <div class="names-people-likes">
                                    <a href="#">Jimmy</a>, <a href="#">Andrea</a> and
                                    <br>47 more liked this
                                </div>
                        
                        
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                                        <span>0</span>
                                    </a>
                        
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                        <span>2</span>
                                    </a>
                                </div>
                        
                        
                            </div>
                        
                            <div class="control-block-button post-control-button">
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-like-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>
                                </a>
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </a>
                        
                                <a href="#" class="btn btn-control">
                                    <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                </a>
                        
                            </div>
                        
                        </article>
                    </div>
    
                </div>
    
                <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
     --}}
            </main>
    
            <!-- ... end Main Content -->
    
            
            <!-- Right Sidebar -->
    
            <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
    
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Friend Suggestions</h6>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('public/svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg></a>
                    </div>
          
                    <!-- W-Action -->
                    
                    @foreach ($users as $user)
                        <ul class="widget w-friend-pages-added notification-list friend-requests">
                            <li class="inline-items">
                                <div class="author-thumb">
                                    <img src="{{asset('public/img/avatar38-sm.jpg')}}" alt="author">
                                </div>
                                <div class="notification-event">
                                    <a href="#" class="h6 notification-friend">{{ $user->name }}</a>
                                    <span class="chat-message-item">{{ $user->username }}</span>
                                </div>
                                <span class="notification-icon">
                                    @if(Auth::user()->isFollowing($user->id))
                                        <a href="{{ route('unfollow', $user->id) }}" class="btn btn-xs btn-primary">Unfollow</a>
                                    @else
                                        <a href="{{ route('follow', $user->id) }}" class="btn btn-xs btn-primary">Follow</a>
                                    @endif
                                </span>
                            </li>
                        </ul>
                    @endforeach      
                    
                    <!-- ... end W-Action -->
                </div>
    
                <div class="ui-block">
    
                    <div class="ui-block-title">
                        <h6 class="title">Activity Feed</h6>
                        <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                    </div>
    
                    
                    <!-- W-Activity-Feed -->
                    
                    <ul class="widget w-activity-feed notification-list">
                        <li>
                            <div class="author-thumb">
                                <img src="{{asset('public/img/avatar49-sm.jpg')}}" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">Marina Polson</a> commented on Jason Mark’s <a href="#" class="notification-link">photo.</a>.
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 mins ago</time></span>
                            </div>
                        </li>
                    
                        <li>
                            <div class="author-thumb">
                                <img src="{{asset('public/img/avatar9-sm.jpg')}}" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">Jake Parker </a> liked Nicholas Grissom’s <a href="#" class="notification-link">status update.</a>.
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">5 mins ago</time></span>
                            </div>
                        </li>
                    
                        <li>
                            <div class="author-thumb">
                                <img src="{{asset('public/img/avatar50-sm.jpg')}}" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">Mary Jane Stark </a> added 20 new photos to her <a href="#" class="notification-link">gallery album.</a>.
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">12 mins ago</time></span>
                            </div>
                        </li>
                    
                        <li>
                            <div class="author-thumb">
                                <img src="{{asset('public/img/avatar51-sm.jpg')}}" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">Nicholas Grissom </a> updated his profile <a href="#" class="notification-link">photo</a>.
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
                            </div>
                        </li>
                        <li>
                            <div class="author-thumb">
                                <img src="{{asset('public/img/avatar48-sm.jpg')}}" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">Marina Valentine </a> commented on Chris Greyson’s <a href="#" class="notification-link">status update</a>.
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
                            </div>
                        </li>
                    
                        <li>
                            <div class="author-thumb">
                                <img src="{{asset('public/img/avatar52-sm.jpg')}}" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">Green Goo Rock </a> posted a <a href="#" class="notification-link">status update</a>.
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
                            </div>
                        </li>
                        <li>
                            <div class="author-thumb">
                                <img src="{{asset('public/img/avatar10-sm.jpg')}}" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">Elaine Dreyfuss  </a> liked your <a href="#" class="notification-link">blog post</a>.
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 hours ago</time></span>
                            </div>
                        </li>
                    
                        <li>
                            <div class="author-thumb">
                                <img src="{{asset('public/img/avatar10-sm.jpg')}}" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">Elaine Dreyfuss  </a> commented on your <a href="#" class="notification-link">blog post</a>.
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 hours ago</time></span>
                            </div>
                        </li>
                    
                        <li>
                            <div class="author-thumb">
                                <img src="{{asset('public/img/avatar53-sm.jpg')}}" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="#" class="h6 notification-friend">Bruce Peterson </a> changed his <a href="#" class="notification-link">profile picture</a>.
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">15 hours ago</time></span>
                            </div>
                        </li>
                    
                    </ul>
                    
                    <!-- .. end W-Activity-Feed -->
                </div>
    
    
                <div class="ui-block">
    
                    
                    <!-- W-Action -->
                    
                    <div class="widget w-action">
                    
                        <img src="{{asset('public/img/logo.png')}}" alt="Olympus">
                        <div class="content">
                            <h4 class="title">OLYMPUS</h4>
                            <span>THE BEST SOCIAL NETWORK THEME IS HERE!</span>
                            <a href="01-LandingPage.html" class="btn btn-bg-secondary btn-md">Register Now!</a>
                        </div>
                    </div>
                    
                    <!-- ... end W-Action -->
                </div>
    
            </aside>
    
            <!-- ... end Right Sidebar -->
    
        </div>

@endsection

    
    
    