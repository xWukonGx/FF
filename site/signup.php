<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../styles/sign.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
  </head>
  <body style="overflow: hidden">
    <nav>
      <a style="border-right: 1px solid white" href="">FOX <b>STORE</b></a>

      <a href="signup.php">البدء</a>
      <a href="login.php">الدخول</a>
      <a style="float: right" id="aboutt" href="#about">حول</a>
      <a
        style="float: right; border-left: 0.4px solid white"
        id="contactt"
        href="#contact"
        >من نحن</a
      >
    </nav>
    <div class="desc">
      <div class="content">
        <div class="card">
          <form
            action="../operations/reg/submit.php?action=regist"
            method="post"
          >
            <div class="dik">
              <img src="../imaages/avatar4.png" alt="" />
              <input
                required="true"
                maxlength="12"
                name="user"
                placeholder="USERNAME"
                type="text"
              />
              <input placeholder="Email" required="true" name="email"   type="email" >
              <input 
                required="true"
                name="password"
                placeholder="PASSWORD"
                type="password"
              />
              <input type="submit" value="LOGIN" />
              <?php 
              if (isset($_GET['id'])){
                echo '<p id="result">ANOTHER ACCOUNT HAS THIS CREDENTIALS</p>';
              }
              ?>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
