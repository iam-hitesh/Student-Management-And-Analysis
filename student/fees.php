<?php
include 'includes/include.php';
dbconnect();
session_set();
error_reporting(0);
$user = $_SESSION['regno'];
$fee_sql = "SELECT * FROM fees_allocation where regno='$user'";
$fee_query = mysqli_query($conn,$fee_sql);
$num_rows = mysqli_num_rows($fee_query);
include 'includes/head.php';
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>
<body>

	      <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Fee Details</h4>
	                                <p class="category">Total Fees Deposited by Till Date</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Fee Type</th>
	                                    	<th>Fee Amount</th>
	                                    	<th>Status</th>
											<th>Updated On</th>
	                                    </thead>
	                                    <tbody>
	                            <?php 
	                                if($num_rows > 1){
	                                	while($fee_row = mysqli_fetch_array($fee_query)){
	                                        echo "<tr>";
	                                        echo "<td>".$fee_row['note']."</td>";
	                                        echo "<td>".$fee_row['fees']."</td>";
	                                        echo "<td>".$fee_row['status']."</td>";
											echo "<td class=\"text-primary\">".$fee_row['updated_on']."</td>";
											echo "</tr>";
											$total += $fee_row['fees'];
	                                        }
	                                        echo "<tr>";
	                                        echo "<td>Total Fees  </td>";
	                                        echo "<td>".$total."</td>";
	                                        echo "<td></td>";
											echo "<td class=\"text-primary\"></td>";
											echo "</tr>";
	                                      }
	                            ?>
	                                    </tbody>
	                                </table>

	                            </div>
	                        </div>
	                    </div>

<?php include'includes/footer_menu.php'; ?>

</body>

<?php include 'includes/footer.php'; ?>