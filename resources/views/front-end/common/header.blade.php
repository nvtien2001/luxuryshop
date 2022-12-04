<?php
session_start();
?>
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            <!-- <c:choose>
                <c:when test="${not empty USER}">
                    <a class="nav-link" href="/logout">ĐĂNG
                        XUẤT</a>
                </c:when>
                <c:otherwise>
                    <a class="nav-link" href="/login">ĐĂNG
                        NHẬP </a>
                </c:otherwise>
            </c:choose> -->
            <a href="#">ĐĂNG NHẬP</a>
            <a href="#">FAQs</a>
        </div>
    </div>
    <div class="offcanvas__nav__option">
        <a href="#" class="search-switch"><img src="${{asset('images/search.png')}}" alt=""></a>
        <a href="#"><img src="${{asset('images/heart.png')}}" alt=""></a>
        <a href="/shopping-cart"><img src="${{asset('images/cart_ll.png')}}" alt=""><span id="soLuong">0</span></a>
        <!-- num cart -->
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Miễn phí vận chuyển và 1 đổi 1 trong vòng 12 tháng</p>
    </div>
</div>
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Thanks for your visit !</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                           
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Đăng nhập/Đăng kí</a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="">
                                        Xin chào, {{ Auth::user()->name }}
                                    </a>
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Đăng xuất
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @endguest
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="/">LUXURY SHOP</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="<?php if (strcmp($cate, "home") == 0) echo "active" ?>"><a href="/">Trang chủ</a></li>
                        <li class="<?php if (strcmp($cate, "shop") == 0) echo "active" ?>"><a href="/shop">Cửa hàng</a></li>
                        <li class="<?php if (strcmp($cate, "blog") == 0) echo "active" ?>"><a href="/blog">Blog</a></li>
                        <li class="<?php if (strcmp($cate, "about") == 0) echo "active" ?>"><a href="/about">Về chúng tôi</a>
                            <!-- <ul class="dropdown">
                                <li><a href="/about">Thông tin</a></li>
                                <li><a href="/contact">Liên hệ</a></li>
                            </ul> -->
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="/shop" class="search-switch"><img src="/images/search.png" alt=""></a>
                    
                    @auth
                    
                        <a href="/admin/index"><img src="/images/user-profile.png" alt=""></a>

                    @endauth
                    


                    <a href="/shopping-cart">
                        <img style="heigth:30px;width:30px;" src="/images/cart_ll.png" alt=""> <span class="badge badge-secondary" style="font-size:12px;">@if(Session::has('num_cart')) {{Session::get('num_cart')}}@endif</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="canvas__open"><img src="/images/menu.png"></div>
    </div>
</header>