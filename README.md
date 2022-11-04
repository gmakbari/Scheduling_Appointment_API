# Restful API for Scheduling Appointment

### API design
You are asked to design a simple appointment scheduling API that allows clinicians to create available "blocks" of time that are visible for patients to select.
The API will be designed to allow the clients to send their blocks of time in JSON format in a single request send multiple available records and the API succeed, returns with success message with status code 200 otherwise, the API responses with exception error message with related status code to inform the client what is missing, or the request is empty.
The API will be accessible with Bearer Token which should be generated in backend side and require a user account.

Unit test is applied for just one endpoint creating blocks of time as sample.

### API choice
To design and create such a system, we have different approaches like REST and SOAP API. We are going to select REST API for this because it is very light wight, fast, scalable, extendable, etc and support JSON data format.

### Frameworks
We are going to choose the Laravel MVC framework to design this API because Laravel is a fine choice for PHP developers to use for building an API, especially when a project's requirements are not precisely defined. It's a comprehensive framework suitable for any kind of web development, is logically structured, and enjoys strong community support.

### Database
MySQL RDBMS
 Tables (entities)
1 – appointment_time: Storing all blocks of time with their status which reserved or available.
2 – reserved_time: Storing reserved time and patients’ records
3 – clinician: Storing basic details about clinicians

Diagram there just get method mentioned but there supports multiple methods like `POST`, `PUT` and `DELETE` as well. 

![This is an image](https://github.com/gmakbari/eComRestAPI/blob/master/public/diagram.png)

Some basic endpoints which will be available for clinicians to deal with their scheduling appointments.
1.	Create blocks of time
2.	List all available times
3.	Get specific time details
4.	Update specific details of time
5.	Delete specific time

### Create blocks of time
http://localhost:8000/api/create-time-block
```
Route::post("create-time-block",'App\Http\Controllers\AppointmentTimeController@store');
```
#### Request
```
{
    "data": [
        {
        "date": "2022-11-3",
        "time": "9:00",
        "clinician_id": 1
        },
        {
        "date": "2022-11-3",
        "time": "8:00",
        "clinician_id": 1
        }
    ]
}
```
#### Response
```
[
    {
        "date": "2022-11-3",
        "time": "9:00",
        "status": 1,
        "clinician_id": 1
    },
    {
        "date": "2022-11-3",
        "time": "8:00",
        "status": 1,
        "clinician_id": 1
    }
]
```

### Get all available appointment times
http://localhost:8000/api/times

```
Route::get('times', 'App\Http\Controllers\AppointmentTimeController@index');
```

#### Responses
```
{
    "data": [
        {
            "date": "2022-11-04",
            "time": "16:44:00",
            "status": 1,
            "clinician_id": 2
        },
        {
            "date": "2022-11-04",
            "time": "16:47:00",
            "status": 1,
            "clinician_id": 2
        },
        {
            "date": "2022-11-04",
            "time": "16:48:00",
            "status": 1,
            "clinician_id": 2
        },
        {
            "date": "2022-11-04",
            "time": "16:48:00",
            "status": 1,
            "clinician_id": 2
        },
        {
            "date": "2022-11-03",
            "time": "09:00:00",
            "status": 1,
            "clinician_id": 1
        },
        {
            "date": "2022-11-03",
            "time": "08:00:00",
            "status": 1,
            "clinician_id": 1
        }
    ]
}
```

### There are other endpoints available for client to use them like updating existing records, removing or getting back the details of a specific time record.

### Guide line on how to setup the project
Frist of clone the repository in your local server

Go inside the project directory
`cd Scheduling_Appointment_API`

Run `composer update`

Run the below command to create tables and migration and do not forget to create database and replace in the `env` file before.
`php artisan migrate`

Inserting some fake data by factory already configured in the project
`php artisan db:seed`

Create a token key for the client to be able using the API
```
php artisan tinker
$user = User::first();
$user->createToken('token-name');
```
Copy the generated bearer token and use it to test the api like below:
```
+plainTextToken: "12|VuALmjwNK7N0rlkM8hfyg7Aavolmlsk1MVj9RB3V" 
```

Run the project by `php artisan serve` to access the API endpoints
