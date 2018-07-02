<?php
include('config2.php');
   $startDate = $_POST['startDate'];
 //echo  $startDate = '2018-05-9';
  $endDate = $_POST['endDate'];
 //echo $endDate = '2018-05-12';
 //$id = "1";
$result=mysqli_query($condb,"SELECT * FROM `transaction` WHERE DATE(order_date) BETWEEN '". $startDate ."' AND '".$endDate."' ");
		//$result=mysqli_query($conn,"select * from `order_transaction` where  order_date BETWEEN '". $endDate."' AND '".$startDate."';");
if ($result->num_rows > 0) {
    // output data of each row

		?>
		<hr>
		<div  class="row" style="text-align:center">
		<div class="col-md-4"></div>
		<table>
		<tr><td>
		<br>
		<b>Sales Report From </b>  <i><?php echo $startDate ;?></i>  <b>To</b><i> <?php echo $endDate ;?></i>
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
                  <th>Transaction Id</th>
                  <th>Customer Name</th>
                  <th>Total Amount</th>
                  <th>Payment Status</th>
                  <th>Order Status</th>
                  <th>order Date</th>
                  <th>Created By</th>
                 
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Transaction Id</th>
                  <th>Customer Name</th>
                  <th>Total Amount</th>
                  <th>Payment Status</th>
                  <th>Order Status</th>
                  <th>order Date</th>
                  <th>Created By</th>
                  
                </tr>
              </tfoot>
              <tbody>
			  
			  <?php
			  while($row = $result->fetch_assoc()) {
				  $id=$row["transaction_id"];
		echo '<form method="POST" action="order.php" role="form"><tr>
		 <td>';
		  echo $id= $row["transaction_id"].
		  '</td><td>'
		  .$row["customer_name"].
		   '</td>
		   <td>'.$row["grand_total"].'</td>
		   <td>'.$row["payment_mode"].'</td>
		   <td> Active</td>
		   <td>'.$row["order_date"].'</td>
		   <td>'.$row["created_by"] ;
		   // delete and edit category button
		 echo'</td>
		
		</tr></form>';
		
		


    }?>
	 </tbody>
</table>
</div>
	
<?php ;} else {
    echo  json_encode("No Match"); 
}

?>
  