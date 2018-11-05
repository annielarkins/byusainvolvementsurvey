<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BYUSA Results Page</title>
  </head>
  <body>
    <?php

    function GetURLVariables($variableName){
      $Rank1 = 0;
      if (isset($_GET[$variableName])) { //Repeat this for every option available
        $Rank1 = $_GET[$variableName];
      }
      return $Rank1;
    }

    //Connect to SQL Server (Replate with actual server info)
    $username = 'testUser';
    $password = 'testUser';
    $dbname = 'Project Types';
    $servername = 'localhost';
    $port = 8889;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    //Get Put URL Ranking into PHP
    $CurrentlyDisplayed = 0;
    $NumbToDisplay = 2;
    $RankToCheck = 1;
    $InteractingRank = GetURLVariables("Interacting");
    $InteractingDescription = 1;
    $OutreachRank = GetURLVariables("Outreach");
    $OutreachDescription = 2;
    $EventRank = GetURLVariables("Event");
    $EventDescription = 3;
    $CreativeRank = GetURLVariables("Creative");
    $CreativeDescription = 4;

    //Generates output
    $sql = "SELECT program, cmSpots, description FROM participation";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($CurrentlyDisplayed < $NumbToDisplay) {
        while($row = $result->fetch_assoc()) {
          if ($RankToCheck == $InteractingRank) {
            if($row["description"] == $InteractingDescription)  {
              echo "program: " .$row["program"]. " - Name: " .$row["cmSpots"]. " " .$row["description"]. "<br>";
              $CurrentlyDisplayed++;
              continue;
            }
          }
          if ($RankToCheck == $OutreachRank) {
            if($row["description"] == $OutreachDescription) {
              echo "program: " . $row["program"]. " - Name: " . $row["cmSpots"]. " " . $row["description"]. "<br>";
              $CurrentlyDisplayed++;
              continue;
            }
          }
          if ($RankToCheck == $EventRank) {
            if($row["description"] == $EventDescription) {
              echo "program: " . $row["program"]. " - Name: " . $row["cmSpots"]. " " . $row["description"]. "<br>";
              $CurrentlyDisplayed++;
              continue;
            }
          }
          if ($RankToCheck == $CreativeRank) {
            if($row["description"] == $CreativeDescription) {
              echo "program: " . $row["program"]. " - Name: " . $row["cmSpots"]. " " . $row["description"]. "<br>";
              $CurrentlyDisplayed++;
              continue;
            }
          }
          //$RankToCheck++;
        }
      }
    } else {
      echo "0 results";
    }


    mysqli_close($conn);

     ?>
  </body>
</html>
