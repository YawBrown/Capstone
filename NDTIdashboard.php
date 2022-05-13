<?php

?>
<html>
    <head>
        <meta charset="utf-8">
	    <title>Main Page</title>
	    <link rel="stylesheet" type="text/css" href="style2.css">
    </head>


    <body>
        <main>
            <h1>Dashboard for Normalized Difference Turbidity Index</h1>
            <div class="date">
                <input type="date">
            </div>

            <div class="insights">
                <div class="Number">
                    <h2>Number of Datasets</h2>
                    <h1>3</h1>

                </div>
                <div class="range">
                    <h2>Time range</h2>
                    <h1>2 days</h1>
                </div>
            </div>

            <div class="table1">
                <?php
                 	include 'connection.php';
                    $result = mysqli_query($connection,"SELECT * FROM turbidity");
                    echo "<table>
                    <tr>
                    <th>DatasetID</th>
                    <th>Mean NDTI</th>
                    <th>Max NDTI</th>
                    <th>Min NDTI</th>
                    <th>Standard Deviation</th>
                    </tr>";

                    while($row = mysqli_fetch_array($result))

                    {
               
                    echo "<tr>";
               
                    echo "<td>" . $row['DatasetID'] . "</td>";
               
                    echo "<td>" . $row['NDTIMean'] . "</td>";
               
                    echo "<td>" . $row['NDTIMax'] . "</td>";
               
                    echo "<td>" . $row['NDTIMin'] . "</td>";

                    echo "<td>" . $row['StandardDeviation'] . "</td>";
               
                    echo "</tr>";
               
                   }
               
                   echo "</table>";   

                   mysqli_close($connection);
              
                ?>


                
            </div>

            <div class="table2">
                <?php
                  include 'connection.php';
                  $result = mysqli_query($connection,"SELECT * FROM turbidityimages");
                  echo "<table>
                  <tr>
                  <th>DatasetID</th>
                  <th>NDTI Figure</th>
                  <th>NDTI Histogram</th>
                  </tr>"; 
                  
                  while($row = mysqli_fetch_array($result))
                  {

                    echo "<tr>";
               
                    echo "<td>" . $row['DatasetID'] . "</td>";
               
                    echo "<td><a href=\"" . $row['NDTIFigName'] . "\">Figure</a> </td>";
               
                    echo "<td><a href=\"" . $row['NDTIHistName'] . "\">Histogram</a> </td>" ;
               
                    echo "</tr>";

                  }
                  

                  echo "</table>";  

                  mysqli_close($connection);



                   



                 ?>





            </div>
            
            <div class="act">
            <a href="MajorPage.php">RETURN</a>
            </div>


     
        </main>

    </body>
</html>