<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="style/style.css" rel="stylesheet" type="text/css">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script defer type="text/javascript" src="src/script.js"></script>
	<script defer type="text/javascript" src="src/listscript.js"></script>

<body>
	<div class="container mt-3 justify-content-center">
		<div class="border shadow p-3 rounded main-register marg-top marg-bottom">
			<div class="card-body">
				<!-- Navigation -->
				<nav style="margin-bottom:25px">
					<ul class="nav nav-tabs" >
						<li class="nav-item">
							<a class="nav-link active" href="index.php">Register</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="list.php">List</a>
						</li>
					</ul>
				</nav>

				<div id="warning-message"></div>

				<!-- User Registration Form-->
				<form id="userForm" name="userForm">
					<div class="mb-3">
						<label for="idNumber" class="form-label">ID Number</label>
						<input pattern="\d{3}-\d{5}" maxlength="9" minlength="9" required type="text" class="form-control" id="idNumber">
					</div>
					<div class="mb-3">
						<label for="firstName" class="form-label">Firstname</label>
						<input required type="text" class="form-control" id="firstName">
					</div>
					<div class="mb-3">
						<label for="lastName" class="form-label">Lastname</label>
						<input required type="text" class="form-control" id="lastName">
					</div>
					<div class="mb-3">
						<label for="gender" class="form-label">Gender</label>
						<select required class="form-select" id="gender" aria-label="Default select example">
						<option value="0">Female</option>
						<option value="1">Male</option>
						</select>
						</div>
					<div class="mb-3">
						<label for="bday" class="form-label">Birthday</label>
						<input required type="date" class="form-control" id="bday">
					</div>
					<div class="mb-3">
						<label for="program" class="form-label">Program</label>
						<input required type="text" class="form-control" id="program">
					</div>
					<div class="mb-3">
						<label for="yearLevel" class="form-label">Year Level</label>
						<input max="5" min="1" required type="number" class="form-control" id="yearLevel">
					</div>
					<button id="register" on type="submit" class="btn btn-primary">Register</button>
				</form>	 
			</div> 	
		</div>
	</div>
</body>
</html>