<?php

    header('Access-Control-Allow-Origin: *');

    date_default_timezone_set("America/New_York");
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "sdbc";
    // $conn = new mysqli($servername, $username, $password, $database);
    $conn = new PDO('sqlite:D:\Work\Project\Capstone\SBDC\database\database.sqlite');

    if(!$conn){
        echo $conn->lastErrorMsg();
     } else {
        echo "Opened database successfully\n";
     }

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo "POST request expected";
        return;
    }

    error_reporting(E_ALL && E_WARNING && E_NOTICE);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);

    require_once 'includes/common.inc.php';
    
    $requestParameters = RequestParametersParser::getRequestParameters($_POST, !empty($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : null);
    _log($requestParameters);

    try {
        $quizResults = new QuizResults();
        $quizResults->InitFromRequest($requestParameters);
        $generator = QuizReportFactory::CreateGenerator($quizResults, $requestParameters);
        $report = $generator->createReport();
        $dateTime = date('Y-m-d_H-i-s');
        $resultFilename = dirname(__FILE__) . "/result/quiz_result_{$dateTime}.txt";
        @file_put_contents($resultFilename, $report);

        $name = $_POST['USER_NAME'];
        $username = $_POST['USERNAME'];
        $password = $_POST['PASSWORD'];
        $email = $_POST['USER_EMAIL'];
        $company = $_POST['COMPANY'];
        $industry = $_POST['INDUSTRY'];
        $jobtitle = $_POST['JOBTITLE'];
        $phone = $_POST['PHONE'];
        $address = $_POST['ADDRESS'];
        $city = $_POST['CITY'];
        $state = $_POST['STATE'];
        $zipcode = $_POST['ZIPCODE'];
        $pointEarned = $_POST['sp'];
        $passingPoint = $_POST['ps'];
        $time_used = $_POST['fut'];

        $search = $conn->query("SELECT id FROM users WHERE email = '$email'");
        $temp = $search->fetchColumn();
        if ($temp  == 0) {
            //user not exists
            $sql = "INSERT INTO `users` (name, username, password, email, company, phone, address, industry, city, state, zipcode, role, isactive) VALUES ('$name', '$username', '$password', '$email', '$company', '$phone', '$address', '$industry', '$city', '$state', '$zipcode', 'user', 1)";
            $conn->query($sql);
            $user_id = $conn->lastInsertId();
        } else {
            $user_id = $temp;
        }

        $sql = "INSERT INTO `results` (earned_point, passing_point, time_used, user_id) VALUES ('$pointEarned', '$passingPoint', '$time_used', '$user_id')";
        if ($conn->query($sql) === TRUE) {
            echo "Records 1 inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        

        //$conn->close();
        $conn = null;
    } catch (Exception $e) {
        error_log($e);

        echo "Error: " . $e->getMessage();
    }

    function _log($requestParameters)
    {
        $logFilename = dirname(__FILE__) . '/log/quiz_results.log';
        $event       = array('ts' => date('Y-m-d H:i:s'), 'request_parameters' => $requestParameters, 'ts_' => time());
        $logMessage  = json_encode($event);
        $logMessage .= ',' . PHP_EOL;
        @file_put_contents($logFilename, $logMessage, FILE_APPEND);
    }
