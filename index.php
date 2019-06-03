<?php
require( 'pageQueries.php' );
require( 'database.php' );
session_start();
$queries = new pageQueries;

if ( isset( $_POST[ 'user_id' ] )and isset( $_POST[ 'user_pass' ] ) ) {

	// Assigning POST values to variables.
	$username = $_POST[ 'user_id' ];
	$password = $_POST[ 'user_pass' ];
	$authorized = $queries->checkAuthorization( $username, $password );
	$userCount = sizeof( $authorized );
	if ( $userCount == 1 ) { //if the record exists in the table

		$_SESSION[ "user" ] = "1";
		?>
		<meta http-equiv="refresh" content="0;URL=layout.php"/>
		<?php
		} else { //otherwise
			?>
		<meta http-equiv="refresh" content="0;URL=index.php"/>
		<?php
		}
		}
		?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<title>Automotive LOGIN FORM</title>
			<link rel="stylesheet" type="text/css" href="style.css">
		</head>

		<body>
			<div align="center">

				<h3>Automotive LOGIN FORM</h3>
				<form id="login-form" method="post" action="index.php">
					<table border="0.5">
						<tr>
							<td><label for="user_id">User Name</label>
							</td>
							<td><input type="text" name="user_id" id="user_id">
							</td>
						</tr>
						<tr>
							<td><label for="user_pass">Password</label>
							</td>
							<td><input type="password" name="user_pass" id="user_pass"></input>
							</td>
						</tr>

						<tr>

							<td><input type="submit" value="Submit"/>
								<td><input type="reset" value="Reset"/>

						</tr>
					</table>
				</form>
			</div>
		</body>

		</html>