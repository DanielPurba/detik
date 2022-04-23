<?php
    include($_SERVER['DOCUMENT_ROOT'].'/detik/app/connection.php');
    date_default_timezone_set('Asia/Jakarta');

    global $connection;

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        http_response_code(405);
        exit();
    }

    $url = $_SERVER['REQUEST_URI'];
    $components = parse_url($url, PHP_URL_QUERY);
    parse_str($components, $params);

    $eventId        = $params['event_id'];
    $ticketCode     = $params['ticket_code'];
    $status         = $params['status'];
    $now            = date('Y-m-d H:i:s');

    $query = "UPDATE tickets SET
        status = '". $status ."'
        updated_at = '". $now ."'
        WHERE event_id = ". $eventId ."
        AND ticket_code = '".  $ticketCode ."'";

    $result = $connection->query($query);

    if ($result) {

        $ticketData = [
            'ticket_code' => $ticketCode,
            'status'      => $status,
            'updated_at'  => $now
        ];

        echo json_encode($ticketData);
    } else {
        echo 'Update data failed';
    }
?>
