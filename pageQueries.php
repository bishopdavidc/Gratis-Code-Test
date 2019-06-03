<?php


class pageQueries {
	//Database connection information
	public function __construct() {
		$db_obj = new DATABASE_CONFIG();
		define( 'DB_HOST', $db_obj->default [ 'host' ] );
		define( 'DB_CRM', $db_obj->default [ 'database' ] );
		define( 'DB_USER', $db_obj->default [ 'login' ] );
		define( 'DB_PASS', $db_obj->default [ 'password' ] );
		$this->objDb = $this->getDbConnection( DB_HOST, DB_CRM, DB_USER, DB_PASS ); 
	}
	public function getDbConnection( $host, $db, $user, $pass ) {
		$conn = new mysqli( $host, $user, $pass, $db );
		$conn->set_charset( 'utf8' );
		if ( $conn->connect_errno ) {
			return $conn->connect_errno;
		}
		return $conn;
	}
//function to check and make sure user is authorized
		function checkAuthorization($username,$password) {
$query = "SELECT * FROM `user_accounts` WHERE username='$username' and Password='$password'";
			$stmt = $this->objDb->query( $query );
		$resultArray = array();
		if ( $stmt->num_rows > 0 ) {
			while ( $stmtResult = $stmt->fetch_array( MYSQLI_ASSOC ) ) {
				$resultArray[] = $stmtResult;
			}
			return $resultArray;
		}
		}
		/**
		 * gets all the car listed in the database
		 */
	function getCarsList() {
		$query = "SELECT * FROM `cars`";
		$stmt = $this->objDb->query( $query );
		$resultArray = array();
		if ( $stmt->num_rows > 0 ) {
			while ( $stmtResult = $stmt->fetch_array( MYSQLI_ASSOC ) ) {
				$resultArray[] = $stmtResult;
			}
			return $resultArray;
		}
	}
/**
 * gets all the details for the car in the database that match the id
 */
	function getCarDetails( $id ) {
		$carQuery = "SELECT * FROM `cars` WHERE id='" . $id . "'";
		$stmt = $this->objDb->query( $carQuery );
		$resultArray = array();
		if ( $stmt->num_rows > 0 ) {
			while ( $stmtResult = $stmt->fetch_array( MYSQLI_ASSOC ) ) {
				$resultArray[] = $stmtResult;
			}
			return $resultArray;
		}
	}
/**
 * gets all the options for the car in the database that match the id
 */
	function getCarOptions( $id ) {
		$optionQuery = "SELECT * FROM `options` WHERE car_id='" . $id . "'";
		$stmt = $this->objDb->query( $optionQuery );
		$resultArray = array();
		if ( $stmt->num_rows > 0 ) {
			while ( $stmtResult = $stmt->fetch_array( MYSQLI_ASSOC ) ) {
				$resultArray[] = $stmtResult;
			}
			return $resultArray;
		}
	}
/**
 * gets all the incentives for the car in the database that match the id
 */
	function getCarIncentives( $id ) {
		$incentiveQuery = "SELECT * FROM `incentives` WHERE car_id='" . $id . "'";
		$stmt = $this->objDb->query( $incentiveQuery );
		$resultArray = array();
		if ( $stmt->num_rows > 0 ) {
			while ( $stmtResult = $stmt->fetch_array( MYSQLI_ASSOC ) ) {
				$resultArray[] = $stmtResult;
			}
			return $resultArray;
		}
	}
/**
 * Gets all the images for the car in the database that match the id
 */
	function getCarImages( $id ) {
		$carImageQuery = "SELECT * FROM `car_images` where car_id='" . $id . "'";
		$stmt = $this->objDb->query( $carImageQuery );
		$resultArray = array();
		if ( $stmt->num_rows > 0 ) {
			while ( $stmtResult = $stmt->fetch_array( MYSQLI_ASSOC ) ) {
				$resultArray[] = $stmtResult;
			}
			return $resultArray;
		}
	}
	
}