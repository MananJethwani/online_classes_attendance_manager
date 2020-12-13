<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Signin Template for Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>

  <body class="text-center">
      <div class="container" style="margin-top: 150px;">
          <form method="post" action="index.php">
              <div class="form-group row">
                  <h1 class="font-weight-normal">Please sign in</h1>
              </div>
              <div class="form-group row">
                  <label for="Email" class="sr-only">Email address</label>
                  <input name="Email" type="email" id="Email" class="form-control" placeholder="Email address" required autofocus>
              </div>
              <div class="form-group row">
                  <label for="Password" class="sr-only">Password</label>
                  <input name="Password" type="password" id="Password" class="form-control" placeholder="Password" required>
              </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Login">Sign in</button>
              <div class="form-group row">
                  <h4> Not a user <a href="register.php">register here</a>. </h4>
              </div>
          </form>
      </div>
  </body>
</html>
