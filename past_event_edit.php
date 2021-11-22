<?php

    if (isset($_POST['submit3'])) {
        require_once("conn.php");
        $query = "SELECT * FROM past_event " ;
        try{
            $prepared_stmt = $dbo->prepare($query);
            $prepared_stmt->execute();
            $result = $prepared_stmt->fetchAll();
        }catch (PDOException $ex){ // Error in database processing.
            echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
        }
}
?>



<?php
    require_once("conn.php");
        $query1 = "SELECT * FROM past_event " ;
        try{
            $prepared_stmt1 = $dbo->prepare($query1);
            $prepared_stmt1->execute();
            $result1 = $prepared_stmt1->fetchAll();
        }catch (PDOException $ex){ // Error in database processing.
            echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
        }

?>





<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {

    require_once("conn.php");


    $event_name = $_POST['event_name'];
    $event_time = $_POST['event_time'];
    $attend_num = $_POST['attend_num'];
    $host_name = $_POST['host_name'];
    $event_location = $_POST['event_location'];
    $difficulty = $_POST['difficulty'];
    $event_theme = $_POST['event_theme'];




    $query = "INSERT INTO past_event (event_id, event_name, event_time,attend_num, host_name,event_location,difficulty,event_theme)
              VALUES (DEFAULT, :event_name, :event_time,:attend_num, :host_name,:event_location,:difficulty,:event_theme)";

    try
    {
      $prepared_stmt = $dbo->prepare($query);
      $prepared_stmt->bindValue(':event_name', $event_name, PDO::PARAM_STR);
      $prepared_stmt->bindValue(':event_time', $event_time, PDO::PARAM_STR);
      $prepared_stmt->bindValue(':attend_num', $attend_num, PDO::PARAM_INT);
      $prepared_stmt->bindValue(':host_name', $host_name, PDO::PARAM_STR);
      $prepared_stmt->bindValue(':event_location', $event_location, PDO::PARAM_STR);
      $prepared_stmt->bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
      $prepared_stmt->bindValue(':event_theme', $event_theme, PDO::PARAM_STR);
      $prepared_stmt->execute();
    }
    catch (PDOException $ex)
    { // Error in database processing.
      echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
    }
}
?>


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit2'])) {

    require_once("conn.php");


    $event_name = $_POST['event_name'];

    $query = "DELETE FROM past_event WHERE event_name = :event_name";

    try
    {
      $prepared_stmt = $dbo->prepare($query);
      $prepared_stmt->bindValue(':event_name', $event_name, PDO::PARAM_STR);
      $prepared_stmt->execute();
    }
    catch (PDOException $ex)
    { // Error in database processing.
      echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
    }
}
?>






