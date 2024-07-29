<?php
require_once 'dbtable.php';
$vehicleregistration= $error= $make= $model= $fueltype= $tankcapacity= $previousowner= $designatedbranch= $department= $driver= $repairs="";

if (isset($_POST['vehiclenumber'])) $vehicleregistration = cleanTheData($_POST['vehiclenumber']);
if (isset($_POST['make'])) $make = cleanTheData($_POST['make']);
if (isset($_POST['model'])) $model = cleanTheData($_POST['model']);
if (isset($_POST['fueltype'])) $fueltype = cleanTheData($_POST['fueltype']);
if (isset($_POST['tankcapacity'])) $tankcapacity = cleanTheData($_POST['tankcapacity']);
if (isset($_POST['previousowner'])) $previousowner = cleanTheData($_POST['previousowner']);
if (isset($_POST['designatedbranch'])) $designatedbranch = cleanTheData($_POST['designatedbranch']);
if (isset($_POST['department'])) $department = cleanTheData($_POST['department']);
if (isset($_POST['driver'])) $driver = cleanTheData($_POST['driver']);
if (isset($_POST['repairs'])) $repairs =cleanTheData($_POST['repairs']);

if (isset($_POST['vehiclenumber'])){   
if ($vehicleregistration == "" || $make=="" || $model=="" || $fueltype== "" || $tankcapacity=="" || $previousowner=="" || $designatedbranch=="" || $department=="" || $driver =="" || $repairs=="")
{
    $error = 'Not all fields were entered, Please make sure all fields are filled in.';
}else
{
$query = "INSERT INTO vehicle(
    vehicle_registration_number, make, model, fuel_type, tank_capacity, previous_owner,designated_branch,department,driver, repairs)
VALUES (?,?,?,?,?,?,?,?,?,? )";

 $stmt = $pdo->prepare($query);
 if(!$stmt) {
 echo 'Error: '.$pdo->error;
 }

$stmt->execute([$vehicleregistration, $make, $model, $fueltype, $tankcapacity, $previousowner,$designatedbranch,$department,$driver,$repairs]);
echo '<script>alert("Successfully Submitted")</script>';
}
}


echo <<<_END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>VEHICLE REGISTRATION</title>
    </head>
<body>
    <h1>Register A Vehicle Below.</h1>
    <table class="styled-table" >
       <form method="POST" class="signup"  onsubmit="return validate(this)">
       <div> <label></label><span class="error" style="color: red" >$error</span></div>
     <tr><td>Vehicle Registration Number:</td> <td> <input type="text" name="vehiclenumber"> <br/></td></tr>
     <tr><td>Make                      :</td> <td> <select type="text" name="make" style="background-color: white;padding: 4px 20px;">
     <option>BMW</option>
     <option>MERCEDES</option>
     <option>TOYOTA</option>
     <option>FORD</option>
     <option>VOLKSWAGEN</option>
     </select><br/></td></tr>
     <tr><td> Model                     :</td> <td> <input type="text" name="model"> <br/></td></tr>
     <tr><td>Fuel Type                 :</td> <td> <input type="text" name="fueltype"> <br/></td></tr>
     <tr><td> Tank Capacity             :</td> <td> <input type="text" name="tankcapacity"> <br/></td></tr>
     <tr><td> Previous Owner            :</td> <td> <input type="text" name="previousowner"> <br/></td></tr>
     <tr><td> Designated Branch         :</td> <td> <input type="text" name="designatedbranch"> <br/></td></tr>
     <tr><td>  Department                :</td> <td> <input type="text" name="department"> <br/></td></tr>
     <tr><td> Driver                    :</td> <td> <input type="text" name="driver"> <br/></td></tr>
     <tr><td> Repairs                    :</td> <td> <input type="text" name="repairs"> <br/></td></tr>
        <tr><td><button class="button" type="submit" style="background-color:gray">SUBMIT</button><br</td></tr>
        <tr><td><a href="dashboardhom.html">Return Back</a><br</td></tr>
        </form>
    </table>
</body>

_END;

?>