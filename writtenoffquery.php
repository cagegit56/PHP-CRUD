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

$query = "SELECT vehicle_registration_number,make,model FROM vehicle WHERE repairs='write off' ";
$result = $pdo ->query($query);

echo "<table border='2' cellpadding='3' cellspacing='6' bgcolor='#eeeeee' ><tr>  <th>VEHICLE REGISTRATION NUMBER</th> <th>MAKE</th> <th>MODEL</th>  </tr>";


while ($row = $result->fetch(PDO::FETCH_NUM))
{
    echo "<tr>";
  for ($k = 0 ; $k < 3 ; ++$k)
    echo "<td>" . htmlspecialchars($row[$k]) . "</td>";
    echo "</tr>";
}

echo "</table>";
echo '<a href="dashboardhom.html">Return Back</a>';

?>