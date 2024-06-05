<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD operations PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>




    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Mobile no.</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="addUser()" class="btn btn-dark">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Upate Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="updatename" class="form-label">Name</label>
                        <input type="text" class="form-control" id="updatename">
                    </div>
                    <div class="mb-3">
                        <label for="updateemail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="updateemail">
                    </div>
                    <div class="mb-3">
                        <label for="updatephone" class="form-label">Mobile no.</label>
                        <input type="text" class="form-control" id="updatephone">
                    </div>
                    <div class="mb-3">
                        <label for="updatecity" class="form-label">City</label>
                        <input type="text" class="form-control" id="updatecity">
                    </div>
                    <input type="text" id="hiddenData" hidden >
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="updateUser()" class="btn btn-dark">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <h1 class="text-center">CRUD Operations using PHP</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark my-4" data-bs-toggle="modal" data-bs-target="#completeModal">
            Add User
        </button>
    </div>
    <div class="container">
        <div class="displayTable" id="displayTable">

        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <script>

        // To display data everytime.

        $(new Document).ready(function(){
            displayData();
        })

        // Function to delete a user

        function deleteUser(id){
            $.ajax({
                url:'delete.php',
                type:'post',
                data:{
                    deleteSend:id
                },
                success:function(data,status){
                    displayData();
                }
            })
        }

        // Function to display data
        function displayData() {
            var display = 'true';
            $.ajax({
                url: 'display.php',
                type: 'post',
                data: {
                    displaySend: display
                },
                success: function (data, status) {
                    $('#displayTable').html(data);
                }
            });
        }

        // Funtion to add a new user
        function addUser() {
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var city = $('#city').val();

            $.ajax({
                url: 'insert.php',
                type: 'post',
                data: {
                    nameSend: name,
                    emailSend: email,
                    phoneSend: phone,
                    citySend: city
                },
                success: function (data, status) {
                    // console.log("Success!");
                    $('#completeModal').modal("hide");
                    displayData();
                }
            })
        }

        // Function to get user data for updation
        function getUser(id){

            $('#hiddenData').val(id);

            // To show the Modal on clicking Update button
            // $('#updateModal').modal("show");

            // Post request for updating data
            $.post("update.php",{updateSend:id},function(data,success){
                var userId =JSON.parse(data);
                $('#updatename').val(userId.name);
                $('#updateemail').val(userId.email);
                $('#updatephone').val(userId.phone);
                $('#updatecity').val(userId.city);
            });
        }

        // Function to update the data 

        function updateUser(){
           var name = $('#updatename').val();
           var email = $('#updateemail').val();
           var phone = $('#updatephone').val();
           var city = $('#updatecity').val();
           var hiddenId = $('#hiddenData').val();

           $.post('update.php',{
            updateName:name,
            updateEmail:email,
            updatePhone:phone,
            updateCity:city,
            updateId:hiddenId
           },
           function(data,status){
            displayData(),
            $('#updateModal').modal('hide');
           }
        );

        }
    </script>
</body>

</html>