<html>
<head>
<title>logged</title>
</head>
<body>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "adirocks!?";
$dbname = "sabs";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$email = $_SESSION['email'];
$pass = $_SESSION['pass'];
$password = md5($pass);
$sql = "select person.* from personLogin , person where person.personID = personLogin.personID and personLogin.email = '$email' and personLogin.password = '$password';";
$result = $conn->query($sql);

$array = array();

if ($result->num_rows === 1) {
    // output data of each row
   while($row = $result->fetch_assoc()) {
        echo "Welcome " . $row["firstName"]. "<br>";
    }
} 
else {
    echo "0 results";
}

?>


<p>Logged in</p>
</body>
</html>