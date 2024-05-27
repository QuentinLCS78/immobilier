<?php
// search_results.php
include 'database.php';

$search_query = $_GET['search_query'];

$query = "SELECT * FROM properties WHERE name LIKE ? OR address LIKE ?";
$stmt = $conn->prepare($query);
$search_term = "%" . $search_query . "%";
$stmt->bind_param("ss", $search_term, $search_term);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['name'] . " - " . $row['address'] . "</p>";
    }
} else {
    echo "Aucun résultat trouvé.";
}
$stmt->close();
$conn->close();
?>
