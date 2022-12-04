
<script>
    function linhcustom() {
        if(confirm("Vui lòng đăng nhập để có trải nghiệm tốt nhất!")){
            event.stopPropagation(); event.preventDefault();
            window.location.replace("${pageContext.request.contextPath}/login");
        } else {
            event.stopPropagation(); event.preventDefault();
        }
    }

    function linhcustom2() {
        if(confirm("Đăng nhập để lưu giỏ hàng cho lần tới ghé thăm bạn nhé!")){
            event.stopPropagation(); event.preventDefault();
            window.location.replace("${pageContext.request.contextPath}/login");
        } else {
            event.stopPropagation(); event.preventDefault();
        }
    }
</script>

<script type="text/javascript" src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.slicknav.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mixitup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/javascript.js')}}"></script>
