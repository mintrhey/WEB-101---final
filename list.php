<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style/style.css" rel="stylesheet" type="text/css">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script defer type="text/javascript" src="src/listscript.js"></script>

<body>
    <div class="container mt-3 d-flex justify-content-center">
        <div id="main-list" class="border shadow p-3 rounded main-list marg-top">
            <div class="card-body">
                <!-- Navigation -->
                <nav>
                    <ul class="nav nav-tabs" style="margin-top:10px; margin-left: 10px; margin-right: 10px;">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="list.php">List</a>
                        </li>
                    </ul>
                </nav>

                <div id="update-alert" class="" role="alert"></div>
                <table class="table marg-top" id="usertable"></table>

                <!--Update Modal-->
                <div class="modal" id="update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="text-dark">Update Form</h3>
                        </div>
                        <div class="modal-body">
                        <p id="up-message" class="text-dark"></p>
                            <form id="update_form">
                                <p id="update-id"><p>
                                <input pattern="\d{3}-\d{5}" maxlength="9" minlength="9" type="text" class="form-control my-2" placeholder="ID Number" id="idNumber_update">
                                <input type="text" class="form-control my-2" placeholder="First Name" id="firstName_update">
                                <input type="text" class="form-control my-2" placeholder="Last Name" id="lastName_update">
                                <select class="form-select" aria-label="Default select example" placeholder="Gender" id="gender_update">
                                    <option value="0">Female</option>
                                    <option value="1">Male</option>
                                </select>
                                <input type="date" class="form-control my-2" placeholder="Birthday" id="bday_update">
                                <input type="text" class="form-control my-2" placeholder="Program" id="program_update">
                                <input type="number" max="5" min="1" class="form-control my-2" placeholder="Year Level" id="yearLevel_update">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="btn_update">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="update-success">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p> User has been updated successfully </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Delete Modal-->
                <div class="modal" id="delete">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="text-dark">Delete Record</h3>
                        </div>
                        <div class="modal-body">
                            <p> Do You Want to Delete the Record ?</p>
                            <button type="button" class="btn btn-success" id="btn_delete_record">Delete Now</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="delete-success">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p> User has been deleted successfully </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 	
        </div>
    </div>
</body>
</html>