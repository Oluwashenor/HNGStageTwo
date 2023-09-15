# HNG Stage Two Project

Welcome to the **HNG Stage Two** project! In this project, we are using a database called **stageTwo**, and one of the tables in this database is called **People**. This table is designed to store information about individuals and has the following columns:

| Column Name | Description         |
| ----------- | ------------------- |
| id          | Unique identifier   |
| name        | Full name of person |
| email       | Email address       |
| created     | Date of creation    |
| updated     | Date of last update |

The **People** table is a fundamental part of our project, and it allows us to manage and store information about individuals efficiently.


## Setup Instructions
- clone project from here https://github.com/Oluwashenor/HNGStageTwo/
- generate your .env file from the .env.example template
- set up your db connection in the .env file
- navigate into project and run "composer install"
- run "php artisan migrate:fresh" to migrate
- run "php artisan serve"
- viola. your project is ready for testing and implementation.
- you can also import the postman collection from this project root directory its called "HNG Stage two.postman_collection.json" for v2.

## Request

| S/N | Event(Description) | Request                                  | Action |
| --- | ------------------ | ---------------------------------------- | ------ |
| 1   | Create Person      | http://172.104.112.98:8080/api           | POST   |
| 2   | Get Person         | http://172.104.112.98:8080/api/{user_id} | GET    |
| 3   | Update Person      | http://172.104.112.98:8080/api/{user_id} | PUT    |
| 4   | Update Person      | http://172.104.112.98:8080/api/{name}    | PUT    |
| 5   | Delete Person      | http://172.104.112.98:8080/api/{user_id} | DELETE |

## Request Response

### Create a new Person

*URL* : http://172.104.112.98:8080/api/  
*Method* : Post  
*JSON Body*: 
```
{
  "name": "Adesina",
  "email": "adeshiname@gmail.com"
}
```
*API Response*
```
{
  "status": 201,
  "data": {
    "name": "Ades",
    "email": "adeshina@gmail.com",
    "updated_at": "2023-09-15T10:10:34.000000Z",
    "created_at": "2023-09-15T10:10:34.000000Z",
    "id": 24
  },
  "message": "User Created Successfully"
}
```

### Get a Person
*URL*: http://172.104.112.98:8080/api/{user_id}  
*Method* : Get  
*API Response* :
```
{
  "status": 200,
  "data": {
    "id": 15,
    "name": "Eba10",
    "email": "eba10@gmail.com",
    "created_at": "2023-09-11T12:51:42.000000Z",
    "updated_at": "2023-09-11T12:51:42.000000Z"
  },
  "message": "User Retreived"
}
```

### Update a Person
*URL*: http://172.104.112.98:8080/api/{user_id}
*URL*: http://172.104.112.98:8080/api/{name}
*Method* : PUT  
*JSON Body*: 
```
{
  "name": "Ade",
  "email": "adeshiname2@gmail.com"
}
```
*API Response* :
```
{
  "status": 200,
  "data": {
    "id": 15,
    "name": "UserA",
    "email": "usera@gmail.com",
    "created_at": "2023-09-11T12:51:42.000000Z",
    "updated_at": "2023-09-15T10:12:01.000000Z"
  },
  "message": "User Updated Successfully"
}
```

### Delete a Person
*URL*: http://172.104.112.98:8080/api/{user_id}
*Method* : DELETE  
*API Response* :
```
{
  "status": 200,
  "message": "User Deleted successfully"
}
```
