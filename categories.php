<html lang="en">
<head>    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="includes/styles.css">
	<title>Hello, world!</title>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>

	<div class="container">
		<div class="row">
			<h1 class="mt-4">Make Sure All Entries Are Filled</h1>
			<div class="col-md-12">
				<div class="card mt-4">
					<div class="card-header">Category1</div>
					<div class="card-body">
						<form action="php/categories.php" method="POST">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
								<label class="form-check-label" for="exampleRadios1">
									Default radio
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
								<label class="form-check-label" for="exampleRadios1">
									Default radio
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
								<label class="form-check-label" for="exampleRadios1">
									Default radio
								</label>
							</div>
							<button type="submit" class="btn btn-primary mt-4">Submit</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card mt-4">
					<div class="card-header">Category1</div>
					<div class="card-body">
						<form action="php/categories.php" method="POST">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
								<label class="form-check-label" for="exampleRadios1">
									Default radio
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
								<label class="form-check-label" for="exampleRadios1">
									Default radio
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
								<label class="form-check-label" for="exampleRadios1">
									Default radio
								</label>
							</div>
							<button type="submit" class="btn btn-primary mt-4">Submit</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card mt-4">
					<div class="card-header">Category1</div>
					<div class="card-body">
						<form action="php/categories.php" method="POST">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
								<label class="form-check-label" for="exampleRadios1">
									Default radio
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
								<label class="form-check-label" for="exampleRadios1">
									Default radio
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
								<label class="form-check-label" for="exampleRadios1">
									Default radio
								</label>
							</div>
							<button type="submit" class="btn btn-primary mt-4">Submit</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card mt-4">
					<div class="card-header">Multi Select</div>
					<div class="card-body">
						<form action="php/categories.php" method="POST">
							<div class="form-check">
								<input class="multi-select form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
								<label class="form-check-label" for="inlineCheckbox1">1</label>
							</div>
							<div class="form-check">
								<input class="multi-select form-check-input" type="checkbox" id="inlineCheckbox1" value="2">
								<label class="form-check-label" for="inlineCheckbox1">1</label>
							</div>
							<div class="form-check">
								<input class="multi-select form-check-input" type="checkbox" id="inlineCheckbox1" value="3">
								<label class="form-check-label" for="inlineCheckbox1">1</label>
							</div>
							<div class="form-check">
								<input class="multi-select form-check-input" type="checkbox" id="inlineCheckbox1" value="4">
								<label class="form-check-label" for="inlineCheckbox1">1</label>
							</div>
							<div class="form-check">
								<input class="multi-select form-check-input" type="checkbox" id="inlineCheckbox1" value="option5">
								<label class="form-check-label" for="inlineCheckbox1">1</label>
							</div>
							<button type="submit" class="btn btn-primary mt-4">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		const fruits = []


		$('.multi-select').change(function(e){
			var ischecked= $(this).is(':checked');

			if ($('.multi-select:checked').length > 3) {
				$(this).prop('checked',false);
				alert("allowed only 3");

				if(!$('.multi-select:checked')) {
					$(this).prop('disabled',true);
				}
			}

		})

	</script>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>