<html>
	<head>
		<title>Past Events Edit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">


				<!-- Header -->
				<header id="header" class="alt">
					<a href="index.html" class="logo"><strong>Vanderbilt Maker Club
					</strong> </a>
					<nav>
						<a href="#menu">Menu</a>
					</nav>
				</header>

				<!-- Menu -->
                <nav id="menu">
					<ul class="links">
						<li><a href="index.html">Home</a></li>
						<li><a href="http://localhost/maker-site-backend/about.php">About Us</a></li>
						<li><a href="http://localhost/maker-site-backend/past_event2.php">Past Events</a></li>
						<li><a href="http://localhost/maker-site-backend/future_event.php">Future Events</a></li>
						<li><a href="http://localhost/maker-site-backend/tutorial.php">Tutorials</a></li>
					</ul>
					<ul class="actions stacked">
						<li><a href="login.html" class="button fit">Log In As Administrator</a></li>
					</ul>
				</nav>

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>Add or Delete Past Event</h1>
									</header>
									<span class="image main"><img src="images/admin_page.png" style="width:300px"alt="" /></span>
								</div>
							</section>




						<!-- Search Engine -->

							<div class="container-fluid">

								<div class="row">
									<div class="col-1"></div>
									<div class="col-10">

										<div class="form-group">
											<div class="row">
											<div class="col-12">

												<form method="post" action="#">
                                                  <label id="add" for="add">
                                                  <h2>Add A New Past Event</h2>
                                                  </label>
                                                  <input type="text" name="event_name" id="event_name" placeholder="Event Name Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                  <input type="text" name="event_time" id="event_time" placeholder="Event Time Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                    <input type="text" name="attend_num" id="attend_num" placeholder="Attendant Number Here"/>
                                                    <div> &nbsp  &nbsp</div>
                                                  <input type="text" name="host_name" id="host_name" placeholder="Host Name Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                  <input type="text" name="event_location" id="event_location" placeholder="Event Location Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                  <input type="text" name="difficulty" id="difficulty" placeholder="Difficulty Level Here"/>
                                                   <div> &nbsp  &nbsp</div>
                                                   <input type="text" name="event_theme" id="event_theme" placeholder="Event Theme Here"/>
                                                                                                      <div> &nbsp  &nbsp</div>

                                                  <div> &nbsp  &nbsp</div>
                                                  <div class="row">
                                                    <div class="col-5"></div>
                                                    <div class="col-2">
                                                        <input type="submit" name="submit" id="submit" value="Add">
                                                    </div>
                                                    <div class="col-5"></div>
                                                 </div>

                                                </form>


                                                <form method="post" action="#">
                                                  <label id="remove" for="remove">
                                                  <h2>Delete An Old Past Event By Event Name</h2>
                                                  </label>
                                                  <input type="text" name="event_name" id="event_name" placeholder="Event Name Here"/>
                                                   <div> &nbsp  &nbsp</div>


                                                  <div> &nbsp  &nbsp</div>
                                                  <div class="row">
                                                    <div class="col-5"></div>
                                                    <div class="col-2">
                                                        <input type="submit" name="submit2" id="submit2" value="Delete">
                                                    </div>
                                                    <div class="col-5"></div>
                                                 </div>

                                                <div> &nbsp  &nbsp</div>
                                                  <div class="row">
                                                    <div class="col-5"></div>
                                                    <div class="col-2">
                                                        <input type="submit" name="submit3" id="submit3" value="Show All Past Events">
                                                    </div>
                                                    <div class="col-5"></div>
                                                 </div>

                                                </form>





                                               <?php
                                                if (isset($_POST['submit3'])) {
                                                  if ($result1 && $prepared_stmt1->rowCount() > 0) { ?>

                                                    <h2>All Past Events</h2>

                                                    <table>
                                                      <thead>
                                                		<tr>

                                                          <th>Event Name</th>
                                                          <th>Event Time</th>
                                                          <th>Attendant Number</th>
                                                          <th>Host</th>
                                                          <th>Event Location</th>
                                                          <th>Difficulty Level</th>
                                                          <th>Event Theme</th>
                                                		</tr>
                                                      </thead>
                                                      <tbody>

                                                <?php foreach ($result1 as $row1) { ?>

                                                      <tr>

                                                        <td><?php echo $row1["event_name"]; ?></td>
                                                        <td><?php echo $row1["event_time"]; ?></td>
                                                        <td><?php echo $row1["attend_num"]; ?></td>
                                                        <td><?php echo $row1["host_name"]; ?></td>
                                                        <td><?php echo $row1["event_location"]; ?></td>
                                                        <td><?php echo $row1["difficulty"]; ?></td>
                                                        <td><?php echo $row1["event_theme"]; ?></td>

                                                      </tr>
                                                <?php } ?>
                                                      </tbody>
                                                  </table>

                                                <?php } else { ?>
                                                    Sorry, no past events are available.
                                                  <?php }
                                                  }?>


											</div>
											</div>
										</div>
									</div>
									<div class = "col-1"></div>
								</div>



							</div>


						<!-- Table of Past Events -->

				<!-- Contact -->


				<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<ul class="icons">
							<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Untitled</li><li>Design:Sunnie, Chang, Amanda</a></li>
						</ul>
					</div>
				</footer>

			</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>