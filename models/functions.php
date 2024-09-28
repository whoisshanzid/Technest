<?php
function getConnection(){
    $isValid = false;
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    return $conn;
}
function matchCredential($username, $password)
{
    $isValid = false;
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    } else {
        echo "Connected with the database";
    }


    $query = "SELECT *FROM userinfo WHERE email = '$username' AND password = '$password';";

    $result = $conn->query("$query");

    $userInfo = $result->fetch_assoc();

    if ($result->num_rows === 1) {
        $_SESSION['userId'] = $userInfo['id'];
        $_SESSION['loggedInTime'] = time();
        $isValid = true;
    }
    return $isValid;
}
function salesInserted($fname, $cnum, $gender, $email, $password)
{

    $isValid = false;
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    } else {
        echo "Connected with the database";
    }

    $query = "SELECT *FROM userinfo WHERE email = '$email';";
    $result = $conn->query("$query");
    if ($result->num_rows === 1) {
        return false;
    } else {
        $query = "INSERT INTO `userinfo` (`name`, `email`, `password`, `gender`, `contact_number`,`role`)
            VALUES ('$fname', '$email', '$password', '$gender', '$cnum','sales');";
        $result = $conn->query("$query");
        return true;
    }



}
function isInserted($fname, $cnum, $gender, $email, $password)
{

    $isValid = false;
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    } else {
        echo "Connected with the database";
    }

    $query = "SELECT *FROM userinfo WHERE email = '$email';";
    $result = $conn->query("$query");
    if ($result->num_rows === 1) {
        return false;
    } else {
        $query = "INSERT INTO `userinfo` (`name`, `email`, `password`, `gender`, `contact_number`,`role`)
            VALUES ('$fname', '$email', '$password', '$gender', '$cnum','manager');";
        $result = $conn->query("$query");
        return true;
    }



}
function getUser($email)
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";
    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }
    $query = "SELECT *FROM userinfo WHERE email = '$email';";

    $result = $conn->query("$query");

    $userInfo = $result->fetch_assoc();
    return $userInfo;
}
function updateDatabase($newPassword, $name, $contact_number, $gender, $email)
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare an SQL statement for execution
    $query = "UPDATE userinfo 
                  SET password = ?, name = ?, contact_number = ?, gender = ? 
                  WHERE email = ?";

    if ($stmt = $conn->prepare($query)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssss", $newPassword, $name, $contact_number, $gender, $email);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
function emailExsist($email1)
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }

    $query = "SELECT *FROM userinfo WHERE email = '$email1';";
    $result = $conn->query("$query");
    if ($result->num_rows === 1) {
        return true;
    }
    return false;
}
function oldPassMatch($oldpass, $email)
{

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";




    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }

    $query = "SELECT *FROM userinfo WHERE password = '$oldpass' AND email = '$email';";
    $result = $conn->query("$query");
    if ($result->num_rows === 1) {
        return true;
    }
    return false;
}
function getSalesmen()
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";




    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }
    $sql = "SELECT * FROM userinfo WHERE role = 'sales'";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function removeSalesman($salesmanId)
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";




    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }
    $sql = "DELETE FROM userinfo WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $salesmanId);
    return $stmt->execute();
}

function getAllProducts()
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";




    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function searchProducts($searchTerm)
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";




    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }
    $searchTerm = '%' . $conn->real_escape_string($searchTerm) . '%';
    $sql = "SELECT * FROM products WHERE name LIKE ?"; // Search by product name
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addItem($salesmanId, $productName, $productPrice)
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";




    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }
    $sql = "INSERT INTO added_items (salesman_id, product_name, product_price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isd", $salesmanId, $productName, $productPrice);
    return $stmt->execute();
}



function getSalesHistory()
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "labtask";




    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }
    $sql = "SELECT u.name AS salesman_name, ai.product_name, ai.product_price, ai.added_at 
            FROM added_items ai
            JOIN userinfo u ON ai.salesman_id = u.id
            ORDER BY ai.added_at DESC";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}


?>