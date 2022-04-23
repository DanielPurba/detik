# detik


1 . Download xampp if you done have it.
    // --> https://www.apachefriends.org/download.html
    // you can download from this site.

2. git clone this project on htdocs.

3. install composer
    // --> https://getcomposer.org/download/
    // you can download from this site.

4. configure .env as your database config.

5. cd app

6. composer install

7. composer update

8. run command vendor/bin/phinx init.

9. configure phinx.php as your database config.

10. run command vendor/bin/phinx migrate -e development.


1. run generate-ticket
    //open folder on terminal then run command php generate-tikcet.php 1 1000


2. run Get Ticket Status
    // open postman.
    // set method GET
    // input {localhost}/detik/app/Service/GetTicketStatus.php
    // {change with your path}
    // input params
    // event_id
    // ticket_code


3. run Update Ticket Status
    // open postman.
    // set method POST
    // input {localhost}/detik/app/Service/UpdateTicketStatus.php
    // {change with your path}
    // input params
    // event_id
    // ticket_code
    // status
