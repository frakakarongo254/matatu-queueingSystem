<?php
include('config.php');
  $id = $_POST['id'];
 //$id = "1";
$result_array = array();

		$result=mysqli_query($conn,"select * from `user` where `id`='".$id."' ORDER BY id DESC ");
if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()){
		$username =$row['username'];
		$id =$row['id'];
		$mobile =$row['mobile'];
		$password =$row['password'];
		$status =$row['status'];
		$matatu =$row['matatu'];
		array_push($result_array, $row);
		//$data ='<div><form><div class="form-group"><lable for="username"><b>Username:</b></label><input class="form-control" name="username" value="'.$username.'" type="text"/></div></form></div>';
	     $data='<form role="form" class="form-vertical" method="POST" action="user.php">
		  
		     <div class="form-group">
            <label for="exampleInputEmail1"><b>UserName:</b></label>
            <input class="form-control" id="username" name="editUsername" value="'.$username.'" type="text"  placeholder="Enter uername">
          </div>
		  <div class="form-group">
            <label for="exampleInputEmail1"><b>Mobile Number:</b></label>
            <input class="form-control" id="editMobileNumber" name="editMobileNumber" value="'.$mobile.'" type="number" min="0"  placeholder="Enter Mobile Number">
          </div>
		   <div class="form-group">
            <label for="exampleInputEmail1"><b>Password:</b></label>
            <input class="form-control" id="password" name="editPassword" type="password" value="'.$password.'" placeholder="Enter Password">
          </div>
		  
		  <div class="form-group">
            <label for="exampleInputEmail1"><b>Status:</b></label>
            <select name="editUserStatus" class="form-control" value="'.$status.'">
			  <option value="Active">Active</option>
			  <option value="Inactive">Inactive</option>
			</select>
			
          </div>
		 
		 
		 
		  <input name=" editUserId" value="'.$id .'" type="hidden">
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" name="editUserFunc" >Edit user</button>
                  
			
            
          </div>
		   </form>';
	}
	echo $data;//json_encode($data);
} else {
    echo  "No results to display"; 
}

?>