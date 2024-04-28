<!DOCTYPE html>
<html>
<head>
    <title>Vulnerable XSS Page</title>
</head>
<body>
    <h1>Guest Book</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="comment">Leave a comment:</label><br>
        <textarea id="comment" name="comment"></textarea><br>
        <input type="submit" value="Submit">
    </form>
    <hr>
    <h2>Comments:</h2>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $comment = $_POST["comment"];
            echo "<p>" . $comment . "</p>"; // Vulnerable output

            // Check if the comment contains any <script> tags
            if (stripos($comment, "<script") !== false) {
                echo "<p>Flag: FLAG123456789</p>"; // Display flag
            }
        }
    ?>
</body>
</html>
