<?php
require( 'pageQueries.php' );
require( 'database.php' );
require( 'navbar.php' );
require( 'sidebar.php' );
require( 'allowAccess.php' );
$allow = new allowAccess;
$queries = new pageQueries;
$allow->checkLogin();
$cars = $queries->getCarsList();
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Car Listings</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div id="wrapper">
		<div id="page-content-wrapper">
			<div class="page-content">
				<div class="container-fluid">
					<div class="row">
						<?php for($i = 0; $i<=3;$i++){?>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 layoutBackground">
							<div class="container-fluid">
								<div class="row">
									<a href="display_page.php?id=<?php echo $cars[$i]['id'];?>" title=""><img class="img-responsive" src=<?php echo $cars[$i]['image']; ?> width="200px" height="200px"></a>
									<div class="priceDisplay">
										<?php echo $cars[$i]['MSRP'];?>
									</div>
								</div>
								<div class="row carInfo"> <!-- Display the vehicle info for each vehicle -->
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<p>
											<?php echo $cars[$i]['Title'];?>
										</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>Condition</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>
											<?php echo $cars[$i]['Condition'];?>
										</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>MSRP</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>
											<?php echo $cars[$i]['MSRP'];?>
										</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>Savings</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>
											<?php echo $cars[$i]['Savings'];?>
										</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>As Low As</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>
											<?php echo $cars[$i]['Low_As'];?>
										</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>Stock</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>
											<?php echo $cars[$i]['Stock'];?>
										</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>Mileage</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<p>
											<?php echo $cars[$i]['Mileage'];?>
										</p>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>