@extends('layouts.app')

@section('title', 'Trang chủ')

{{-- ================= BANNER ================= --}}
@section('banner')
@if($banners->count())
    @foreach($banners as $banner)
        <img
            src="{{ asset('storage/'.$banner->image) }}"
            alt="{{ $banner->title ?? 'Banner' }}"
            class="main-food-img"
        >

        <div class="food-box">
            <h2>{{ $banner->title }}</h2>
            <p>{{ $banner->subtitle }}</p>
        </div>
    @endforeach
@else
    <img src="{{ asset('images/banner.png') }}" class="main-food-img">
@endif
@endsection


{{-- ================= POST + TRENDING ================= --}}
@section('post')

@php
    // Lấy post trending
    $trendingPosts = $posts->where('is_trending', 1)->values();
@endphp

<div class="trending-box">
    <h3>TRENDING NOW</h3>

    {{-- LUÔN HIỂN THỊ 4 ITEM --}}
    @for($i = 0; $i < 4; $i++)
        @if(isset($trendingPosts[$i]))
            <div class="trend-item">
                <img
                    src="{{ $trendingPosts[$i]->thumbnail
                        ? asset('storage/'.$trendingPosts[$i]->thumbnail)
                        : asset('images/default.png') }}"
                    alt="{{ $trendingPosts[$i]->title }}"
                >
                <p>{{ $trendingPosts[$i]->title }}</p>
            </div>
        @else
            {{-- SLOT ĐỆM GIỮ GIAO DIỆN FE --}}
            <div class="trend-item">
                <img src="{{ asset('images/default.png') }}" alt="Trending">
                <p>Trending post</p>
            </div>
        @endif
    @endfor
</div>

@endsection


{{-- ================= CHICKEN RECIPES ================= --}}
@section('chicken_recipes')

<section class="chicken-wrap">

    <h2 class="title">CHICKEN RECIPES</h2>

    <div class="recipe-layout">

        {{-- LEFT BIG --}}
        <div class="left-big">
            @if(!empty($chicken_featured))
                <img
                    src="{{ $chicken_featured->thumbnail
                        ? asset('storage/'.$chicken_featured->thumbnail)
                        : asset('images/default.png') }}"
                >
                <div class="info">
                    <h3>{{ $chicken_featured->title }}</h3>
                    <p>
                        ${{ number_format($chicken_featured->recipe_price ?? 0, 2) }}
                        RECIPES /
                        ${{ number_format($chicken_featured->serving_price ?? 0, 2) }}
                        SERVING
                    </p>
                </div>
            @endif
        </div>

        {{-- RIGHT GRID --}}
        <div class="right-grid">
            @forelse($chicken_recipes->take(4) as $item)
                <div class="card">
                    <img
                        src="{{ $item->thumbnail
                            ? asset('storage/'.$item->thumbnail)
                            : asset('images/default.png') }}"
                    >
                    <div class="info">
                        <h3>{{ $item->title }}</h3>
                        <p>
                            ${{ number_format($item->recipe_price ?? 0, 2) }}
                            RECIPES /
                            ${{ number_format($item->serving_price ?? 0, 2) }}
                            SERVING
                        </p>
                    </div>
                </div>
            @empty
                {{-- fallback giữ layout --}}
                @for($i = 0; $i < 4; $i++)
                    <div class="card">
                        <img src="{{ asset('images/default.png') }}">
                        <div class="info">
                            <h3>Chicken recipe</h3>
                            <p>$0.00 RECIPES / $0.00 SERVING</p>
                        </div>
                    </div>
                @endfor
            @endforelse
        </div>

    </div>

   <div class="center-btn">
    <a href="#" class="more-btn" style="text-decoration: none;">
        MORE CHICKEN RECIPES
    </a>
</div>


</section>

@endsection

{{-- ================= PASTA RECIPES ================= --}}
@section('pasta_recipes')

