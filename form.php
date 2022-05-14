<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>UPLOAD FILE</title>
</head>
<body>

<?php
// <!-- 1. เชื่อมต่อ database:  -->
include("src/php/connect_db.php"); 
// <!-- //2. query ข้อมูลจากตาราง:  -->
$query = "SELECT * FROM pth_file ORDER BY file_id asc" or die("Error:" . mysqli_error()); 
// <!-- //3. execute the query.  -->
$mysql = mysqli_query($conn, $query); 
// <!-- //4 . แสดงข้อมูลที่ query ออกมา:  -->

// <!-- //ใช้ตารางในการจัดข้อมูล -->
echo "<table border='1' align='center' width='500'>";
// <!-- //หัวข้อตาราง -->
echo "<tr align='center' bgcolor='#CCCCCC'><td>File ID</td><td>File</td><td>date_create</td></tr>";
while($row = mysqli_fetch_array($mysql)) { 
  echo "<tr>";
  echo "<td align='center'>" .$row["file_id"] .  "</td> "; 
  echo "<td align='center'>" .$row["timestamp_update"] .  "</td> ";
  echo "</tr>";
}
echo "</table>";
// 5. close connection
mysqli_close($conn);
?>

<br/>
<form action="add_file_db.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">
  <p>&nbsp;</p>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40" colspan="2" align="center" bgcolor="#D6D6D6">Form Upload&nbsp;File</td>
    </tr>
    <tr>
      <td width="126" bgcolor="#EDEDED">&nbsp;</td>
      <td width="574" bgcolor="#EDEDED">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" bgcolor="#EDEDED">File Browser</td>
      <td bgcolor="#EDEDED"><label>
        <input type="file" name="file_id" id="file_id"  required="required"/>
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED"><input type="submit" name="button" id="button" value="Upload" /></td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>