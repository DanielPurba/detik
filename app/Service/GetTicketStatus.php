<?php
    include($_SERVER['DOCUMENT_ROOT'].'/detik/app/connection.php');
    
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
        http_response_code(405);
        exit();
    }

    $url = $_SERVER['REQUEST_URI'];
    $components = parse_url($url, PHP_URL_QUERY);
    parse_str($components, $params);

    if (empty($params['event_id']) || empty($params['ticket_code'])) {
        echo 'Please input Params.';
        die;
    }

    $eventId = (int) $params['event_id'];
    $ticketCode = $params['ticket_code'];
    
    $query = "SELECT ticket_code, status 
        FROM tickets
        WHERE event_id = ". $eventId ."
        AND ticket_code = '".  $ticketCode ."'";

    $result     = $connection->query($query);

    if ($result) {
        $ticketData = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($ticketData);
    } else {
        echo "Data not found.";
    }

?>