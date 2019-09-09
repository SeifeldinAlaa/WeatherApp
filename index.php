<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Weather API</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet" href="index.css">
  </head>
  
  <body>
    <input id="city" />
    <button id="getWeatherForcast">Get Weather</button>
    <div id="showWeatherForcast"></div>

    <script type="text/javascript">
      $(document).ready(function() {
        $("#getWeatherForcast").click(function() {
          debugger;

          var city = $("#city").val();
          var key = "1eca0b0e2410dec83d833cdc002bbf91";

          $.ajax({
            url: "http://api.openweathermap.org/data/2.5/weather",
            dataType: "json",
            type: "GET",
            data: { q: city, appid: key, units: "imperial" },

            success: function(data) {
              var wf = "";
              $.each(data.weather, function(index, val) {
                wf +=
                  "<p><b>" +
                  data.name +
                  "</b><img  src=" +
                  val.icon +
                  ".png></p>" +
                  data.main.temp +
                  "&deg;F " +
                  " | " +
                  val.main +
                  ", " +
                  val.description;
              });
              $("#showWeatherForcast").html(wf);
            }
          });
        });
      });
    </script>
  </body>
</html>
