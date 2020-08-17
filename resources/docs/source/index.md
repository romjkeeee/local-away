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
    -d '{"email":"distinctio","password":"dolorum","remember_me":false}'

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
    "email": "distinctio",
    "password": "dolorum",
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
            'email' => 'distinctio',
            'password' => 'dolorum',
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
    -d '{"name":"laudantium","email":"dolor","password":"corrupti","password_confirmation":"saepe"}'

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
    "name": "laudantium",
    "email": "dolor",
    "password": "corrupti",
    "password_confirmation": "saepe"
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
            'name' => 'laudantium',
            'email' => 'dolor',
            'password' => 'corrupti',
            'password_confirmation' => 'saepe',
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

#City


APIs for
<!-- START_56d7be9447e2ce39ac69b09141bf5902 -->
## List cities

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/cities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/cities"
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
    'http://localhost:8888/peiko/first/laravel/public/api/cities',
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
`GET api/cities`


<!-- END_56d7be9447e2ce39ac69b09141bf5902 -->

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
    -d '{"name":"quaerat","email":"eum","message":"aliquam"}'

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
    "name": "quaerat",
    "email": "eum",
    "message": "aliquam"
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
            'name' => 'quaerat',
            'email' => 'eum',
            'message' => 'aliquam',
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
    -d '{"first_name":"autem","last_name":"aut","email":"est","company_name":"excepturi","country":"reprehenderit","phone":"quae","image":"sit"}'

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
    "first_name": "autem",
    "last_name": "aut",
    "email": "est",
    "company_name": "excepturi",
    "country": "reprehenderit",
    "phone": "quae",
    "image": "sit"
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
            'first_name' => 'autem',
            'last_name' => 'aut',
            'email' => 'est',
            'company_name' => 'excepturi',
            'country' => 'reprehenderit',
            'phone' => 'quae',
            'image' => 'sit',
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
    -G "http://localhost:8888/peiko/first/laravel/public/api/qa/1?id=voluptatibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/qa/1"
);

let params = {
    "id": "voluptatibus",
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
            'id'=> 'voluptatibus',
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
    -d '{"email":"voluptate"}'

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
    "email": "voluptate"
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
            'email' => 'voluptate',
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

#Quiz


APIs for
<!-- START_6b07e422a378f2d228d0a992396a6778 -->
## List package type

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/package_for" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/package_for"
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
    'http://localhost:8888/peiko/first/laravel/public/api/quiz/package_for',
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
`GET api/quiz/package_for`


<!-- END_6b07e422a378f2d228d0a992396a6778 -->

<!-- START_34aca146e33d41c04f7674ea34a21a3f -->
## List travel purposes

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/travel-purposes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/travel-purposes"
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
    'http://localhost:8888/peiko/first/laravel/public/api/quiz/travel-purposes',
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
`GET api/quiz/travel-purposes`


<!-- END_34aca146e33d41c04f7674ea34a21a3f -->

<!-- START_44cb881622323e35e6ea088be76b0eab -->
## List personal style

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/personal-style?gender_id=labore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/personal-style"
);

let params = {
    "gender_id": "labore",
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
    'http://localhost:8888/peiko/first/laravel/public/api/quiz/personal-style',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'gender_id'=> 'labore',
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
`GET api/quiz/personal-style`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `gender_id` |  optional  | int optional example: 1

<!-- END_44cb881622323e35e6ea088be76b0eab -->

<!-- START_e87902dca4002851c96b4ef129c63b35 -->
## List styled

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/styled?gender_id=omnis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/styled"
);

let params = {
    "gender_id": "omnis",
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
    'http://localhost:8888/peiko/first/laravel/public/api/quiz/styled',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'gender_id'=> 'omnis',
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
`GET api/quiz/styled`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `gender_id` |  optional  | int optional example: 1

<!-- END_e87902dca4002851c96b4ef129c63b35 -->

<!-- START_d2655eb25beb886b3898ae2bcccfaf1a -->
## List body type

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/body-type?gender_id=voluptate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/body-type"
);

let params = {
    "gender_id": "voluptate",
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
    'http://localhost:8888/peiko/first/laravel/public/api/quiz/body-type',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'gender_id'=> 'voluptate',
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
`GET api/quiz/body-type`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `gender_id` |  optional  | int optional example: 1

<!-- END_d2655eb25beb886b3898ae2bcccfaf1a -->

<!-- START_585c17bb0b5ff3bd427e130a4d7aea09 -->
## List sizing info

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/sizing-info?gender_id=quas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/sizing-info"
);

let params = {
    "gender_id": "quas",
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
    'http://localhost:8888/peiko/first/laravel/public/api/quiz/sizing-info',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'gender_id'=> 'quas',
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
`GET api/quiz/sizing-info`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `gender_id` |  optional  | int optional example: 1

<!-- END_585c17bb0b5ff3bd427e130a4d7aea09 -->

<!-- START_fb25a0c49596738bf1b0c9c9c268d873 -->
## List sizing info

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/costs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/costs"
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
    'http://localhost:8888/peiko/first/laravel/public/api/quiz/costs',
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
`GET api/quiz/costs`


<!-- END_fb25a0c49596738bf1b0c9c9c268d873 -->

<!-- START_2db77290f3fd57ca6f9b143f3c8cd1bf -->
## List preference

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/preference" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/preference"
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
    'http://localhost:8888/peiko/first/laravel/public/api/quiz/preference',
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
`GET api/quiz/preference`


<!-- END_2db77290f3fd57ca6f9b143f3c8cd1bf -->

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
    -d '{"email":"eos"}'

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
    "email": "eos"
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
            'email' => 'eos',
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
    -G "http://localhost:8888/peiko/first/laravel/public/api/travel-stories?page=voluptatem&perPage=architecto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/travel-stories"
);

