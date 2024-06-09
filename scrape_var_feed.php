<?php
$xml = simplexml_load_file('feed.xml');
$varNames = [];

foreach ($xml->item as $item) {
    foreach ($item as $element) {
        if (!in_array($element->getName(), $varNames)) {
            $varNames[] = $element->getName();
        }
    }
}

$filename = 'var_names.txt';

$file = fopen($filename, 'w') or die("Unable to open file!");

foreach ($varNames as $var) {
    fwrite($file, $var . PHP_EOL);
}

fclose($file);

echo "var names are saved in $filename\n";
?>