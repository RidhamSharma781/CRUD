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
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $city = $row['city'];
        $table .= '<tr>
        <td scope="row">' . $id . '</td>
        <td>' . $name . '</td>
        <td>' . $email . '</td>
        <td>@' . $phone . '</td>
        <td>@' . $city . '</td>
        <td>
    <button class="btn btn-dark">Update</button>
    <button class="btn btn-danger">Delete</button>
</td>
      </tr>';
    }
    $table .= '</table>';
    echo $table;
}
?>