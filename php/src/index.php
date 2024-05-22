<!DOCTYPE html>
<html>
	<title>Get random phone number</title>
	<head>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
	<body>
<?php

	require 'vendor/autoload.php';

	$phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
	$country_regions = $phoneUtil->getSupportedRegions();

?>
	<div class="container">
		<h1>International phone number generator</h1>
		<form method= "POST" action ="gen.php" >
			<div class="form-group row">
				<label for="phone_count" class="col-sm-2 col-form-label">Number of Phone Numbers</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="phone_count" id="phone_count" placeholder="please enter a potitive number">
				</div>
			</div>
			<div class="form-group row">
				<label for="country_code" class="col-sm-2 col-form-label">Country Code</label>
				<div class="col-sm-10">
					<select name = "country_code" id ="country_code">
						<option disabled ="disabled" selected = "selected">
							Select A Country Code...
						</option>
				<?php
					foreach($country_regions as $region)
					{
						echo "<option value=".$region.">".$region." (+".$phoneUtil->getCountryCodeForRegion($region).")</option>";
					}
				?>
			</select>
				</div>
			</div>
			
			<div class="form-group row">
				<div class="col-sm-10">
					<button type="submit" name ="submit" class="btn btn-primary">Generate</button>
				</div>
			</div>
		</form>
	</div>
		
	</body>
</html>	
	