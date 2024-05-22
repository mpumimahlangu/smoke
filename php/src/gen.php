<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
                background-color: #04AA6D;
                color: white;
            }
        </style>
    </head>
    <body>
<?php
    require 'vendor/autoload.php';

    if(isset($_POST['submit']))
    {
        if(($_POST['phone_count'] <= 0) || ($_POST['phone_count'] == "")){
            echo "<div class='alert alert-danger' role='alert'><h1>An error has occured.</h1>Please insert a positive number</div>";
            echo "<p><a href='http://localhost:8080/' class='link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>
            <button type='button' class='btn btn-success'>Back</button></a></p>
            ";
        }
        elseif($_POST['country_code'] == ""){
            echo "<div class='alert alert-danger' role='alert'><h1>An error has occured.</h1>Please select a country code</div>";
            echo "<p><a href='http://localhost:8080/' class='link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>
            <button type='button' class='btn btn-success'>Back</button></a></p>
            ";
        }
        else{
            $country_code = $_POST['country_code'];
            $phone_count = $_POST['phone_count'];

            /*$client = new MongoDB\Client;
            $selected_db = $client->smoke;
            $phone_number_collection = $selected_db->phone_number_collection;
            
            */
            
            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
            $country_regions = $phoneUtil->getSupportedRegions();

            function getRandomPhones($phone_count, $country_code)
            {
                //Get number example format of the selected country
                $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

                $number_example = $phoneUtil->getExampleNumber($country_code);
                $number_format = $phoneUtil->format($number_example, \libphonenumber\PhoneNumberFormat::E164);
                $region_code = "+".$phoneUtil->getCountryCodeForRegion($country_code);
                
                $check_num = substr($number_format, strlen($region_code));
                $phone_arr =[];
                $numberLength = strlen($check_num);

                $randomNumber = '';
                for ($i = 0; $i < $numberLength; $i++) {
                    $randomNumber .= 1;
                }
                for($i = 1;$i<=$phone_count;$i++){
                    $randnum = rand($randomNumber,$check_num);
                    $randnum = $region_code.$randnum;
                    $push = array_push($phone_arr, $randnum);
                    
                }

                return $phone_arr;
            }

            $phone_range =getRandomPhones($phone_count, $country_code);
            
            echo "<p><a href='http://localhost:8080/' class='link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>
            <button type='button' class='btn btn-success'>Back</button></a></p>
            ";
            echo " <table>
                        <tr>
                            <th>Phone Number</th>
                            <th>Country Code</th>
                            <th>Phone Number Type</th>
                            <th>phone number matches the possible phone number length</th>
                            <th>phone number is valid for the country</th>
                        </tr>
                    
                    ";
                        foreach($phone_range as $phone_number)
                        {
                            echo "<tr>";
                            echo "<td>".$phone_number."</td>";
                            echo "<td>".$country_code."</td>";
                            $phoneNumberObject = $phoneUtil->parse($phone_number, $country_code);
                            $phone_number_type = $phoneUtil->getNumberType($phoneNumberObject);
                            echo "<td>". $phone_number_type."</td>";
                            echo "<td>Unknown</td>";
                            
                            $region_code = $phoneUtil->getCountryCodeForRegion($country_code);
                            $isValid = $phoneUtil->isValidNumberForRegion($phoneNumberObject, $country_code);
                            echo "<td>". json_encode($isValid)."</td>";
                            /*if (json_encode($isValid) == true){
                                $insert_result = $phone_number_collection->insertOne([
                                    ['phone_number' => $phone_number, 'country_code' => $country_code, 'phone_number_type' => $phone_number_type,
                                    'correct_format' => 'Unknown', 'isValid' => $isValid]
                                ]);
                            }*/
                            echo "</tr>";
                        }
                    echo "
                        </tr>
                    </table>
            ";
            $number_example = $phoneUtil->getExampleNumber($country_code);
            $number_format = $phoneUtil->format($number_example, \libphonenumber\PhoneNumberFormat::E164);
                $region_code = "+".$phoneUtil->getCountryCodeForRegion($country_code);
                
                $check_num = substr($number_format, strlen($region_code));
            $numberLength = strlen($check_num);
                $randomNumber = '';
                for ($i = 0; $i < $numberLength; $i++) {
                    $randomNumber .= 1;
                }
        }
    }
?>