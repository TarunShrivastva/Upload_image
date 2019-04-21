@extends('frontend_layouts.mainadmin')
@section('mainContent')
 <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                    @foreach($articles as $article)    
                        <?php //echo "<pre>"; print_r($article); die();?>
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-thumb">
                                <a href="{{ URL::to( $article->category['url'] . '/' . $article->content['content_type_name'] . '/' . $article->alias . '-' . $article->id) }}"><img src="{{ URL::to('uploads/'.$article->image) }}" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="{{ URL::to( $article->category['url'] . '/' . $article->content['content_type_name'])  }}" class="post-catagory">{{ $article->content['content_type_name'] }}</a>
                                <a href="{{ URL::to( $article->category['url'] . '/' . $article->content['content_type_name'] . '/' . $article->alias . '-' . $article->id) }}" class="post-title">
                                    <h6>{{ $article->title }}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">{{ $article->author['author'] }}</a></p>
                                    <p class="post-excerp">{{ strip_tags($article->description) }}</p>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="{{ URL::to('frontend/img/core-img/like.png') }}" alt=""> <span>392</span></a>
                                        <a href="#" class="post-comment"><img src="{{ URL::to('frontend/img/core-img/chat.png')}}" alt=""> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                    </div>
                    <nav>
                        <ul class="pagination justify-content-end">
                            {{$articles->links('vendor.pagination.bootstrap-4')}}
                        </ul>
                    </nav>    
                    {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination mt-50">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">10</a></li>
                        </ul>
                    </nav> --}}
                </div>
@endsection
@section('side_section')
    <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">
                        {!! $recentArticles !!}
                        <!-- Popular News Widget -->
                        <div class="popular-news-widget mb-50">
                            <h3>5 {{ __('hi.Most Popular News') }}</h3>
                                {!! $trendingArticles !!}
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