<!DOCTYPE html>
<html>
  <head>
    <title>Bob's Auto Parts - Order Results</title>
  </head>
  <body>
    <h1>Bob's Auto Parts</h1>
    <h2>Order Results</h2>
    <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $tireqty = $_POST['tireqty'];
        $oilqty = $_POST['oilqty'];
        $sparkqty = $_POST['sparkqty'];
        $html = '<p>Order processed at: '
                . date('H:i, jS F Y')
                . '</p>'
                . '<li>Tires: %d </li>'
                . '<li>Oil: %d </li>'
                . '<li>Spark Plugs: %d </li>';
        echo sprintf($html, $tireqty, $oilqty, $sparkqty);

        $pathFiles = $path . '/I/files/%s';
        $fileName  = 'file_' . (new Datetime())->getTimestamp() . 'txt';
        $fp = fopen(sprintf($pathFiles, $fileName), 'wb');
    ?>
  </body>
</html>
