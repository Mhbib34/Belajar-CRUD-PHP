<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      * {
        box-sizing: border-box;
      }
      body {
        margin: 0;
        padding: 0;
        font-family: Georgia, "Times New Roman", Times, serif;
      }

      section {
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .form-container {
        position: relative;
      }

      .sign-in-account {
        position: relative;
        z-index: 1;
      }

      .create-account {
        position: absolute;
        bottom: 0;
        opacity: 0;
      }

      .info-container {
        position: relative;
      }
      .sign-up-right-bottom {
        position: relative;
        top: 0;
        z-index: 1;
      }

      .sign-in-left-up {
        position: absolute;
        opacity: 0;
      }

      .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-top: 15px;
        position: relative;
      }

      .info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        width: 350px;
        height: 350px;
        background-color: #00111a;
        color: white;
      }

      .info span {
        font-size: 2rem;
        font-weight: bold;
        cursor: pointer;
      }

      .info p {
        text-align: center;
        width: 90%;
        font-weight: 300;
        opacity: 0.7;
      }

      .info button {
        padding: 7px;
        width: 40%;
        border-radius: 100px;
        background-color: #00111a;
        color: white;
        border-color: #48c8af;
        font-weight: bold;
        cursor: pointer;
      }

      .info button:hover {
        background-color: #48c8af;
        transition: all;
        transition-duration: 200ms;
        color: #00111a;
      }

      form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        width: 350px;
        height: 350px;
        background-color: #48c8af;
        color: white;
      }

      .sosmed a img {
        width: 2rem;
        filter: grayscale(1);
      }

      .sosmed a img:hover {
        filter: grayscale(0);
        transition: all;
        transition-duration: 200ms;
      }

      .sosmed {
        display: flex;
        gap: 1rem;
        margin-left: auto;
        margin-right: auto;
      }

      form label {
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
        cursor: pointer;
      }

      form input {
        padding: 7px;
        border-radius: 5px;
        border: none;
        width: 80%;
      }

      form a {
        text-decoration: none;
      }

      form a span {
        font-size: small;
        color: gray;
        font-weight: 200;
      }

      form a span:hover {
        color: #00111a;
        transition: all;
        transition-duration: 100ms;
      }

      form button {
        padding: 7px;
        width: 40%;
        border-radius: 100px;
        color: white;
        background-color: #00111a;
        border-color: #00111a;
        margin-left: auto;
        margin-right: auto;
        font-weight: bold;
        cursor: pointer;
      }

      form button:hover {
        opacity: 0.8;
        transition: all;
        transition-duration: 200ms;
      }

      form .or {
        font-size: small;
        font-weight: 300;
        opacity: 0.7;
      }

      .info-container .info-login-gerak {
        transform: translateY(100%);
        z-index: 2;
        opacity: 1;
      }

      .form-container .form-daftar-gerak {
        transform: translateY(-100%);
        z-index: 2;
        opacity: 1;
      }

      .show-pw {
        display: flex;
        width: 80%;
        justify-content: start;
        align-items: center;
        text-align: center;
      }

      .show-pw input {
        width: 20px;
        height: 15px;
        border-radius: 10px;
      }
      .show-pw label {
        font-size: smaller;
      }

      @keyframes show {
        0%,
        49.99% {
          opacity: 0;
          z-index: 1;
        }
        50%,
        100% {
          opacity: 1;
          z-index: 5;
        }
      }

      /* Responsive */
      @media screen and (max-width: 850px) {
        .sign-in-account form {
          border-bottom-left-radius: 15px;
          border-bottom-right-radius: 15px;
        }

        .create-account form {
          border-top-left-radius: 15px;
          border-top-right-radius: 15px;
        }

        .sign-up-right-bottom {
          border-top-left-radius: 15px;
          border-top-right-radius: 15px;
        }
        .sign-in-left-up {
          border-bottom-left-radius: 15px;
          border-bottom-right-radius: 15px;
        }
      }

      @media screen and (min-width: 850px) {
        .info-container .info-login-gerak {
          transform: translateX(100%);
          z-index: 2;
          opacity: 1;
        }

        .form-container .form-daftar-gerak {
          transform: translateX(-100%);
          z-index: 2;
          opacity: 1;
        }
        .container {
          flex-direction: row;
          margin-top: 150px;
        }

        form {
          width: 500px;
          height: 500px;
        }

        .sign-in-account form {
          border-top-right-radius: 15px;
          border-bottom-right-radius: 15px;
        }

        .create-account form {
          border-top-left-radius: 15px;
          border-bottom-left-radius: 15px;
        }

        .sign-up-right-bottom {
          border-top-left-radius: 15px;
          border-bottom-left-radius: 15px;
        }
        .sign-in-left-up {
          border-top-right-radius: 15px;
          border-bottom-right-radius: 15px;
        }

        .info {
          width: 500px;
          height: 500px;
        }

        form input {
          padding: 10px;
        }

        form label {
          font-size: 3rem;
        }
      }
    </style>
  </head>
  <body>
    <section>
      <div class="container">
        <div class="info-container">
          <div class="info sign-in-left-up" id="info-sign-in">
            <span>You're Back!</span>
            <p>
              To keep connected with us, please login with your personal info!
            </p>
            <button id="sign-in">Sign In</button>
          </div>
          <div class="info sign-up-right-bottom" id="info-sign-up">
            <span>Welcome!</span>
            <p>Enter your personal detail and start a journey with us</p>
            <button id="sign-up">Sign Up</button>
          </div>
        </div>
        <div class="form-container">
          <div class="form sign-in-account" id="form-login">
            <form action="autentikasi.php" method="POST">
              <label for="username">Sign In</label>
              <input type="username" placeholder="Username" name="username" id="username"  required/>
              <input
                type="password"
                placeholder="Password"
                name="password"
                id="password"
                required
              />
              <div class="show-pw">
                <input type="checkbox" name="check" id="check" />
                <label for="check">Show Password</label>
              </div>
              <div class="sosmed">
                <a href=""><img src="img/facebook.png" alt="" /></a>
                <a href=""><img src="img/google.png" alt="" /></a>
                <a href=""><img src="img/github.png" alt="" /></a>
                <a href=""><img src="img/linkedin.png" alt="" /></a>
              </div>
              <a href=""><span>Forgot Your Password?</span></a>
              <button type="submit">Log In</button>
            </form>
          </div>
          <div class="form create-account" id="form-daftar">
            <form action="">
              <label for="name">Create Account</label>
              <input type="text" placeholder="Name" id="name" name="name" />
              <input type="email" placeholder="Email" name="email" id="email" />
              <input
                type="password"
                placeholder="Password"
                name="password"
                id="password"
              />
              <span class="or">Or use this</span>
              <div class="sosmed">
                <a href=""><img src="img/facebook.png" alt="" /></a>
                <a href=""><img src="img/google.png" alt="" /></a>
                <a href=""><img src="img/github.png" alt="" /></a>
                <a href=""><img src="img/linkedin.png" alt="" /></a>
              </div>
              <button type="submit">Create</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script>
      const tombolLogin = document.getElementById("sign-in");
      const tombolDaftar = document.getElementById("sign-up");
      const infoLogin = document.getElementById("info-sign-in");
      const formDaftar = document.getElementById("form-daftar");

      tombolDaftar.addEventListener("click", () => {
        infoLogin.classList.add("info-login-gerak");
        formDaftar.classList.add("form-daftar-gerak");
      });

      tombolLogin.addEventListener("click", () => {
        infoLogin.classList.remove("info-login-gerak");
        formDaftar.classList.remove("form-daftar-gerak");
      });

      //untuk melihat password
      const inputPw = document.getElementById("password");
      const checkBox = document.getElementById("check");

      checkBox.addEventListener("input", (e) => {
        if (e.target.checked) {
          inputPw.setAttribute("type", "text");
        } else {
          inputPw.setAttribute("type", "password");
        }
      });

    </script>
  </body>
</html>
