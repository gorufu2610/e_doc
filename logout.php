<?php
session_start();
// ทำลายเซสชัน
session_destroy();

// ส่งผู้ใช้ออกจากระบบไปยังหน้าล็อกอิน
header('Location: login.php');
exit;
?>