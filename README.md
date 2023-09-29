# API build in PHP

This was a solo project where I build this RESTful API in PHP using MVC but without the view. I used Postman to test it. </br>
The result is returned in JSON and I also add CRUD operations and validation mostly for the create part. </br>
For the database i used MySQL with a PDO connection. </br>
I also used Bramus router and endpoints for each methods you can see those endpoints below. </br>

## Using requirements

If you want to use my API you will have to install both composer and Bramus router. </br>
```bash
composer require bramus/router
```

This project runs locally with Apache. </br>
You will also have to create your own database.

## Endpoints

```http
GET /
GET /posts
GET /post/(\d+)
GET /post
PUT /post/(\d+)
DELETE /post/(\d+)
```
