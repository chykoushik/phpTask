<?php
include('config_mysql.php');

$xml = simplexml_load_file('feed.xml') or logError("Error: Cannot create object");

//for errors.log file
if (!$xml) {
    logError("Failed to load XML file.");
    die("Failed to load XML file.");
}

foreach ($xml->item as $item) {
    $entity_id = $conn->real_escape_string($item->entity_id);
    $CategoryName = $conn->real_escape_string($item->CategoryName);
    $sku = $conn->real_escape_string($item->sku);
    $name = $conn->real_escape_string($item->name);
    $description = $conn->real_escape_string($item->description);
    $shortdesc = $conn->real_escape_string($item->shortdesc);
    $price = $conn->real_escape_string($item->price);
    $link = $conn->real_escape_string($item->link);
    $image = $conn->real_escape_string($item->image);
    $Brand = $conn->real_escape_string($item->Brand);
    $Rating = $conn->real_escape_string($item->Rating);
    $CaffeineType = $conn->real_escape_string($item->CaffeineType);
    $Count = $conn->real_escape_string($item->Count);
    $Flavored = $conn->real_escape_string($item->Flavored);
    $Seasonal = $conn->real_escape_string($item->Seasonal);
    $Instock = $conn->real_escape_string($item->Instock);
    $Facebook = $conn->real_escape_string($item->Facebook);
    $IsKCup = $conn->real_escape_string($item->IsKCup);

    $mysql = "INSERT INTO products (entity_id, CategoryName, sku, name, description, shortdesc, price, link, image, Brand, Rating, CaffeineType, Count, Flavored, Seasonal, Instock, Facebook, IsKCup)
    VALUES ('$entity_id', '$CategoryName', '$sku', '$name', '$description', '$shortdesc', '$price', '$link', '$image', '$Brand', '$Rating', '$CaffeineType', '$Count', '$Flavored', '$Seasonal', '$Instock', '$Facebook', '$IsKCup')";

    if ($conn->query($mysql) === TRUE) {
        echo "Data pushed to Database for entity_id: $entity_id\n";
    } else {
        logError("Error: " . $mysql . "\n" . $conn->error);
        echo "Error occurred for entity_id: $entity_id\n";
    }
}

$conn->close();

// for errors.log file
function logError($error_message) {
    $timestamp = date("Y-m-d H:i:s");
    $log_file = __DIR__ . '/errors.log';
    file_put_contents($log_file, "[$timestamp] $error_message\n", FILE_APPEND);
}
?>
