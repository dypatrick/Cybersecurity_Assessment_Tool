<?php

    header('Access-Control-Allow-Origin: *');

    date_default_timezone_set("America/New_York");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sdbc";
    $conn = new mysqli($servername, $username, $password, $database);

    if (!$conn) {
        echo("fail");
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo("success");
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

        $username = $_POST['USER_NAME'];
        $email = $_POST['USER_EMAIL'];
        $company = $_POST['COMPANY'];
        $department = $_POST['DEPARTMENT'];
        $jobtitle = $_POST['JOBTITLE'];
        $phone = $_POST['PHONE'];
        $address = $_POST['ADDRESS'];
        
        $pointEarned = $_POST['sp'];
        $passingPoint = $_POST['ps'];
        $time_used = $_POST['fut'];

        $search = $conn->query("SELECT id FROM users WHERE email = '$email'");

        if ($search->num_rows == 0) {
            //user not exists
            $sql = "INSERT INTO `users` (name, email, company, phone, address, department) VALUES ('$username', '$email', '$company', '$phone', '$address', '$department')";
            if ($conn->query($sql) === TRUE) {
                $user_id = $conn->insert_id;
                echo "New user record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $user_id = 0;
            }
        } else {
            $user_id = $search->fetch_assoc()['id'];
        }

        $sql = "INSERT INTO `results` (earned_point, passing_point, time_used, user_id) VALUES ('$pointEarned', '$passingPoint', '$time_used', '$user_id')";
        if (mysqli_query($conn, $sql)) {
            echo "Records 1 inserted successfully.";
        } else {
            echo "ERROR: Could not able to execute 1 $sql. " . mysqli_error($conn);
        }

        

        $conn->close();
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
