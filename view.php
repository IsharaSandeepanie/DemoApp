<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class = "wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
			<ul class="nav nav-pills nav-justified">
				<li role="presentation"><a href="index.php">Home</a></li>
				<li role="presentation" ><a href="create.php">Add</a></li>
			</ul>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
					
                    $sql = "SELECT * FROM Participants ORDER BY id DESC LIMIT 1 ";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){  
                                while($row = mysqli_fetch_array($result)){
									echo "<div>";
										echo "<h4>Full Name : </h4>" ;
										echo "<h4>" . $row['fname'] . ' ' . $row['sname'] . "</h4>";
										echo "<hr style=clear:both;/>";
									echo "</div>";
									echo "<div>";
										echo "<h4> NIC : </h4>" ;
										echo "<h4>" . $row['nic']. "</h4>";
										echo "<hr style=clear:both;/>";
									echo "</div>";
									echo "<div>";
										echo "<h4> Mobile Number : </h4>" ;
										echo "<h4>" . $row['mobile'] . "</h4>";
										echo "<hr style=clear:both;/>";
									echo "</div>";
									echo "<div>";
										echo "<h4> Educational Qualifications : </h4>" ;
										echo "<table>";
											echo "<thead>";
												echo "<th> Type of Degree </th>";
												echo "<th> Class </th>";
												echo "<th> University </th>";
												echo "<th> Graduated Date </th>";
											echo "</thead>";
											echo "<tbody>";
												echo "<tr>";
													echo "<td>" . $row['degree'] . "</td>";
													echo "<td>" . $row['class'] . "</td>";
													echo "<td>" . $row['university'] . "</td>";
													echo "<td>" . $row['graduation'] . "</td>";
												echo "</tr>";
											echo "</tbody>";
										echo "</table>";
										echo "<hr style=clear:both;/>";
									echo "</div>";
									echo "<div>";
										echo "<h4> Working Experience : </h4>" ;
										echo "<table>";
											echo "<thead>";
												echo "<th> Company Name </th>";
												echo "<th> Position </th>";
												echo "<th> Duration (From) </th>";
												echo "<th> Duration (To)</th>";
											echo "</thead>";
											echo "<tbody>";
												echo "<tr>";
													echo "<td>" . $row['cname1'] . "</td>";
													echo "<td>" . $row['position1'] . "</td>";
													echo "<td>" . $row['from_date1'] . "</td>";
													echo "<td>" . $row['to_date1'] . "</td>";
												echo "</tr>";
												echo "<tr>";
													echo "<td>" . $row['cname2'] . "</td>";
													echo "<td>" . $row['position2'] . "</td>";
													echo "<td>" . $row['from_date2'] . "</td>";
													echo "<td>" . $row['to_date2'] . "</td>";
												echo "</tr>";
												echo "<tr>";
													echo "<td>" . $row['cname3'] . "</td>";
													echo "<td>" . $row['position3'] . "</td>";
													echo "<td>" . $row['from_date3'] . "</td>";
													echo "<td>" . $row['to_date3'] . "</td>";
												echo "</tr>";
											echo "</tbody>";
										echo "</table>";
										echo "<hr style=clear:both;/>";
									echo "</div>";
                                    echo "<div>";
                                        echo "<div>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip' name='btnSubmit' class='btn btn-primary'> Update Record </a>";
											echo "&nbsp";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip' name='btnCancel' class='btn btn-danger'> Delete Record</a>";	
                                        echo "</div>";
                                    echo "</div>";
                                }
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
