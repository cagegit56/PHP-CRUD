<?php
require_once 'functions.php';

try
{
$pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e)
{
throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$query = "SELECT vehicle_registration_number,make,model,fuel_type,tank_capacity FROM vehicle WHERE fuel_type='diesel' ";

 $stmt = $pdo->prepare($query);
if(!$stmt) {
echo 'Error: '.$conn->error;
}

$stmt->execute();

echo "<table border='2' cellpadding='3' cellspacing='6' bgcolor='#eeeeee' ><tr>  <th>VEHICLE REGISTRATION NUMBER</th> <th>MAKE</th> <th>MODEL</th> <th>FUEL TYPE</th> <th>TANK CAPACITY</th>  </tr>";

while ($row = $stmt->fetch(PDO::FETCH_NUM))
{
    echo "<tr>";
  for ($k = 0 ; $k < 5 ; ++$k)
    echo "<td>" . htmlspecialchars($row[$k]) . "</td>";
    echo "</tr>";
}

echo "</table>";
echo '<a href="dashboardhom.html">Return Back</a>';


?>