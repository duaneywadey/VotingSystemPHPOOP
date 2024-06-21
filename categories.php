<html lang="en">
<head>    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Hello, world!</title>
	<?php include 'includes/header.php'; ?>
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
	<?php include 'includes/footer.php'; ?>
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
</body>
</html>