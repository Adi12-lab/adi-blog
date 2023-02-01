@extends("layouts.main")
@section("container")
<div class="row justify-content-center">
  <div class="col-md-8">
    <main class="form-signin w-100 m-auto">
      <form action="/register" method="post">
        <h1 class="h3 mb-3 fw-normal">Register Form</h1>
        @csrf
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name"placeholder="Name" value = "{{old("name")}}">
          <label for="name">Name</label>
          @error("name")
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error("username") is-invalid @enderror" id="username" name="username"placeholder="Username" value="{{old("username")}}">
          <label for="username">Username</label>
          @error("username")
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{old("email")}}">
          <label for="email">Email</label>
          @error("email")
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

        <div class="form-floating mb-3">
          <input type="password" class="form-control @error("password") is-invalid @enderror" id="password" name="password" placeholder="Password">
          <label for="password">Password</label>
          @error("password")
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control @error("password_confirmation") is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Password_confirmation">
          <label for="password_confirmation">Password Confirmation</label>
          @error("password_confirmation")
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
      </form>
      <small class="d-block text-center mt-3">Already Register ? <a href="/login">Login</a></small>
    </main>

  </div>
</div>
@endsection