
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['접속시간', '접속수'],
          <?php
                // 2022-12-14 00:00:00 ~ 01:00:00
                $today = Date('Y-m-d');
                for($i=0; $i<24; $i++)
                {
                    //$next =$i + 1;
                    $sql = "select * from logs 
                                where time>='$today $i:00:00' 
                                    and time<'$today $i:59:59' ";
                    $result = mysqli_query($conn, $sql);
                    $connectCount = mysqli_num_rows($result);

                    echo "['$i:00', $connectCount],";
                }
          ?>
        ]);

        var options = {
          title: '접속 로그',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('secure_chart'));

        chart.draw(data, options);
      }
    </script>

    <div id="secure_chart" style="width: 900px; height: 500px"></div>

    <script>
        setTimeout(function(){
            location.href='main.php?cmd=chart';
        }, 5000);
    </script>
