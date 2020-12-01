<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />

    <!-- font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css files/voting.css" />
    <title>Home</title>
  </head>

  <body>


    <?php 
    echo "<div class='container'>
    <div class='pt-3'>
      <h1 class='text-center pb-4'>Vote For Student Council Cultural Secretary</h1>
    </div>
    ";
        include 'dbcon.php';
      if($_SESSION['flag_cs']==0){

        $candidateselect = "select * from candidates where position = 'Cultural Secretary' ";
        $candidatequery = mysqli_query($con, $candidateselect);
        $i=1;
        echo "<form method='POST'>";
        while($candidate = mysqli_fetch_assoc($candidatequery)){
            $tid = $candidate['tid'];
            $teamselect = "select * from teams where tid = '$tid' ";
            $userquery = mysqli_query($con, $teamselect);
            $user = mysqli_fetch_assoc($userquery);
            echo "<div class='row justify-content-center p-3'>";
        echo "<div class='card w-50'>";
        echo "<div class='row no-gutters'>";
        echo "<div class='col-5'>";
            echo "<img src='" . $candidate['photo'] . "' alt='default'/>";
            echo "</div>";
            echo "<div class='col-7'>";
            echo "<div class='card-body pl-4'>";
            echo "<input type = 'hidden' name = 'cid" . $i . "' value='" . $candidate['cid'] . "'>";
            echo "<h5 class='card-title'>" . $candidate['cname'] . "</h5>";
            echo "<p class='card-text'>" . $user['tname'] . "<br>" . $user['slogan'] . "</p>";
            echo "<button class='btn btn-primary mt-2' type = 'submit' name = 'details" . $i ."' id='myBtn'>Vote</button>";  
            
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";  
            $i++; 
        }
        echo "</form>";
        $j=1;
        while($j<=$i){
            
            if( isset($_POST['details' . $j]) ){
                  $_SESSION["flag_cs"] = 1;
                  $cid = $_POST['cid' . $j];
                  $voteselect = " update candidates set votes = votes + 1 where cid = '$cid' ";
                  $votequery = mysqli_query($con, $voteselect);
                  ?>
                        <script>location.replace('voting_ss.php')</script>
                  <?php
            }
            $j++;
        }
      }
      else{
        echo "<div class='container'>
    <div class='pt-3'>
      <h1 class='text-center pb-4'>You have already voted for this Category!</h1>
    </div>
    ";
      }
        echo "</div> </div>" ;
          ?> 
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
