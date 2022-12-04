
<!DOCTYPE html>
<html>
<head>
    <title>Giỏ hàng</title>
    <style>
    	.CartIsEmpty{
    		text-align:center;
    		font-size:30px;
    		font-weight:bolder;
    		text-transform: uppercase; 
    		color:grey;
    		margin-bottom: 40px;
    	}
    </style>
	@include('front-end.common.css')
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
                            <a href="${pageContext.request.contextPath}/">Trang chủ</a>
                            <img src="/images/right-arrow.png">
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
								@if (count($carts) === 0)
                                	<div class="CartIsEmpty">Chưa có sản phẩm nào trong giỏ hàng!</div>
								@endif
                                @if (count($carts) > 0)
                        <table>
                            <thead>
                                <tr>
                                	<th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
									@for ($i = 0; $i < count($carts); $i++)
										<tr id="{{$carts[$i]->id}}">
											<td class="STT">{{$i+1}}</td>
											<td class="product__cart__item">
												<div class="product__cart__item__pic">
													<!-- <c:choose>
														<c:when test="${item.productCart.productImages.isEmpty() == false }"> -->
														<img
														src="/file/upload/{{$carts[$i]->url_avatar}}"
														alt=""
														style='width: 80px; height: 80px'>
														<!-- </c:when>
														<c:otherwise>
															<div style="height:71px;width: 100px;float: left;margin-right: 30px;" class="product__item__pic set-bg" data-setbg="http://placehold.it/100x60">
														</c:otherwise>
													</c:choose> -->
													
												</div>
												<div class="product__cart__item__text">
													<h6>{{$carts[$i]->title}}</h6>
													<h5>{{number_format($carts[$i]->price)}} </h5>
													<!-- <h5><fmt:formatNumber value="${item.productCart.price }" type="number"/></h5> -->
												</div>
											</td>
											<td class="quantity__item">
												<div class="quantity">
													<div class="pro-qty-2">
														<input id="quantity_{{$carts[$i]->id}}" value="{{$carts[$i]->quantity}}" type="number" min="1" max="999" 
														onchange="cart.linh_change_quantity_product({{$carts[$i]->id}},$('#quantity_{{$carts[$i]->id}}').val(),'#price_{{$carts[$i]->id}}',{{$carts[$i]->price}});" >
													</div>
												</div>
											</td>
											<td class="cart__price">
												<input id="price_{{$carts[$i]->id}}"  value="{{number_format($carts[$i]->price * $carts[$i]->quantity)}}" disabled>
												<!-- <fmt:formatNumber value="${item.productCart.price * item.quantity}" type="number"/></td> -->
											<td class="cart__close"><a href="#" onclick="cart.remove_product({{$carts[$i]->id}});"><img
												src="/images/cancel.png"></a></td>
										</tr>
									@endfor
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <!-- <a href="${pageContext.request.contextPath}/shop">Tiếp tục mua sắm</a> -->
                                <a href="/shop">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
								{{-- @if (count($carts) > 0) --}}
                                <a <?php if(count($carts) == 0) { ?>   <?php } else { ?> href="/checkout"> <?php } ?>
								{{-- @endif --}}
                                <img src="/images/update.png">
								Đặt hàng</a>
								
                            </div>
                        </div>
                    </div>
                </div>
               </div>
        </div>
    </section>
    <script type="text/javascript">
    	<c:if test="${not empty checkout}">
    		window.confirm("Đặt hàng thành công!");
    	</c:if>
    </script>
    @include('front-end.common.footer')
	@include('front-end.common.js')
</body>
</html>