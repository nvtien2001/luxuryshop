<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
    @include('front-end.common.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" rel="stylesheet">
	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5ffd8209f474080012973dbd&product=sticky-share-buttons" async></script>
	<style>
	.slick-arrow{
		color:black;
		background-color:black;
		border-radius: 50%;
	}
	
	.slick-arrow:hover{
		color:black;
		background-color:black;
		border-radius: 50%;
	}
	
	.slick-arrow:focus{
		color:black;
		background-color:black;
		border-radius: 50%;
	}
	.product__item{
	 margin-right: 15px;
	 margin-left:15px;
	}
	
	.hihi{
		margin-top:45px;
	}
	
	.comment{
		display:flex;
		justify-content: space-around;
		margin-bottom: 40px;
	}
	.linh-custom {
		list-style-type: none;
		margin-top:30px;
	}
	.linh-custom > li {
		margin-left : 0px;
		margin-top:20px;
		padding-left: 0px;
		text-align: left;
		font-family: "Nunito Sans", sans-serif;
	}
	</style>
</head>
<body>
	
	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="0D4iIgNj"></script>
	
	
@include('front-end.common.header')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Cửa hàng</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Trang chủ</a>
                            <img src="/images/right-arrow.png">
                            <span>Chi tiết</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            @for($i=0; $i < count($images);$i++)
                            	<li class="nav-item">
                                    <a class="nav-link @if($i == 0){{'active'}} @endif " data-toggle="tab" href="#tabs-{{$i}}" role="tab">
                                        <div class="product__thumb__pic set-bg" data-setbg="/file/upload/{{$images[$i]->path}}">
                                        </div>
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <!-- here -->
                     
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                        @for($i=0; $i < count($images);$i++)
                            	<div class="tab-pane @if($i == 0){{'active'}} @endif" id="tabs-{{$i}}" role="tabpanel">
			                    	<div class="product__details__pic__item">
			                           	<img src="/file/upload/{{$images[$i]->path}}" alt="">
			                        </div>
			                     </div>
                            @endfor
                        </div>
                    </div>
                    <!-- test -->
                    <div class="col-lg-3 col-md-3">
                    	<h4 style="font-size: 23px;margin-left:0px;text-align: left;"><b>{{$product->title}}</b></h4>
                        <ul class="linh-custom">
                            
                            <li>
                            	<b>Chất liệu: </b>{{$product->material}}
                            </li>
                            <li>
	                            <b>Xuất xứ: </b>{{$product->origin}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$product->title}}</h4>
                            <div class="rating">
                                <form >
                                <div class="star-icon">
                                <input type="radio" name="rating1" id="rating1" checked >
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" name="rating1" id="rating2" checked >
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" name="rating1" id="rating3" checked >
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" name="rating1" id="rating4" checked >
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" name="rating1" id="rating5" checked >
                                <label for="rating5" class="fa fa-star"></label>
                                </div>
                            	</form>
                            </div>
                            <h3> {{number_format($product->price)}} <span>{{number_format($product->price_old)}}</span></h3>
                            
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" class="quality">
                                    </div>
                                </div>
                                <a href="javascript:void(0)" class="primary-btn" onclick="cart.choose_product_to_cart({{$product->id}}, $('.quality').val())">Thêm vào giỏ hàng</a>
                            </div>
                            <div class="product__details__btns__option">
                                <a ><img src="/images/redheart.png" alt=""> Sản phẩm yêu thích</a>
                            </div>
                            <div class="product__details__last__option">
                                <h5><span>Đảm bảo thanh toán an toàn</span></h5>
                                <img src="/images/payment.png" alt="">
                                
                            </div>
                            <div class="sharethis-inline-share-buttons"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div>
                                        <h1 class="desc-product">Mô tả:</h1>
                                    </div>
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <h5>Thông tin sản phẩm:</h5>
                                            <div>{!! $product->detail_description !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
    <div class="container">
            <div class="row">
                <div class="col-lg-12 comment">
                    <div class="fb-comments" data-href="http://localhost:8888/" data-width="" data-numposts="5"></div>
                </div>
            </div>
            </div>
    </section>
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title text-centerr">Sản phẩm khác</h3>
                </div>
            </div>
            <div class="row hihi">
            	@foreach($relatedProducts as $product)
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
                                {{$product->price}} 
                                <span style="text-decoration:line-through; font-size:14px; color:grey;">
                                    {{$product->price_old}}
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
        </div>
    </section>
    @include('front-end.common.footer')
    @include('front-end.common.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js">
	</script> 
	
	
	<script>
	function rate() {
		alert("Vui lòng đăng nhập!");
	}
	$('.hihi').slick({
		  infinite: true,
		  autoplay: true,
		  autoplaySpeed: 2000,
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  centerPadding: '60px',
		  responsive: [
		    {
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