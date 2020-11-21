<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="comero-mobile-nav">
        <div class="logo">
            <a href="{{ route('site.home') }}"><img src="{{ asset('assets/site/img/logo.png') }}" width="60px" alt="logo"></a>
        </div>
    </div>

    <div class="comero-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('site.home') }}">
                    <img src="{{ asset('assets/site/img/logo.png') }}" width="100px"  alt="logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">

                        <li class="nav-item"> <a href="{{ route('site.home') }}">الرئيسية</a></li>
                        <li class="nav-item"> <a href="{{ route('site.home') }}">من نحن</a></li>


                        <li class="nav-item"> <a href="{{ route('site.home') }}">قسم 1  </a></li>

                    </ul>

                    <div class="others-option">


                        @if(\Illuminate\Support\Facades\Auth::user())
                            <div class="option-item">

                                <div class="dropdown">
                                    <a class="  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        مرحباً
                                        {{ auth()->user()->name }}
                                    </a>

                                    <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">الصفحة الشخصية</a>
                                        <a class="dropdown-item  ">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-lg pl-2 pr-4">
                                                    <i class="ft-power"></i>
                                                    تسجيل الخروج
                                                </button>
                                            </form>
                                        </a>
                                    </div>
                                </div>

                            </div>


                            <div class="option-item"><a href="#" data-toggle="modal" data-target="#shoppingCartModal">سلة المشتريات<i class="fas fa-shopping-bag"></i></a></div>


                            <div class="option-item">



                            </div>



                        @else

                            <div class="option-item"><a href="{{ route('login') }}">تسجيل دخول</a></div>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
