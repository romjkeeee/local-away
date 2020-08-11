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
    -d '{"email":"praesentium","password":"eos","remember_me":true}'

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
    "email": "praesentium",
    "password": "eos",
    "remember_me": true
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
            'email' => 'praesentium',
            'password' => 'eos',
            'remember_me' => true,
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
    -d '{"name":"hic","email":"vel","password":"quidem","password_confirmation":"at"}'

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
    "name": "hic",
    "email": "vel",
    "password": "quidem",
    "password_confirmation": "at"
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
            'name' => 'hic',
            'email' => 'vel',
            'password' => 'quidem',
            'password_confirmation' => 'at',
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

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
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

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
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
    -d '{"name":"tenetur","email":"atque","message":"id"}'

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
    "name": "tenetur",
    "email": "atque",
    "message": "id"
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
            'name' => 'tenetur',
            'email' => 'atque',
            'message' => 'id',
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
    -d '{"first_name":"sed","last_name":"eveniet","email":"sed","company_name":"veniam","country":"ut","phone":"id","image":"mollitia"}'

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
    "first_name": "sed",
    "last_name": "eveniet",
    "email": "sed",
    "company_name": "veniam",
    "country": "ut",
    "phone": "id",
    "image": "mollitia"
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
            'first_name' => 'sed',
            'last_name' => 'eveniet',
            'email' => 'sed',
            'company_name' => 'veniam',
            'country' => 'ut',
            'phone' => 'id',
            'image' => 'mollitia',
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
    -G "http://localhost:8888/peiko/first/laravel/public/api/qa/1?id=quis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/qa/1"
);

let params = {
    "id": "quis",
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
            'id'=> 'quis',
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

<!-- START_9857e165d62910a9829c2aa5201830f0 -->
## Create
Qa request

> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/qa/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"autem"}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/qa/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "autem"
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
    'http://localhost:8888/peiko/first/laravel/public/api/qa/create',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'autem',
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
`POST api/qa/create`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  optional  | require
    
<!-- END_9857e165d62910a9829c2aa5201830f0 -->

#Show Room


APIs for
<!-- START_efa2f32168cf2fa01ec1ab8a857a29c4 -->
## List
Show room list

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/show-room" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/show-room"
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
    'http://localhost:8888/peiko/first/laravel/public/api/show-room',
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
`GET api/show-room`


<!-- END_efa2f32168cf2fa01ec1ab8a857a29c4 -->

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
    -d '{"email":"occaecati"}'

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
    "email": "occaecati"
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
            'email' => 'occaecati',
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
    -G "http://localhost:8888/peiko/first/laravel/public/api/travel-stories?page=alias&perPage=dolore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/travel-stories"
);

let params = {
    "page": "alias",
    "perPage": "dolore",
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
            'page'=> 'alias',
            'perPage'=> 'dolore',
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

#general


<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## /
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/"
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
    'http://localhost:8888/peiko/first/laravel/public/',
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->


