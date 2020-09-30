<?php
    require_once __DIR__ . '\a.php';
    // _p($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captch</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="top">
        <p>Select all images below that match this one:</p>
        <img id="<?= $data[0]['id'] ?>" src="<?= $data[0]['imagePath'] ?>" alt="pic">
    </div>
    <div class="bottom">
        <?php
        foreach($data as $key => $val) {
            if($key !== 0) {
                $id = $val['id'];
                $path = $val['imagePath'];
                echo "<input type=\"checkbox\" name=\"$id\" id=\"$id\">";
                echo "<label for=\"$id\"><div class=\"overlay\"></div><img src=\"$path\" alt=\"pic\"></label>";
            }
        }
        ?>
    </div>
    <div class="verify">
        <div id="verify">Verify</div>
    </div>
    <div class="answer">
        <div class="message">-</div>
        <div id="verify">Try again</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="axios.js"></script>
</body>
</html>