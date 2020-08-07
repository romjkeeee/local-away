---
title: API Reference

language_tabs:
- bash
- javascript
- php

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost:8888/peiko/first/laravel/public/docs/collection.json)

<!-- END_INFO -->

#Auth


APIs for
<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Login user and create token

> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"adipisci","password":"assumenda","remember_me":false}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "adipisci",
    "password": "assumenda",
    "remember_me": false
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8888/peiko/first/laravel/public/api/auth/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'adipisci',
            'password' => 'assumenda',
            'remember_me' => false,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`POST api/auth/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | 
        `password` | string |  required  | 
        `remember_me` | boolean |  optional  | 
    
<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_9357c0a600c785fe4f708897facae8b8 -->
## Sign-up

> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/auth/signup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"qui","email":"aut","password":"minus","password_confirmation":"quidem"}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/auth/signup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "qui",
    "email": "aut",
    "password": "minus",
    "password_confirmation": "quidem"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8888/peiko/first/laravel/public/api/auth/signup',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'qui',
            'email' => 'aut',
            'password' => 'minus',
            'password_confirmation' => 'quidem',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (201):

```json
{}
```

### HTTP Request
`POST api/auth/signup`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 
        `email` | string |  required  | 
        `password` | string |  required  | 
        `password_confirmation` | string |  required  | 
    
<!-- END_9357c0a600c785fe4f708897facae8b8 -->

<!-- START_16928cb8fc6adf2d9bb675d62a2095c5 -->
## Logout user

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8888/peiko/first/laravel/public/api/auth/logout',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`GET api/auth/logout`


<!-- END_16928cb8fc6adf2d9bb675d62a2095c5 -->

<!-- START_ff6d656b6d81a61adda963b8702034d2 -->
## Get User

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/auth/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/auth/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8888/peiko/first/laravel/public/api/auth/user',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`GET api/auth/user`


<!-- END_ff6d656b6d81a61adda963b8702034d2 -->

#Contact Form


APIs for
<!-- START_34c722f4cb3e4cf4c3999707c2b9884d -->
## Create
Contact Form

> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/contact-form" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"cupiditate","email":"temporibus","message":"vel"}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/contact-form"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "cupiditate",
    "email": "temporibus",
    "message": "vel"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8888/peiko/first/laravel/public/api/contact-form',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'cupiditate',
            'email' => 'temporibus',
            'message' => 'vel',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (201):

```json
{}
```

### HTTP Request
`POST api/contact-form`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | require
        `email` | string |  optional  | require
        `message` | string |  optional  | require
    
<!-- END_34c722f4cb3e4cf4c3999707c2b9884d -->

#Partnership


APIs for
<!-- START_e88b3f674f53e6bc3b56df8094a82825 -->
## List
List of active partners

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/partnership" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/partnership"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8888/peiko/first/laravel/public/api/partnership',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`GET api/partnership`


<!-- END_e88b3f674f53e6bc3b56df8094a82825 -->

<!-- START_904b953d69d07e3c85634378491fd7d6 -->
## Create
Request to partners

> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/partnership/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"hic","last_name":"quia","email":"ut","company_name":"maxime","country":"eius","phone":"impedit","image":"dolor"}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/partnership/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "hic",
    "last_name": "quia",
    "email": "ut",
    "company_name": "maxime",
    "country": "eius",
    "phone": "impedit",
    "image": "dolor"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8888/peiko/first/laravel/public/api/partnership/create',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'first_name' => 'hic',
            'last_name' => 'quia',
            'email' => 'ut',
            'company_name' => 'maxime',
            'country' => 'eius',
            'phone' => 'impedit',
            'image' => 'dolor',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (201):

```json
{}
```

### HTTP Request
`POST api/partnership/create`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `first_name` | string |  optional  | require
        `last_name` | string |  optional  | require
        `email` | string |  optional  | require
        `company_name` | string |  optional  | require
        `country` | string |  optional  | require
        `phone` | string |  optional  | require
        `image` | file |  optional  | require
    
<!-- END_904b953d69d07e3c85634378491fd7d6 -->

#Q&A


APIs for
<!-- START_7f94024b6548a1386d74b50a9851025a -->
## List cities

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/qa/cities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/qa/cities"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8888/peiko/first/laravel/public/api/qa/cities',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`GET api/qa/cities`


<!-- END_7f94024b6548a1386d74b50a9851025a -->

<!-- START_9c851a8914dbccb6b9e9c0b064d8e07c -->
## Show qa by id city

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/qa/1?id=autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/qa/1"
);

let params = {
    "id": "autem",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8888/peiko/first/laravel/public/api/qa/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'id'=> 'autem',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`GET api/qa/{id}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  optional  | integer required

<!-- END_9c851a8914dbccb6b9e9c0b064d8e07c -->

<!-- START_085a58944c50208a727676a87c439527 -->
## Create
Qa request

> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/qa/1/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"consequatur"}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/qa/1/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "consequatur"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8888/peiko/first/laravel/public/api/qa/1/create',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'consequatur',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (201):

```json
{}
```

### HTTP Request
`POST api/qa/{id}/create`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  optional  | require
    
<!-- END_085a58944c50208a727676a87c439527 -->

#Subscribe


APIs for
<!-- START_95d2609383a86210e2424765cf8031d1 -->
## Create
Subscribe

> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/subscribe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"rerum"}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/subscribe"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "rerum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8888/peiko/first/laravel/public/api/subscribe',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'rerum',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (201):

```json
{}
```

### HTTP Request
`POST api/subscribe`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  optional  | require
    
<!-- END_95d2609383a86210e2424765cf8031d1 -->

#Travel Story


APIs for
<!-- START_2aeadf770e8205486d79c4116cfb4bc2 -->
## List for home page

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/travel-stories/home-page" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/travel-stories/home-page"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8888/peiko/first/laravel/public/api/travel-stories/home-page',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`GET api/travel-stories/home-page`


<!-- END_2aeadf770e8205486d79c4116cfb4bc2 -->

<!-- START_9fcb341d0645c32f71c99074e13a3ca2 -->
## List of all stories with paginate

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/travel-stories?page=veritatis&perPage=sint" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/travel-stories"
);

let params = {
    "page": "veritatis",
    "perPage": "sint",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8888/peiko/first/laravel/public/api/travel-stories',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'page'=> 'veritatis',
            'perPage'=> 'sint',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`GET api/travel-stories`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `page` |  optional  | 
    `perPage` |  optional  | 

<!-- END_9fcb341d0645c32f71c99074e13a3ca2 -->

<!-- START_ab95eac6843e9d57e47d1fdea5de4926 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/travel-stories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/travel-stories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8888/peiko/first/laravel/public/api/travel-stories/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```

### HTTP Request
`GET api/travel-stories/{travel_story}`


<!-- END_ab95eac6843e9d57e47d1fdea5de4926 -->


