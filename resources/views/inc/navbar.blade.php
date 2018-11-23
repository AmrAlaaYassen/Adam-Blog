
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/">{{config('app.name' , 'Adam-Blog')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="/">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/posts">Blog</a>
              </li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"> <a class="nav-link" href="/posts/create"> Create Post</a></li>
          </ul>

        </div>
      </nav>
