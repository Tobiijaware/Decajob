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
                  
                <ul class="nav-list">
                    <li><a href="#" id="myBtn">Signup</a></li>
                    <li><a href="#" id="myLoginBtn">Login</a></li>
                </ul>

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
                    <input type="email" name="email_f" class="form-element" placeholder="Email" :value="old('email')" required autofocus >
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
</body>
</html>
