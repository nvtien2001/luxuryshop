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
						<h2 style="text-align:center; color:DodgerBlue">Đặt hàng thành công</h2>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    	
    </script>
    @include('front-end.common.footer')
	@include('front-end.common.js')
</body>
</html>