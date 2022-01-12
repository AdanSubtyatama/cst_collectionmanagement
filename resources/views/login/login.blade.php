<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; CollectionManagement</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              {{-- <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> --}}
              CST_COLLECTION MANAGEMENT
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              @foreach ($errors->all() as $error)
              <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
                {{ $error }}
                <button type="button" class="close p1" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
               </div>
              @endforeach
              <div class="card-body">
                <form action="{{ route('process-login') }}" method="POST" class="needs-validation">
                    @csrf
                  <div class="form-group">
                    <label for="Username">Username</label>
                    <input id="Username" type="text" required class="form-control @error('username') is-invalid @enderror" name="username" tabindex="1" value="{{  old('username') }}" required autofocus>
                    <div class="invalid-feedback">
                        @error('username')
                        {{ $message }}
                         @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>                      
                    </div>
                    <input id="password" type="password" required class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" value="{{  old('username') }}" required>
                    <div class="invalid-feedback">
                        @error('password')
                        {{ $message }}
                         @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; 2022 | CiptaSolutIndo
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
  <script src="{{ asset('js/app.js') }}"></script>
 
</body>
</html>
