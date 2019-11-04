<?php 
	session_start();
	$user=$_SESSION["user"];
	$userName = "";
    if(isset($user))
		$userName = $_SESSION["user"][0];
    else
		header("location:login.php");
	
	include_once 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý danh bạ</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<style type="text/css">
		body {
			font-size: 15px;
			font-family: sans-serif;
		}
		.pagination > a:hover {
			text-decoration: none;
		}
		.pagination > a {
			margin: 0 15px;
			color: #4254f5;

			
		}
		span {
			color : #f54242;
		}
		i.fas {
			font-size: 13px;
		}
		th , tr {
			text-align: center;
		}

	</style>
</head>
<body>
	<div class="account float-right">
		<h6 class="d-inline"><?php echo $userName; ?></h6>
		<a onclick="return confirm('Bạn có thực sự muốn đăng xuất!')"; class="btn btn-light" href="logout.php"></i> Logout</a>
	</div>
	
	<div class="container pt-3">
        <h3 class="text-center text-monospace pb-2">Contacts</h3>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" ><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
        	<input type="text" class="form-control" placeholder="Search" name="txtSearch">
        </div>
		<a class="text-white btn btn-success float-right mb-3" href="insert.php"><i class="fas fa-plus-circle"></i> Create</a>
		<div class="shadow">
			<table class="table table-bordered mt-4">
				<thead class="thead-dark">
					<tr>
						<th scope="col"></th>
						<th scope="col">Name</th>
						<th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$count = 0;
						include_once 'conn.php';
						$q = " SELECT * FROM danhba INNER JOIN user ON danhba.maus=user.maus  ORDER BY name";
						$query = mysqli_query($con,$q);
						while ($row = mysqli_fetch_assoc($query)) {  
							if($row['username'] == $userName){
								$count = $count + 1;
					?>
					<tr>
						<td><?php echo strtoupper($row['name'][0]); ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['phone']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td>
							<div class="d-flex justify-content-center">
								<a class="text-white btn btn-warning mr-2" href="update.php?ma=<?php echo $row['ma']; ?>"><i class="fas fa-edit"></i> Edit</a>
								<a onclick="return confirm('Bạn có thực sự muốn xóa nó')"; class="text-white btn btn-danger" href="delete.php?ma=<?php echo $row['ma']; ?>"><i class="fas fa-trash-alt"></i> Delete</a>
							</div>
						</td>
					</tr>
				<?php 
							}
					}
				 ?>
				</tbody>
			</table>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>