

<?php

    if (isset($_POST['submit'])) {
        require_once("conn.php");
        $query = "SELECT * FROM user_comment " ;
        try{
            $prepared_stmt = $dbo->prepare($query);
            $prepared_stmt->execute();
            $result = $prepared_stmt->fetchAll();
        }catch (PDOException $ex){ // Error in database processing.
            echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
        }
}
?>




<html>
	<head>
		<title>Past Events</title>
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
						<li><a href="http://localhost/maker-site-backend/past_event.php">Past Events</a></li>
						<li><a href="http://localhost/maker-site-backend/future_event.php">Future Events</a></li>
						<li><a href="http://localhost/maker-site-backend/tutorial.php">Tutorials</a></li>
					</ul>

				</nav>

				<!-- Main -->
					<div id="main" class="alt">






						<!-- Search Engine -->

							<div class="container-fluid">

								<div class="row">
									<div class="col-1"></div>
									<div class="col-10">

										<div class="form-group">
											<div class="row">
											<div class="col-12">

												<form method="post">


                                                  <div class="row">
                                                    <div class="col-5"></div>
                                                    <div class="col-2">
                                                        <input type="submit" name="submit" id="submit" value="View All Messages">
                                                    </div>
                                                    <div class="col-5"></div>
                                                 </div>

                                                </form>




                                                <?php
                                                if (isset($_POST['submit'])) {
                                                  if ($result && $prepared_stmt->rowCount() > 0) { ?>

                                                    <h2>Results</h2>

                                                    <table>
                                                      <thead>
                                                		<tr>
                                                          <th>Name</th>
                                                          <th>Email</th>
                                                          <th>Message</th>
                                                		</tr>
                                                      </thead>
                                                      <tbody>

                                                <?php foreach ($result as $row) { ?>

                                                      <tr>
                                                        <td><?php echo $row["comment_name"]; ?></td>
                                                        <td><?php echo $row["comment_email"]; ?></td>
                                                        <td><?php echo $row["comment_message"]; ?></td>

                                                      </tr>
                                                <?php } ?>
                                                      </tbody>
                                                  </table>

                                                <?php } else { ?>
                                                    <p id="error message"> Sorry, no past events are found hosted by <?php echo $_POST['host_name']; ?>.</p>
                                                  <?php }
                                                } ?>

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