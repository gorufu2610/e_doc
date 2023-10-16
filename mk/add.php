<?php
require_once('connect.php'); 

if (isset($_POST['btn_insert'])) {
    try {
        $title = $_POST['txt_title'];
        $detail = $_POST['txt_detail'];

        $image_file = $_FILES['txt_file']['name'];
        $type = $_FILES['txt_file']['type'];
        $size = $_FILES['txt_file']['size'];
        $temp = $_FILES['txt_file']['tmp_name'];

        $path = "upload/" . $image_file;

        if (empty($title) || empty($detail)) {
            $errorMsg = "Please fill in all required fields";
        } elseif (empty($image_file)) {
            $errorMsg = "Please Select Image";
        } elseif ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png") {
            if (!file_exists($path)) {
                if ($size < 5000000) {
                    move_uploaded_file($temp, 'upload/' . $image_file);
                } else {
                    $errorMsg = "ไฟล์ของคุณใหญ่เกินไป โปรดอัปโหลดไฟล์ขนาดสูงสุด 5MB";
                }
            } else {
                $errorMsg = "ไฟล์นี้มีอยู่แล้ว... ตรวจสอบโฟลเดอร์การอัปโหลด";
            }
        } else {
            $errorMsg = "อัปโหลดได้เฉพาะรูปแบบ JPG, JPEG และ PNG เท่านั้น...";
        }

        if (!isset($errorMsg)) {                    
            $insert_stmt = $db->prepare('INSERT INTO mk_doc(title, detail, img) VALUES(:ftitle, :fdetail, :fimg)');
            $insert_stmt->bindParam(':ftitle', $title);
            $insert_stmt->bindParam(':fdetail', $detail);
            $insert_stmt->bindParam(':fimg', $image_file);

            if ($insert_stmt->execute()) {
                $insertMsg = "อัปโหลดไฟล์สำเร็จ...";
                header('refresh:2;index.php');
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
    <title>สร้างเอกสาร</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    
    <div class="container text-center">
        <h1>สร้างเอกสาร</h1>
        <?php
        if(isset($errorMsg)){
        ?>
        <div class="alert alert-danger">
            <strong><?php echo $errorMsg; ?> </strong>
        </div>
        <?php } ?>

        <?php
        if(isset($insertMsg)){
        ?>
        <div class="alert alert-success">
            <strong><?php echo $insertMsg; ?> </strong>
        </div>
        <?php } ?>


        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
            <label for="title" class="col-sm-3 control-label">หัวข้อ</label>
            <div class="col-sm-9">
                <input type="text" name="txt_title" class="form-control" placeholder="กรอกหัวข้อ">
        </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="detail" class="col-sm-3 control-label">รายละเอียด</label>
            <div class="col-sm-9">
                <textarea name="txt_detail" class="form-control" placeholder="กรอกรายละเอียด"></textarea>
            </div>
        </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="img" class="col-sm-3 control-label">ลายเซ็น</label>
            <div class="col-sm-9">
                <input type="file" name="txt_file" class="form-control">
            </div>
        </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input type="submit" name="btn_insert" class="btn btn-success" value="Insert">
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
