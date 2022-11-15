<?php  
$conn = mysqli_connect("localhost", "root", "", "crud-app");
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
  <title>CRUD</title>
</head>
<body>  
  <h3 class="text-center mt-3 mb-2 w-25 capitalize mx-auto rounded shadow  " > CRUD Application </h3>
<div class="container mt-5">
  <form action="php/create.php" method="POST" class="border border-dark p-5 rounded">
    <div class="row ">
      <div class="col">
        <input class="form-control form-control-sm" required type="text" name="name" placeholder="Name of Product" aria-label=".form-control-sm example">
      </div>
      <div class="col">
        <input class="form-control form-control-sm" required  type="number" name="price" placeholder="Price of Product" aria-label=".form-control-sm example">
      </div>
      <div class="col">
        <input class="form-control form-control-sm" required  type="text" name="description" placeholder="Description of Product" aria-label=".form-control-sm example">
      </div>
      <div class="col">
        <input class="form-control form-control-sm" required  type="number" name="quantity" placeholder="Quantity of Product" aria-label=".form-control-sm example">
      </div>
      <div class="col">
        <input class="form-control form-control-sm" required  type="date" name="expire_date" aria-label=".form-control-sm example">
      </div>
      <div class="col">
        <button type="submit" class="btn btn-sm btn-success">Add Product</button>
      </div>
    </div>

  </form>

  

  <div class="border border-dark rounded mt-4 p-4">
    <h3 class="text-center">Product Data</h3>
    <table class="table table-dark table-striped rounded">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Description</th>
        <th scope="col">Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM product ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <th scope="row">
          <?php echo $row['id']  ?>
        </th>
        <td>
        <?php echo $row['name']  ?>
        </td>
        <td>
        $<?php echo $row['price']  ?>
        </td>
        <td>
        <?php echo $row['quantity']  ?>
        </td>
        <td>
        <?php echo $row['description']  ?>
        </td>
        <td>
        <?php echo $row['date']  ?>
        </td>
        <td>
          <a href="php/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary btn-sm" >Delete</a>
    
          <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" >Edit</a>
        </td>

      </tr>
      <?php
        }
        }else{
        echo "<div class='no_prod'><p>Add Data to View List</p></div>";
        }
      ?>

    </tbody>
  </table>


  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>