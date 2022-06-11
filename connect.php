<?php 
				//hosting
                $host = 'localhost';
                //nama db
				$db   = 'test';
                //nama user
				$user = 'root';
                //password if any
				$pass = '';
                
				//$charset = 'utf8mb4';
		
				$dsn = "mysql:host=$host;dbname=$db";
				$options = [
					PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES   => false,
				];
				try {
					$pdo = new PDO($dsn, $user, $pass, $options);
					 //echo"<script>alert('pdo created!');</script>";
					// echo"<script>console.log('PDO created!');</script>";
				} catch (\PDOException $e) {
					throw new \PDOException($e->getMessage(), (int)$e->getCode());
					echo"<script>alert('error: ".$e->getMessage()."');</script>";
					echo"<script>console.log('Error Creating PDO!');</script>";
				}
?>