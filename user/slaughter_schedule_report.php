<?php
include('config2.php');
   $startDate = $_POST['startDate'];
 
  $endDate = $_POST['endDate'];
 
$result=mysqli_query($condb,"SELECT * FROM `slaughter_schedule` WHERE DATE(slaughter_date) BETWEEN '". $startDate ."' AND '".$endDate."' ");
		
if ($result->num_rows > 0) {
   
		?>
		<hr>
		<div  class="row" style="text-align:center">
		<div class="col-md-4"></div>
		<table>
		<tr><td>
		<br>
		<b>Slaughter Schedule  From </b>  <i><?php echo $startDate ;?></i>  <b>To</b><i> <?php echo $endDate ;?></i>
		</td>
		</tr>
		</table>
		<div class="col-md-4"></div>
		
		</div>
		<br>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Animal Id</th>
                  <th>Slaughter Date</th>
                  <th>Date Entered</th>
                  <th> Status</th>
                  
                 
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Animal Id</th>
                  <th>Slaughter Date</th>
                  <th>Date Entered</th>
                  <th> Status</th>
                  
                </tr>
              </tfoot>
              <tbody>
			  
			  <?php
			  while($row = $result->fetch_assoc()) {
				 $date = $row["slaughter_date"];
				 $dayOfWeek = date("l", strtotime($date));
		echo '<form method="POST" action="" role="form"><tr>
		 <td>';
		  echo $id= $row["animal_id"].
		  '</td><td><span class="badge badge-dark"><b>'
		  .$date."  ".$dayOfWeek.
		   '</b></span></td>
		   <td>'.$row["date_entered"].'</td>
		   <td>'.$row["status"].'</td>
		   
		   
		  
		 
		</tr></form>';
		
		


    }?>
	 </tbody>
</table>
</div>
	
<?php ;} else {
    echo  json_encode("No Match"); 
}

?>
  