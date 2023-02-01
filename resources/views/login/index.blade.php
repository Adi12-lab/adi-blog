@extends("layouts.main")
@section("container")
<div class="row justify-content-center">
  <div class="col-md-8">
    <main class="form-signin w-100 m-auto">
      <form action="/login" method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        @csrf
        @if(session()->has("succes"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session("succes")}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
         @endif
        @if(session()->has("loginFail"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session("loginFail")}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput" name="username"placeholder="Username">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>
      <small class="d-block text-center mt-3">Not registered ?<a href="/register">Register</a></small>
    </main>

  </div>
</div>
@endsection