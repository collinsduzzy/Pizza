<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <!-- SVG Background-->
    <link rel="stylesheet" href="body.css">
    <title>Ninja Pizza</title>
    <style>

        body {
            font-family: 'Nunito', sans-serif; 
            background-color: grey;
            
        }

        .brand {
            background-color: #d50000 !important;
        }

        .brand-text {
            color: #d50000 !important;
        }
        .brand-text-bold {
            font-weight: bold;
        }

        #new {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 2px 2px #e0e0e0;
        }

        .card {
            border: #d50000 solid 1.0px;
            margin-right: 10px !important;
        }

        .icon {
            width: 2.5rem;
            height: 2.5rem;
        }

        .iconl {
            width: 6rem;
            height: 6rem;
        }
        
        .icon-box {
            display: inline-flex;
        }

        .icon-fix {
            width: 2rem;
            height: 2rem;
            margin-top: 13.5px;
            margin-right: 10px;
            color: #d50000;
        }

        .underline {
            text-decoration: underline;
        }

        /* label color */
            .input-field label {
                color: #d50000 !important;
            }
            /* label focus color */
            .input-field input[type=text]:focus + label {
                color: #d50000 !important;
            }
            /* label underline focus color */
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #d50000 !important;
                box-shadow: 0 1px 0 0 #d50000 !important;
            }
            /* icon prefix focus color */
            .input-field .prefix.active {
                color: #d50000 !important;
            }
    </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0 nav-wrapper">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text brand-text-bold left ">Pizzas</a>
          <ul class="right">
            <li>
            <a href="create.php" class="btn btn-flat btn-small brand white-text">Place Order</a>
            </li>
          </ul>
        </div>
    </nav>