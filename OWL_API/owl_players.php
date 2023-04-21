<?php
require 'database.php';


$conn = getDB();

$result = $conn->query("SELECT id, name, fullName, number, role, competitions, currentTeam FROM owl_summary");
$players = array();



$conn->close();
?>

<!DOCTYPE html>
<html>

	<head>
		<style>
			*{ font-family: Helvetica;}
			.header{
				color: darkorange;
				text-align: center;
				font-size: 40px;
				position: relative;
				left: 50px;
			}
			table, td, th{
				border: 1px solid black;
				font-weight: bold;
				color: black;
			}
			th{
				color: black;
			}
			table{
				position: relative;
				left: 50px;
			}
			}
			#wallpaper{
				position: absolute;
				left: 600px;
				top: 75px;
			}
			#table-wrap{
				position: relative;
				
			}
			#table-scroll{
				position: relative;
				height:510px;
				overflow:auto;
				right: 0;
			}
			#table-scroll, table {
				
			}
			#table-wrap, table, th, td{
				
			}
			
		</style>
		<title>Capstone Stage 3</title>
	</head>
	
	<body>
		<h1 class = "header">OWL Player Info</h1>
		<br></br>
		<a id="home" href="../index.php">Return to home</a>
		<img id="wallpaper" src="OWL.png" alt="OWL Logo" style="width:722.5px;height:540px;">
		<div id="table-wrap">
			<div id="table-scroll">
		<table>
			<tr>
				<th>Player ID</th>
				<th>Player Name</th>
				<th>Full Name</th>
				<th>Number</th>
				<th>Role</th>
				<th>Competitions</th>
				<th>Current Team</th>
			</tr>
			<?php
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<td><?php echo $rows['id'];?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['fullName'];?></td>
				<td><?php echo $rows['number'];?></td>
				<td><?php echo $rows['role'];?></td>
				<td><?php echo $rows['competitions'];?></td>
				<td><?php echo $rows['currentTeam'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>