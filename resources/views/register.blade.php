@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <form class="form mt-5" id="saveUser" method="post">
                    @csrf
                    <h3 class="text-center text-dark">Register</h3>
                    <div class="form-group">
                        <label for="name" class="text-dark">name:</label><br>
                        <input type="name" name="name" id="name" class="form-control">
                        <small id="error_name" style="color:red"></small>
                    </div>
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
                        <label for="confirm-password" class="text-dark">Confirm Password:</label><br>
                        <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                        <small id="error-confirm-password" style="color:red"></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="remember-me" class="text-dark"></label><br>
                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                    </div>
                    <div class="text-right mt-2">
                        <a href="{{route('login')}}" class="text-dark">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- -->
@section('script')
    <script>
        $("#saveUser").on('submit', function() {
            event.preventDefault();
            var name = $("#name").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var confirm_password = $("#password_confirmation").val();

            if (name == "") {
                $("#error_name").text("Please enter a name");
            }
            if (email == "") {
                $("#error_email").text("Please enter a email");
            }
            if (password == "") {
                $("#error_password").text("Please enter a password");
            }
             else {
                $.ajax({
                url: "{{ route('save_user') }}",
                method: 'post',
                data: $(this).serialize(),
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {

                    if (response.status == 200) {
                        alert(response.messages);
                        $("#saveUser")[0].reset();
                    }
                }
            })
            }








        })
    </script>
@endsection
