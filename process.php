<?php
error_reporting(0);
$visa_message = '';
$app_message = '';
$message_type = '';
$passport_value = '';
$visa_country = '';
$apply_country = '';

// Process Visa Check Form
if(isset($_POST['check_visa'])){
    $visa_country = $_POST['visa_country'] ?? '';
    
    switch($visa_country){
        case 'USA':
            $visa_message = "ℹ️ Visa required for most applicants!";
            break;
        case 'Canada':
            $visa_message = "ℹ️ Visa required unless you have an eTA!";
            break;
        case 'India':
            $visa_message = "ℹ️ Visa required before travel!";
            break;
        case 'UK':
            $visa_message = "ℹ️ Visa depends on stay duration!";
            break;
        case 'AUS':
            $visa_message = "ℹ️ eVisa available for eligible travelers!";
            break;
        default:
            $visa_message = ' Please select a valid country!';
    }
}

// Process Application Form
if(isset($_POST['apply_visa'])){
    $passport = $_POST['passport'] ?? '';
    $apply_country = $_POST['apply_country'] ?? '';
    $passport_value = htmlspecialchars($passport);

    if(empty($passport) || empty($apply_country)){
        $app_message = " Error: All fields are required!";
        $message_type = 'error';
    }
    elseif(strlen($passport) < 8 || strlen($passport) > 10){
        $app_message = "Error: Invalid passport number!";
        $message_type = 'error';
    }
    else {
        $app_message = " Success! Application submitted!";
        $message_type = 'success';
    }
}
?>