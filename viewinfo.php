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

$query = "SELECT * FROM vehicle";
$result = $pdo ->query($query);

echo "<table border='2' cellpadding='3' cellspacing='6' bgcolor='#eeeeee' ><tr> <th>ID</th> <th>VEHICLE REGISTRATION NUMBER</th> <th>MAKE</th> <th>MODEL</th> <th>FUEL TYPE</th> <th>TANK CAPACITY</th> <th>PREVIOUS OWNER</th> <th>DESIGNATED BRANCH</th> <th>DEPARTMENT</th> <th>DRIVER</th> <th>REPAIRS</th> </tr>";


while ($row = $result->fetch(PDO::FETCH_NUM))
{
    echo "<tr>";
  for ($k = 0 ; $k < 11 ; ++$k)
    echo "<td>" . htmlspecialchars($row[$k]) . "</td>";
    echo "</tr>";
}

echo "</table>";
echo '<a href="dashboardhom.html">Return Back</a>';

?>