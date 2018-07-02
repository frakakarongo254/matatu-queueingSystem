<?php
include('config.php');
  $id = $_POST['id'];
 //$id = "1";
$result_array = array();

		$result=mysqli_query($conn,"select * from `matatu` where `no_plate`='".$id."' ORDER BY id DESC ");
if ($result->num_rows > 0) {
	echo '<form method="POST" action="matatu.php"><div class="form-group">';
				while($row = $result->fetch_assoc()) {
				 $no_plate =$row['no_plate'];
				 $sacco =$row['sacco'];
				 $route =$row['route'];
				//echo $categoryName$row['category_name'];
					
					// $categoryOption= '<option value="'.$categoryName.'">'.$categoryName.'</option>';
					// $brandOption= '<option value="'.$categoryName.'">'.$categoryName.'</option>';
				}
				//echo $data;
				echo '  <div class="form-group"> 
                <input type="text" value="'.$no_plate.'" name="editMatatu_no_plate">				
                <label for="date"><b>Edit Matatu:</b></label>
                <input type="text" name="editMatatu_no_plate" class="form-control" value="'.$no_plate.'"placeholder="Enter Matatu Number plate" disabled>
			  </div> 
			  <div class="form-group">            
                <label for="date"><b>Edit Matatu Route:</b></label>
                <input type="text" name="editMatatu_route" class="form-control" value="'.$route.'" placeholder="Enter Matatu Route">
			  </div>
			 
			   <div class="form-group">
              <select name="editMatatu_status" class="form-control" required>
			  <option value="Active">Active</option>
			  <option value="Inactive">Inactive</option>
			  </select>
           
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" name="editMatatuButton" type="submit" >Edit</button>
          </div></form>';
} else {
    echo  "No Match"; 
}

?>