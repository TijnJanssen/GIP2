<?php
include './dbh.php';
$html = "";

$date = $_POST['date'];
$period = $_POST['period'];
$classgroup = $_POST['classgroup'];

// Insert default status for users missing status for the selected date and period
$insertSql = "INSERT INTO user_status (userId, date, period, status)
SELECT uc.userId, ?, ?, 'Afwezig'
FROM user_classgroup uc
LEFT JOIN user_status us ON us.userId = uc.userId AND us.date = ? AND us.period = ?
WHERE uc.classgroupId = ? AND us.id IS NULL";
$insertStmt = $conn->prepare($insertSql);
$insertStmt->bind_param("sssss", $date, $period, $date, $period, $classgroup);
$insertStmt->execute();

// db connecten voor elk deel eerste stuk met joint
$sql = "SELECT u.firstname, u.lastname, uc.classgroupId, us.status, us.date  
FROM `user_classgroup` uc
LEFT JOIN `user_status` us ON us.userId = uc.userId AND us.date = ? AND us.period = ?
INNER JOIN `user` u ON u.id = uc.userId
WHERE uc.`schoolYear` = '2024-2025' AND uc.`classgroupId` = ?";
$statement = $conn->prepare($sql);
$statement->bind_param("sss", $date, $period, $classgroup);
$statement->execute();
$result = $statement->get_result();

// while omdat db
while ($row = $result->fetch_assoc()) {
    $status = $row['status'] ? $row['status'] : 'Geen status';
    $dateValue = $row['date'] ? $row['date'] : $date;
    $html .= '<tr>
            <td style="width:25%;">' . htmlspecialchars($row['firstname'] . ' ' . $row['lastname']) . '</td>
            <td style="width:25%;">' . htmlspecialchars($row['classgroupId']) . '</td>
            <td style="width:25%;">' . htmlspecialchars($status) . '</td>
            <td style="width:25%;">' . htmlspecialchars($dateValue) . '</td>
        </tr>';
}

echo json_encode($html);
