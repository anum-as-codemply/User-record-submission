<?php
	include_once("config.php");
	echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">';
	echo '<link rel="stylesheet" href="css/styleadmission.css">';
	$c= $_POST['cnic'];
	$pwd= $_POST['pass'];
	$res= mysqli_query($link,"SELECT * FROM credentials WHERE cnic= '$c' && password= '$pwd'");
	$val= mysqli_fetch_array($res);
	if(!$val) { 
		echo "<script>alert('Invalid Username or Password! Enter again');";
		echo "window.location= 'index.html'; </script>";  
	} 
	$que= mysqli_query($link, "SELECT * FROM student where cnic='$c'");
	$val= mysqli_fetch_array($que);
	// to check if the form is already submitted then just show submitted form
	/*if($val['gender']=='F' || $val['gender']=='M'){
		header("location: submittedform.php?cn= '$c' ");
	}*/
?>
	
	<div class="main">
		<div class="header"> 
			<h1> Student Admission Form</h1> <br>
			<h3>  <?php echo $val['name'].' '.$val['father'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$val['cnic'];  ?> </h3>
		</div>
		<br />
		<div class="instr">
			<p> Fill in the form carefully </p>
		</div>
	</div>

<div class="wrapper rounded bg-white">
    <div class="form">
	<form action="submittedform.php" method="post" name="student-data" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group">
				<label>Address</label>
				<textarea class="form-control" name="addr" rows="3" cols="100" required></textarea>
  			</div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Gender</label>
                <div class="d-flex align-items-center mt-2"> 
				<label class="option"> <input type="radio" name="radio" value="M">Male <span class="checkmark"></span> </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label class="option ms-4"> <input type="radio" name="radio" value="F" >Female <span class="checkmark"></span> </label> </div>
            </div>
        </div>
		<br>
        <div class="row">
			<div class="col-md-6 mt-md-0 mt-3"> <label>Matriculation</label> </div> 
        
		<table class="table">
			<tbody>
			<tr>
				<th scope="row"><input type="text" name="sc-name" class="form-control" placeholder="School name" required></th>
				<td><input type="text" name="sc-roll" class="form-control" placeholder="Matric Roll#" required></td>
				<td><input type="text" name="sc-brd" class="form-control" placeholder="Board" required></td>
				<td><input type="text" name="sc-marks" class="form-control" placeholder="Obtained marks" required></td>
			</tr>
			</tbody>
		</table>
		</div>
		
        <div class="row">
			<div class="col-md-6 mt-md-0 mt-3"> <label>Intermediate</label> </div> 
        
		<table class="table">
			<tbody>
			<tr>
				<th scope="row"><input type="text" name="cllg-name" class="form-control" placeholder="College name" required></th>
				<td><input type="text" name="cllg-roll" class="form-control" placeholder="Inter Roll#" required></td>
				<td><input type="text" name="cllg-brd" class="form-control" placeholder="Board" required></td>
				<td><input type="text" name="cllg-marks" class="form-control" placeholder="Obtained marks" required></td>
			</tr>
			</tbody>
		</table>
		</div>
		
        <div class=" my-md-2 my-3"> <label>Department</label> <select name="dep" id="dep" required>
                <option value="" selected hidden>Choose Option</option>
                <option value="Botany">Botany</option>
				<option value="Computer Science">Computer Science</option>
                <option value="Chemistry">Chemistry</option>
                <option value="English">English</option>
				<option value="Environmental Science">Environmental Science</option>
				<option value="Economics">Economics</option>
				<option value="Fine Arts">Fine Arts</option>
				<option value="Islamiat">Islamiat</option>
				<option value="Information Technology">Information Technology</option>
				<option value="Physics">Physics</option>
				<option value="Political Science">Political Science</option>
				<option value="Pyschology">Pyschology</option>
				<option value="Sociology">Sociology</option>
				<option value="Textile Designing">Textile Designing</option>
				<option value="Urdu">Urdu</option>
				<option value="Zoology">Zoology</option>
            </select> 
		</div>
		
		<br />
		<div class="form-group">
			<label>Picture</label>
			<input type="file" name="picture" class="form-control-file" required>
		</div>
		<br />
		<input type="hidden" name="cnic" value="<?php echo $val['cnic']; ?>" />
		<input type="submit" name="submit" value="Submit" id="submit-btn">
    </div>
	</form>
</div>
