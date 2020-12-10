<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initialscale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | English Course & Bimbel di Learning Education Center (SISPLEC)</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesomefree/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>

<body class="bg-gradient-dark">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="center">
                            <div class="col-lg-6 d-none d-lg-block "></div>
                            <div class="col-lg-20">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb4">English Course & Bimbel <br>
                                         di Learning Education Center (SISPLEC)<br>
                                            <br><img src="{{ asset('asset/img/logo.jpg')}}" width="160"></h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="email"
                                                class="col-md-12 col-formlabel text-md-left">{{ __('E-Mail Address') }}</label>
                                            <div class="col-md-12">
                                                <input id="email" type="email" class="form-control @error('email') isinvalid @enderror" name="email" value="{{ old('email') }}" required autoc omplete="email"
                                                    autofocus>
                                                @error('email')
                                                <span class="invalidfeedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password"
                                                class="col-md-12 colform-label text-md-left">{{ __('Password') }}</label>
                                            <div class="col-md-12">
                                                <input id="password" type="password" class="form-control @error('password') isinvalid @enderror"
                                                    name="password" required autocomplete="currentpassword">
                                                    <input type="checkbox" onclick="myFunction()"> Show Password
                                                @error('password')
                                                <span class="invalidfeedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <div class="col-md-12 offset-md-12">
                                                <div class="form-check">
                                                    <input class="form-checkinput" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ?'checked' : '' }}>
                                                    <label class="form-checklabel" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 offset-md-12">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                                                @if (Route::has('password.request'))
                                                <a class="btn btnlink" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                                @endif
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
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('asset/vendor/jqueryeasing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset/js/sb-admin-2.min.js')}}"></script>
</body>

</html>
