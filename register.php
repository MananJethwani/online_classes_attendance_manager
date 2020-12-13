<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Signin Template for Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body class="text-center">
      <div class="container" style="margin-top: 150px;">
          <form method="post" action="regUser.php">
              <div class="form-group row">
                    <h1 class="font-weight-normal">Please register</h1>
              </div>
              <div class="form-group row">
                    <label for="Email" class="sr-only">Email address</label>
                    <input name="Email" type="email" id="Email" class="form-control" placeholder="Email address" required autofocus>
              </div>
              <div class="form-group row">
                    <label for="Password" class="sr-only">Password</label>
                    <input name="Password" type="password" id="Password" class="form-control" placeholder="Password" required>
              </div>
              <div class="form-group row">
                <select name="userType" id="userType" class="form-control form-control-sm">
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
              </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Login">Sign in</button>
              <div class="form-group row">
                    <h4> Already a user <a href="loginForm.php">signin here</a>. </h4>
              </div>
          </form>
      </div>
  </body>
</html>
