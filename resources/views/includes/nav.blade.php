<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  

  @if(Auth::guest())
  <a class="navbar-brand" href="/">Twatter</a>
  @else
  <a class="navbar-brand" href="/posts">Twatter</a>
  @endif



  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse float-left" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        @if(Auth::guest())
          <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
        @else
          <a class="nav-link" href="/posts">Home<span class="sr-only">(current)</span></a>
        @endif
      
      
      </li>
      <li class="nav-item dropdown ">
       @if (Auth::guest())
        <!--<li>
           <a class="nav-link" href="{{ route('login') }}">Login<span class="sr-only">(current)</span></a>
        </li>
        <li>
           <a class="nav-link" href="{{ route('register') }}">Register<span class="sr-only">(current)</span></a>
        </li>-->
        @else

            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">

                    <li>
                      <a class="dropdown-item" href="/users/{{auth()->user()->id}}">Profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    
                </ul>
            </li>
           <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Profile
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">My Posts</a>
            <a class="dropdown-item" href="#"> Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Log out</a>
          </div>-->
        @endif
       
      </li>
      <li class="nav-item">
      </li>
    </ul>
  </div>
</nav>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>