<?php 
include 'includes/include.php';
dbconnect();
session_set();

include 'includes/head.php';
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>

	<!--- Main Content Starts Here -->
		
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<!--grids-->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Notices</h2>
					</div>
					<div class="panel panel-widget">
						<div class="inbox-page">
							<h4>Notifications &amp; Notices</h4>
<div id="pagination_data">";
</div>
							    

		</div>
	</div>
</div>

		<!--- Main Content Ends Here -->
		
<?php include 'includes/footer.php'; ?>
<script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"pagination.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  
 </script>  