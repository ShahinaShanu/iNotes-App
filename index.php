<?php 
$insert=false;
$server='localhost';
$username='root';
$pwd='';
$dbname='notedb';
$con=mysqli_connect($server,$username,$pwd,$dbname);
if(!$con){
    die('connection failed due to ' . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD']=='POST'){
            $title=$_POST['title'];
            $descript=$_POST['description'];
            $ins=mysqli_query($con, "INSERT INTO `crud` (`ttle`, `descriptn`) VALUES ('$title', '$descript');" );
      if($ins){
        $insert=true;
      }
            
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<?php 
    if($insert){
   echo "Your note has been added";
  }

?>
<div class="container my-5 col-md-6">
<h2 style="text-align:center">iNotes App</h2>
<form action='\Recent PHP Project\index.php' method='post'>
<div class="mb-3">
  <label for='title' class="form-label ">Title</label>
  <input type="text" class="form-control" name='title' id='title' placeholder='Enter title here' required>
</div>
<div class="mb-3">
  <label  for='description' class="form-label">Note</label>
  <textarea class="form-control" name='description' id='description' rows="3" placeholder='Enter your note' required></textarea>
</div>
<button name='sb' class="btn btn-primary" type="submit">Add Note</button>
</form>
</div>
<div class="container my-5 col-md-6">
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">SNO</th>
      <th scope="col">Title</th>
      <th scope="col">Note</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>

<tbody>
<?php 
$query="SELECT * FROM `crud`";
$sel=mysqli_query($con, $query);
$sno=0;
while($row=mysqli_fetch_assoc($sel))
{
  $sno++;
  // echo var_dump($row);
  echo  "<tr>
  <th scope='row'>". $sno ."</th>
  <td>". $row['ttle'] ."</td>
  <td>". $row['descriptn'] ."</td>
  <td><a href=''>Edit</a>/<a href=''>Delete</a></td>
</tr>";
}

  ?>
    
   </tbody>

  
</table>
</div>
<div class="container">

</div>
<div id="footer" class="bg-black">
</div>

<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>