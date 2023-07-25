# Smart Ticket laravel plugin

## Installation
  `composer require hamiddj/smart-ticket` <br />
  `php artisan migrate` <br />
  `php artisan vendor:publish for publish config file and views for customize` <br />

## Site routes
  /user/tickets  method:`get` => Return user tickets view<br />
  /user/tickets/create  method:`get` => Return create ticket view <br />
  /user/tickets  method:`post` => Store new ticket<br />
  /user/tickets/show/{id}  method:`get` => Return ticket's data view<br />
  /user/tickets/{id}/message  method:`post` => Answer the ticket<br />
### require 

    auth:[your user guard] <br />
    
  *you can change user gourd to your custom guard in `/config/smartticket.php` <br />
  
## admin routes
  /admin/tickets  method:`get` => Return all tickets view for admin<br />
  /admin/tickets/show/{id}  method:`get` => Return ticket's data view<br />
  /admin/tickets/{id}/message  method:`post` => Answer the ticket<br />
### require 

   auth:[your admin guard] <br />
  you can change admin gourd to your custom guard in `/config/smartticket.php` <br />
  
  
