<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Human Resources | Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/backend/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Human</b> Resources</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register</p>

      <form action="{{ url('register_post') }}" method="post">

        {{ csrf_field() }}

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span style="color: red;">{{ $errors->first('name') }}</span>

        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" onblur="duplicateEmail(this)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="duplicate_email" style="color: red;">{{ $errors->first('email') }}</span>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span style="color: red;">{{ $errors->first('password') }}</span>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span style="color: red;">{{ $errors->first('confirm_password') }}</span>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">

            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="{{ url('forgot-password') }}">I forgot my password</a>
      </p>
      <p class="mb-0">
      <a href="{{ url('/') }}">Sign In</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('public/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/backend/dist/js/adminlte.min.js') }}"></script>

<script>
    function duplicateEmail(element)
    {
        var email = $(element).val();
        $.ajax({
            type: "POST",
            url: "{{ url('checkemail') }}",
            data: {
                email: email,
                _token: "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(res)
            {
                if(res.exists) {
                    $('.duplicate_email').html("That email is taken. Try another.");
                }else {
                    $('.duplicate_email').html();
                }
            },
            error: function(jqXHR, exception){

            }
        });
    }
</script>

</body>
</html>