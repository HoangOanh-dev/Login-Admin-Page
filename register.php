<?php
$servername = "localhost";
$username = "root";  // user MySQL
$password = "";      // mật khẩu MySQL
$dbname = "login_system";

// Kết nối database
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$pass = $_POST['password'];
$role = $_POST['role'];

// Mã hóa mật khẩu
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Kiểm tra email đã tồn tại chưa
$sql_check = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Email đã tồn tại!";
} else {
    $sql = "INSERT INTO users (fullname, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $email, $hashed_pass, $role);

    if ($stmt->execute()) {
        echo "Đăng ký thành công! <a href='login.php'>Đăng nhập</a>";
    } else {
        echo "Lỗi: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>
