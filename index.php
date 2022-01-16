<?php

    error_reporting(E_ERROR | E_PARSE);

    $weather = "";
    $error = "";
    if(isset($_GET["city"])) {
        $urlContent = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET["city"]."&units=metric&appid=1baa84803c74e10aa460949030704283");

        $forcastArray = json_decode($urlContent, true);

        if($forcastArray["cod"] == 200) {
            $weather = 'The weather in '.$_GET["city"].' is '.$forcastArray["weather"]["0"]["description"];
            $weather = $weather.'!</br>The temperature is '.$forcastArray["main"]["temp"].'&#8451;.'.'</br>The speed of wind is '.$forcastArray["wind"]["speed"].' m/s.';
        } else {
            $error = 'The city name is incorrect, please try another name!';
        }

    }



?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/58778d6c07.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/style.css" >


    <title>Weather App</title>
  </head>
  <body>
    <div class="container" id="mainDiv">
        <h1>Weather in your City!</h1>
        <form>
            <div class="mb-3">
                <label for="city" class="form-label">Input a City name</label>
                <input type="text" class="form-control" id="city" name="city" aria-describedby="Forcast city" placeholder="Enter City Name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div id="forcastDiv">
    <?php
        if($weather){
            echo 
            '<div class="alert alert-primary" role="alert">'.$weather.'</div>';
            } else if ($error) {
                echo
                '<div class="alert alert-danger" role="alert">'.$error.'</div>';
            }

        ?>
</div>


<div class="footer-basic">
        <footer>
            <div class="social">
                <a href="https://www.facebook.com/profile.php?id=100006057309901"><i class="fab fa-facebook"></i></a>
                <a href="https://github.com/JonikStyleProd"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.linkedin.com/in/evgeny-kisilgof-b32a16229/"><i class="fab fa-linkedin"></i></a>
            </div>
            <p class="copyright">JonikStyle Production © 2022</p>
        </footer>
    </div>
    </div>


      <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>