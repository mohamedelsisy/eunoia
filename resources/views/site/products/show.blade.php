@extends('layouts.site')
@section('title', $product->title)
@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <ul>
                <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                <li>
                    {{ $product->title }}
                </li>
            </ul>
        </div>
    </div>
    <!-- End Page Title Area -->
    <!-- Start Blog Details Area -->

    <section class="blog-details-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details">
                        <div class="article-img">
                            <img src="{{ asset('assets/'.$product->photo) }}" alt="image">
                        </div>

                        <div class="article-content">
                            <ul class="entry-meta">
                                <li><i class="far fa-user"></i>
                                    <a href="{{ route('site.profiles.show',$product->user->id) }}">
                                        {{ $product->user->name }}
                                    </a>
                                </li>

                                <li>
                                    $ {{ $product->price }}
                                </li>
                                <li>
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $product->created_at->diffForHumans() }}

                                </li>
                                <li>
                                    <i class="far fa-comment-dots"></i>
                                    {{ $product->comments->count() }}
                                </li>
                            </ul>

                            <h3>
                                {{ $product->title }}
                            </h3>
                            <p>
                                {{ $product->content }}
                            </p>
                            @auth()
                                <form action="{{ route('site.cart.create') }}" method="post" id="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit"  id="add-to-cart"   class="btn btn-light">إضافة إلي الإعجابات</button>
                                </form>
                            @endauth

                        </div>
                    </div>

                    <div class="comments-area">
                        <h3 class="comments-title">التعليقات</h3>

                        @isset($product->comments)
                            <ol class="comment-list">
                                @foreach($product->comments as $comment)
                                    <li class="comment">
                                        <article class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="{{ asset('assets/'. $comment->user->photo) }}" class="avatar" alt="image">
                                                    <b class="fn">
                                                        {{ $comment->user->name }}
                                                    </b>
                                                    <span class="says">says:</span>
                                                </div>

                                                <div class="comment-metadata">
                                                    <a href="#">
                                                        <time>
                                                            {{ $comment->created_at->diffForHumans() }}
                                                        </time>
                                                    </a>
                                                </div>
                                            </footer>

                                            <div class="comment-content">
                                                <p>
                                                    {{ $comment->content }}
                                                </p>
                                            </div>

                                        </article>
                                    </li>
                                @endforeach
                            </ol>


                        @endisset

                        <div class="comment-respond">
                            <h3 class="comment-reply-title">إضافة  تعليق</h3>
                            @auth()
                                <form method="post" action="{{ route('site.comments.store') }}" class="comment-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <p class="comment-form-comment">
                                        <textarea name="description" id="comment" cols="45" rows="5" maxlength="65525" required="required"></textarea>
                                    </p>
                                    <p class="form-submit">
                                        <input type="submit" name="submit" id="submit" class="submit" value="إضافة">
                                    </p>
                                </form>

                            @else
                                <div class="alert alert-info mt-3" >
                                    سجل دخول أولاً لإضافة تعليق

                                    <a href="{{ route('login') }}">تسجيل الدخول</a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area" id="secondary">
                        <section class="widget widget_comero_posts_thumb">
                            <h3 class="widget-title">رسومات أخري</h3>


                            @foreach($lastproducts as $last)
                                <article class="item">
                                    <a href="{{ route('site.products.show', $last->id) }}" class="thumb">
                                        <img src="{{ asset('assets/'.$last->photo) }}" alt="">
                                    </a>
                                    <div class="info">
                                        <time datetime="2019-06-30">
                                            {{ $last->created_at->diffForHumans() }}
                                        </time>
                                        <h4 class="title usmall">
                                            <a href="{{ route('site.products.show', $last->id) }}">
                                                {{ \Illuminate\Support\Str::limit($last->title, 40) }}
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                            @endforeach

                        </section>


                        <section class="widget widget_tag_cloud">
                            <h3 class="widget-title">الأقسام</h3>

                            <div class="tagcloud">
                                @foreach($categories as $category)
                                    <a href="{{ route('site.categories.show', $category->id) }}">
                                        {{ $category->name }}
                                        <span class="tag-link-count">
                                            ({{ $category->products->count() }})
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Details Area -->

    <x-cart/>

@endsection
