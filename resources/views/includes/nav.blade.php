<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Riedlentes 24/7</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
            @guest
            <form class="navbar-form navbar-right" role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </form>
                <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>



                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                   <!-- <a class="btn btn-default" href="/newpost">New Post</a> -->
                    <!-- <a class="btn btn-default" href="/admin">God mode</a> -->
                    <a class="btn btn-default" href="/eshop">E-Shop</a>
                    <a class="btn btn-default" href="/shopmag">Shop management</a>
                    <a class="btn btn-default" href="/shopadmin">Shop admin</a>
                @endguest
            </ul>


        </div><!--/.navbar-collapse -->
    </div>
</nav>