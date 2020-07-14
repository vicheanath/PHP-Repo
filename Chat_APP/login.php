<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="aseets/css/style-login.css">
    <script src="aseets/js/jquery-3.4.1.js"></script>
</head>

<body>
    <form action="index.hml" class="login-form">
        <h1>Login</h1>

        <div class="txtb">
            <input type="text">
            <span data-placeholder="Username"></span>
        </div>

        <div class="txtb">
            <input type="password">
            <span data-placeholder="Password"></span>
        </div>

        <input type="submit" class="logbtn" value="Login">

        <div class="bottom-text">
            Don't have account? <a href="sign-up.php">Sign up</a>
        </div>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".txtb input").on("focus", function() {
                $(this).addClass("focus");
            });
            $(".txtb input").on("blur", function() {
                if ($(this).val() == "")
                    $(this).removeClass("focus");
            });
        });
    </script>
</body></html>