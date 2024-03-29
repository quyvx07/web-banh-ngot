<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if (Auth::check())
                        @if(Auth::id()==4)
                            <li><a href="{{route('admin.category.index')}}">Quản Lý</a></li>
                        @endif
                    @endif
                    <li><a href="#"><i class="fa fa-user"></i>
                            @if (Auth::check())
                                {{Auth::user()->name}}
                            @else
                                {{'Tài khoản'}}
                            @endif
                        </a></li>
                    @if (Auth::check())
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li><a href="{{route('register')}}">Đăng kí</a></li>
                        <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="" id="logo"><img src="storage/source/assets/dest/images/logo-cake.png" width="200px"
                                                    alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('page.search')}}">
                        @csrf
                        <input type="text" value="" name="keyword" id="s" placeholder="Nhập từ khóa..."/>
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng
                            (@if(Session::has('cart')) {{Session::get('cart')->totalQty}} @else Trống) @endif<i
                                class="fa fa-chevron-down"></i></div>

                        <div class="beta-dropdown cart-body">
                            @if(Session::has('cart'))
                                @foreach($cart->items as $product)
                                    <div class="cart-item">
                                        <div class="media">
                                            <a class="pull-left" href="#"><img
                                                    src="storage/source/image/product/{{$product['item']['image']}}"
                                                    alt=""></a>
                                            <div class="media-body">
                                                <span class="cart-item-title">{{$product['item']['name']}}</span>
                                                <span
                                                    class="cart-item-amount">{{$product['qty']}}*<span>
                                                        @if( $product['item']['promotion_price'] == 0)
                                                            {{number_format($product['item']['unit_price'])}}
                                                        @else
                                                            {{number_format($product['item']['promotion_price'])}}
                                                        @endif
                                                        Đồng </span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span
                                        class="cart-total-value">
                                        @if(Session::has('cart'))
                                            {{number_format(Session('cart')->totalPrice)}}
                                        @endif
                                            Đồng</span>
                                </div>
                                <div class="right">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{route('page.getShoppingCart')}}" class="beta-btn primary text-center">Chi
                                        tiết<i
                                            class="fa fa-chevron-right"></i></a>

                                    <a href="{{route('page.checkOut')}}" class="beta-btn primary text-center">Đặt hàng
                                        <i
                                            class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span>
                <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('page.index')}}">Trang chủ</a></li>
                    <li><a href="{{route('page.getProductType',1)}}">Loại Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($product_type as $type)
                                <li><a href="{{route('page.getProductType',['type'=>$type->id])}}">{{$type->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('page.getAbout')}}">Giới thiệu</a></li>
                    <li><a href="{{route('page.getContact')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->
