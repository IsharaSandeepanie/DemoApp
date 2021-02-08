<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$sname = $fname = $nic = $email = $qualification = $experience = $cname1 = $position1 = $from_date1 = $to_date1 = $university = $degree = $class = $graduation = $mobile = "" ;
$cname2 = $position2 = $from_date2 = $to_date2 = $cname3 = $position3 = $from_date3 = $to_date3 = "";
$sname_err = $fname_err = $nic_err = $mobile_err = $email_err = $qualification_err = $experience_err = $cname_err = $position_err = $from_err = $to_err = $university_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate surname
    $input_sname = trim($_POST["sname"]);
    if(empty($input_sname)){
        $sname_err = "Surname is a required field.";
    } else{
        $sname = $input_sname;
    }
	
    // Validate first name
    $input_fname = trim($_POST["fname"]);
    if(empty($input_fname)){
        $fname_err = "Firstname is a required field.";
    } else {
        $fname = $input_fname;
    }
	
	// Validate nic
    $input_nic = trim($_POST["nic"]);
    if(empty($input_nic)){
        $nic_err = "NIC is a required field.";
    } else {
        $nic = $input_nic;
    }
	
	// Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Email is a required field";
    } elseif(!filter_var($input_email, FILTER_VALIDATE_EMAIL)){
        $email_err = "Please enter a valid email address.";
    } else{
        $email = $input_email;
    }
    
    // Validate mobile number
    $input_mobile = trim($_POST["mobile"]);
    if(empty($input_mobile)){
        $mobile_err = "Mobile number is a required field";     
    } elseif(!filter_var($input_mobile, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/")))){
        $mobile_err = "Please enter only digits.";
    } else{
        $mobile = $input_mobile;
    }

    $input_university = trim($_POST["university"]);
    $university = $input_university;

    $input_class = trim($_POST["class"]);
	$class = $input_class;
	
	$input_degree = trim($_POST["degree"]);
	$degree = $input_degree;
	
	$input_graduated = trim($_POST["graduation"]);
	$graduation = $input_graduated;
	
	$input_cname1 = trim($_POST["cname1"]);
	$cname1 = $input_cname1;
	
	$input_position1 = trim($_POST["position1"]);
	$position1 = $input_position1;
	
	$input_from1 = trim($_POST["from_date1"]);
	$from_date1 = $input_from1;
	
	$input_to1 = trim($_POST["to_date1"]);
	$to_date1 = $input_to1;
	
	$input_cname2 = trim($_POST["cname2"]);
	$cname2 = $input_cname2;
	
	$input_position2 = trim($_POST["position2"]); 
	$position2 = $input_position2;
	
	$input_from2 = trim($_POST["from_date2"]);
	$from_date2 = $input_from2;
	
	$input_to2 = trim($_POST["to_date2"]);
	$to_date2 = $input_to2;
	
	$input_cname3 = trim($_POST["cname3"]);
	$cname3 = $input_cname3;
	
	$input_position3 = trim($_POST["position3"]);
	$position3 = $input_position3;
	
	$input_from3 = trim($_POST["from_date3"]);
	$from_date3 = $input_from3;
	
	$input_to3 = trim($_POST["to_date3"]);
	$to_date3 = $input_to3;

    // Check input errors before inserting in database
    if(empty($sname_err) && empty($fname_err) && empty($nic_err)&& empty($mobile_err) && empty($email_err) && empty($university_err)
		&& empty($cname_err) && empty($position_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO Participants (sname, fname, nic, mobile, email, degree, class, university, graduation, cname1, 
		position1, from_date1, to_date1, cname2, position2, from_date2, to_date2, cname3, position3, from_date3, to_date3) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssssssssss", $param_sname, $param_fname, $param_nic, $param_mobile, $param_email, 
			$param_degree, $param_class, $param_university, $param_graduation, $param_cname1, $param_position1, $param_from1, $param_to1,
			$param_cname2, $param_position2, $param_from2, $param_to2, $param_cname3, $param_position3, $param_from3, $param_to3);

            // Set parameters
            $param_sname = $sname;
            $param_fname = $fname;
            $param_nic = $nic;
			$param_mobile = $mobile;
            $param_email = $email;
            $param_degree = $input_degree;
			$param_class = $input_class;
            $param_university = $university;
            $param_graduation = $input_graduated;
			$param_cname1 = $cname1;
            $param_position1 = $position1;
            $param_from1 = $input_from1;
			$param_to1 = $input_to1;
			$param_cname2 = $cname2;
            $param_position2 = $position2;
            $param_from2 = $input_from2;
			$param_to2 = $input_to2;
			$param_cname3 = $cname3;
            $param_position3 = $position3;
            $param_from3 = $input_from3;
			$param_to3 = $input_to3;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: create_sucess.php");
				
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
						<ul class="nav nav-pills nav-justified">
							<li role="presentation"><a href="home.php">Home</a></li>
							<li role="presentation" class="active"><a href="create.php">Add</a></li>
							<li role="presentation"><a href="index.php">View</a></li>
						</ul>
                    </div>
                    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="col-sm-12">
							<div class="form-group widths='equal'<?php echo (!empty($sname_err)) ? 'has-error' : ''; ?>">
									<label>Surname</label>
									<input type="text" name="sname" class="form-control" placeholder="Surname" value="<?php echo $sname; ?>">
									<span class="help-block"><?php echo $sname_err;?></span>	
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group widths='equal'<?php echo (!empty($fname)) ? 'has-error' : ''; ?>">
									<label>First Name(s)</label>
									<input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $fname; ?>">
									<span class="help-block"><?php echo $fname_err;?></span>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
								<label>NIC</label>
									<input type="text" name="nic" class="form-control" placeholder="NIC" value="<?php echo $nic; ?>">
									<span class="help-block"><?php echo $nic_err;?></span>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
								<label>Mobile Number</label>
								<input type="text" name="mobile" class="form-control" placeholder="Mobile Number" value="<?php echo $mobile; ?>">
								<span class="help-block"><?php echo $mobile_err;?></span>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>">
								<span class="help-block"><?php echo $email_err;?></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Educational Qualifications</label>
							</div>
							<div class="col-md-3">
									<label>Title of Degree</label><br>
										<select name="degree">
											<option disabled selected>-- Select Degree --</option>
											<option value="Diploma">Diploma</option>
											<option value="BSc. in Computer Science">BSc. in Computer Science</option>
											<option value="BSc. in Information Technology">BSc. in Information Technology</option>
										</select>
							</div>
							<div class="col-md-3">
									<label>Class</label><br>
										<select name="class" aria-labelledby="dropdownMenu3">
											<option disabled selected>-- Select Class --</option>
											<option value="First Class">First Class</option>
											<option value="Second Upper">Second Upper</option>
											<option value="Second Lower">Second Lower</option>
											<option value="General Pass">General Pass</option>  
										</select>
							</div>
							<div class="col-md-3">
									<label>University/Institution Name</label>
									<input type="text" name="university" class="form-control" placeholder= "University/Institution" value="<?php echo $university; ?>">
									<span class="help-block"><?php echo $university_err;?></span>
								</div>
							<div class="col-md-3">
									<label>Graduated Date</label>
									<input type="date" name="graduation" class="form-control" value="<?php echo $graduation; ?>">
							</div>
                        </div>
						<div class="form-group">
							<div class="col-sm-12">
								<label>Working Experience</label>
							</div>
							<div class="col-md-3">
								<label>Company Name</label>
								<input type="text" name="cname1" class="form-control" placeholder= "company name 1" value="<?php echo $cname1; ?>">
								<input type="text" name="cname2" class="form-control" placeholder= "company name 2" value="<?php echo $cname2; ?>">
								<input type="text" name="cname3" class="form-control" placeholder= "company name 3" value="<?php echo $cname3; ?>">
							</div>
							<div class="col-md-3">
								<label>Position</label>
								<input type="text" name="position1" class="form-control" placeholder= "position 1" value="<?php echo $position1; ?>">
								<input type="text" name="position2" class="form-control" placeholder= "position 2" value="<?php echo $position2; ?>">
								<input type="text" name="position3" class="form-control" placeholder= "position 3" value="<?php echo $position3; ?>">
							</div>
							<div class="col-md-3">
								<label>Duration (From)</label>
								<input type="date" name="from_date1" class="form-control" value="<?php echo $from_date1; ?>">
								<input type="date" name="from_date2" class="form-control" value="<?php echo $from_date2; ?>">
								<input type="date" name="from_date3" class="form-control" value="<?php echo $from_date3; ?>">
							</div>
							<div class="col-md-3">
								<label>Duration (To)</label>
								<input type="date" name="to_date1" class="form-control" value="<?php echo $to_date1; ?>">
								<input type="date" name="to_date2" class="form-control" value="<?php echo $to_date2; ?>">
								<input type="date" name="to_date3" class="form-control" value="<?php echo $to_date3; ?>">
							</div>
                        </div> 
						<div class="form-group" >
							<div class="col-sm-12">
								<input type="submit" class="btn btn-primary" value="Submit">
								<a href="home.php" class="btn btn-default">Cancel</a>
							</div>
						</div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
