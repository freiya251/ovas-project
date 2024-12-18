<?php
require_once 'classes/Location.php';
require_once 'classes/LocationTableGateway.php';
require_once 'classes/Connection.php';

$id = $_POST['id'];
$locationName = $_POST['Name'];
$locationAddress = $_POST['Address'];
$managerFName = $_POST['FirstName'];
$managerLName = $_POST['LastName'];
$managerEmail = $_POST['Email'];
$managerNumber = $_POST['Number'];
$locationMaxCap = $_POST['MaxCapacity'];

$location = new Location($id, $locationName, $locationAddress, $FirstName, $LastName,  $Email, $Number, $locationMaxCap);

$connection = Connection::getInstance();

$gateway = new LocationTableGateway($connection);

$id = $gateway->update($location);

header('Location: viewLocations.php');
