<?php

// Retrieve POST data
$participantCode = $_POST['ParticipantCode'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$filepathPrefix = "../results/GOLDMSI/";
$filepathPostfix = ".csv";

if (!is_dir($filepathPrefix)) {
    mkdir($filepathPrefix);
}

// Construct CSV data
$data = array(
    $participantCode,
    $email,
    $age,
    $gender
);

// Add CSV header if the file doesn't exist
if (!file_exists($filepathPrefix . 'results' . $filepathPostfix)) {
    $fp = fopen($filepathPrefix . 'results' . $filepathPostfix, 'w');
    fputcsv($fp, array('ParticipantCode', 'eMail', 'Age', 'Gender'));
    fclose($fp);
}

// Write data to CSV file
$fp = fopen($filepathPrefix . 'results' . $filepathPostfix, 'a');
fputcsv($fp, $data);
fclose($fp);

?>