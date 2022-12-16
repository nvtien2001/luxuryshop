  <!DOCTYPE html>
  <html>

  <head>
      <title>Cửa hàng</title>
      @include('front-end.common.css')
      <style>
          .shop__sidebar__categories .active {
              color: black;
          }

          .shop__sidebar__price .active {
              color: black;
          }
      </style>
  </head>

  <body>
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
                              <span>Cửa hàng</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <section class="shop spad">
          <div class="container">
              <div class="row">
                  <div class="col-lg-3">
                      <div class="shop__sidebar">
                          <div class="shop__sidebar__search">
                              <form action="{{ url('shop-search') }}" method="get">
                                  <input type="text" placeholder="Tìm kiếm..." name="searchInput">
                                  <button type="submit"><img src="/images/search.png"></button>
                              </form>
                          </div>
                          <div class="shop__sidebar__accordion">
                              <div class="accordion" id="accordionExample">


                                  <div class="card-heading">
                                      <a href="/shop">Sản phẩm </a>
                                  </div>
                                  <div class="card">
                                      <div class="card-heading">
                                          <a data-toggle="collapse" data-target="#collapseOne">Danh mục
                                              <img src="/images/arrow-down.png"></a>
                                      </div>
                                      <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                          <div class="card-body">
                                              <div class="shop__sidebar__categories">
                                                  <ul class="nice-scroll">
                                                      <li><a href="/shop-search?categoryid=-1&page=1" class="@if($currentCategoryId == null) 'active' @endif"> Bỏ lọc</a></li>
                                                      @foreach($categories as $cate)
                                                      <li><a href="/shop-search?categoryid={{$cate->id}}&page=1" class="@if($currentCategoryId == $cate->id) {{'active'}} @endif"> {{$cate->name}}</li>
                                                      @endforeach
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card">
                                      <div class="card-heading">
                                          <a data-toggle="collapse" data-target="#collapseThree">Lọc giá sản phẩm
                                              <img src="/images/arrow-down.png"></a>
                                      </div>
                                      <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                          <div class="card-body">
                                              <div class="shop__sidebar__price">
                                                  <ul>
                                                      <li><a class="@if($price==-1) {{'active'}} @endif" href="/shop-search?priceBegin=-1">Bỏ lọc</a></li>
                                                      <li><a class="@if($price==0) {{'active'}} @endif" href="/shop-search?priceBegin=0&priceEnd=100000&page=1">0đ - 100.000đ</a></li>
                                                      <li><a class="@if($price==100000) {{'active'}} @endif" href="/shop-search?priceBegin=100000&priceEnd=500000&page=1">100.000đ - 500.000đ</a></li>
                                                      <li><a class="@if($price==500000) {{'active'}} @endif" href="/shop-search?priceBegin=500000&priceEnd=1000000&page=1">500.000 - 1.000.000</a></li>
                                                      <li><a class="@if($price==1000000) {{'active'}} @endif" href="/shop-search?priceBegin=1000000">1.000.000+</a></li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Bộ sưu tập
                                        <img src="/images/arrow-down.png"></a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                	<li><a href="/shop-search?collectionid=-1&page=1" class="@if($currentCategoryId == null) 'active' @endif"> Bỏ lọc</a></li>
	                                                @foreach($collections as $collec)
                                                    <li><a href="/shop-search?collectionid={{$collec->id}}&page=1" class="@if($currentCategoryId == $collec->id) {{'active'}} @endif"> {{$collec->name}}</li>
													@endforeach
												</ul>
                                            </div>
                                        </div>
                                    </div>
                                   </div>

                                  <div class="card">
                                      <div class="card-heading">
                                          <a data-toggle="collapse" data-target="#collapseSix">Thẻ
                                              <img src="/images/arrow-down.png"></a>
                                      </div>
                                      <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                          <div class="card-body">
                                              <div class="shop__sidebar__tags">
                                                  @foreach($tags as $tag)
                                                  <a href="/shop-search?tag={{$tag->name}}">{{$tag->name}}</a>
                                                  @endforeach
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-9">
                      <div class="shop__product__option">
                          <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                  <div class="shop__product__option__left">
                                      <p>Hiển thị {{count($products)}} / {{$size}} kết quả</p>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                  <div class="shop__product__option__right">


                                      <p>Sắp xếp giá:</p>
                                      <select onchange="location = this.value;" style="width:20px;">
                                          <option></option>
                                          <option value="/shop-search?sort=asc&page=1">Thấp đến cao</option>
                                          <option value="/shop-search?sort=desc&page=1">Cao đến thấp</option>
                                      </select>

                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          @foreach($products as $product)
                          <div class="col-lg-4 col-md-6 col-sm-6">
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

                      <div class="row">
                          <div class="col-lg-12">

                              <div class="product__pagination">
                                  @if($totalPage == 1)
                                  <a href="/shop-search?page=1" class="active"><button type="button" class="btn btn-outline-dark">1</button></a>
                                  @else
                                  @if($currentPage > 1 && $currentPage <= $totalPage) <a href="/shop-search?page={{$currentPage - 1}}"><button type="button" class="btn btn-outline-dark">&laquo;</button></a>
                                      @endif

                                    @for($i = 1; $i <= $totalPage; $i++) @if($i==$currentPage) <a href="/shop-search?page={{$i}}" class="active"><button type="button" class="btn btn-outline-dark">{{$i}}</button></a>
                                          @endif
                                          @if($i != $currentPage)
                                          <a href="/shop-search?page={{$i}}"><button type="button" class="btn btn-outline-dark">{{$i}}</button></a>
                                          @endif
                                    @endfor
                                          @if ($currentPage >= 1 && $currentPage < $totalPage) <a href="/shop-search?page={{$currentPage + 1}}"><button type="button" class="btn btn-outline-dark">&raquo;</button></a>
                                              @endif
                                    @endif
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      @include('front-end.common.footer')
      <script type="text/javascript" src="{{asset('js/page.js')}}"></script>
      @include('front-end.common.js')
  </body>

  </html>