<section class="pasta-section">

    <h2 class="title">PASTA RECIPES</h2>

    <div class="pasta-grid">

        @forelse($pasta_recipes->take(8) as $item)
            <article class="card">
                <div class="card-image">
                    <img
                        src="{{ $item->thumbnail
                            ? asset('storage/'.$item->thumbnail)
                            : asset('images/default.png') }}"
                        alt="{{ $item->title }}"
                    >
                </div>

                <div class="card-body">
                    <h3 class="card-title">{{ $item->title }}</h3>
                    <p class="card-meta">
                        ${{ number_format($item->recipe_price ?? 0, 2) }}
                        RECIPE /
                        ${{ number_format($item->serving_price ?? 0, 2) }}
                        SERVING
                    </p>
                </div>
            </article>
        @empty
            {{-- fallback giữ layout FE --}}
            @for($i = 0; $i < 8; $i++)
                <article class="card">
                    <div class="card-image">
                        <img src="{{ asset('images/default.png') }}" alt="Pasta">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Pasta recipe</h3>
                        <p class="card-meta">$0.00 RECIPE / $0.00 SERVING</p>
                    </div>
                </article>
            @endfor
        @endforelse

    </div>

   <div class="controls">
    <a href="#" class="more-btn" style="text-decoration: none;">
        MORE PASTA RECIPES
    </a>
</div>


</section>

@endsection

{{-- ================= READER FAVORITES ================= --}}
@section('reader_favorites')

<section class="favorites-section-01">

    <!-- Bg -->
    <div class="favorites-bg-01"></div>

    <!-- tiêu đề + line -->
    <div class="favorites-overlay-title-01">
        <h2 class="favorites-title-01">READER’S FAVORITES</h2>
        <div class="favorites-line-01"></div>
    </div>

    <!-- CONTENT -->
    <div class="favorites-container-01">

        <div class="cards-wrapper-01">

            @forelse($reader_favorites->take(3) as $item)
                <div class="card-item-01">
                    <img
                        src="{{ $item->thumbnail
                            ? asset('storage/'.$item->thumbnail)
                            : asset('images/default.png') }}"
                        class="card-img-01"
                    >
                    <div class="card-body-01">
                        <div class="rating-01">★★★★★</div>
                        <h3>{{ $item->title }}</h3>
                        <p>{{ Str::limit($item->excerpt, 80) }}</p>
                        <a href="#" class="card-btn-01">GET RECIPE →</a>
                    </div>
                </div>
            @empty
                {{-- fallback giữ layout FE --}}
                @for($i = 0; $i < 3; $i++)
                    <div class="card-item-01">
                        <img src="{{ asset('images/default.png') }}" class="card-img-01">
                        <div class="card-body-01">
                            <div class="rating-01">★★★★★</div>
                            <h3>Favorite recipe</h3>
                            <p>Description of favorite recipe...</p>
                            <a href="#" class="card-btn-01">GET RECIPE →</a>
                        </div>
                    </div>
                @endfor
            @endforelse

        </div>

        <!-- button căn trái theo card -->
        <div class="btn-wrapper-01">
            <button class="find-btn-01">FIND DINNER TONIGHT</button>
        </div>

    </div>
</section>

@endsection

{{-- ================= AUTHOR SECTIONS ================= --}}
@section('author_sections')

@if(!empty($author_sections))
<section class="about-section-02">

    <div class="about-container-02">

        <!-- CARD -->
        <div class="about-card-02">

            <!-- text trái -->
            <div class="about-text-02">
                <h2 class="about-title-02">
                    {{ $author_sections->title }}
                </h2>

                @if($author_sections->description)
                    <p class="about-desc-02">
                        {{ $author_sections->description }}
                    </p>
                @endif

                {{-- NÚT CỐ ĐỊNH – KHÔNG LẤY TỪ DB --}}
                <a href="#"
                   class="about-btn-02">
                    LEARN MORE
                </a>
            </div>

            <!-- ảnh phải -->
            <div class="about-image-wrap-02">
                @if($author_sections->image)
                    <img
                        src="{{ asset('storage/'.$author_sections->image) }}"
                        class="about-image-02"
                        alt="author">
                @endif
            </div>

        </div>

        <!-- AS SEEN ON (FE cứng giữ nguyên) -->
        <div class="about-seen-02">
            <p class="about-seen-text-02">AS SEEN ON</p>

            <img
                src="{{ asset('images/as-seen-on-desktop 1 (1).png') }}"
                class="about-logo-single-02"
                alt="logos">
        </div>

    </div>
