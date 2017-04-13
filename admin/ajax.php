<?php
$link = mysqli_connect('localhost','root','','ecampus');
$branch = $_GET['branch'];

if($branch != ''){$sql = "SELECT DISTINCT sem FROM subjects";
$query = mysqli_query($link,$sql);
echo "<select name=\"sem\" id=\"semdd\" onChange=\"change_sem()\" required=\"true\" class=\"form-control\"><option>Select Sem</option>";
while($row = mysqli_fetch_array($query)){
   echo "<option value=\"".$row['sem']."\">".$row['sem']."</option>";
}
echo "</select>";
}
?>