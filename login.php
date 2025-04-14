<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"));
$username = $data->username;
$password = $data->password;

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$response = [];
if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $response['status'] = 'success';
        $response['user'] = $user;
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Incorrect password';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'User not found';
}
echo json_encode($response);
?>
