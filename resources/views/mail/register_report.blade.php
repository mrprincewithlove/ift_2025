<!DOCTYPE html>
<html lang="tk">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Test mail sending</title>
    <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: sans-serif;
    }

    .container {
      width: 100%;
    }

    .inner-container {
      max-width: 700px;
      width: 100%;
      margin: 0 auto;
    }

    .header {
      width: 100%;
      padding: 30px;
      background: #116cb3;
      color: #fff;
    }
    .header h1 {
      font-size: 36px;
      font-weight: bolder;
      margin-bottom: 10px;
    }
    .header p {
      font-size: 16px;
    }

    .body {
      width: 100%;
      padding: 30px;
    }
    .body h5 {
      font-size: 16px;
      font-weight: bolder;
      color: #000;
      margin-bottom: 20px;
    }
    .body p {
      font-size: 16px;
      font-weight: bold;
      color: #666;
      margin-bottom: 20px;
    }
    .body p a {
      color: #116cb3;
      text-decoration: none;
    }
    .body .password {
      width: 270px;
      padding: 20px;
      background: rgba(17, 108, 179, 0.1);
      border-radius: 6px;
      margin: 0 auto;
      text-align: center;
      margin-bottom: 20px;
    }
    .body .password p {
      color: #116cb3;
      font-size: 48px;
      margin-bottom: 0px;
    }

    .footer {
      width: 100%;
      background: #116cb3;
      padding: 30px;
      color: #fff;
    }
    .footer h2 {
      color: white;
      font-size: 32px;
      font-weight: bolder;
      margin-bottom: 10px;
    } /*# sourceMappingURL=style.css.map */
  </style>
  </head>  
  <body>
    <section class="container">
      <div class="header">
        <div class="inner-container">
          <p>  Salam </p>
        </div>
      </div>
      <div class="body">
        <div class="inner-container">
          <h5>{{ $name }}</h5>
          <p> Size test hat ugradyarys </p>
          <div class="password">
            <p>{{ $body }}</p>
          </div>
          <p> </p>
        </div>
      </div>
      <div class="footer">
        <div class="inner-container">
          <h2>maslovsaparmyrat.gmail.com</h2>
        </div>
      </div>
    </section>
  </body>
</html>