<?php
require( 'pageQueries.php' );
require( 'database.php' );
require( 'navbar.php' );
require( 'allowAccess.php' );
$allow = new allowAccess;
$queries = new pageQueries;
$allow->checkLogin(); //make sure user has logged in
$id = intval( $_GET[ 'id' ] ); //get the value for the car that was selected

//run queries to gather all the necessary info about the vehicle selected
$car = $queries->getCarDetails( $id );
$options = $queries->getCarOptions( $id );
$incentives = $queries->getCarIncentives( $id );
$images = $queries->getCarImages( $id );
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>
		<?php echo $car[0]['Title'];?>
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>



<body>
	<h1 id="car-detail-title">
		<?php echo $car[0]['Title'];?>
	</h1>

	<div id="wrapper-detail">
		<a href="layout.php" style="">Back to Listing</a>
		<div id="page-content-wrapper-display">
			<div class="page-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<div class="container-fluid">
								<!-- Code for the carousel -->
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
									<!-- Indicators -->
									<?php $imageCount = sizeof($images);?>
									<ol class="carousel-indicators">
										<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
										<?php	for($x = 1; $x<$imageCount;$x++){?>
										<li data-target="#myCarousel" data-slide-to=<?php echo $x;?> ></li>
										<?php } ?>
									</ol>
									<!-- Wrapper for slides -->
									<div class="carousel-inner">
										<div class="item active">
											<img src=<?php echo $images[0][ 'car_image']; ?> style="width:100%;">
										</div>
										<?php
										for ( $i = 1; $i < $imageCount; $i++ ) {
											?>
										<div class="item">
											<img src=<?php echo $images[$i][ 'car_image']; ?> style="width:100%;">
										</div>
										<?php } ?>
									</div>
									<!-- Left and right controls -->
									<a class="left carousel-control" href="#myCarousel" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								  </a>
								
									<a class="right carousel-control" href="#myCarousel" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								  </a>
								
								</div>
							</div>
						</div>
					</div>
					<!-- list the incentives for purchase -->
					<?php 
									$incentiveCount = sizeof($incentives);
									if($incentiveCount > 1){ //if there are any incentives for purchasing the car, list them here otherwise don't show the box
										?>
					<div class="row">
						<h2>Incentives</h2>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 detailsBox">
							<div class="container-fluid">
								<table class="display">
									<tr>
										<th>Incentive</th>
										<th>Value</th>
									</tr>
									<?php for($i = 0; $i<$incentiveCount;$i++){?>
									<tr>
										<td>
											<p class="details">
												<?php echo $incentives[$i]['incentive'];?>
											</p>
										</td>
										<td>
											<p class="details">
												<?php echo $incentives[$i]['cost'];?>
											</p>
										</td>
									</tr>
									<?php }?>
								</table> <!-- end of table -->
							</div> <!-- end of fluid container -->
						</div>
					</div> <!-- end of row -->
					<?php } ?>
					<!-- list the options available for purchase -->
					<div class="row" style="margin-top: 20px">
						<h2>Options</h2>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 detailsBox">
							<div class="container-fluid">
								<table class="display">
									<?php 
									$optionsCount = sizeof($options);
									for($i = 0; $i<$optionsCount;$i++){?>
									<tr>
										<td>
											<p class="details">
												<?php echo $options[$i]['option'];?>
											</p>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- end of table -->
							</div> <!-- end of fluid container -->
						</div>
					</div> <!-- end of row -->
				</div> <!-- end of fluid container -->
			</div>
		</div>
	</div> <!-- end of wrapper -->
</body>

</html>