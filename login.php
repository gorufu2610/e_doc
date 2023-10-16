<?php

include('connect.php');

// ตรวจสอบว่าผู้ใช้กด "เข้าสู่ระบบ" หรือยัง
if (isset($_POST['login'])) {
    // รับค่าชื่อผู้ใช้และรหัสผ่านจากแบบฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    // ตรวจสอบชื่อผู้ใช้, รหัสผ่าน และสถานะในฐานข้อมูล
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND status = '$status'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        // หากพบชื่อผู้ใช้, รหัสผ่าน, และสถานะตรงกับข้อมูลในฐานข้อมูล
        // กำหนด session เพื่อบอกว่าผู้ใช้ล็อกอินอยู่
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // ตรวจสอบสถานะและเปิดหน้าแผนกที่ถูกต้อง
        if ($status == 'it') {
            // ผู้ใช้มีสถานะเป็นแผนกไอที
            header('Location: it/index.php');
            exit;
        } elseif ($status == 'acc') {
            // ผู้ใช้มีสถานะเป็นแผนกบัญชี
            header('Location: acc/index.php');
            exit;
        } elseif ($status == 'mk') {
            // ผู้ใช้มีสถานะเป็นแผนกการตลาด
            header('Location: mk/index.php');
            exit;
        } else {
            // สถานะไม่ถูกต้อง
            echo "ไม่มีสิทธิ์ในการเข้าถึงแผนกนี้";
        }
    } else {
        // หากไม่พบชื่อผู้ใช้, รหัสผ่าน, หรือสถานะตรงกับข้อมูลในฐานข้อมูล
        echo "ชื่อผู้ใช้, รหัสผ่าน หรือสถานะไม่ถูกต้อง";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... โค้ดอื่น ๆ ... -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <style>
        /* CSS สำหรับหน้าล็อกอิน */
        body {
            background-color: #f8f9fa;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.form-control {
    border: 1px solid #ccc;
}

.container {
    max-width: 400px;
    margin: 0 auto;
}
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4">เข้าสู่ระบบ</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="username">ชื่อผู้ใช้:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">รหัสผ่าน:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
    <label for="status">สถานะ:</label>
    <select class="form-control" id="status" name="status" required>
        <option value="">------------</option>
        <option value="it">แผนกไอที</option>
        <option value="acc">แผนกบัญชี</option>
        <option value="mk">แผนกการตลาด</option>
    </select>
</div>

        <button type="submit" name="login" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
    </form>
</div>

    
</body>
</html>
