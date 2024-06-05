<?php
include 'connect.php';

extract($_POST);

if (isset($_POST['displaySend'])) {
    $sql = "select * from `user`";
    $table = '<table class="table table-hover">
    <thead class="table-dark">
    <tr>
      <th scope="col">Sr no.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">City</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>';
    $result = mysqli_query($con, $sql);
    $num = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $city = $row['city'];
        $table .= '<tr>
        <td scope="row">' . $num . '</td>
        <td>' . $name . '</td>
        <td>' . $email . '</td>
        <td>@' . $phone . '</td>
        <td>@' . $city . '</td>
        <td>
    <button data-bs-toggle="modal" data-bs-target="#updateModal" onclick="getUser('.$id.')" class="btn btn-dark">Update</button>
    <button onclick="deleteUser('.$id.')" class="btn btn-danger">Delete</button>
</td>
      </tr>';
      $num++;
    }
    $table .= '</table>';
    echo $table;
}
?>
