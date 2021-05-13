# Surgery Management API
Laravel surgery management Api with passport for authentication

## Installation

```bash
clone project
cd into root directory
run composer install
run npm install
run php artisan migrate (sql file can be found within database folder instead)
run php artisan key:generate 
run php artisan serve
```


## User stories

As a receptionist:

You are able to use the system to add, view, update and delete patients<br />
You are able to select a patient and see their surgeries<br />
You are able to view a list of all the doctors and optionally view their surgeries<br />
You are able to see a list of all the rooms and optionally view ther surgeries assigned to it<br />



As a doctor:

You are able to see a list of all my surgeries (alone)<br />
You are able to see a list of all patients<br />
You are able to create a surgery for a patient<br />
You are able to see a list of available rooms for surgery for a given time period (to be used for a surgery)<br />
You are able to see all available doctors for a surgery for a particular time period (to be assigned to a surgery)<br />



As an admin:

You are able to check the schedule of any doctor or room as well as perform all the functions of a doctor or receptionist in the system<br />
You are able to create update or delete staff<br />
You are able to create update or delete rooms<br />

## Authentication
Laravel passport: Laravel Passport is a full OAuth2 server implementation, it was built to make it easy to apply authentication over an API for Laravel based web applications. the passport package will register its own database tables. This command will create the encryption keys needed to generate secure access tokens.

