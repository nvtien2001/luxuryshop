<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/login.css')}}" type="text/css">
    <style type="text/css">
        .errorreg {
            color: red;
        }
    </style>
</head>

<body>
    <div class="login__form">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button class="toggle-btn" onclick="login()">Đăng nhập</button>
                <button class="toggle-btn" onclick="register()">Đăng kí</button>
            </div>
            <div class="social-icon">
                <a href="#"><img src="/images/fb.png"></a>
                <a href="#"><img src="/images/tt.png"></a>
                <a href="#"><img src="/images/gg.png"></a>
            </div>
            <form id="login" class="input-group" action="/action-form-login" method="POST">
                <!-- <c:if test="${not empty param.page_error}">
                    <div class="alert alert-danger" role="alert">
                        Tài khoản hoặc mật khẩu không chính xác!
                    </div>
                </c:if> -->
                <input type="text" class="input-field" placeholder="Tên đăng nhập" required name="username">
                <input type="password" class="input-field" placeholder="Mật khẩu" required name="password">
                <input type="checkbox" name="remember-me" class="check-box"><span>Nhớ tài khoản, mật khẩu</span>
                <button class="submit-btn" type="submit">Đăng nhập</button>

            </form>
            <!-- <form:form id="register" class="input-group" method="post" action="/registion" modelAttribute="user">
                <form:input type="text" class="input-field" placeholder="Tên đăng nhập" required="required" path="username" />
                <form:errors style="position:sticky;" path="username" cssClass="errorreg"></form:errors>
                <form:input type="text" class="input-field" placeholder="Tên của bạn" path="name" />
                <form:input type="email" class="input-field" placeholder="Email" required="required" path="email" />
                <form:errors style="position:sticky;" path="email" cssClass="errorreg"></form:errors>
                <form:input id="passwordr" type="password" class="input-field" required="required" placeholder="Mật khẩu" path="password" />
                <form:errors style="position:sticky;" path="password" cssClass="errorreg"></form:errors>
                <input id="confirm_passwordr" type="password" class="input-field" placeholder="Nhập lại mật khẩu" required name="password-again">
                <input type="checkbox" class="check-box" checked><span>Tôi chấp nhận những điều khoản trên.</span>
                <button type="submit" class="submit-btn">Đăng kí</button>
            </form:form> -->
            <div class="cancel">
                <button value="Redirect Me" onclick="Redirect();"><img src="/images/arrow-left.png"><span>
                        Trở về trang chủ
                    </span></button>
            </div>
        </div>
    </div>

    <!-- <script type="text/javascript">
        < c: if test = "${not empty userexist}" >
            window.alert("Tên tài khoản đã tồn tại!"); <
        /c:if> <
        c: if test = "${not empty notsimilar}" >
            window.alert("Mật khẩu không giống nhau!"); <
        /c:if> <
        c: if test = "${not empty successr}" >
            window.alert("Đăng kí thành công!"); <
        /c:if>
        $('#passwordr, #confirm_passwordr').on('keyup', function() {
            if ($('#passwordr').val() == $('#confirm_passwordr').val()) {
                $('#messager').html('Hợp lệ').css('color', 'green');
            } else
                $('#messager').html('Không khớp').css('color', 'red');
        });
    </script> -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/mixitup.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-450px";
            y.style.left = "50px";
            z.style.left = "175px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }

        function Redirect() {
            window.location = "/";
        }
    </script>

    <c:if test="${user.username != null || user.username != ''}">
        <script type="text/javascript">
            register();
        </script>
    </c:if>

</body>

</html>