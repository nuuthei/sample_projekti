<?php
    include('config/db_connect.php');
?>

<head>
    <title>Test</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <style type="text/css">
        .brand{
            background: #7289da !important;
        }
        .brand-text{
            color: #7289da !important;
            font-size: 40px !important;
            font-family: Arial !important;
        }
        .container{
            color: #2c2f33 !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .center{
            color: #bdbdbd !important;
        }
        
    </style>
</head>
<body class=" grey darken-3">
    <nav class="grey darken-4">
        <div class="container">
            <a href="index.php" class="brand-text">sample_projekti</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
            <li><a href="add.php" class="btn brand z-depth-0">Upload</a></li>
            </ul>
        </div>
    </nav>
