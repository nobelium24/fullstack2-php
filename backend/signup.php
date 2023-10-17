<?php
require("./testCORS.php");
require("./connection.php");
testCORS();
$data = json_decode(file_get_contents("php://input"), true);
print_r($data);
$firstName = $data["firstName"];
$lastName = $data["lastName"];
$email = $data["email"];
$password = password_hash($data["password"], PASSWORD_DEFAULT);

// $email = "testRam@gmail.com";
// $firstName = "test";
// $lastName = "Ram";
// $password = password_hash("fish", PASSWORD_DEFAULT);

try {
    $checkEmail = $connect->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();
    $fetched = $result->fetch_all(MYSQLI_ASSOC);
    print_r($fetched);
    if (count($fetched) > 0) {
        http_response_code(400);
        echo (json_encode(["message" => "Email already in use", "status" => false]));
        exit;
    }
    $query = $connect->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES(?, ?, ?, ?)");
    $query->bind_param("ssss", $firstName, $lastName, $email, $password);
    $insert = $query->execute();
    if (!$insert) {
        http_response_code(500);
        echo (json_encode(["message" => "Account creation failed", "status" => false]));
        exit;
    }
    http_response_code(201);
    echo (json_encode(["message" => "Account created successfully", "status" => true]));

} catch (\Throwable $error) {
    print_r($error);
    http_response_code(500);
    echo json_encode(array("message" => "Internal server error"));
}

?>