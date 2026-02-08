<?php
include 'includes/db.php';

$stmt = $conn->prepare("SELECT * FROM events");
$stmt->execute();

$events = [];

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $events[] = [
        'id'=>$row['id'],
        'title'=>$row['title'],
        'start'=>$row['start_datetime'],
        'end'=>$row['end_datetime'],
        'extendedProps'=>[
            'requester'=>$row['requester_name'],
            'office'=>$row['office'],
            'contact'=>$row['contact'],
            'description'=>$row['description'],
            'status'=>$row['status']
        ]
    ];
}

echo json_encode($events);
?>