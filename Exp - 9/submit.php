<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $age = htmlspecialchars(trim($_POST['age']), ENT_QUOTES, 'UTF-8');

    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors['name'] = 'Name is required.';
    }

    // Validate age and ensure it is an integer greater than or equal to 18
    if (!filter_var($age, FILTER_VALIDATE_INT) || $age < 18) {
        $errors['age'] = 'You must be at least 18 years old.';
    }

    if (empty($errors)) {
        echo "<h2>Submission Successful!</h2>";
        echo "<p>Name: " . $name . "</p>";
        echo "<p>Age: " . $age . "</p>";
    } else {
        // Display errors
        foreach ($errors as $field => $error) {
            echo "<p style='color:red;'>" . ucfirst($field) . " error: $error</p>";
        }
        // Provide a link back to the form
        echo "<p><a href='index.html'>Go back</a></p>";
    }
}
?>
