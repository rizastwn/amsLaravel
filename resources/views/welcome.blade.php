<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                color: #636b6f;
            }
            button{
                background-color:#0000FF;
                border-radius:28px;
                border:1px solid #18ab29;
                display:inline-block;
                cursor:pointer;
                color:#ffffff;
                font-family:Arial;
                font-size:17px;
                padding:10px 20px;
                text-decoration:none;
                text-shadow:0px 1px 0px #2f6627;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                  
                <div class="title m-b-md">
                    Aplikasi Monitoring Siswa
                </div>
                <div>
                    <h1>Yayasan Pembinaan Anak Cacat Malang</h1>
                </div>
                
                <div class="card">
                    @guest
                    <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label ">{{ __('E-Mail') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0">
                                        <br>
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-info">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                    </div>
                    @endguest
                    @auth
                    <div class="links">
                        <h3><a class="btn btn-info" href="/home">HOME</a></h3>
                    </div>
                    @endauth
                    
                </div>
                
            </div>
        </div>
    </body>
</html>
