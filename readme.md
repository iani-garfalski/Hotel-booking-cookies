# Hotel Booking API Documentation

## Overview
The Hotel Booking API is designed to manage hotel operations such as room bookings, customer management, and payment processing, as well as notifications for hotel staff when bookings are created or canceled.

## Models and Relationships

## Models
Room: Represents a hotel room.
Customer: Represents a customer.
Booking: Represents a booking made by a customer.
Payment: Represents a payment made for a booking.

### Relationships
A Room can have many Bookings.
A Booking belongs to one Room and one Customer.
A Customer can have many Bookings.
A Booking can have many Payments.


To use this api, please clone it and write the following artisan commands


`php artisan migrate`
`php artisan seed`


Then you can view the database using the default mysql credentials

user: root
password: root


## API endpoints:

### Room endpoints:

URL: /api/rooms
Method: GET
Description: retrieves all rooms.


URL: /api/rooms
Method: POST
Description: Create a new room.

URL: /api/rooms/{id}
Method: GET
Description: Retrieve a specific room by ID.


### Customer endpoints:

URL: /api/customers
Method: GET
Description: Retrieve a list of all customers.

URL: /api/customers
Method: POST
Description: Create a new customer.

URL: /api/customers/{id}
Method: GET
Description: Retrieve a specific customer by ID.


### Booking endpoints:

URL: /api/bookings
Method: GET
Description: Retrieve a list of all bookings.

URL: /api/bookings
Method: POST
Description: Create a new booking.
Event: Will log a message to notify staff 

URL: /api/bookings/{id}
Method: GET
Description: Retrieve a specific booking by ID.

URL: /api/bookings/{id}
Method: DELETE
Description: Delete a specific booking by ID.
Event: Will log a message to notify staff 

### Payment endpoints:

URL: /api/payments
Method: GET
Description: Retrieve a list of all payments.

URL: /api/payments
Method: POST
Description: Create a new payment.

URL: /api/payments/{id}
Method: GET
Description: Retrieve a specific payment by ID.

## Event and Listener System:

## Events
BookingCreated: Triggered when a new booking is created.
BookingCanceled: Triggered when a booking is deleted.

## Listeners
SendBookingNotification: Listens for the BookingCreated and BookingCanceled
events and sends notifications to hotel staff.


## Running unit tests:

Only the model relations unit tests have been implemented.
There is also a env for test and a database for testing.
Please write the following artisan command to run the test

`php artisan test`




