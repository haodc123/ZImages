<!DOCTYPE HTML>
<!--
    Broadcast by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-PTMHH8QG8Z"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-PTMHH8QG8Z');
		</script>
		
        <title>Z IMAGES - Dịch vụ Ảnh, Video</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../css/main.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js"></script>
    </head>
    <body>

        <!-- Header -->
            <header id="header">
                <ul>
                    <li><a href="/">Z IMAGES</a>&nbsp; /</li>
                    <li><a target="_blank" href="https://www.facebook.com/zimages.media"><img src="../images/icons/ic-fb.png" /></a> /</li>
                    <li><a href="https://chat.zalo.me/"><img src="../images/icons/ic-zalo.png" /></a> /</li>
                    <li><img src="../images/icons/ic-tel.png" /><span>038.2040.081</span></li>
                </ul>
                <a href="#menu">Menu</a>
            </header>

        <!-- Nav -->
            <nav id="menu">
                <ul class="links">
                    <li><a href="">Trang chủ</a></li>
                    <li><a href="">Dịch vụ</a></li>
                    <li><a href="">Mẫu Tham khảo</a></li>
                    <li>
                    @if (Auth::check())
                    <li>
                            <a class="nav_corner2" href="#">Hello {{ auth()->user()->user_name }}</a>
                    </li>
                    <li class="nav-item dropdown nav_corner3">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                    </li>
                        @else
                                        <a style="color: lightyellow;" href="{!! route('login') !!}">Login</a>
                        @endif
                    </li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
            </nav>