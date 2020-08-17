<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>

<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div
            id="m_ver_menu"
            class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
            m-menu-vertical="1"
            m-menu-scrollable="0" m-menu-dropdown-timeout="500"
    >
        <ul class="m-menu__nav ">
            <li class="m-menu__section m-menu__section--first">
                <h4 class="m-menu__section-text">Departments</h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item {{ (Request::is('admin') || Request::is('admin/daily') || Request::is('admin/monthly') || Request::is('admin/yearly') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('admin.dashboard')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-tachometer-alt"></i>
                    <span class="m-menu__link-text">Dashboard</span>
                </a>
            </li>

            <li class="m-menu__item {{ (Request::is('admin/imageslider') || Request::is('admin/imageslider/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('imageslider.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-images"></i>
                    <span class="m-menu__link-text">Home Slider</span>
                </a>
            </li>
             <li class="m-menu__item {{ (Request::is('admin/banner') || Request::is('admin/banner/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('banner.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-images"></i>
                    <span class="m-menu__link-text">Banners</span>
                </a>
            </li>

            <li class="m-menu__item {{ (Request::is('admin/category') || Request::is('admin/category/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('category.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-archive"></i>
                    <span class="m-menu__link-text">Categories</span>
                </a>
            </li> 
            <li class="m-menu__item {{ (Request::is('admin/subcategory') || Request::is('admin/subcategory/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('subcategory.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-certificate"></i>
                    <span class="m-menu__link-text">Sub Categories</span>
                </a>
            </li>


            <!--<li class="m-menu__item {{ (Request::is('admin/brand') || Request::is('admin/brand/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('brand.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-tags"></i>
                    <span class="m-menu__link-text">Brands</span>
                </a>
            </li>-->

            <li class="m-menu__item {{ (Request::is('admin/product') || Request::is('admin/product/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('product.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-mobile-alt"></i>
                    <span class="m-menu__link-text">Products</span>
                </a>
            </li>

            <li class="m-menu__item {{ (Request::is('admin/about') || Request::is('admin/about/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('about.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-search"></i>
                    <span class="m-menu__link-text">About Page</span>
                </a>
            </li>
            <li class="m-menu__item {{ (Request::is('admin/contact') || Request::is('admin/contact/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('contact.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-phone"></i>
                    <span class="m-menu__link-text">Contact Page</span>
                </a>
            </li>
             <li class="m-menu__item {{ (Request::is('admin/branch') || Request::is('admin/branch/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('branch.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-map-pin"></i>
                    <span class="m-menu__link-text">Branchs</span>
                </a>
            </li>

            <li class="m-menu__item {{ (Request::is('admin/customer') || Request::is('admin/customer/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('customer.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-users"></i>
                    <span class="m-menu__link-text">Customers</span>
                </a>
            </li>

            <li class="m-menu__item {{ (Request::is('admin/order') || Request::is('admin/order/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('order.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-cart-plus"></i>
                    <span class="m-menu__link-text">Current Orders</span>
                </a>
            </li>
            <li class="m-menu__item {{ (Request::is('admin/shippedorder') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('order.shipped')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-cart-plus"></i>
                    <span class="m-menu__link-text">Shipped Orders</span>
                </a>
            </li>
            <li class="m-menu__item {{ (Request::is('admin/deliveredorder') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('order.delivered')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-cart-plus"></i>
                    <span class="m-menu__link-text">Delivered Orders</span>
                </a>
            </li>
            <li class="m-menu__item {{ (Request::is('admin/canceledorder') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('order.canceled')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-cart-plus"></i>
                    <span class="m-menu__link-text">Canceled Orders</span>
                </a>
            </li>
            <li class="m-menu__item {{ (Request::is('admin/coupon') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('coupon.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-barcode"></i>
                    <span class="m-menu__link-text">Coupons</span>
                </a>
            </li>
             <li class="m-menu__item {{ (Request::is('admin/message') || Request::is('admin/message/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('message.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-inbox"></i>
                    <span class="m-menu__link-text">Messages</span>
                </a>
            </li>
            <li class="m-menu__item {{ (Request::is('admin/state') || Request::is('admin/state/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('state.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-globe"></i>
                    <span class="m-menu__link-text">Countries</span>
                </a>
            </li>
            <li class="m-menu__item {{ (Request::is('admin/city') || Request::is('admin/city/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('city.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-location-arrow"></i>
                    <span class="m-menu__link-text">Citites</span>
                </a>
            </li>
            <li class="m-menu__item {{ (Request::is('shipping&policies') || Request::is('shipping&policies') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('shipping.policies')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-truck"></i>
                    <span class="m-menu__link-text">Shipping & Policies</span>
                </a>
            </li> 
            <li class="m-menu__item {{ (Request::is('admin/mails') || Request::is('admin/mails/*') ? 'm-menu__item--active' : '') }}" aria-haspopup="true" >
                <a  href="{{route('mails.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-envelope"></i>
                    <span class="m-menu__link-text">Mails</span>
                </a>
            </li>




        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->