<!DOCTYPE html>
<html lang="tk">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>{{ $name }}</title>
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
      max-width: 1280px;
      width: 100%;
      margin: 0 auto;
    }

    .header {
      width: 100%;
      padding: 30px;
      background: #1fc9e8;
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
      color: #1fc9e8;
      text-decoration: none;
    }
    .body .table {
      padding: 20px;
      background: rgba(17, 108, 179, 0.1);
      border-radius: 6px;
      margin: 0 auto;
      margin-bottom: 20px;
    }
    .body .table p {
      color: #1fc9e8;
      font-size: 48px;
      margin-bottom: 0px;
    }

    .footer {
      width: 100%;
      background: #1fc9e8;
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
      <p>IFT 2025</p>
    </div>
  </div>
  <div class="body">
    <div class="inner-container">
      <h5>Dear: {{ $name }}</h5>
      <div class="table">
        <p>{{ $body }}</p>
      </div>
      <p></p>
    </div>
  </div>
  <div class="footer">
    <div class="inner-container">
      <h2>ift2025turkmenistan@gmail.com</h2>
    </div>
  </div>
</section>
</body>
</html>
