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
  
    <link rel="stylesheet" href="css files/admin.css"/>
    <title>Home</title>
  </head>

  <body>
    <nav
      class="navbar navbar-expand-md navbar-dark fixed-top px-5 py-0 theme bg-primary"
    >
      <a class="navbar-brand pl-5 ml-5" href="#"
        ><span class="logo"
          ><img
            src="https://smu.edu.in/content/dam/manipal/smu/images/logos/smit-logo-2020.png" /></span
      ></a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#collapsibleNavbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse w-100" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="active" href="#">ADMIN</a>
          </li>

          <li class="nav-item">
            <a href="#footer">CONTACT</a>
          </li>
          <li class="nav-item">
          <div class="dropdown">
              <a class="dropdown-toggle" style="color:white" data-toggle="dropdown">
                <?php echo $_SESSION["username"]; ?>
              </a>
              <div class="dropdown-menu theme">
                <a class="dropdown-item" style="color:blue" href="dbend.php">LOGOUT</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>


    <?php 
    echo "<div class='container'>
    <div class='pt-3'>
      <h1 class='text-center pb-4' style='margin-top:25px; font-weight:800;color: rgb(230, 87, 5);'>Election Details</h1>
      <hr>
    </div>
    ";
        include 'dbcon.php';

            echo "<!-- Election Detials -->
                <table border='1'>
                <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Total Teams</th>
                <th>Total Candidate</th>
                <th>Total Votes Counted</th>
                <th>Enable</th>
                <th>Disable</th>
                </tr>";
        $electionselect = "select * from election";
        $electionquery = mysqli_query($con, $electionselect);
        $i=1;
        echo "<form method='POST'>";
        while($election = mysqli_fetch_assoc($electionquery)){
           
            echo "<tr>";
            echo "<td>" . $election['eid'] . "</td>";
            echo "<input type = 'hidden' name = 'cid" . $i . "' value='" . $election['eid'] . "'>";
            echo "<td>" . $election['ename'] . "</td>";
            $teamselect = "select count(*) from teams";
            $teamquery = mysqli_query($con, $teamselect);
            $team = mysqli_fetch_assoc($teamquery);
            echo "<td>" . $team['count(*)'] . "</td>";
            $candidateselect = "select count(*) from candidates";
            $candidatequery = mysqli_query($con, $candidateselect);
            $candidate = mysqli_fetch_assoc($candidatequery);
            echo "<td>" . $candidate['count(*)'] . "</td>";
            $voteselect = "select count(id) from voters where ifvoted=1";
            $votequery = mysqli_query($con, $voteselect);
            $vote = mysqli_fetch_assoc($votequery);
            echo "<td>" . $vote['count(id)'] . "</td>";
            echo "<td><button type = 'submit' name = 'enable" . $i ."' id='myBtn' class='button sec-1-btn'>Enable</button> </td>"; 
            echo "<td><button type = 'submit' name = 'disable" . $i ."' id='myBtn' class='button sec-1-btn'>Disable</button> </td>";
            echo "</tr>";  
            $i++; 
        }
        echo "</form>";
        echo "</table>";
        $j=1;
        while($j<=$i){
            
            if( isset($_POST['enable' . $j]) ){
                  $eid = $_POST['cid' . $j];
                  $elselect = " update election set status = 'Enabled' where eid = '$eid' ";
                  $elquery = mysqli_query($con, $elselect);
                  ?>
                        <script>alert("Election Enabled!");</script>
                  <?php
            }
            $j++;
        }
        $k=1;
        while($k<=$i){
            
            if( isset($_POST['disable' . $k]) ){
                  $eid = $_POST['cid' . $k];
                  $elselect = " update election set status = 'Disabled' where eid = '$eid' ";
                  $elquery = mysqli_query($con, $elselect);
                  ?>
                        <script>alert("Election Disabled!");</script>
                  <?php
            }
            $k++;
        }
        echo "</div> </div>" ;
          ?> 
    <div
      style="
        height: 100vh;
        position: relative;
        top: 400px;
        background-color: white;
      ">
      <hr />
      <div>
      <div id="footer">
        <div class="InnerSection" style="margin-right: 10vh">
          <!-- Add Logo -->
          <h3 class="InnerHeading">SMIT Council Elections</h3>
          Cast your precious votes to the most deserving candidates for the SMIT
          Council-2020. Remember...Every vote matters!!
        </div>
        <div class="InnerSection">
          <h2 class="InnerHeading">Quick Links</h2>
          <ol>
            <li>
              <a href="#">Home</a>
            </li>
            <li>
              <a href="#">Details</a>
            </li>
            <li>
              <a href="#">Cast your Vote</a>
            </li>
            <li>
              <a href="#">View Results</a>
            </li>
          </ol>
        </div>
        <div class="InnerSection">
          <h2 class="InnerHeading">Made By</h2>
          <ol>
            <li>
              <a href="#" target="_blank">Aditi Bansal</a>
            </li>
            <li>
              <a href="#" target="_blank">Kumari Ayushi Sinha</a>
            </li>
            <li>
              <a href="#" target="_blank">Pratyush Sharma</a>
            </li>
          </ol>
        </div>
        <div class="InnerSection">
          <h2 class="InnerHeading">Contact Us</h2>
          <ol id="IconList">
            <li>
              <a href="https://www.instagram.com/" target="_blank">
                <img
                  class="SocialIcon"
                  src="data:image/svg+xml;base64,PHN2ZyBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyNCAyNCIgaGVpZ2h0PSI1MTIiIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjUxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGxpbmVhckdyYWRpZW50IGlkPSJTVkdJRF8xXyIgZ3JhZGllbnRUcmFuc2Zvcm09Im1hdHJpeCgwIC0xLjk4MiAtMS44NDQgMCAtMTMyLjUyMiAtNTEuMDc3KSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSItMzcuMTA2IiB4Mj0iLTI2LjU1NSIgeTE9Ii03Mi43MDUiIHkyPSItODQuMDQ3Ij48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiNmZDUiLz48c3RvcCBvZmZzZXQ9Ii41IiBzdG9wLWNvbG9yPSIjZmY1NDNlIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjYzgzN2FiIi8+PC9saW5lYXJHcmFkaWVudD48cGF0aCBkPSJtMS41IDEuNjMzYy0xLjg4NiAxLjk1OS0xLjUgNC4wNC0xLjUgMTAuMzYyIDAgNS4yNS0uOTE2IDEwLjUxMyAzLjg3OCAxMS43NTIgMS40OTcuMzg1IDE0Ljc2MS4zODUgMTYuMjU2LS4wMDIgMS45OTYtLjUxNSAzLjYyLTIuMTM0IDMuODQyLTQuOTU3LjAzMS0uMzk0LjAzMS0xMy4xODUtLjAwMS0xMy41ODctLjIzNi0zLjAwNy0yLjA4Ny00Ljc0LTQuNTI2LTUuMDkxLS41NTktLjA4MS0uNjcxLS4xMDUtMy41MzktLjExLTEwLjE3My4wMDUtMTIuNDAzLS40NDgtMTQuNDEgMS42MzN6IiBmaWxsPSJ1cmwoI1NWR0lEXzFfKSIvPjxwYXRoIGQ9Im0xMS45OTggMy4xMzljLTMuNjMxIDAtNy4wNzktLjMyMy04LjM5NiAzLjA1Ny0uNTQ0IDEuMzk2LS40NjUgMy4yMDktLjQ2NSA1LjgwNSAwIDIuMjc4LS4wNzMgNC40MTkuNDY1IDUuODA0IDEuMzE0IDMuMzgyIDQuNzkgMy4wNTggOC4zOTQgMy4wNTggMy40NzcgMCA3LjA2Mi4zNjIgOC4zOTUtMy4wNTguNTQ1LTEuNDEuNDY1LTMuMTk2LjQ2NS01LjgwNCAwLTMuNDYyLjE5MS01LjY5Ny0xLjQ4OC03LjM3NS0xLjctMS43LTMuOTk5LTEuNDg3LTcuMzc0LTEuNDg3em0tLjc5NCAxLjU5N2M3LjU3NC0uMDEyIDguNTM4LS44NTQgOC4wMDYgMTAuODQzLS4xODkgNC4xMzctMy4zMzkgMy42ODMtNy4yMTEgMy42ODMtNy4wNiAwLTcuMjYzLS4yMDItNy4yNjMtNy4yNjUgMC03LjE0NS41Ni03LjI1NyA2LjQ2OC03LjI2M3ptNS41MjQgMS40NzFjLS41ODcgMC0xLjA2My40NzYtMS4wNjMgMS4wNjNzLjQ3NiAxLjA2MyAxLjA2MyAxLjA2MyAxLjA2My0uNDc2IDEuMDYzLTEuMDYzLS40NzYtMS4wNjMtMS4wNjMtMS4wNjN6bS00LjczIDEuMjQzYy0yLjUxMyAwLTQuNTUgMi4wMzgtNC41NSA0LjU1MXMyLjAzNyA0LjU1IDQuNTUgNC41NSA0LjU0OS0yLjAzNyA0LjU0OS00LjU1LTIuMDM2LTQuNTUxLTQuNTQ5LTQuNTUxem0wIDEuNTk3YzMuOTA1IDAgMy45MSA1LjkwOCAwIDUuOTA4LTMuOTA0IDAtMy45MS01LjkwOCAwLTUuOTA4eiIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg=="
                />
              </a>
            </li>
            <li>
              <a href="https://www.facebook.com/" target="_blank">
                <img
                  class="SocialIcon"
                  src="data:image/svg+xml;base64,PHN2ZyBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyNCAyNCIgaGVpZ2h0PSI1MTIiIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjUxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtMjEgMGgtMThjLTEuNjU1IDAtMyAxLjM0NS0zIDN2MThjMCAxLjY1NCAxLjM0NSAzIDMgM2gxOGMxLjY1NCAwIDMtMS4zNDYgMy0zdi0xOGMwLTEuNjU1LTEuMzQ2LTMtMy0zeiIgZmlsbD0iIzNiNTk5OSIvPjxwYXRoIGQ9Im0xNi41IDEydi0zYzAtLjgyOC42NzItLjc1IDEuNS0uNzVoMS41di0zLjc1aC0zYy0yLjQ4NiAwLTQuNSAyLjAxNC00LjUgNC41djNoLTN2My43NWgzdjguMjVoNC41di04LjI1aDIuMjVsMS41LTMuNzV6IiBmaWxsPSIjZmZmIi8+PC9zdmc+"
                />
              </a>
            </li>
            <li>
              <a href="https://twitter.com/" target="_blank">
                <img
                  class="SocialIcon"
                  src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE4LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDQ1NS43MzEgNDU1LjczMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDU1LjczMSA0NTUuNzMxOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8cmVjdCB4PSIwIiB5PSIwIiBzdHlsZT0iZmlsbDojNTBBQkYxOyIgd2lkdGg9IjQ1NS43MzEiIGhlaWdodD0iNDU1LjczMSIvPg0KCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNNjAuMzc3LDMzNy44MjJjMzAuMzMsMTkuMjM2LDY2LjMwOCwzMC4zNjgsMTA0Ljg3NSwzMC4zNjhjMTA4LjM0OSwwLDE5Ni4xOC04Ny44NDEsMTk2LjE4LTE5Ni4xOA0KCQljMC0yLjcwNS0wLjA1Ny01LjM5LTAuMTYxLTguMDY3YzMuOTE5LTMuMDg0LDI4LjE1Ny0yMi41MTEsMzQuMDk4LTM1YzAsMC0xOS42ODMsOC4xOC0zOC45NDcsMTAuMTA3DQoJCWMtMC4wMzgsMC0wLjA4NSwwLjAwOS0wLjEyMywwLjAwOWMwLDAsMC4wMzgtMC4wMTksMC4xMDQtMC4wNjZjMS43NzUtMS4xODYsMjYuNTkxLTE4LjA3OSwyOS45NTEtMzguMjA3DQoJCWMwLDAtMTMuOTIyLDcuNDMxLTMzLjQxNSwxMy45MzJjLTMuMjI3LDEuMDcyLTYuNjA1LDIuMTI2LTEwLjA4OCwzLjEwM2MtMTIuNTY1LTEzLjQxLTMwLjQyNS0yMS43OC01MC4yNS0yMS43OA0KCQljLTM4LjAyNywwLTY4Ljg0MSwzMC44MDUtNjguODQxLDY4LjgwM2MwLDUuMzYyLDAuNjE3LDEwLjU4MSwxLjc4NCwxNS41OTJjLTUuMzE0LTAuMjE4LTg2LjIzNy00Ljc1NS0xNDEuMjg5LTcxLjQyMw0KCQljMCwwLTMyLjkwMiw0NC45MTcsMTkuNjA3LDkxLjEwNWMwLDAtMTUuOTYyLTAuNjM2LTI5LjczMy04Ljg2NGMwLDAtNS4wNTgsNTQuNDE2LDU0LjQwNyw2OC4zMjljMCwwLTExLjcwMSw0LjQzMi0zMC4zNjgsMS4yNzINCgkJYzAsMCwxMC40MzksNDMuOTY4LDYzLjI3MSw0OC4wNzdjMCwwLTQxLjc3NywzNy43NC0xMDEuMDgxLDI4Ljg4NUw2MC4zNzcsMzM3LjgyMnoiLz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K"
                />
              </a>
            </li>
            <li>
              <a href="https://www.linkedin.com/" target="_blank">
                <img
                  class="SocialIcon"
                  src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE4LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDQ1NS43MzEgNDU1LjczMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDU1LjczMSA0NTUuNzMxOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8cmVjdCB4PSIwIiB5PSIwIiBzdHlsZT0iZmlsbDojMDA4NEIxOyIgd2lkdGg9IjQ1NS43MzEiIGhlaWdodD0iNDU1LjczMSIvPg0KCTxnPg0KCQk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTEwNy4yNTUsNjkuMjE1YzIwLjg3MywwLjAxNywzOC4wODgsMTcuMjU3LDM4LjA0MywzOC4yMzRjLTAuMDUsMjEuOTY1LTE4LjI3OCwzOC41Mi0zOC4zLDM4LjA0Mw0KCQkJYy0yMC4zMDgsMC40MTEtMzguMTU1LTE2LjU1MS0zOC4xNTEtMzguMTg4QzY4Ljg0Nyw4Ni4zMTksODYuMTI5LDY5LjE5OSwxMDcuMjU1LDY5LjIxNXoiLz4NCgkJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik0xMjkuNDMxLDM4Ni40NzFIODQuNzFjLTUuODA0LDAtMTAuNTA5LTQuNzA1LTEwLjUwOS0xMC41MDlWMTg1LjE4DQoJCQljMC01LjgwNCw0LjcwNS0xMC41MDksMTAuNTA5LTEwLjUwOWg0NC43MjFjNS44MDQsMCwxMC41MDksNC43MDUsMTAuNTA5LDEwLjUwOXYxOTAuNzgzDQoJCQlDMTM5LjkzOSwzODEuNzY2LDEzNS4yMzUsMzg2LjQ3MSwxMjkuNDMxLDM4Ni40NzF6Ii8+DQoJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMzg2Ljg4NCwyNDEuNjgyYzAtMzkuOTk2LTMyLjQyMy03Mi40Mi03Mi40Mi03Mi40MmgtMTEuNDdjLTIxLjg4MiwwLTQxLjIxNCwxMC45MTgtNTIuODQyLDI3LjYwNg0KCQkJYy0xLjI2OCwxLjgxOS0yLjQ0MiwzLjcwOC0zLjUyLDUuNjU4Yy0wLjM3My0wLjA1Ni0wLjU5NC0wLjA4NS0wLjU5OS0wLjA3NXYtMjMuNDE4YzAtMi40MDktMS45NTMtNC4zNjMtNC4zNjMtNC4zNjNoLTU1Ljc5NQ0KCQkJYy0yLjQwOSwwLTQuMzYzLDEuOTUzLTQuMzYzLDQuMzYzVjM4Mi4xMWMwLDIuNDA5LDEuOTUyLDQuMzYyLDQuMzYxLDQuMzYzbDU3LjAxMSwwLjAxNGMyLjQxLDAuMDAxLDQuMzY0LTEuOTUzLDQuMzY0LTQuMzYzDQoJCQlWMjY0LjgwMWMwLTIwLjI4LDE2LjE3NS0zNy4xMTksMzYuNDU0LTM3LjM0OGMxMC4zNTItMC4xMTcsMTkuNzM3LDQuMDMxLDI2LjUwMSwxMC43OTljNi42NzUsNi42NzEsMTAuODAyLDE1Ljg5NSwxMC44MDIsMjYuMDc5DQoJCQl2MTE3LjgwOGMwLDIuNDA5LDEuOTUzLDQuMzYyLDQuMzYxLDQuMzYzbDU3LjE1MiwwLjAxNGMyLjQxLDAuMDAxLDQuMzY0LTEuOTUzLDQuMzY0LTQuMzYzVjI0MS42ODJ6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo="
                />
              </a>
            </li>
          </ol>
        </div>
      </div>
    </div>

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
