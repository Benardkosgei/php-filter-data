<!DOCTYPE html>
<html>
<head>
	<title>Filter data on price</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<div class="card mt-5">
				<div class="card-header">
					<h4>Filtering data based on prices from database...in php mysqli'</h4>
				</div>
				<div class="card-body">
					<form method="GET" action="">
					<div class="row">
						<div class="col-md-4">
							<label for="">Start Price</label>
							<input type="text" name="start_price" value="<?php if (isset($_GET['start_price'])) {echo $_GET['start_price'];} else {echo '100';}?>" class="form-control">

						</div>
						<div class="col-md-4">
							<label for="">End Price</label>
							<input type="text" name="end_price" value="<?php if (isset($_GET['start_price'])) {echo $_GET['end_price'];} else {echo '800';}?>" class="form-control">

						</div>
						<div class="col-md-4">
							<label for="">Click this Guy</label><br/>
							<button type="submit" class="btn btn-primary px-4">Filter Things</button>

						</div>

					</div>
				</form>

				</div>

			</div>

		</div>
		<div class="col-md-12 pt-5">
			<div class="card">
				<div class="card-header">
					<h5>Product Details</h5>
				</div>
				<div class="card-body">
					<div class="row">
					<?php
$con = mysqli_connect("localhost", "root", "", "test");
if ($con) {
    if (isset($_GET['start_price']) && isset($_GET['end_price'])) {
        $start_price = $_GET['start_price'];
        $end_price   = $_GET['end_price'];
        $query       = mysqli_query($con, "SELECT * FROM phones WHERE price BETWEEN $start_price AND $end_price");

    } else {
        $query = mysqli_query($con, "SELECT * FROM phones");
    }

    if (mysqli_num_rows($query) > 0) {
        foreach ($query as $phone) {
            //echo $phone['name'];
            ?>
            <div class="col-md-4">
            	<div class="border p-2 mb-4">
            	<h5><?php echo $phone['name']; ?></h5>
            	<h6><?php echo $phone['price']; ?></h6>
            </div>

            </div>
         <?php
}

    } else {
        echo "No records found";
    }

}
?>                </div>
				</div>
			</div>
		</div>

	</div>

</body>
</html>
