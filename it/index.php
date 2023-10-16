<?php
// ในหน้า admin.php
session_start();

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่ หากไม่ล็อกอินให้เด้งกลับไปยังหน้า login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit;
}
?>
<?php
    require_once('connect.php');

    if(isset($_REQUEST['delete_id'])){
        $id = $_REQUEST['delete_id'];
                                                    //เปลี่ยนของแผนกอื่นตรงนี้
        $select_stmt = $db->prepare('SELECT * FROM it_doc WHERE id = :id');
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        unlink("upload/".$row['img']);

        $delete_stmt = $db->prepare('DELETE FROM it_doc WHERE id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();

        header("Location: index.php");

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แผนกไอที</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center">
        <h2>แผนกไอที</h2>
        <a href="../logout.php" class="btn btn-danger float-right">Logout</a>
        <a href="add.php" class="btn btn-success float-right" style="margin-right: 10px;">Add</a>

<ul class="nav nav-underline">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php">เอกสาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="revice.php">เอกสารที่ได้รับ</a>
  </li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="documents"><h2>เนื้อหาเอกสาร</h2></div>
    <div class="tab-pane" id="received"><h2>เอกสารที่ได้รับ</h2></div>
</div>
        <!-- เริ่มต้นส่วน "เอกสาร" -->
        <section class="documents-section">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>หัวข้อ</th>
                        <th>ดูเอกสาร</th>
                        <th>ส่งเอกสาร</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php                                           //เปลี่ยนของแผนกอื่นตรงนี้
                        $select_stmt = $db->prepare('SELECT * FROM it_doc');
                        $select_stmt->execute();

                        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><a href="view.php?update_id=<?php echo $row['id']; ?>" class="btn btn-success">ดูเอกสาร</a></td>
                        <td><a href="../send_acc.php?update_id=<?php echo $row['id']; ?>" class="btn btn-primary">Send</a></td>
                        <td><a href="edit.php?update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
        <!-- สิ้นสุดส่วน "เอกสาร" -->

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>