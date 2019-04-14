@extends('frontend_layouts.mainadmin')
@section('mainContent')
 <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                    <?php  //echo "<pre>"; var_dump($articles); die(); ?>
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-thumb">
                                <a href="#"><img src="{{ URL::to('uploads/'. $articles->image) }}" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="#" class="post-catagory">{{ $articles->content['content_type_name'] }}</a>
                                <a href="#" class="post-title">
                                    <h6>{{ $articles->title }}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">{{ $articles->author['author'] }}</a></p>
                                    <p class="post-excerp">{{ strip_tags($articles->description) }}</p>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="{{ URL::to('frontend/img/core-img/like.png') }}" alt=""> <span>392</span></a>
                                        <a href="#" class="post-comment"><img src="{{ URL::to('frontend/img/core-img/chat.png')}}" alt=""> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
@endsection
@section('side_section')
    <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">
                        @foreach($recentArticles as $recent)    
                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">
                            <!-- Single Featured Post -->
                            <div class="single-blog-post small-featured-post d-flex">
                                <div class="post-thumb">
                                    <a href="#"><img src="{{ URL::to('/')}}/uploads/{{ $recent->image  }}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{ route('articles.show', $recent->id) }}" class="post-catagory">{{ $recent->title }}</a>
                                    <div class="post-meta">
                                        <a href="{{ route('articles.show', $recent->id) }}" class="post-title">
                                            <h6>{{ str_limit(strip_tags($recent->description),50) }}</h6>
                                        </a>
                                        <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                        <!-- Popular News Widget -->
                        <div class="popular-news-widget mb-50">
                            <h3>5 Most Popular News</h3>

                            @foreach($trendingArticles as $key => $trending)
                            <!-- Single Popular Blog -->
                            <div class="single-popular-post">
                                <a href="#">
                                    <h6><span>{{ $key+1 }}.</span> {{ str_limit(strip_tags($trending->description),50) }}</h6>
                                </a>
                                <p>April 14, 2018</p>
                            </div>
                            @endforeach
                            
                        </div>

                        <!-- Newsletter Widget -->
                        <div class="newsletter-widget mb-50">
                            <h4>Newsletter</h4>
                            <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <form action="#" method="post">
                                <input type="text" name="text" placeholder="Name">
                                <input type="email" name="email" placeholder="Email">
                                <button type="submit" class="btn w-100">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
@endsection                