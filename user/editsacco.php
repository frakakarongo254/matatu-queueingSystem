<?php
include('config.php');
  $id = $_POST['id'];
 //$id = "1";
$result_array = array();

		$result=mysqli_query($conn,"select * from `sacco` where `id`='".$id."' ORDER BY id DESC ");
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		$edit_sacco_name =$row['sacco_name'];
		$editSaccoId =$row['id'];
		$edit_sacco_status =$row['status'];
		$edit_sacco_location =$row['county'];
		
		
		array_push($result_array, $row);
		//$data ='<div><form><div class="form-group"><lable for="username"><b>Username:</b></label><input class="form-control" name="username" value="'.$username.'" type="text"/></div></form></div>';
	     $data=' <form method="POST" action="sacco.php">
          <div class="form-group">  
              <input name="editSaccoId" value="'.$editSaccoId.'" type="hidden">		  
                <label for="exampleInputName"><b>Enter category Name</b></label>
                <input class="form-control" id="edit_sacco_name" name="edit_sacco_name" value="'.$edit_sacco_name.'" type="text" aria-describedby="nameHelp" placeholder="" required>
               </div>
			   <div class="form-group">           
                <label for="exampleInputName"><b>Enter location</b></label>
                <input class="form-control" id="editLocation" name="editLocation" value="'.$edit_sacco_location.'" type="text" aria-describedby="nameHelp" placeholder="" required>
               </div>
			   
			   <div class="form-group">
              <select name="edit_sacco_status" class="form-control" value="'.$edit_sacco_status.'"required>
			  <option value="Active">Active</option>
			  <option value="Inactive">Inactive</option>
			  </select>
              
           
          </div>
          
          <input name="editSaccoId" value="'.$editSaccoId.'" type="hidden">
       
		  </div>
          <div class="modal-footer">
            
			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" name="editSaccoButton" type="submit" >Edit Sacco</button>
          </div>
		   </form>
		 ';
	}
	echo $data;//json_encode($data);
} else {
    echo  "No Match"; 
}

?>