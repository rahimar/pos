<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login </title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('admin/assets/css/main.d810cf0ae7f39f28f336.css')}}" rel="stylesheet">
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: {{asset('admin/assets/images/originals/city.jpg')}};"></div>
                                        <div class="slider-content">
                                            <h3>POS</h3>
                                            <p>POS is like a dream. Some think it's too good to be true! Extensive
                                                collection of unified React Boostrap Components and Elements.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: {{asset('admin/assets/images/originals/citynights.jpg')}};"></div>
                                        <div class="slider-content">
                                            <h3>Scalable, Modular, Consistent</h3>
                                            <p>Easily exclude the components you don't require. Lightweight, consistent
                                                Bootstrap based styles across all elements and components
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: {{asset('admin/assets/images/originals/citydark.jpg')}};"></div>
                                        <div class="slider-content">
                                            <h3>Complex, but lightweight</h3>
                                            <p>We've included a lot of components that cover almost all use cases for any type of application.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="app-logo"></div>
                            <h4 class="mb-0">
                                <span class="d-block">Welcome back,</span>
                                <span>Please sign in to your account.</span>
                            </h4>
                            
                            <div class="divider row"></div>
                            <div>
                                <form method="POST" action="{{ route('login') }}">
                                     @csrf
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">Email</label>
                                                <input name="email" id="email" placeholder="Email here..." type="email" class="form-control" :value="old('email')" required autofocus autocomplete="username">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="examplePassword" class="">Password</label>
                                                <input name="password" id="password" placeholder="Password here..." type="password" class="form-control" required autocomplete="current-password">
                                            </div>
                                        </div>
                                    </div>
                                  
                                    
                                    <div class="divider row"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="ml-auto">
                                            <button class="btn btn-primary btn-lg">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('admin/assets/scripts/main.d810cf0ae7f39f28f336.js')}}"></script>
</body>


</html>