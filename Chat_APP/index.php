<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="fontawesome/css/all.css" />
    <link rel="stylesheet" href="aseets/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>VICHEA Chat App</title>
  </head>
  <body>
    <section id="header">
      <div id="menu">
        <i class="fa fa-bars" id="btn-menu"></i>
        <div class="my-pic"></div>
      </div>
      <div id="left-nav">
        <ul>
          <li>
            <a href="#">
              <div class="pro-pic"></div>
              <p>Vichea Nath</p>
            </a>
          </li>
          <li>
            <a href="#">
              <div class="pro-pic"></div>
              <p>Nou Reach</p>
            </a>
          </li>
        </ul>
      </div>
    </section>
    <section id="content">
      <div class="chat-body">
        <div class="frm">
          <input type="text" name="txt-mes" id="txt-mes" />
          <div id="btn-send"><i class="fas fa-paper-plane"></i></div>
        </div>
      </div>
    </section>
  </body>
  <script src="aseets/js/jquery-3.4.1.js"></script>
  <script>
    $(document).ready(function() {
      var ind = 0;
      $("#btn-menu").click(function() {
        if (ind == 0) {
          $("#left-nav").css({
            display: "block"
          });
          ind = 1;
        } else {
          $("#left-nav").css({ display: "none" });
          ind = 0;
        }
      });
    });
  </script>
</html>
