<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login Page</title>
    <link rel="stylesheet" href="aseets/css/style-login.css" />
    <script src="aseets/js/jquery-3.4.1.js"></script>
  </head>

  <body>
    <form action="action/sign_up.php" class="login-form" method="POST">
      <h1>Sign Up</h1>

      <div class="txtb">
        <input type="text" name="username" />
        <span data-placeholder="Username"></span>
      </div>

      <div class="txtb">
        <input type="password" name="password" />
        <span data-placeholder="Password"></span>
      </div>

      <input type="submit" class="logbtn" value="Login" id="btn-log"/>

      <div class="bottom-text">
        If you have account? <a href="login.php">Login</a>
      </div>
    </form>
    <script type="text/javascript">
      $(document).ready(function() {
        $(".txtb input").on("focus", function() {
          $(this).addClass("focus");
        });
        $(".txtb input").on("blur", function() {
          if ($(this).val() == "") $(this).removeClass("focus");
        });
      });
    </script>
  </body>
</html>
