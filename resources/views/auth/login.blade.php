<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form method="post" action="{{ url('/login') }}">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4"> 
              <input type="email"
                           id="form1Example13"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Email"
                           class="form-control form-control-lg @error('email') is-invalid @enderror">
              <label class="form-label" for="form1Example13">Email address</label>
              @error('email')
              <span class="error invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4"> 
              <input type="password"
                     id="form1Example23"
                     name="password"
                     placeholder="Password"
                     class="form-control form-control-lg @error('password') is-invalid @enderror"> 
              @error('password')
              <span class="error invalid-feedback">{{ $message }}</span>
              @enderror
              <label class="form-label" for="form1Example23">Password</label>
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                <label class="form-check-label" for="form1Example3"> Remember me </label>
              </div>
              <a href="{{ route('password.request') }}">Forgot password?</a>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
 

          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
