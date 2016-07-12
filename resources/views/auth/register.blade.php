 {!!Form::open(['url' => 'auth/register', 'class' => 'form'])!!}

    <div>
        Name
        <input type="text" name="name" value="{{ old('name') }}">
    </div>
    
    <div>
        User
        <input type="text" name="user" value="{{ old('user') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
  {!!Form::close()!!}