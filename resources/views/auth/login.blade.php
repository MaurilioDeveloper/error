 {!!Form::open(['url' => 'painel/carros/ajax-list', 'class' => 'form'])!!}


    <div>
        User
        <input type="text" name="user" value="{{ old('user') }}">
    </div>
    

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
 
  {!!Form::close()!!}