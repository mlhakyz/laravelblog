@extends('post.layout')
@section('body')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
        <div class="container-fluid">

            <div class="owl-banner owl-carousel">
                @forelse ($posts as $post)
                    <div class="item">

                        <img src="{{ URL::asset('images/banner-item-01.jpg') }}" alt="">
                        <div class="item-content">
                            <div class="main-content">
                                <div class="meta-category">
                                    <span> {{ $post->category->name }}</span>
                                </div>
                                <a href="{{ route('posts.show', $post) }}">
                                    <h4>{{ $post->title }}</h4>
                                </a>
                                <ul class="post-info">
                                    <li><a href="#">Admin</a></li>
                                    <li><a href="#">May 12, 2020</a></li>
                                    <li><a href="#">12 Comments</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <li>
                        Herhangi bir yazı bulunamadı
                    </li>
                @endforelse

            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            <p>
                                <a href="{{ route('posts.create') }}">Yeni Yazı Ekle</a>
                            </p>
                            @forelse ($posts as $post)
                                <div class="col-lg-12">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="{{ URL::asset('images/blog-post-01.jpg') }}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <span>Lifestyle</span>
                                            <a href="{{ route('posts.show', $post) }}">
                                                <h4>{{ $post->title }}</h4>
                                            </a>
                                            <ul class="post-info">
                                                <li><a href="#">Admin</a></li>
                                                <li><a href="#">May 31, 2020</a></li>
                                                <li><a href="#">12 Comments</a></li>
                                            </ul>
                                            <p>{{ $post->content }}</p>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-tags"></i></li>
                                                            <li><a href="#">Beauty</a>,</li>
                                                            <li><a href="#">Nature</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6">
                                                        <ul class="post-share">
                                                            <li><i class="fa fa-share-alt"></i></li>
                                                            <li><a href="#">Facebook</a>,</li>
                                                            <li><a href="#"> Twitter</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <li>
                                    Herhangi bir yazı bulunamadı
                                </li>
                            @endforelse

                            <div class="col-lg-12">
                                <div class="main-button">
                                    <a href="blog.html">View All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-item search">
                                    <form id="search_form" name="gs" method="GET" action="#">
                                        <input type="text" name="q" class="searchText"
                                            placeholder="type to search..." autocomplete="on">
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item recent-posts">
                                    <div class="sidebar-heading">
                                        <h2>Recent Posts</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @forelse ($posts as $post)
                                                <li><a href="{{ route('posts.show', $post) }}">
                                                        <h5>{{ $post->title }}</h5>
                                                        <span>May 31, 2020</span>
                                                    </a></li>
                                            @empty
                                                <li>
                                                    Herhangi bir yazı bulunamadı
                                                </li>
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Categories</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a href="{{ route('categories.show', $category) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item tags">
                                    <div class="sidebar-heading">
                                        <h2>Tag Clouds</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a href="#">Lifestyle</a></li>
                                            <li><a href="#">Creative</a></li>
                                            <li><a href="#">HTML5</a></li>
                                            <li><a href="#">Inspiration</a></li>
                                            <li><a href="#">Motivation</a></li>
                                            <li><a href="#">PSD</a></li>
                                            <li><a href="#">Responsive</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
