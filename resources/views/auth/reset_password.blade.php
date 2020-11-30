<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/logo.jpeg')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/colors.css')}}">
    <title>Kuiah finance</title>

    <!-- Styles -->
    <style>
        .danger {
            color: red;
        }
    </style>
</head>
<body>
    <div class="dashboard-content" style="margin:auto !important;margin-top:0px !important">
        <div class="my-account">
            <!-- Logo -->
            <div>
                <h1 style="font-weight:bold; font-size:35px;">Forgot password ?</h1>
                <br/>
            </div>
            <div class="tabs-container">
                <form action="{{route("reset.post")}}" method="POST" class="login">
                    @csrf
                    <p class="form-row form-row-wide">
                        <label for="username">E-mail:
                            <i class="ln ln-icon-Male"></i>
                            <input type="email" name="email" class="input-text" id="username" value="{{request()->get('email')}}" />
                        </label>
                    </p>
                    @error("email")
                        <span class="danger">{{ $message }}</span>
                    @enderror
                    <p class="form-row form-row-wide">
                        <label for="password">New password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" name="password" type="password"/>
                        </label>
                    </p>

                    @error("password")
                        <span class="danger">{{ $message }}</span>
                    @enderror

                    <p class="form-row form-row-wide">
                        <label for="password">Confirm new password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" name="password_confirmation" type="password"/>
                        </label>
                    </p>

                    <input hidden name="token" placeholder="token" value="{{request()->get('token')}}">

                    <p class="form-row " :disabled="loading" v-else>
                        <span v-show="loading" class="spinner-border spinner-border-sm"></span>
                        <input type="submit" class="button border fw margin-top-10" name="login" value="Okay!" />
                    </p>
                </form>
            </div>
        </div>
    </div>
    <!-- Content / End -->

</body>
</html>