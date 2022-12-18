<div class="left">
    <span class="left__icon"> <span></span> <span></span> <span></span>
    </span>
    <div class="left__content">
        <div class="left__logo">LUXURY SHOP</div>
        <div class="left__profile">
            <div class="left__image">
                <img src="/assets/admin.jpg" alt="">
            </div>
            <p class="left__name">{{ Auth::user()->name }}</p>

        </div>
        <ul class="left__menu">
            <li class="left__menuItem"><a href="/admin/index" class="left__title"><img src="/assets/icon-dashboard.svg" alt="">Dashboard</a></li>
            <li class="left__menuItem">
                <div class="left__title">
                    <img src="/assets/icon-tag.svg" alt="">Sản Phẩm<img class="left__iconDown" src="/assets/arrow-down.svg" alt="">
                </div>
                <div class="left__text">
                    <a class="left__link" href="/admin/product-add">Thêm Sản Phẩm</a>
                    <a class="left__link" href="/admin/products">Xem Sản Phẩm</a>

                </div>
            </li>
            <li class="left__menuItem">
                <div class="left__title">
                    <img src="/assets/icon-edit.svg" alt="">Danh Mục SP<img class="left__iconDown" src="/assets/arrow-down.svg" alt="">
                </div>
                <div class="left__text">
                    <a class="left__link" href="/admin/category-add">Thêm
                        Mới</a> <a class="left__link" href="/admin/categories">Xem
                        Danh Sách</a>
                </div>
            </li>

            <li class="left__menuItem">
                <div class="left__title">
                    <img src="/assets/icon-settings.svg" alt="">Slide<img class="left__iconDown" src="/assets/arrow-down.svg" alt="">
                </div>
                <div class="left__text">
                    <a class="left__link" href="/admin/slide-add">Thêm
                        Slide</a> <a class="left__link" href="/admin/slides">Xem
                        Slide</a>
                </div>
            </li>
            <li class="left__menuItem"><a href="/admin/customers" class="left__title"><img src="/assets/icon-users.svg" alt="">Khách Hàng</a></li>
            <!-- <li class="left__menuItem"><a href="/admin/orders" class="left__title"><img src="/assets/icon-book.svg" alt="">Đơn Đặt Hàng</a></li> -->
            <li class="left__menuItem">
                <div class="left__title">
                    <img src="/assets/icon-book.svg" alt="">Đơn Đặt Hàng<img class="left__iconDown" src="/assets/arrow-down.svg" alt="">
                </div>
                <div class="left__text">
                    <a class="left__link" href="/admin/orders">Đơn chưa giao</a>
                    <a class="left__link" href="/admin/orders-done">Đơn thành công</a>
                </div>
            </li>
            <li class="left__menuItem">
                <div class="left__title">
                    <img src="/assets/icon-pencil.svg" alt="">Bộ sưu tập<img class="left__iconDown" src="/assets/arrow-down.svg" alt="">
                </div>
                <div class="left__text">
                    <a class="left__link" href="/admin/collection-add">Thêm
                        bộ sưu tập</a> <a class="left__link" href="/admin/collections">Xem
                        bộ sưu tập</a>
                </div>
            </li>
            <li class="left__menuItem">
                <div class="left__title">
                    <img src="/assets/icon-user.svg" alt="">Admin<img class="left__iconDown" src="/assets/arrow-down.svg" alt="">
                </div>
                <div class="left__text">
                    <a class="left__link" href="/admin/decentralization-add">Thêm
                        Admin</a> <a class="left__link" href="/admin/decentralization">Xem
                        Admins</a>
                </div>
            </li>
            <li class="left__menuItem"><a href="/" class="left__title"><img src="/assets/icon-logout.svg" alt="">Trang chủ</a></li>
            <li class="left__menuItem"><a href="" class="left__title"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
            ><img src="/assets/icon-logout.svg" alt="">Đăng Xuất</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
</div>
