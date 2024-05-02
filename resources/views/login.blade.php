@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <form class="form mt-5" id="loginUser" method="post">
                    @csrf
                    <h3 class="text-center text-dark">Login</h3>
                    <small id="error" style="color:red"></small>
                    <div class="form-group">
                        <label for="email" class="text-dark">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control">
                        <small id="error_email" style="color:red"></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark">Password:</label><br>
                        <input type="text" name="password" id="password" class="form-control">
                        <small id="error_password" style="color:red"></small>
                    </div>

                    <div class="form-group mt-3">
                        <label for="remember-me" class="text-dark"></label><br>
                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="login">
                    </div>
                    <div class="text-right mt-2">
                        <a href="" class="text-dark">Signup</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- -->
@section('script')
    <script>
        $("#loginUser").on('submit', function() {
            event.preventDefault();

            var email = $("#email").val();
            var password = $("#password").val();
            var confirm_password = $("#password_confirmation").val();

            if (email == "") {
                $("#error_email").text("Please enter a email");
            }
            if (password == "") {
                $("#error_password").text("Please enter a password");
            } else {
                $.ajax({
                    url: "{{ route('login_user') }}",
                    method: 'post',
                    data: $(this).serialize(),
                    error: function(response) {
                        console.log(response);
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            alert('Success');
                            window.location = '{{ route("welcome")}}';
                        }
                        if (response.status == 400) {
                            $("#error").text(response.messages);
                        } else {

                        }
                    }
                })
            }

        })
    </script>
@endsection
