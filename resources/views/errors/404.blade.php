<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error 404</title>

    
    <style type="text/css">

      a,
      a:focus,
      a:hover {
        color: #fff;
      }

      .btn-default,
      .btn-default:hover,
      .btn-default:focus {
        color: #333;
        text-shadow: none;
        background-color: #fff;
        border: 1px solid #fff;
      }

      html,
      body {
        height: 100%;
        background-color: #333;
      }
      body {
        color: #fff;
        text-align: center;
        text-shadow: 0 1px 3px rgba(0,0,0,.5);
      }

      .site-wrapper {
        display: table;
        width: 100%;
        height: 100%; /* For at least Firefox */
        min-height: 100%;
        -webkit-box-shadow: inset 0 0 100px rgba(0,0,0,.5);
                box-shadow: inset 0 0 100px rgba(0,0,0,.5);
      }
      .site-wrapper-inner {
        display: table-cell;
        vertical-align: top;
      }
      .cover-container {
        margin-right: auto;
        margin-left: auto;
      }

      .inner {
        padding: 30px;
      }

      .cover {
        padding: 0 20px;
      }
      .cover .btn-lg {
        padding: 10px 20px;
        font-weight: bold;
      }

      @media (min-width: 768px) {
        .site-wrapper-inner {
          vertical-align: middle;
        }
        .cover-container {
          width: 100%; 
        }
      }

      @media (min-width: 992px) {
        .cover-container {
          width: 700px;
        }
      }

    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="inner cover">
            <h1 class="cover-heading">Page Not Found</h1>
            <p class="lead">404 Error</p>
            <p class="lead">
              <a href="{!! url('/') !!}" class="btn btn-lg btn-default">Home</a>
            </p>
          </div>

        </div>

      </div>

    </div>

    
  </body>
</html>
