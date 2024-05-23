<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "joy_school";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Gather form data
    $student_name = $conn->real_escape_string($_POST['student_name']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $class = $conn->real_escape_string($_POST['class']);
    $parent_name = $conn->real_escape_string($_POST['parent_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into database
    $sql = "INSERT INTO admissions (student_name, dob, gender, class, parent_name, email, phone, address, message) VALUES ('$student_name', '$dob', '$gender', '$class', '$parent_name', '$email', '$phone', '$address', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Send thank you email
        $to = $email;
        $subject = "Thank you for your application";
        $body = "Dear $student_name,\n\nThank you for applying to Joy International School. We have received your application and will review it shortly.\n\nBest regards,\nJoy International School";
        $headers = "From: admin@joyinternationalschool.com";

        mail($to, $subject, $body, $headers);

        // Redirect back to the admissions page with a success message
        header("Location: admissions.html?status=success");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect back to the admissions page
    header("Location: admissions.html");
    exit();
}
?>
