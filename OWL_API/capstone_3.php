<?php

require 'database.php';
require 'auth.php';


$url = "https://us.api.blizzard.com/owl/v1/owl2?access_token=USmWZNNLxS8RnI8nJvG7m33HM0l77iyE84";
$conn = getDB();

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $access_token,
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);
$data = json_decode($response, true);
 foreach ($data['players'] as $player) {
      $name = $player['name'];
      $competitions = implode(', ', $player['competitions']);
      $teamId = $player['currentTeam'];
	  $id = $player['id'];
	  $fullName = $player['givenName'] . " " . $player['familyName'];
	  $currentTeam = $player['currentTeam'];
	  $role = $player['role'];
	  $number = $player['number'];

      echo 'ID: ' . $id . '<br>';
	  echo 'Name: ' . $name . '<br>';
	  echo 'Full Name: ' . $fullName . '<br>';
	  echo 'Number: ' . $number . '<br>';
	  echo 'Role: ' . $role . '<br>';
	  echo 'Competitions: ' . $competitions . '<br>';
	  echo 'Current Team: ' . $currentTeam . '<br>';
	  echo '<br>';
	  
	$stmt = $conn->prepare("INSERT INTO owl_summary (id, name, fullName, number, role,
						competitions, currentTeam) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $id, $name, $fullName, $number, $role, $competitions, $currentTeam);
$stmt->execute();
    }

?>
