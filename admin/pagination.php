<?php  
$conn = mysqli_connect("localhost", "root", "", "ecampus");
 $record_per_page = 10;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM notices ORDER BY id ASC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($conn, $query);  
 $output .= "   
 ";  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
           <div class="inbox-row widget-shadow" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="mail mail-name"><h6>'.$row['created_by'].'</h6></div>
                
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row["id"].'" aria-expanded="true" aria-controls="collapseOne">
                
                <div class="mail"><p>'.$row["notice_topic"].'</p></div>

                </a>
                <div class="mail-right">
                  <div class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-expanded="false">
                      <p><i class="fa fa-ellipsis-v mail-icon"></i></p>
                    </a>
                    <ul class="dropdown-menu float-right">
                    <li>
                        <a onclick="jsalert2()" class="font-red" title="">
                          <i class="fa fa-trash-o mail-icon"></i>
                          Delete
                        </a>
                      </li>
                    </ul>
                  </div> 
                </div>

                <div class="mail-right"><p>'.$row["created_on"].'</p></div>

                <div class="clearfix"> </div>
                <div id="collapse'.$row["id"].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="mail-body">
                <p>'.$row["notice_details"].'</p>
                <p>Related Link:<a target="_BLANK" href="'.$row["notice_link"].'"> Click Here</a></p>
                <p>Related Docs:<a target="_BLANK" href="'.$row["file"].'"> Click Here</a></p>
                </div>
                </div>
                </div> 
      ';  
 }  
 $output .= '</table><br /><div align="center">';  
 $page_query = "SELECT * FROM notices ORDER BY id ASC";  
 $page_result = mysqli_query($conn, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='pagination_link' style='cursor:pointer; margin:5px;display: inline-block; padding: 8px 16px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  
 $output .= '</div>';  
 echo $output;  
 ?>  