</section>
@endif
@endsection

{{-- ================= HOW TOS ================= --}}
@section('how_tos')

@if($how_tos->count())
<section class="favorites-section-X100">

    <div class="favorites-bg-X100"></div>

    <div class="favorites-overlay-title-X100">
        <h2 class="favorites-title-X100">LEARN HOW TO ...</h2>
        <div class="favorites-line-X100"></div>
    </div>

    <div class="favorites-container-X100">
        <div class="cards-wrapper-X100">

            @foreach($how_tos->take(9) as $item)
            <div class="card-item-X100">
                <div class="card-img-wrap-X100">
                    <img
                        src="{{ $item->thumbnail
                            ? asset('storage/'.$item->thumbnail)
                            : asset('images/default.png') }}"
                        class="card-img-X100">
                </div>

                <div class="card-body-X100">
                    <h3>…{{ $item->title }}</h3>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif

@endsection

{{-- ================= BREAKFAST RECIPES ================= --}}
@section('breakfast_recipes')

<section class="pasta-section">

    <h2 class="title">BREAKFAST RECIPES</h2>

    <div class="pasta-grid">

        @forelse($breakfast_recipes as $item)
            <article class="card">
                <div class="card-image">
                    <img
                        src="{{ $item->thumbnail
                            ? asset('storage/'.$item->thumbnail)
                            : asset('images/default.png') }}"
                        alt="{{ $item->title }}">
                </div>

                <div class="card-body">
                    <h3 class="card-title">
                        {{ strtoupper($item->title) }}
                    </h3>

                    <p class="card-meta">
                        ${{ number_format($item->recipe_price ?? 0, 2) }}
                        RECIPE /
                        ${{ number_format($item->serving_price ?? 0, 2) }}
                        SERVING
                    </p>
                </div>
            </article>
        @empty
            {{-- fallback giữ layout FE --}}
            @for($i = 0; $i < 8; $i++)
                <article class="card">
                    <div class="card-image">
                        <img src="{{ asset('images/default.png') }}">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Breakfast recipe</h3>
                        <p class="card-meta">$0.00 RECIPE / $0.00 SERVING</p>
                    </div>
                </article>
            @endfor
        @endforelse

    </div>

    <div class="controls">
        <button class="more-btn" type="button">
            MORE BREAKFAST RECIPES
        </button>
    </div>

</section>

@endsection

{{-- ================= Under recipes ================= --}}

@section('under_recipes')
<section class="pasta-section">

    <h2 class="title">UNDER 10$</h2>

    <div class="pasta-grid">
        @foreach($under_recipes as $item)
        <article class="card">
            <div class="card-image">
                <img src="{{ $item->thumbnail 
                    ? asset('storage/'.$item->thumbnail) 
                    : asset('images/no-image.png') }}">
            </div>

            <div class="card-body">
                <h3 class="card-title">
                    {{ $item->title }}
                </h3>

                <p class="card-meta">
                    ${{ $item->recipe_price ?? '—' }} RECIPE /
                    ${{ $item->serving_price ?? '—' }} SERVING
                </p>
            </div>
        </article>
        @endforeach
    </div>

   <div class="controls">
    <a href="{{ route('under_recipes.index') }}"
       class="more-btn"
       style="text-decoration: none;">
        MORE RECIPES UNDER 10$
    </a>
</div>


</section>
@endsection
