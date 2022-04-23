<?php 
    require(getcwd().'/connection.php');
    
    function generateTicket($eventId, $totalTicket) {
        global $connection;
        $randomChar = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        $listTickets = [];
        for ($i=1;$i<=$totalTicket;$i++) {
            $ticketCode = "DTK". substr(str_shuffle($randomChar), 1, 7);
            $listTickets[] = '('. $eventId .',"'. $ticketCode .'")'; 
        }

        $query = "INSERT INTO tickets 
            (event_id, ticket_code) 
            VALUES ". implode(',', $listTickets);

        $result = $connection->query($query);

        if ($result) {
            echo 'Ticket inserted.';
        } else {
            echo 'Failed to insert Ticket.';
        }
    }

    if (empty($argv[1]) || empty($argv[2])) {
        echo  'Please input params.';
        die;
    }

    $eventId = $argv[1];
    $totalTicket = $argv[2];

    generateTicket($eventId, $totalTicket);
?>