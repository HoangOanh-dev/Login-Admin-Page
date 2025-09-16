<?php
session_start();

$servername = "localhost";
$username = "root";  // user MySQL
$password = "";      // mật khẩu MySQL
$dbname = "login_system";

// Kết nối database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$email = $_POST['email'];
$pass = $_POST['password'];

// Kiểm tra email trong DB
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Kiểm tra mật khẩu
    if (password_verify($pass, $row['password'])) {
        // Lưu session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['role'] = $row['role'];

        echo "Đăng nhập thành công! Xin chào " . $row['fullname'];
        // Hoặc chuyển hướng đến trang dashboard
        // header("Location: dashboard.php");
        exit();
    } else {
        echo "Sai mật khẩu!";
    }
} else {
    echo "Email không tồn tại!";
}

$stmt->close();
$conn->close();
?>
