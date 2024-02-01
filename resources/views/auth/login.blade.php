<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT Timbul Terus Tenar | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
</head>
<body>

    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img class="img-fluid login-image" alt="Sample image" width="520px" style="border-radius:10px;">

                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 ">
                    <!-- Session Status -->
                        <x-auth-session-status class="mb-4 alertalert alert-succes" :status="session('status')" />
                    <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
                <img class="img-fluid " src="images/logo.png" width="150px" alt="Sample image"  style="margin-left:120px;margin-top: 20px; margin-bottom:20px;">
                    <!-- form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control form-control-lg" placeholder="Enter a valid email address">
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control form-control-lg" placeholder="Enter password">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" name="remember" id="remember_me" type="checkbox">
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-body">Forgot password?</a>
                            @endif
                        </div>
                        <!-- btn login -->
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Right -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Daftar URL gambar yang akan digunakan
        var imageUrls = [
            "images/login.png",
            "images/login2.png",
            "images/login3.png",
            "images/login4.png",
            "images/login5.png",
            "images/login6.png",
            "images/login7.png",
            "images/login8.png",
            "images/login9.png",
            "images/login10.png"
        ];

        // Fungsi untuk mengubah gambar secara acak
        function changeImage() {
            var randomNumber = Math.floor(Math.random() * imageUrls.length);
            var imageUrl = imageUrls[randomNumber];
            var imageElement = document.querySelector(".login-image");
            imageElement.src = imageUrl;
        }

        // Panggil fungsi changeImage saat halaman dimuat
        changeImage();
    });
</script>

</body>
</html>
