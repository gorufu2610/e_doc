<?php
require_once('connect_send.php');

if (isset($_REQUEST['update_id'])) {
    try {
        $id = $_REQUEST['update_id'];               //เปลี่ยนของแผนกอื่นตรงนี้
        $select_stmt = $db->prepare('SELECT * FROM acc_doc WHERE id = :id');
        $select_stmt->bindParam(":id", $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $title = $row['title'];
        $detail = $row['detail'];
        $img = $row['img'];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_REQUEST['btn_send'])) {
    try {
        $title = $_REQUEST['txt_title'];
        $detail = $_REQUEST['txt_detail'];
        $image_file = $_FILES['txt_file']['name'];
        $type = $_FILES['txt_file']['type'];
        $size = $_FILES['txt_file']['size'];
        $temp = $_FILES['txt_file']['tmp_name'];
        $department = $_REQUEST['txt_department']; // รับแผนกที่เลือกจากฟอร์ม
        
        if ($department === 'revice_it') {
            $path = 'it/revice/' . $image_file;    
        } elseif ($department === 'revice_mk') {
            $path = 'mk/revice/' . $image_file;
        } else {
            // แผนกไม่ถูกต้อง
            $errorMsg = 'แผนกที่เลือกไม่ถูกต้อง';
            // ไม่ส่งไฟล์ หรือตั้งค่า path เพื่อให้มีค่าเริ่มต้น
            $path = '';  // หรือเป็นค่าที่คุณต้องการ
        }

        if ($image_file) {
            if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png") {
                if (!file_exists($path)) {
                    if ($size < 5000000) {
                        move_uploaded_file($temp, $path);
                    } else {
                        $errorMsg = "ไฟล์ของคุณใหญ่เกินไป โปรดอัปโหลดไฟล์ขนาดสูงสุด 5MB";
                    }
                } else {
                    $errorMsg = "ไฟล์นี้มีอยู่แล้ว... ตรวจสอบโฟลเดอร์การอัปโหลด";
                }
            } else {
                $errorMsg = "อัปโหลดได้เฉพาะรูปแบบ JPG, JPEG และ PNG เท่านั้น...";
            }
        } else {
            $image_file = $row['img'];
        }

        if (!isset($errorMsg)) {
            // แทรกข้อมูลในตารางที่เหมาะสมตามแผนกที่เลือก
            $insert_stmt = $db->prepare("INSERT INTO $department (title, detail, img) VALUES (:title, :detail, :file)");
            $insert_stmt->bindParam(':title', $title);
            $insert_stmt->bindParam(':detail', $detail);
            $insert_stmt->bindParam(':file', $image_file);

            if ($insert_stmt->execute()) {
                $sendMsg = "ส่งไฟล์สำเร็จ...";
                header("refresh:2;acc/index.php");  //เปลี่ยนของแผนกอื่น
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Doc</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    
    <div class="container text-center">
        <h1>ส่งเอกสาร</h1>
        <?php
        if(isset($errorMsg)){
        ?>
        <div class="alert alert-danger">
            <strong><?php echo $errorMsg; ?> </strong>
        </div>
        <?php } ?>

        <?php
        if(isset($sendMsg)){
        ?>
        <div class="alert alert-success">
            <strong><?php echo $sendMsg; ?> </strong>
        </div>
        <?php } ?>


        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <div class="row">
            <label for="title" class="col-sm-3 control-label">หัวข้อ</label>
            <div class="col-sm-9">
                <input type="text" name="txt_title" class="form-control" value="<?php echo $title; ?>">
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="row">
            <label for="detail" class="col-sm-3 control-label">รายละเอียด</label>
            <div class="col-sm-9">
                <textarea name="txt_detail" class="form-control"><?php echo $detail; ?></textarea>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="img" class="col-sm-3 control-label">ลายเซ็น</label>
            <div class="col-sm-9">
                <input type="file" name="txt_file" class="form-control">
                <div class="alert alert-danger">
                    กรุณาเลือกไฟล์เพื่อยืนยันการส่ง
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
    <div class="row">
        <label for="department" class="col-sm-3 control-label">แผนก</label>
        <div class="col-sm-9">
            <select name="txt_department" class="form-control">
                <option value="revice_it">ไอที</option>
                <option value="revice_mk">การตลาด</option>
            </select>
        </div>
    </div>
</div>

    <div class="form-group">
        <div class="col-sm-12">
            <input type="submit" name="btn_send" class="btn btn-primary" value="Send">
            <a href="acc/index.php" class="btn btn-danger">Cancel</a>        
        </div>
    </div>
</form>

    </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>