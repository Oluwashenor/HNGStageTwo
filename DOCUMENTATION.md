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

## Request

| S/N | Event(Description) | Request                                 | Action |
| --- | ------------------ | --------------------------------------- | ------ |
| 1   | Create Person      | http://localhost:8000/api/person/create | POST   |
| 2   | Get Person         | http://localhost:8000/api/person/Eba    | GET    |
| 3   | Update Person      | http://localhost:8000/api/person/Amala  | PUT    |
| 4   | Delete Person      | http://localhost:8000/api/person/Amala  | DELETE |

## Request Response

### Create a new Person

*URL* : http://localhost:8000/api/person/create  
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
    "name": "Adesina",
    "email": "adeshiname@gmail.com",
    "updated_at": "2023-09-11T08:42:46.000000Z",
    "created_at": "2023-09-11T08:42:46.000000Z",
    "id": 1
}
```

### Get a Person
*URL*: http://localhost:8000/api/person/Adesina  
*Method* : Get  
*API Response* :
```
{
    "id": 1,
    "name": "Adesina",
    "email": "adeshiname@gmail.com",
    "created_at": "2023-09-11T08:42:46.000000Z",
    "updated_at": "2023-09-11T08:42:46.000000Z"
}
```

### Update a Person
*URL*: http://localhost:8000/api/person/1 
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
    "id": 1,
    "name": "Ade",
    "email": "adeshiname2@gmail.com",
    "created_at": "2023-09-11T08:42:46.000000Z",
    "updated_at": "2023-09-11T08:43:45.000000Z"
}
```

### Delete a Person
*URL*: http://localhost:8000/api/person/1  
*Method* : DELETE  
*API Response* :
```
"User Deleted Successfully"
```
