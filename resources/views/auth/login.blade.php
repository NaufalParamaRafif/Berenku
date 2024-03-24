@include('main.head')
<div class="container">
    <div class="card p-5 col-md-4 mx-auto mt-5">
        <form method="POST" action="/login">
            @csrf
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" id="username" placeholder="Username or Email" required @required(true) autofocus>
                <label for="username">Email or Username</label>
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>
            
            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                <label for="floatingPassword">Password</label>
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
    </div>
</div>
@include('main.footer')