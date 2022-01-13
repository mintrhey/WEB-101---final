<?php 
require ('conn.php');

// To add or register a USER
if($_POST['action'] == "addUser")
{
    $idNumber = $_POST["idNumber"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = (int)$_POST["gender"];
    $bday = $_POST["bday"];
    $program = $_POST["program"];
    $yearLevel = (int)$_POST["yearLevel"];

    $test = "SELECT * FROM user Where idNumber='$idNumber' ";
    $test_stmt = $pdo->query($test);

    $test_stmt->execute();
    $row = $test_stmt->fetch();

    if($row){

        $value = "";
        $value = '<div class="alert alert-danger marg-top" role="alert">ID Number already exist</div>';

        echo json_encode(['status'=>'fail', 'html'=>$value]);

    }else{

        $sql = "INSERT INTO user(idNumber, firstName, lastName, gender, bday, program, yearLevel) 
                VALUES(:idNumber, :firstName, :lastName, :gender, :bday, :program, :yearLevel)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":idNumber",$idNumber);
        $stmt->bindParam(":firstName",$firstName);
        $stmt->bindParam(":lastName",$lastName);
        $stmt->bindParam(":gender",$gender);
        $stmt->bindParam(":bday",$bday);
        $stmt->bindParam(":program",$program);
        $stmt->bindParam(":yearLevel",$yearLevel);

        if($stmt->execute()){

            $value = "";
            $value = '<div class="alert alert-success marg-top" role="alert">User registered successfully</div>';

            echo json_encode(['status'=>'success', 'html'=>$value]);
        }
    }
}

// To Display all Users information
if($_POST['action'] == "displayUsers")
{
    $value = "";
    $value = '<thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">ID Number</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Gender</th>
                <th scope="col">Birthday</th>
                <th scope="col">Program</th>
                <th scope="col">Year Level</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
               </thead>
               <tbody>';

    $sql = "SELECT * FROM user";
    $statement = $pdo->query($sql);
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    if($users){
        foreach($users as $user)
        {
            if($user['gender']==0){
                $user['gender']="Female";
            }else{
                $user['gender']="Male";
            }

            $value.= '<tr>
                        <th scope="row">'.$user['id'].'</th>
                        <td> '.$user['idNumber'].' </td>
                        <td> '.$user['firstName'].'</td>
                        <td> '.$user['lastName'].'</td>
                        <td> '.$user['gender'].'</td>
                        <td> '.$user['bday'].'</td>
                        <td> '.$user['program'].'</td>
                        <td> '.$user['yearLevel'].'</td>
                        <td> <button class="btn btn-success" id="btn_edit" data-id='.$user['id'].'><span class="fa fa-update">Edit</span></button> </td>
                        <td> <button class="btn btn-outline-danger" id="btn_delete" data-id1='.$user['id'].'><span class="fa fa-trash">Delete</span></button> </td>
                      </tr>';
        }   
    }

    $value .='</tbody>';

    echo json_encode(['status'=>'success','html'=>$value]);
}

// To Delete a User
if($_POST['action'] == "deleteUser")
{
    $Del_Id = $_POST['Del_ID'];
    $sql = "delete from user where ID='$Del_Id' ";
    $statement = $pdo->query($sql);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if($result) 
    {
        echo 'Your Record Has Been Delete';
    }
    else 
    {
        echo ' Please Check Your Query ';
    }
}

// To Get the specific user to Edit or Update
if($_POST['action']=="getUser")
{
    function getsome() 
    {
        require ('conn.php');
        $userID = $_POST['userID'];

        $query = "select * from user where ID='$userID'";
        $statement = $pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    $statement = getsome();
    
    foreach($statement as $row)
    {
        $User_data[0]=$row['idNumber'];
        $User_data[1]=$row['firstName'];
        $User_data[2]=$row['lastName'];
        $User_data[3]=$row['gender'];
        $User_data[4]=$row['bday'];
        $User_data[5]=$row['program'];
        $User_data[6]=$row['yearLevel'];
        $User_data[7]=$row['id'];
    }

    echo json_encode($User_data);
}

// To mainly Edit or Update the User's information
if($_POST['action']=="updateUser")
{
    $userID = $_POST["userID"];
    $updateIDnumber = $_POST['updateIDnumber'];
    $updateFirstName = $_POST['updateFirstName'];
    $updateLastName = $_POST['updateLastName'];
    $updateGender = (int)$_POST['updateGender'];
    $updateBday = $_POST['updateBday'];
    $updateProgram = $_POST['updateProgram'];
    $updateYearLevel = (int)$_POST['updateYearLevel'];

    $query = "select id from user where idNumber='$updateIDnumber'";
    $statement = $pdo->query($query);
    $user = $statement->fetch();

    if($user['id'] != $userID){
        echo 'ID Number already exist';
    }else{
        $sql = "update user set idNumber='$updateIDnumber', firstName='$updateFirstName', lastName='$updateLastName',
                    gender='$updateGender', bday='$updateBday', program='$updateProgram', yearLevel='$updateYearLevel'
                    where id='$userID'";

        $statement = $pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if($result){   
            echo 'success';
        }
    }
}
?>