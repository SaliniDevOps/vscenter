<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

require_once("../../Connection/dbconnecting.php");

$today = date("Y-m-d");

$sql = "SELECT Date, SUM(SubTotal) as total_revenue 
        FROM invoice 
        WHERE Date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) 
        GROUP BY Date 
        ORDER BY Date";

$result = $db_handle->runQuery($sql); // Assuming $db_handle handles database connection and query execution

$data = array();
$categories = array();

// Process query result
if (!empty($result)) {
    foreach ($result as $row) {
        $data[] = (float) $row['total_revenue']; // Convert to float if necessary
        $categories[] = $row['Date'];
    }
}

$response = array(
    'data' => $data,
    'categories' => $categories
);

// Output JSON data
echo json_encode($response);

// Optionally, you can exit to prevent any further output
exit();
?>