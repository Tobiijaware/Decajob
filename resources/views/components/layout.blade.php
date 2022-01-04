<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{url('/images/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">

    <script src="https://kit.fontawesome.com/d67d2fd17d.js" crossorigin="anonymous"></script>
    <title>DecaJob</title>
</head>
<body>
    @include('layouts.flash-messages')

    <header class="header">
        <section class="navigation">
            <div class="nav-container">
              <div class="brand logo-container">
                <a href="."><img class="header-logo" src="{{url('/images/logo.png')}}" /></a>
                <span class="logo-title"><p>DecaJob</p></span>
              </div>
              <nav>
                  <div class="toggle" id="toggleBtn">
                      <span><i class="fa-solid fa-bars"></i></span>
                  </div>
                   <!-- Hamburger -->
            {{-- <div class="-mr-2 flex items-center sm:hidden md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div> --}}

                @auth
                <div class="hidden sm:flex sm:items-center sm:ml-6 nav-list">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>

                    </x-dropdown>
                </div>

                @endauth

                @guest
                <ul class="nav-list">
                    <li><a href="#" id="myBtn">Signup</a></li>
                    <li><a href="#" id="myLoginBtn">Login</a></li>
                </ul>
                @endguest



              </nav>
            </div>
        </section>
    </header>

        {{ $slot }}
    <footer>
        <div class="footer-container">
            <div class="" id="newsletter-section">
                <div style="display: flex; justify-content:center;">
                    <h3 style="color: #fff;"><b>Subscribe to receive job updates : </b></h3><br>
                </div>
                <div class="input-section" style="display: flex; justify-content:center; margin-top:20px;">
                    <input type="email" placeholder="Email" class="input-element"/>
                    <input type="submit" value="subscribe" id="email-subscription-btn"/>
                </div>
            </div>
            <div class="footer-info">
                <p>Built with <i style="color:red" class="fa fa-heart-o" aria-hidden="true"></i> by Decagon</p>
            </div>
            <div class="footer-copyright">
                <p>©2021</p>
            </div>
        </div>
    </footer>

    <div id="myModal" class="modal">
        <span class="close">&times;</span>
            <form method="POST" action="/register">
                @csrf
            <div class="modal-content">

                <div class="form-container">
                    <input type="text" name="name" class="form-element" :value="old('name')" placeholder="Name">
                </div>
                @error('name')
                    <div class="error-alert">{{ $message }}</div>
                @enderror
                <div class="form-container">
                    <input type="email" name="email" class="form-element" :value="old('email')" placeholder="Email">
                </div>
                @error('email')
                    <div class="error-alert">{{ $message }}</div>
                @enderror
                <div class="form-container">
                    <input type="text" name="phone_number" class="form-element" :value="old('phone_number')" placeholder="Phone Number">
                </div>
                @error('phone_number')
                    <div class="error-alert">{{ $message }}</div>
                @enderror
                <div class="form-container">
                    <input type="password" name="password" class="form-element" :value="old('password')" placeholder="Password">
                </div>
                @error('password')
                    <div class="error-alert">{{ $message }}</div>
                @enderror
                <div class="form-container">
                    <input type="password" name="password_confirmation" class="form-element" placeholder="Confirm Password">
                </div>
                @error('password_confirmation')
                    <div class="error-alert">{{ $message }}</div>
                @enderror

                <div class="form-container">
                    <input type="submit" class="form-element-btn" value="SIGNUP">
                </div>
            </div>
        </form>
    </div>


    <div id="myLoginModal" class="loginmodal">
        <span class="close" id="loginclose">&times;</span>
        <form method="POST" action="/login">
            @csrf
            <div class="modal-content">
                <div class="form-container">
                    <input type="email" name="email" class="form-element" placeholder="Email">
                </div>
                @error('email')
                    <div class="error-alert">{{ $message }}</div>
                @enderror
                <div class="form-container">
                    <input type="password" name="password" class="form-element" placeholder="Password">
                </div>
                @error('password')
                    <div class="error-alert">{{ $message }}</div>
                @enderror
                <div class="form-container">
                    <input type="submit" class="form-element-btn" value="LOGIN">
                </div>
                <p class="forgotpassword">Forgot Password? <a href="#" id="forgotbtn" style="color:#34a853;">Click Here</a></p>
            </div>
        </form>
    </div>

    <div id="myForgotModal" class="forgotmodal">
        <span class="close" id="forgotclose">&times;</span>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="modal-content">
                <div class="form-container">
                    <input type="email" name="email" class="form-element" placeholder="Email" :value="old('email')" required autofocus >
                </div>
                @error('email_f')
                    <div class="error-alert">{{ $message }}</div>
                @enderror
                <div class="form-container">
                    <input type="submit" class="form-element-btn" value="CHANGE PASSWORD">
                </div>
            </div>
        </form>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ asset('js/nav.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function(){
        $( ".alert" ).fadeIn(400 ).delay( 3000 ).fadeOut(600);
    });
    $(document).ready(function(){
        $( ".alert-error" ).fadeIn( 400 ).delay( 3000 ).fadeOut(600);
    });
</script>

</body>
</html>
