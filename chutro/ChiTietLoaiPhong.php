<?php include 'header.php';?>
<?php  $MaLPT = $_REQUEST['MaLPT'];?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Chi tiết loại phòng </title>
</head>
<body style="background: white" >
<div class="container-fluid">
    <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked" >
            <li role="presentation"><a href="index.php">Trang chủ</a></li>
            <li role="presentation" class="active"><a href="DSNhatro.php">Danh sách nhà trọ</a></li>
            <li role="presentation"><a href="formThemNhatro.php">Thêm nhà trọ</a></li>
            <li role="presentation"><a href="formThemQuanHuyen.php">Thêm quận huyện</a></li>
            <li role="presentation"><a href="TaiKhoan.php">Tài khoản</a></li>
        </ul>
    </div>
    <div class ="container-fluid">

        <div class="col-md-8" style="height: 500px;overflow:auto">
            <?php


            $link = mysql_connect("127.0.0.1","root","") or die ("khong ket noi duoc voi database");
            mysql_select_db("db_nhatro",$link);
            $sql = "SELECT * from loaiphongtro where MaLPT='$MaLPT'";
            $result = mysql_query($sql,$link);
            $result = mysql_query($sql,$link);
            while($row = mysql_fetch_array($result)){
                ?>

                <div class="row" style="margin-right: 10px; background-color: #2e6da4">
                    <div class="col-md-2" style="margin-top: 10px">
                        <img src="images/house.jpg" style="height:155px; ">
                    </div>
                    <div class= "post-infor col-md-9">
                        <h1><?php echo $row["TenLPT"]; ?></h1>
                        <p>
                            Mô tả: <?php echo $row["MoTa"]; ?>
                        </p>
                        <p>
                            Giá:  <strong><?php echo $row["Gia"]; ?> </strong>
                        </p>
                        <p>
                            Số lượng phòng: <strong><?php echo $row["SoLuongPhong"];?></strong>
                        </p>
                        <p>
                            Số phòng trống: <strong><?php echo $row["SoPhongTrong"];?></strong>
                        </p>
                        <p>
                            Diện tích: <strong><?php echo $row["DienTich"];?></strong>
                        </p>
                        <a href="formSuaLoaiPhongTro.php?MaLPT=<?php echo $row['MaLPT']; ?>">
                            <button type="button" class="btn btn-default" name="edit" id="edit" style="align: left; margin:5px; background: #2e6da4">Sửa</button>
                        </a>
                        <a href="xulyXoaLoaiPhongTro.php?MaLPT=<?php echo $row['MaLPT']; ?>">
                            <button type="button" class="btn btn-default" name="delete" style="align: left; margin:5px; background: #2e6da4">Xóa</button>
                        </a>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
        <?php include 'right.php';?>

    </div>
</div>
</body>
</html>