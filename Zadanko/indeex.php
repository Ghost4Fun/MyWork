<?php include("head.php");
      include("db_login.php");

    function curl($url) {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $data = curl_exec($ch);
            curl_close($ch);

            return $data;
        }
       if (isset($_GET['location'])) {


                $urlContents = curl("api.openweathermap.org/data/2.5/forecast?q=".$_GET['location']."&appid=9c398cd4cf22ab63cebf65a655f9d64d&lang=pl&metric");

                $weatherArray = json_decode($urlContents, true);
                $test = $weatherArray['cod'];

                if ($test == 200) {

                  $city_name = $weatherArray['city']['name'];
                $pogoda_1 = "Pogoda dnia ".$weatherArray['list'][0]['dt_txt']." dla miejscowości ".$city_name." jest obecnie ".$weatherArray['list'][0]['weather'][0]['description'].".";

                $temperatura_1 = intval($weatherArray['list'][0]['main']['temp']- 273.15);

                $wiatr_1 = intval($weatherArray['list'][0]['wind']['speed'] * 3.6);

                $pogoda_1 .=" Temperatura ".$temperatura_1."&deg; C z prędkością wiatru ".$wiatr_1." KMH.";



                $pogoda_2 = "Pogoda dnia ".$weatherArray['list'][7]['dt_txt']." dla miejscowości ".$city_name." będzie ".$weatherArray['list'][7]['weather'][0]['description'].".";

                $temperatura_2 = intval($weatherArray['list'][7]['main']['temp']- 273.15);

                $wiatr_2 = intval($weatherArray['list'][7]['wind']['speed'] * 3.6);

                $pogoda_2 .=" Temperatura ".$temperatura_2."&deg; C z prędkością wiatru ".$wiatr_2." KMH.";



                $pogoda_3 = "Pogoda dnia ".$weatherArray['list'][15]['dt_txt']." dla miejscowości ".$city_name." będzie ".$weatherArray['list'][15]['weather'][0]['description'].".";

                $temperatura_3 = intval($weatherArray['list'][15]['main']['temp']- 273.15);

                $wiatr_3 = intval($weatherArray['list'][15]['wind']['speed'] * 3.6);

                $pogoda_3 .=" Temperatura ".$temperatura_3."&deg; C z prędkością wiatru ".$wiatr_3." KMH.";



                $pogoda_4 = "Pogoda dnia ".$weatherArray['list'][23]['dt_txt']." dla miejscowości ".$city_name." będzie ".$weatherArray['list'][23]['weather'][0]['description'].".";

                $temperatura_4 = intval($weatherArray['list'][23]['main']['temp']- 273.15);

                $wiatr_4 = intval($weatherArray['list'][23]['wind']['speed'] * 3.6);

                $pogoda_4 .=" Temperatura ".$temperatura_4."&deg; C z prędkością wiatru ".$wiatr_4." KMH.";



                $pogoda_5 = "Pogoda dnia ".$weatherArray['list'][31]['dt_txt']." dla miejscowości ".$city_name." będzie ".$weatherArray['list'][31]['weather'][0]['description'].".";

                $temperatura_5 = intval($weatherArray['list'][31]['main']['temp']- 273.15);

                $wiatr_5 = intval($weatherArray['list'][31]['wind']['speed'] * 3.6);

                $pogoda_5 .=" Temperatura ".$temperatura_5."&deg; C z prędkością wiatru ".$wiatr_5." KMH.";

                if (isset($pogoda_1)) {


                $IP = $_SERVER['REMOTE_ADDR'];
                $IP = mysqli_real_escape_string($conn, $IP);
                $location= "$city_name";
                $location = mysqli_real_escape_string($conn, $location);
                $czas= $weatherArray['list'][0]['dt_txt']. "-" .$weatherArray['list'][31]['dt_txt'];
                $czas = mysqli_real_escape_string($conn, $czas);


                $sql = "Insert Into $tb_name(IP, Location, Data) Values('$IP', '$location', '$czas')";
                $conn->query($sql);


              }
        }

        else {
          $brak = "Brak wartości.";
        }
}

            ?>
<body>
    <nav id="wrapper">
          <div class="col-xs-12 col-sm-6 col-md-8">

            <div style="background:transparent !important" class="jumbotron">
                <h1>Twoja pogoda!</h1>
                <p>Sprawdź prognozę pogody, dla twojej miejscowości.</p>
                <p><a class="btn btn-primary btn-lg" role="button" onclick="window.open('https://gembit.pl/')" />O nas!</a></p>
           </div>
         </div>
   </nav>
   <header id="wrapper2">
          <div class="col-xs-6 col-md-4">
              <div style="background:transparent !important" class="jumbotron">
                          <h1>Sprawdź pogodę dla:</h1>
                          <form method="get" class="form-group">
                            <input id="formularz" type="text" name="location"  placeholder="Miejscowość" class="form-control"/><br>
                            <input id="przycisk" type="submit" class="btn btn-primary btn" value="Sprawdź!"/>
                          </form>
                          <script>
                          $('#przycisk').prop("disabled", "disabled");
                            $('#formularz').on("input", function () {
                                if ($(this).val() != "") {
                                    $('#przycisk').prop("disabled", false);
                                      } else {
                                    $('#przycisk').prop("disabled", "disabled");
                                            }
                                      });
</script>
              </div>
     </div>
        </header>
        <div id="last">
  <?php
  $zapytanie = "SELECT Location FROM pogodynka ORDER BY ID DESC LIMIT 5 ";
  $results = $conn->query($zapytanie);
  echo "<table border='1'>
  <tr>
  <th>Ostatnie zapytania:</th>
  </tr>";

  while($row = mysqli_fetch_row($results))
  {

  echo "<td>" . $row[0] . "</td>";

  }
  echo "</table>";

  $conn->close();
  ?>
  </div>
        <div id="wynik">

          <?php

            if (isset($pogoda_1)) {

                echo '<div class="alert alert-success" role="alert">'.$pogoda_1.'</div>';
                echo '<div class="alert alert-success" role="alert">'.$pogoda_2.'</div>';
                echo '<div class="alert alert-success" role="alert">'.$pogoda_3.'</div>';
                echo '<div class="alert alert-success" role="alert">'.$pogoda_4.'</div>';
                echo '<div class="alert alert-success" role="alert">'.$pogoda_5.'</div>';

            }
             if (isset($brak)) {

                    echo '<div class="alert alert-danger" role="alert">Niestety, wybrana miejscowość jest niedostepna.</div>';
                }
          ?>

      </div>

</body>
</html>
