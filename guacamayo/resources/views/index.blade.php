<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');

      html, body {
        width: 100%;
        height: 100%;
        font-family: 'Roboto Condensed', sans-serif;
      }

      body {
          background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
          background-size: 400% 400%;
          animation: gradient 15s ease infinite;
      }

      h1 {
          font-weight: bold;
      }

      @keyframes gradient {
          0% { background-position: 0% 50%; }
          50% { background-position: 100% 50%; }
          100% { background-position: 0% 50%; }
      }

      .box {
        background-color: none;
        width: 400px;
        height: 400px;
        margin: auto;
        color: white;
        margin-top: 125px;
      }

      .box > .space {
        padding: 25px 25px 25px 25px;
        width: 100%;
      }

      a {
        text-decoration: none;
        color: white;
      }

      a:link {
        text-decoration: none;
        color: white;
      }

      a:hover {
        text-decoration: none;
        color: white;
      }
    </style>
  </head>
  <body>
  @php
  $data = Session::all();
    print_r($data);
  @endphp
    <section>
      <div class='box'>
        <div class='space'>
          <center>
              <h1>GUACAMAYO</h1>
            <img src='{{ asset('logo.png') }}' style='width: 100px; height: 100px; margin: auto;'>
          </center> <br />
            @if ($is_logged)
                <span style='font-size: 8px'>You are trying to log in to the server {{ $_callback }}</span>
            @endif
            @if (session('status_success'))
                <div class="alert alert-success" role="alert">
                    {{ session('status_success') }}
                </div>
            @endif
            @if (session('status_error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status_error') }}
                </div>
            @endif
            @if (!$is_logged)
              <form action='/api/login' method='post'>
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="input" class="form-control" name="_user" aria-describedby="emailHelp" placeholder="Username">
                <br />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="_pass" placeholder="Password">
                </div>
                <br/><br/>
                <button type="submit" class="btn btn-primary w-100"
                      style='
                      border: 1px solid white;
                      background: none;
                      color: white;'>
                      Authenticate
                      </button>
              </form>
            @else
                <form action="/api/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100" style='
                      border: 1px solid white;
                      background: none;
                      color: white;'>
                        Logout
                    </button>
                </form>
            @endif
          <br /><br /><br />
          <span style='font-size: 12px;'>
            <center>
              v1.0.0 &copy; Bartosz Rogowski <br />
              <a href='/docs'>API documentation</a>
            </center>
          </span>

        </div>
      </div>
    </section>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
