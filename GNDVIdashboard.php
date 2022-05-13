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
            <h1>Dashboard for Green Normalized Difference Vegetation Index</h1>
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
                    $result = mysqli_query($connection,"SELECT * FROM nitrogencontent");
                    echo "<table>
                    <tr>
                    <th>DatasetID</th>
                    <th>Mean GNDVI</th>
                    <th>Max GNDVI</th>
                    <th>Min GNDVI</th>
                    <th>Standard Deviation</th>
                    </tr>";

                    while($row = mysqli_fetch_array($result))

                    {
               
                    echo "<tr>";
               
                    echo "<td>" . $row['DatasetID'] . "</td>";
               
                    echo "<td>" . $row['GNDVIMean'] . "</td>";
               
                    echo "<td>" . $row['GNDVIMax'] . "</td>";
               
                    echo "<td>" . $row['GNDVIMin'] . "</td>";

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
                  $result = mysqli_query($connection,"SELECT * FROM nitrogencontentimages");
                  echo "<table>
                  <tr>
                  <th>DatasetID</th>
                  <th>GNDVI Figure</th>
                  <th>GNDVI Histogram</th>
                  </tr>"; 
                  
                  while($row = mysqli_fetch_array($result))
                  {

                    echo "<tr>";
               
                    echo "<td>" . $row['DatasetID'] . "</td>";
               
                    echo "<td><a href=\"" . $row['GNDVIFigName'] . "\">Figure</a> </td>";
               
                    echo "<td><a href=\"" . $row['GNDVIHistName'] . "\">Histogram</a> </td>" ;
               
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