<?php

  include('../include/access/connector.php');

	if(isset($_POST['emplo'])){
      
       $employee_companyid = $phdb->real_escape_string($_POST['employee_companyid']);
       $employee_firstname = $phdb->real_escape_string($_POST['employee_firstname']);
       $employee_lastname = $phdb->real_escape_string($_POST['employee_lastname']);
       $employee_middlename = $phdb->real_escape_string($_POST['employee_middlename']);
       $branches_datefrom = $phdb->real_escape_string($_POST['branches_datefrom']);
       $branches_recentdate = $phdb->real_escape_string($_POST['branches_recentdate']);
       $employee_department = $phdb->real_escape_string($_POST['employee_department']);
       $employee_branches = $phdb->real_escape_string($_POST['employee_branches']);
       $employee_position = $phdb->real_escape_string($_POST['employee_position']);
       $employee_contact = $phdb->real_escape_string($_POST['employee_contact']);
       $employee_sss = $phdb->real_escape_string($_POST['employee_sss']);
       $employee_tin = $phdb->real_escape_string($_POST['employee_tin']);
       $employee_hdmf_pagibig = $phdb->real_escape_string($_POST['employee_hdmf_pagibig']);
       $employee_gsis = $phdb->real_escape_string($_POST['employee_gsis']);

      $file = addslashes(file_get_contents($_FILES['employee_file201']['tmp_name']));
      $file_name = addslashes($_FILES['employee_file201']['name']);
      $file_size = getimagesize($_FILES['employee_file201']['tmp_name']);
      move_uploaded_file($_FILES["employee_file201"]["tmp_name"], "../file_upload/" .date("Ymd").time().'_'. $_FILES["employee_file201"]["name"]);
      $employee_file201 = "../file_upload/" .date("Ymd").time().'_'. $_FILES["employee_file201"]["name"];

      $image = addslashes(file_get_contents($_FILES['employee_image']['tmp_name']));
      $image_name = addslashes($_FILES['employee_image']['name']);
      $image_size = getimagesize($_FILES['employee_image']['tmp_name']);
      move_uploaded_file($_FILES["employee_image"]["tmp_name"], "../image_upload/" .date("Ymd").time().'_'. $_FILES["employee_image"]["name"]);
      $employee_image = "../image_upload/" .date("Ymd").time().'_'. $_FILES["employee_image"]["name"];

       $sql = $phdb->query("INSERT INTO `employee_table`(`employee_companyid`, `employee_firstname`, `employee_lastname`, `employee_middlename`, `branches_datefrom`, `branches_recentdate`, `employee_department`, `employee_branches`, `employee_position`, `employee_contact`, `employee_sss`, `employee_tin`, `employee_hdmf_pagibig`, `employee_gsis`, `employee_file201`, `employee_image`) VALUES ('$employee_companyid', '$employee_firstname', '$employee_lastname', '$employee_middlename', '$branches_datefrom', '$branches_recentdate', '$employee_department', '$employee_branches', '$employee_position', '$employee_contact', '$employee_sss', '$employee_tin', '$employee_hdmf_pagibig', '$employee_gsis', '$employee_file201', '$employee_image')")  or die (mysqli_error($phdb));
       if($sql == TRUE){
       	  echo '<script>alert("Insert Successfully!!!")</script>';
		  echo '<script>window.location = "../Add_employee.php"</script>';
       }else{
       	  echo '<script>alert("Insert Failed!!!")</script>';
		  echo '<script>window.location = "../Add_employee.php"</script>';
       }

	}

?>