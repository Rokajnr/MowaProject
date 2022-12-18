<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$general_setting->site_title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="manifest" href="{{url('manifest.json')}}">
    @if(!config('database.connections.saleprosaas_landlord'))
    <link rel="icon" type="image/png" href="{{url('logo', $general_setting->site_logo)}}" />
    <!-- Bootstrap CSS-->
    <!-- login stylesheet-->
    <link rel="stylesheet" href="<?php echo asset('css/auth.css') ?>" id="theme-stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/theme.bundle.css'); ?>">

    <!-- Google fonts - Roboto -->
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Nunito:400,500,700" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css?family=Nunito:400,500,700" rel="stylesheet"></noscript>
    @else
    <link rel="icon" type="image/png" href="{{url('../../logo', $general_setting->site_logo)}}" />
    <!-- Bootstrap CSS-->
    <!-- login stylesheet-->
    <link rel="stylesheet" href="<?php echo asset('../../css/auth.css') ?>" id="theme-stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('../../css/theme.bundle.css'); ?>">

    <!-- Google fonts - Roboto -->
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Nunito:400,500,700" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css?family=Nunito:400,500,700" rel="stylesheet"></noscript>
    @endif
  </head>
  <body>
    <main class="container">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-md-7 col-lg-6 d-flex flex-column py-6">
                <div class="d-lg-none navbar-brand mb-5 px-9">
                    @if($general_setting->site_logo)
                    <img src="{{url('logo', $general_setting->site_logo)}}" class="img-fluid">
                    @else
                    <span><img src="{{url('images/icons/zamowa_logo-4x.png') }}" alt="" class="img-fluid"></span>
                    @endif
                </div>
                @if(session()->has('delete_message'))
                <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('delete_message') }}</div>
                @endif
                <!-- Title -->
                <h1 class="mb-2">
                    Sign In
                </h1>

                <!-- Subtitle -->
                <p class="text-secondary">
                    Enter your email address and password to access admin panel
                </p>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" id="login-form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">

                                <!-- Label -->
                                <label class="form-label">
                                    {{trans('file.UserName')}}
                                </label>

                                <!-- Input -->
                                <input id="login-username" type="text" name="name" required class="form-control" placeholder="Enter Username" value="">
                                @if(session()->has('error'))
                                <p>
                                    <strong>{{ session()->get('error') }}</strong>
                                </p>
                            @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- Password -->
                            <div class="mb-4">

                                <div class="row">
                                    <div class="col">

                                        <!-- Label -->
                                        <label class="form-label">
                                            {{trans('file.Password')}}
                                        </label>
                                    </div>

                                    <div class="col-auto">

                                        <!-- Help text -->
                                        <a href="{{ route('password.request') }}" class="form-text small text-muted link-primary">Forgot password</a>
                                    </div>
                                </div> <!-- / .row -->

                                <!-- Input -->
                                <div class="input-group input-group-merge">
                                    <input id="login-password" type="password" class="form-control" data-toggle-password-input="" name="password" required placeholder="Your password" value="">

                                    {{-- <input type="password" class="form-control" autocomplete="off" data-toggle-password-input="" placeholder="Your password" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;"> --}}

                                    <button type="button" class="input-group-text px-4 text-secondary link-primary" data-toggle-password=""></button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="form-check">

                        <!-- Input -->
                        <input type="checkbox" class="form-check-input" id="remember" style="background-color:#004481; border-color:#0359a5;">

                        <!-- Label -->
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>


                    <div class="d-flex align-items-center justify-content-between mt-3">

                        <!-- Button -->
                        <button type="submit" class="btn btn-primary" style="background: #004481;">{{trans('file.LogIn')}}</button>


                        <!-- Link -->
                        <small class="mb-0 ps-3 text-muted">
                            Need an account? consult POS admin to <a href="#" class="fw-semibold" style="color: #004481;">Register</a>
                        </small>
                    </div>
                </form>
            </div>

            <div class="col-md-5 col-lg-6 px-lg-8 px-xl-10 d-none d-lg-block">

                <!-- Image -->
                <div class="text-center">
                    @if($general_setting->site_logo)
                    <img src="{{url('logo', $general_setting->site_logo)}}" class="img-fluid">
                    @else
                    <span><img src="{{url('images/icons/zamowa_logo-4x.png') }}" alt="" class="img-fluid"></span>
                    @endif

               </div>
            </div>
        </div> <!-- / .row -->
    </main>
  </body>
</html>
@if(!config('database.connections.saleprosaas_landlord'))
<script type="text/javascript" src="<?php echo asset('vendor/jquery/jquery.min.js') ?>"></script>
@else
<script type="text/javascript" src="<?php echo asset('../../vendor/jquery/jquery.min.js') ?>"></script>
@endif
<script type="text/javascript" src="<?php echo asset('js/theme.bundle.js'); ?>"></script>

<script>
    //switch theme code
    var theme = <?php echo json_encode($theme); ?>;
    if(theme == 'dark') {
        $('body').addClass('dark-mode');
        $('#switch-theme i').addClass('dripicons-brightness-low');
    }
    else {
        $('body').removeClass('dark-mode');
        $('#switch-theme i').addClass('dripicons-brightness-max');
    }
    $('.admin-btn').on('click', function(){
        $("input[name='name']").focus().val('admin');
        $("input[name='password']").focus().val('admin');
    });

    if ('serviceWorker' in navigator ) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/salepro/service-worker.js').then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }, function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
            });
        });
    }

    $('.admin-btn').on('click', function(){
        $("input[name='name']").focus().val('admin');
        $("input[name='password']").focus().val('admin');
    });

  $('.staff-btn').on('click', function(){
      $("input[name='name']").focus().val('staff');
      $("input[name='password']").focus().val('staff');
  });

  $('.customer-btn').on('click', function(){
      $("input[name='name']").focus().val('shakalaka');
      $("input[name='password']").focus().val('shakalaka');
  });
  // ------------------------------------------------------- //
    // Material Inputs
    // ------------------------------------------------------ //

    var materialInputs = $('input.input-material');

    // activate labels for prefilled values
    materialInputs.filter(function() { return $(this).val() !== ""; }).siblings('.label-material').addClass('active');

    // move label on focus
    materialInputs.on('focus', function () {
        $(this).siblings('.label-material').addClass('active');
    });

    // remove/keep label on blur
    materialInputs.on('blur', function () {
        $(this).siblings('.label-material').removeClass('active');

        if ($(this).val() !== '') {
            $(this).siblings('.label-material').addClass('active');
        } else {
            $(this).siblings('.label-material').removeClass('active');
        }
    });
</script>
