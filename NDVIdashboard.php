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
            <h1>Dashboard for Normalized Difference Vegetation Index</h1>
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
                    $result = mysqli_query($connection,"SELECT * FROM presenceofhab");
                    echo "<table>
                    <tr>
                    <th>DatasetID</th>
                    <th>Mean NDVI</th>
                    <th>Max NDVI</th>
                    <th>Min NDVI</th>
                    <th>Standard Deviation</th>
                    </tr>";

                    while($row = mysqli_fetch_array($result))

                    {
               
                    echo "<tr>";
               
                    echo "<td>" . $row['DatasetID'] . "</td>";
               
                    echo "<td>" . $row['NDVIMean'] . "</td>";
               
                    echo "<td>" . $row['NDVIMax'] . "</td>";
               
                    echo "<td>" . $row['NDVIMin'] . "</td>";

                    echo "<td>" . $row['NDVIStandardDeviation'] . "</td>";
               
                    echo "</tr>";
               
                   }
               
                   echo "</table>";   

                   mysqli_close($connection);
              
                ?>


                
            </div>

            <div class="table2">
                <?php
                  include 'connection.php';
                  $result = mysqli_query($connection,"SELECT * FROM habimages");
                  echo "<table>
                  <tr>
                  <th>DatasetID</th>
                  <th>NDVI Figure</th>
                  <th>NDVI Histogram</th>
                  </tr>"; 
                  
                  while($row = mysqli_fetch_array($result))
                  {

                    echo "<tr>";
               
                    echo "<td>" . $row['DatasetID'] . "</td>";
               
                    echo "<td><a href=\"" . $row['NDVIFigName'] . "\">Figure</a> </td>";
               
                    echo "<td><a href=\"" . $row['NDVIHistName'] . "\">Histogram</a> </td>" ;
               
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