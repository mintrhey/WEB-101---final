// Display Function
function displayUsers()
{
    $.ajax(
    {
        method:"post",
        url:"src/php/user.php",
        data:{action:"displayUsers"},
        success:function(data)
        {
            data = $.parseJSON(data);
                
            if(data.status=='success'){
                $('#usertable').html(data.html);
            }	
        }
    });
}

// Delete Function
function deleteUser()
{
    $(document).on('click','#btn_delete',function()
    {
        var Delete_ID = $(this).attr('data-id1');
        $('#delete').modal('show');

        $(document).on('click','#btn_delete_record',function()
        {
            $.ajax(
            {
                url: 'src/php/user.php',
                method: 'post',
                data:{Del_ID:Delete_ID, action:"deleteUser"},
                success: function()
                {
                    $('#delete').modal('hide');
                    $('#delete-success').modal('show');
                    displayUsers();
                }
            });
        })
    });

    $(document).on('click','#btn_close',function()
    {
        $('#delete').modal('hide');
    });
}

// Get the Specific User function for Update or Edit function purposes
function getUser()
{
    $(document).on('click','#btn_edit',function()
    {
        var ID = $(this).attr('data-id');
        $.ajax(
        {
            url: 'src/php/user.php',
            method: 'post',
            data:{userID:ID, action:"getUser"},
            dataType: 'JSON',
            success: function(data)
            {
                $('#idNumber_update').val(data[0]);
                $('#firstName_update').val(data[1]);
                $('#lastName_update').val(data[2]);
                $('#gender_update').val(data[3]);
                $('#bday_update').val(data[4]);
                $('#program_update').val(data[5]);
                $('#yearLevel_update').val(data[6]);
                $('#update-id').val(data[7]);
                $('#update').modal('show');
            }  
        });
    })
}

// Update Function
function updateUser()
{
    $(document).on('click','#btn_update',function()
    {   
        var ID = $('#update-id').val();
        var updateIDnumber = $('#idNumber_update').val();
        var updateFirstName = $('#firstName_update').val();
        var updateLastName = $('#lastName_update').val();
        var updateGender = $('#gender_update').val();
        var updateBday = $('#bday_update').val();
        var updateProgram = $('#program_update').val();
        var updateYearLevel = $('#yearLevel_update').val();


        if(updateIDnumber=="" || updateFirstName=="" || updateLastName=="" || updateGender=="" || updateBday=="" || updateProgram=="" || updateYearLevel==""){
            $('#up-message').html('Please Fill in the Blanks');
        }else if(!/\d{3}-\d{5}/.test(updateIDnumber)){
            $('#up-message').html('Follow the correct format of the ID Number');
        }else if(updateYearLevel < 1 || updateYearLevel > 5){
            $('#up-message').html('Year level must be greater than 0 and lesser than 6');
        }else
        {
            $.ajax(
            {
                url: 'src/php/user.php',
                method: 'post',
                data:
                {  
                    userID:ID,
                    updateIDnumber:updateIDnumber,
                    updateFirstName:updateFirstName,
                    updateLastName:updateLastName,
                    updateGender:updateGender,
                    updateBday:updateBday,
                    updateProgram:updateProgram,
                    updateYearLevel:updateYearLevel,
                    action:"updateUser",    
                },
                success: function(data)
                {
                    if(data == ''){    
                        $('#update').modal('hide');
                        $('#update-success').modal('show');
                    }else{
                        $('#up-message').html(data);
                        $('#update').modal('show');
                    }
                    displayUsers();
                }
            });
        }
    })

    $(document).on('click','#btn_close',function()
    {
        $('#up-message').html('');
        $('#update').modal('hide');
    });
}

getUser();
updateUser();
displayUsers();
deleteUser();

