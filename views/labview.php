<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challange Labs</title>
    <link rel="shortcut icon" href="../assets/logo-main.svg" type="image/x-icon">
+
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/labview.css">
</head>

<body>
    <div class="lab-backgourd-cover"></divc>
    <div class="container mt-3">
        <div class="challange-card">
            <div class="d-flex">
                <img src="../assets/labthumline/xss.jpeg" alt="" class="challange-card-image" with="150px" height="200px">
                <div>
                <h4 class="px-2 py-1 challange-card-h1 ">Script Slinger Showdown</h4>
                    <p class="px-2">Welcome to the Cross-Site Scripting Showdown! In this challenge, you'll be stepping into the shoes of a cybersecurity expert, tasked with identifying and exploiting a basic XSS vulnerability</p>
                </div>

            </div>
            <div>
            <form action="submit_flag.php" method="post">
                      
                            <input type="text" class="challange-card-input" name="flag" placeholder="Enter the flag">
                     
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
<a href="./xsschallanges/xss.php" target="_blank" class="btn btn-Challenge mt-2 mx-2">Start Challenge</a>
                    <a href="learn.php" class="btn btn-secondary mt-2">Learn</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>