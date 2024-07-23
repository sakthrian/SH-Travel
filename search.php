<?php
include("php/config.php");

$query = $_GET['query'] ?? '';

$sql = "SELECT * FROM packages";
if ($query) {
    $query = "%$query%";
    $sql .= " WHERE package_name LIKE ?";
}

$stmt = $con->prepare($sql);
if ($query) {
    $stmt->bind_param('s', $query);
}
$stmt->execute();
$result = $stmt->get_result();

$boxes = '';
while ($row = $result->fetch_assoc()) {
    $boxes .= '
    <div class="box" data-title="' . htmlspecialchars($row['package_name']) . '">
        <div class="images">
            <img src="images/' . htmlspecialchars($row['image']) . '" alt="">
        </div>
        <div class="content">
            <h3>' . htmlspecialchars($row['package_name']) . '</h3>
            <p>' . htmlspecialchars($row['description']) . '</p>
            <a href="morename.php?package=' . urlencode($row['package_name']) . '" class="btn">More</a>
            <a href="book.php" class="btn">Book now</a>
        </div>
    </div>';
}

echo $boxes;
