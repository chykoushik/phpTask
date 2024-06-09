<?php
include('config_mysql.php'); 

//include import_data.php
include('import_data.php'); 


importDataFromXML('test_feed.xml');

// Generate report
$report = "Database Report:\n";
$result = $conn->query("SELECT COUNT(*) as count FROM products");
$row = $result->fetch_assoc();
$report .= "Total Pushed: " . $row['count'] . "\n";


$report_file = 'database_report.txt';
file_put_contents($report_file, $report);
echo "Total Pushed: $report_file\n";
?>
