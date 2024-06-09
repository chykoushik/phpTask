<?php
function importDataFromXML($xml_file) {
    include('config_mysql.php'); 

    
    $xml = simplexml_load_file($xml_file);
    if (!$xml) {
        echo "Failed to load XML file: $xml_file\n";
        return;
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

        // Execute query and handle errors
        if ($conn->query($mysql) !== TRUE) {
            echo "Error occurred for entity_id: $entity_id\n";
        }
    }
}
?>
