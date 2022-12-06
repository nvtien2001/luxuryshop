<!DOCTYPE html>
<html>

<head>
    <title>Trang chủ</title>

    @include('front-end.common.css')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" rel="stylesheet">
    <style>
        .slick-arrow {
            color: black;
            background-color: black;
            border-radius: 50%;
        }

        .slick-arrow:hover {
            color: black;
            background-color: black;
            border-radius: 50%;
        }

        .slick-arrow:focus {
            color: black;
            background-color: black;
            border-radius: 50%;
        }

        .product__item {
            margin-right: 15px;
            margin-left: 15px;
        }

        .hihi {
            margin-top: 45px;
        }

        .product__service__more a {
            color: black;
        }

        .product__service__more a:hover {
            color: black;
        }

        .inhome {
            text-align: center;
            font-size: 30px;
            font-weight: bolder;
            color: black;
            margin-top: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid black;
        }
    </style>
</head>

<body>

    @include('front-end.common.header')

    <section class="hero">
        <div class="container-fluid">
            <div class="hero__slider owl-carousel">
                @foreach($banners as $banner)
                <div class="hero__items set-bg" data-setbg="/file/upload/{{$banner->url_img}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 col-md-8">
                                <div class="hero__text">
                                    <h6>LUXURY SHOP</h6>
                                    <h2>{{$banner->name}}</h2>
                                    <p>{{$banner->description}}</p>
                                    <a href="/{{$banner->url}}" class="primary-btn">Khám phá ngay
                                    </a>
                                    <div class="hero__social">
                                        <a><img src="/images/facebook.png"></a>
                                        <a><img src="/images/twitter.png"></a>
                                        <a><img src="/images/pinterest.png"></a>
                                        <a><img src="/images/instagram.png"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
{{--  --}}
    <section class="product__service container">
        <div class="inhome">
            Sản phẩm bán chạy
        </div>
        <div class="row hihi">
            @foreach($hots as $product)
                <div>
                    <div class="product__item">

                        <div class="product__item__pic set-bg" data-setbg="/file/upload/{{$product->url_avatar}}">
                            <span class="label">Hot</span>
                            <ul class="product__hover">
                                <li><a href=""><img src="/images/redheart.png" alt=""><span>Yêu thích</span></a></li>
                                <li><a><img src="/images/compare.png" alt=""><span>So sánh</span></a></li>
                                <li><a href="/shop-details/{{$product->seo}}"><img src="/images/search.png" alt=""><span>Chi tiết</span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$product->title}}</h6>
                            <a href="javascript:void(0)" class="add-cart" onclick="cart.choose_product_to_cart({{$product->id}}, 1)">+ Thêm vào giỏ hàng</a>


                            <div class="rating d-flex">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                            </div>
                            <h5>
                                {{number_format($product->price)}}
                                <span style="text-decoration:line-through; font-size:14px; color:grey;">
                                    {{number_format($product->price_old)}}
                                </span>
                            </h5>
                            <div class="product__color__select">
                                <label class="silver" for="pc-1">
                                    <input type="radio" id="pc-1">
                                </label>
                                <label class="active grey" for="pc-2">
                                    <input type="radio" id="pc-2">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="product__service container">
        <div class="inhome">
            Sản phẩm mới
        </div>
        <div class="row hihi">
        @foreach($news as $product)
                <div>
                    <div class="product__item">

                        <div class="product__item__pic set-bg" data-setbg="/file/upload/{{$product->url_avatar}}">
                            <span class="label">New</span>
                            <ul class="product__hover">
                                <li><a href=""><img src="/images/redheart.png" alt=""><span>Yêu thích</span></a></li>
                                <li><a><img src="/images/compare.png" alt=""><span>So sánh</span></a></li>
                                <li><a href="/shop-details/{{$product->seo}}"><img src="/images/search.png" alt=""><span>Chi tiết</span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$product->title}}</h6>
                            <a href="javascript:void(0)" class="add-cart" onclick="cart.choose_product_to_cart({{$product->id}}, 1)">+ Thêm vào giỏ hàng</a>


                            <div class="rating d-flex">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                            </div>
                            <h5>
                                {{number_format($product->price)}}
                                <span style="text-decoration:line-through; font-size:14px; color:grey;">
                                    {{number_format($product->price_old)}}
                                </span>
                            </h5>
                            <div class="product__color__select">
                                <label class="silver" for="pc-1">
                                    <input type="radio" id="pc-1">
                                </label>
                                <label class="active grey" for="pc-2">
                                    <input type="radio" id="pc-2">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="product__service container">
        <div class="inhome">
            Giảm giá
        </div>
        <div class="row hihi">
        @foreach($sales as $product)
                <div>
                    <div class="product__item">

                        <div class="product__item__pic set-bg" data-setbg="/file/upload/{{$product->url_avatar}}">
                            <span class="label">Sale</span>
                            <ul class="product__hover">
                                <li><a href=""><img src="/images/redheart.png" alt=""><span>Yêu thích</span></a></li>
                                <li><a><img src="/images/compare.png" alt=""><span>So sánh</span></a></li>
                                <li><a href="/shop-details/{{$product->seo}}"><img src="/images/search.png" alt=""><span>Chi tiết</span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$product->title}}</h6>
                            <a href="javascript:void(0)" class="add-cart" onclick="cart.choose_product_to_cart({{$product->id}}, 1)">+ Thêm vào giỏ hàng</a>


                            <div class="rating d-flex">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                            </div>
                            <h5>
                                {{number_format($product->price, 3)}}
                                <span style="text-decoration:line-through; font-size:14px; color:grey;">
                                    {{number_format($product->price_old, 3)}}
                                </span>
                            </h5>
                            <div class="product__color__select">
                                <label class="silver" for="pc-1">
                                    <input type="radio" id="pc-1">
                                </label>
                                <label class="active grey" for="pc-2">
                                    <input type="radio" id="pc-2">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2><span>Sofa da Italia</span></h2>
                        <h4><span>Thiết kế ưu việt</span></h4>
                        <h4><span>Chất liệu da nhập khẩu châu Âu</span></h4>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="/images/sofa.jpg" alt="">
                        <div class="hot__deal__sticker">
                            <span>Giảm giá còn </span>
                            <h5>249,000đ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Ưu đãi cực lớn!</span>
                        <h2>Sofa da Italia</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Ngày</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Giờ</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Phút</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Giây</p>
                            </div>
                        </div>
                        <a href="/shop-details/mvvk2-mvvm2-macbook-pro-16-inch-2019-i9-2-3-64gb-8tb-1609917082161" class="primary-btn">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @for($i=0;$i < count($collections); $i++)
        <section class="product__service container">
            <div class="product__service__bar">
                <div class="product__service__name">{{$collections[$i]->name}}</div>
                <!-- notice -->
                <div class="product__service__more"><a href="/shop-search?collectionid={{$collections[$i]->id}}">Xem thêm</a>
                </div>
            </div>
            <div class="row hihi">
                @foreach($cate_prod[$i] as $product)
                <div>
                    <div class="product__item">

                        <div class="product__item__pic set-bg" data-setbg="/file/upload/{{$product->url_avatar}}">
                            @if ($product->ishot)
                                <span class="label">Hot</span>
                            @elseif ($product->isnew)
                                <span class="label">New</span>
                            @elseif ($product->issale)
                                <span class="label">Sale</span>
                            @else
                                <span class="label"></span>
                            @endif
                            <ul class="product__hover">
                                <li><a href=""><img src="/images/redheart.png" alt=""><span>Yêu thích</span></a></li>
                                <li><a><img src="/images/compare.png" alt=""><span>So sánh</span></a></li>
                                <li><a href="/shop-details/{{$product->seo}}"><img src="/images/search.png" alt=""><span>Chi tiết</span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$product->title}}</h6>
                            <a href="javascript:void(0)" class="add-cart" onclick="cart.choose_product_to_cart({{$product->id}}, 1)">+ Thêm vào giỏ hàng</a>


                            <div class="rating d-flex">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                                <img width="15px" src="/images/yellow-star.png">
                            </div>
                            <h5>
                                {{number_format($product->price)}}
                                <span style="text-decoration:line-through; font-size:14px; color:grey;">
                                    {{number_format($product->price_old)}}
                                </span>
                            </h5>
                            <div class="product__color__select">
                                <label class="silver" for="pc-1">
                                    <input type="radio" id="pc-1">
                                </label>
                                <label class="active grey" for="pc-2">
                                    <input type="radio" id="pc-2">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    @endfor

    <section class="blog__section">
    	<div class="site__section" id="blog__section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h3 class="section__sub__title">Tin tức mới</h3>
            <h2 class="section__title mb-3">Bài viết</h2>
          </div>
        </div>

        <div class="row">
            @for($i=0;$i < 3; $i++)
          		<div class="blog__section__item col-md-6 col-lg-4 mb-4 mb-lg-4">
		            <div class="h-entry">
		              <img style="height: 235px;" src="/images/{{$blogs[$i]->image}}" alt="Image" class="img-fluid">
		              <h2 class="font__size__regular"><a  class="text-black">{{$blogs[$i]->title}} </a></h2>
		              <div class="meta mb-4">Love u <span class="mx-2">&bullet;</span> All time<span class="mx-2">&bullet;</span> </div>
		              <p class="customm">{{$blogs[$i]->description }}</p>
		              <p><a href="/view-blog">Đọc tiếp...</a></p>
		            </div>
         		 </div>
            @endfor
        </div>
      </div>
    </div>
    </section>

    @include('front-end.common.footer')

    @include('front-end.common.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <script>
        $('.hihi').slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 4,
            slidesToScroll: 1,
            centerPadding: '60px',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        centerPadding: '60px',
                        infinite: true
                    }
                },
                {
                    breakpoint: 850,
                    settings: {
                        slidesToShow: 3,
                        centerPadding: '40px',
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 2,
                        centerPadding: '30px',
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '20px',
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>

</body>

</html>
