# Simple Queue Web API

Tech stack: Slim PHP, MySQL

Install libraries
```bash
composer install
```

Start php and mysql
```bash
docker-compose up
```

Add a task
```http request
POST http://localhost/submitter/{submitter_id}/create
Content-Type: application/json

{
  "message": "My first task",
  "priority": 5
}
```

Check task status
```http request
GET http://localhost/task/{task_id}
Accept: application/json
```

Pick up task
```http request
GET http://localhost/processor/{processor_id}/get
Accept: application/json
```

Complete a task
```http request
PUT http://localhost:80/processor/{processor_id}/complete/{task_id}
Accept: application/json
```
