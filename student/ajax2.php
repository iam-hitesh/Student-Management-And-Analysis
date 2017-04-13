<?php
$link = mysqli_connect('localhost','root','','ecampus');
$sem = $_GET['sem'];
$branch = $_GET['branch'];
if($sem != ''){
	$sql = "SELECT subjects FROM subjects where sem='$sem' and branch='$branch'";
    $query = mysqli_query($link,$sql);
    echo "<select name=\"subject\" required=\"true\" class=\"form-control\"><option>Select Subjects</option>";
    while($row = mysqli_fetch_array($query)){
        echo "<option value=\"".$row['subjects']."\">".$row['subjects']."</option>";
    }
    echo "</select>";
}
?>