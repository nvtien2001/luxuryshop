<!DOCTYPE html>
<html>
<head>
<title>Thanh toán</title>
@include('front-end.common.css')
</head>
<body>
    @include('front-end.common.header')
	<jsp:include page="/WEB-INF/views/front-end/common/header.jsp"></jsp:include>
	<section class="breadcrumb-option">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb__text">
						<h4>Cửa hàng</h4>
						<div class="breadcrumb__links">
							<a href="${pageContext.request.contextPath}/">Trang chủ</a> <img
								src="/images/right-arrow.png">
							<span>Hoá đơn</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="checkout spad">
		<div class="container">
			<div class="checkout__form">
				<form action="/save-cart" method="get" modelAttribute="detailOrder">
				<div class="row">
						<div class="col-lg-6 col-md-6">
							<h6 class="coupon__code">
								<img src="/images/icon4.png">
								Bạn có mã giảm giá, nhập ở đây:
								<input id="discount" name="discount" onchange="shop.check_discount();" /> <span style="color: green" id="mess"></span>
								<input type = "hidden" id="codediscount" name="ccode" /> 
							</h6>
							<h6 class="checkout__title">Chi tiết hoá đơn</h6>
							<div class="row">
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>
											Tên của bạn<span>*</span>
										</p>
										<input id="customerName" name="customerName"  value="{{$user->name}}" required = "required"/>
									</div>
								</div>
							</div>
							<div class="checkout__input">
								<p>
									Địa chỉ<span>*</span>
								</p>
								<input type="text"
									placeholder="Apartment, suite, unite ect (optinal)"
									id="customerAddress" name="customerAddress" value="{{$user->address}}" required = "required"/>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>
											Số điện thoại<span>*</span>
										</p>
										<input type="text" id="customerPhone" name="customerPhone" value="{{$user->phonenumber}}" required = "required"/>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>
											Email<span>*</span>
										</p>
										<input type="text" id="customerEmail" name="customerEmail" value="{{$user->email}}" required = "required"/>
									</div>
								</div>
							</div>

							<div class="checkout__input">
								<p>
									Ghi chú
								</p>
								<input type="text"
									placeholder="Notes about your order, e.g. special notes for delivery."
									id="customerNote" name="customerNote"/>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="checkout__order">
								<h4 class="order__title">Đơn hàng</h4>
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Tên sản phẩm</th>
											<th scope="col">Số lượng</th>
											<th scope="col">Đơn giá</th>
										</tr>
									</thead>
									<tbody>
                                        @for ($i = 0; $i < count($carts); $i++)
											<tr>
												<th scope="row">{{$i + 1}}</th>
												<td>{{$carts[$i]->title}}</td>
												<td>{{$carts[$i]->quantity}}</td>
												<td>{{number_format($carts[$i]->price)}}</td>
											</tr>

                                        @endfor
									</tbody>
								</table>
								<ul class="checkout__total__all">
									<input id="total" type="hidden" value = "{{$total}}">
									<li>Tổng <span><input value="{{$total}}" type="number" readonly="readonly"/></span></li>
									<li>Giá sau mã <span id = "afterprice"><input value="{{$total}}" type="number" readonly="readonly"/></span></li>
								</ul>
								
								<p>Lựa chọn phương thức thanh toán.</p>
								<div class="checkout__input__checkbox">
									<label for="payment"> Thẻ tín dụng <input disabled
										type="checkbox" id="payment"> <span class="checkmark"></span>
									</label>
								</div>
								<div class="checkout__input__checkbox">
									<label for="paypal"> Trả khi nhận hàng <input
										type="checkbox" id="paypal"> <span class="checkmark"></span>
									</label>
								</div>
								<button type="submit" class="site-btn">Đặt mua</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<jsp:include page="/WEB-INF/views/front-end/common/footer.jsp"></jsp:include>
	@include('front-end.common.js')
    @include('front-end.common.footer')
</body>
</html>