let params = {
    "page": "voluptatem",
    "perPage": "architecto",
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
            'page'=> 'voluptatem',
            'perPage'=> 'architecto',
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

#User Address


APIs for
<!-- START_35b4d0833cc6ef98ded3912e2f00cdea -->
## List of all user address

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/user-address" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-address"
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
    'http://localhost:8888/peiko/first/laravel/public/api/user-address',
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
`GET api/user-address`


<!-- END_35b4d0833cc6ef98ded3912e2f00cdea -->

<!-- START_f909080578d18051623ee2dba60e0de9 -->
## Delete user address by id address

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/user-address/delete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-address/delete/1"
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
    'http://localhost:8888/peiko/first/laravel/public/api/user-address/delete/1',
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


> Example response (204):

```json
{}
```

### HTTP Request
`GET api/user-address/delete/{id}`


<!-- END_f909080578d18051623ee2dba60e0de9 -->

<!-- START_bcf2784f2fc6e87a1012c66111d1aba4 -->
## Edit user address by id address

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/user-address/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"address":"cum","zip_code":2,"city":"eius","state":"ducimus","country":"iure","apartment":"harum"}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-address/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "address": "cum",
    "zip_code": 2,
    "city": "eius",
    "state": "ducimus",
    "country": "iure",
    "apartment": "harum"
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
    'http://localhost:8888/peiko/first/laravel/public/api/user-address/1/edit',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'address' => 'cum',
            'zip_code' => 2,
            'city' => 'eius',
            'state' => 'ducimus',
            'country' => 'iure',
            'apartment' => 'harum',
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
`POST api/user-address/{id}/edit`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `address` | string |  optional  | 
        `zip_code` | integer |  optional  | 
        `city` | string |  optional  | 
        `state` | string |  optional  | 
        `country` | string |  optional  | 
        `apartment` | string |  optional  | 
    
<!-- END_bcf2784f2fc6e87a1012c66111d1aba4 -->

<!-- START_6e60e0dd86fffd05f157ea5b5e2f42c7 -->
## Store of all user address

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/user-address/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"address":"veniam","zip_code":"quo","city":"veritatis","state":"minus","country":"dolore","apartment":"nesciunt"}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-address/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "address": "veniam",
    "zip_code": "quo",
    "city": "veritatis",
    "state": "minus",
    "country": "dolore",
    "apartment": "nesciunt"
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
    'http://localhost:8888/peiko/first/laravel/public/api/user-address/create',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'address' => 'veniam',
            'zip_code' => 'quo',
            'city' => 'veritatis',
            'state' => 'minus',
            'country' => 'dolore',
            'apartment' => 'nesciunt',
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
`POST api/user-address/create`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `address` | required |  optional  | string
        `zip_code` | required |  optional  | integer
        `city` | required |  optional  | string
        `state` | required |  optional  | string
        `country` | required |  optional  | string
        `apartment` | required |  optional  | string
    
<!-- END_6e60e0dd86fffd05f157ea5b5e2f42c7 -->

#User settings


APIs for
<!-- START_cbf7f4129a6d6fad56d89861ab3d1032 -->
## List
Список пользователей

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/user-settings/metrics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/metrics"
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
    'http://localhost:8888/peiko/first/laravel/public/api/user-settings/metrics',
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
`GET api/user-settings/metrics`


<!-- END_cbf7f4129a6d6fad56d89861ab3d1032 -->

<!-- START_4a1c95497737f409d1bdf257e47eed8e -->
## update settings

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/set-metrics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"measurement":14,"height":4,"feet":8,"age_range":10,"body_type_id":15}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/set-metrics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "measurement": 14,
    "height": 4,
    "feet": 8,
    "age_range": 10,
    "body_type_id": 15
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
    'http://localhost:8888/peiko/first/laravel/public/api/user-settings/set-metrics',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'measurement' => 14,
            'height' => 4,
            'feet' => 8,
            'age_range' => 10,
            'body_type_id' => 15,
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
`POST api/user-settings/set-metrics`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `measurement` | integer |  optional  | 
        `height` | integer |  optional  | 
        `feet` | integer |  optional  | 
        `age_range` | integer |  optional  | 
        `body_type_id` | integer |  optional  | 
    
<!-- END_4a1c95497737f409d1bdf257e47eed8e -->

<!-- START_d53d78f4e5a0a265979752ba8f6944a0 -->
## Get user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/user-settings/get-user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/get-user"
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
    'http://localhost:8888/peiko/first/laravel/public/api/user-settings/get-user',
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
`GET api/user-settings/get-user`


<!-- END_d53d78f4e5a0a265979752ba8f6944a0 -->

<!-- START_9299c31217d2b08b3f9141f8c4d92531 -->
## Update info
First name, last_name, email

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/update-info" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/update-info"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8888/peiko/first/laravel/public/api/user-settings/update-info',
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
`POST api/user-settings/update-info`


<!-- END_9299c31217d2b08b3f9141f8c4d92531 -->

<!-- START_5534dacef91cbfc26b9e0e8779372cb0 -->
## Update avatar

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/update-avatar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/update-avatar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8888/peiko/first/laravel/public/api/user-settings/update-avatar',
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
`POST api/user-settings/update-avatar`


<!-- END_5534dacef91cbfc26b9e0e8779372cb0 -->

<!-- START_5cc94664f18f3f169c44921cde74a3a6 -->
## remove avatar

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/remove-avatar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/remove-avatar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8888/peiko/first/laravel/public/api/user-settings/remove-avatar',
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


> Example response (204):

```json
{}
```

### HTTP Request
`DELETE api/user-settings/remove-avatar`


<!-- END_5cc94664f18f3f169c44921cde74a3a6 -->

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


