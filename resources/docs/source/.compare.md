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
    -d '{"email":"voluptas","password":"ad","remember_me":true}'

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
    "email": "voluptas",
    "password": "ad",
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
            'email' => 'voluptas',
            'password' => 'ad',
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
    -d '{"first_name":"aliquid","last_name":"quae","email":"voluptatem","password":"incidunt","password_confirmation":"laudantium"}'

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
    "first_name": "aliquid",
    "last_name": "quae",
    "email": "voluptatem",
    "password": "incidunt",
    "password_confirmation": "laudantium"
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
            'first_name' => 'aliquid',
            'last_name' => 'quae',
            'email' => 'voluptatem',
            'password' => 'incidunt',
            'password_confirmation' => 'laudantium',
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
    `first_name` | string |  optional  | 
        `last_name` | string |  optional  | 
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

#Beta Form


APIs for
<!-- START_297bd87553958d79511732f4627917e6 -->
## Create

> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/beta-form" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"fugit"}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/beta-form"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "fugit"
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
    'http://localhost:8888/peiko/first/laravel/public/api/beta-form',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'fugit',
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
`POST api/beta-form`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | 
    
<!-- END_297bd87553958d79511732f4627917e6 -->

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

<!-- START_316a4c3b4f6a4c4ff34e5893943cdebd -->
## List countries

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/countries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/countries"
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
    'http://localhost:8888/peiko/first/laravel/public/api/countries',
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
`GET api/countries`


<!-- END_316a4c3b4f6a4c4ff34e5893943cdebd -->

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
    -d '{"name":"id","email":"omnis","message":"omnis"}'

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
    "name": "id",
    "email": "omnis",
    "message": "omnis"
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
            'name' => 'id',
            'email' => 'omnis',
            'message' => 'omnis',
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

#Documents


APIs for
<!-- START_6a310d199a9eb8f30340087122d94d50 -->
## Document for about us

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/document-about-us" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/document-about-us"
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
    'http://localhost:8888/peiko/first/laravel/public/api/document-about-us',
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
`GET api/document-about-us`


<!-- END_6a310d199a9eb8f30340087122d94d50 -->

#Founder


APIs for
<!-- START_0692ea3faf6191116ae9b8191d08bbf0 -->
## List founders

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/founders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/founders"
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
    'http://localhost:8888/peiko/first/laravel/public/api/founders',
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
`GET api/founders`


<!-- END_0692ea3faf6191116ae9b8191d08bbf0 -->

#Gender


APIs for
<!-- START_9c8ad14de9a6ed2b154a3e2a836ff686 -->
## List genders

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/genders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/genders"
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
    'http://localhost:8888/peiko/first/laravel/public/api/genders',
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
`GET api/genders`


<!-- END_9c8ad14de9a6ed2b154a3e2a836ff686 -->

#Order


APIs for
<!-- START_2653a049101f414b074e83c0fafff6c5 -->
## new order

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/orders/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/orders/create"
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
    'http://localhost:8888/peiko/first/laravel/public/api/orders/create',
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


> Example response (201):

```json
{}
```

### HTTP Request
`POST api/orders/create`


<!-- END_2653a049101f414b074e83c0fafff6c5 -->

<!-- START_f9301c03a9281c0847565f96e6f723de -->
## Get orders

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/orders"
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
    'http://localhost:8888/peiko/first/laravel/public/api/orders',
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
`GET api/orders`


<!-- END_f9301c03a9281c0847565f96e6f723de -->

<!-- START_177549256034c008495d561dea2f5ae0 -->
## Get last order

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/orders/last" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/orders/last"
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
    'http://localhost:8888/peiko/first/laravel/public/api/orders/last',
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
`GET api/orders/last`


<!-- END_177549256034c008495d561dea2f5ae0 -->

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
    -d '{"first_name":"sed","last_name":"nisi","email":"reiciendis","company_name":"similique","country":"reprehenderit","phone":"est","image":"labore"}'

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
    "last_name": "nisi",
    "email": "reiciendis",
    "company_name": "similique",
    "country": "reprehenderit",
    "phone": "est",
    "image": "labore"
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
            'last_name' => 'nisi',
            'email' => 'reiciendis',
            'company_name' => 'similique',
            'country' => 'reprehenderit',
            'phone' => 'est',
            'image' => 'labore',
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

#Preference


APIs for
<!-- START_654d79cf2f24a06361e5bc48c680d5b9 -->
## Get

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/user-settings/preference" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/preference"
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
    'http://localhost:8888/peiko/first/laravel/public/api/user-settings/preference',
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
`GET api/user-settings/preference`


<!-- END_654d79cf2f24a06361e5bc48c680d5b9 -->

<!-- START_07c81904ae037b9980dac1945c8502a7 -->
## Update

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/preference" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"age":"reiciendis","height":"repellendus","feet":"qui","measurement":"ab","body_type_id":"consequatur"}'

```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/preference"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "age": "reiciendis",
    "height": "repellendus",
    "feet": "qui",
    "measurement": "ab",
    "body_type_id": "consequatur"
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
    'http://localhost:8888/peiko/first/laravel/public/api/user-settings/preference',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'age' => 'reiciendis',
            'height' => 'repellendus',
            'feet' => 'qui',
            'measurement' => 'ab',
            'body_type_id' => 'consequatur',
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
`POST api/user-settings/preference`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `age` | string |  optional  | 
        `height` | string |  optional  | 
        `feet` | string |  optional  | 
        `measurement` | string |  optional  | 
        `body_type_id` | string |  optional  | 
    
<!-- END_07c81904ae037b9980dac1945c8502a7 -->

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

<!-- START_f91788b383deef5cc6f599930f4de978 -->
## Show qa by id city

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/qa/show/1?id=quia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/qa/show/1"
);

let params = {
    "id": "quia",
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
    'http://localhost:8888/peiko/first/laravel/public/api/qa/show/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'id'=> 'quia',
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
`GET api/qa/show/{alias}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  optional  | integer required

<!-- END_f91788b383deef5cc6f599930f4de978 -->

<!-- START_9857e165d62910a9829c2aa5201830f0 -->
## Create
Qa request

> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/qa/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"reprehenderit"}'

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
    "email": "reprehenderit"
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
            'email' => 'reprehenderit',
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
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/personal-style?gender_id=natus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/personal-style"
);

let params = {
    "gender_id": "natus",
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
            'gender_id'=> 'natus',
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
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/styled?gender_id=ipsam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/styled"
);

let params = {
    "gender_id": "ipsam",
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
            'gender_id'=> 'ipsam',
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
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/body-type?gender_id=unde" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/body-type"
);

let params = {
    "gender_id": "unde",
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
            'gender_id'=> 'unde',
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
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/sizing-info?gender_id=veniam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/sizing-info"
);

let params = {
    "gender_id": "veniam",
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
            'gender_id'=> 'veniam',
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
## List costs

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/quiz/costs?gender_id=iure" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/quiz/costs"
);

let params = {
    "gender_id": "iure",
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
    'http://localhost:8888/peiko/first/laravel/public/api/quiz/costs',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'gender_id'=> 'iure',
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

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `gender_id` |  optional  | int optional example: 1

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

<!-- START_ef3a72ee158e2faf6bf1678d8d52836f -->
## Last collection by gender

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8888/peiko/first/laravel/public/api/show-room/last-collection?gender_id=aliquid" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/show-room/last-collection"
);

let params = {
    "gender_id": "aliquid",
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
    'http://localhost:8888/peiko/first/laravel/public/api/show-room/last-collection',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'gender_id'=> 'aliquid',
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
`GET api/show-room/last-collection`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `gender_id` |  required  | 

<!-- END_ef3a72ee158e2faf6bf1678d8d52836f -->

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
    -d '{"email":"placeat"}'

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
    "email": "placeat"
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
            'email' => 'placeat',
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
    -G "http://localhost:8888/peiko/first/laravel/public/api/travel-stories?page=similique&perPage=dolorum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/travel-stories"
);

let params = {
    "page": "similique",
    "perPage": "dolorum",
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
            'page'=> 'similique',
            'perPage'=> 'dolorum',
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
    -G "http://localhost:8888/peiko/first/laravel/public/api/travel-stories/1?gender_id=ipsum&per_page=velit&page=occaecati" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8888/peiko/first/laravel/public/api/travel-stories/1"
);

let params = {
    "gender_id": "ipsum",
    "per_page": "velit",
    "page": "occaecati",
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
    'http://localhost:8888/peiko/first/laravel/public/api/travel-stories/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'query' => [
            'gender_id'=> 'ipsum',
            'per_page'=> 'velit',
            'page'=> 'occaecati',
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

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `gender_id` |  optional  | 
    `per_page` |  optional  | 
    `page` |  optional  | 

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

<!-- START_4b56b2b50960fd61a3c0273bc0e81516 -->
## Delete user address by id address

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/user-address/delete/1" \
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
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
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
`POST api/user-address/delete/{id}`


<!-- END_4b56b2b50960fd61a3c0273bc0e81516 -->

<!-- START_bcf2784f2fc6e87a1012c66111d1aba4 -->
## Edit user address by id address

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/user-address/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"address":"voluptatem","zip_code":19,"city":"harum","state":"quia","country":"nostrum","apartment":"dolores"}'

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
    "address": "voluptatem",
    "zip_code": 19,
    "city": "harum",
    "state": "quia",
    "country": "nostrum",
    "apartment": "dolores"
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
            'address' => 'voluptatem',
            'zip_code' => 19,
            'city' => 'harum',
            'state' => 'quia',
            'country' => 'nostrum',
            'apartment' => 'dolores',
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
    -d '{"address":"ducimus","zip_code":"animi","city":"culpa","state":"quo","country":"sed","apartment":"itaque"}'

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
    "address": "ducimus",
    "zip_code": "animi",
    "city": "culpa",
    "state": "quo",
    "country": "sed",
    "apartment": "itaque"
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
            'address' => 'ducimus',
            'zip_code' => 'animi',
            'city' => 'culpa',
            'state' => 'quo',
            'country' => 'sed',
            'apartment' => 'itaque',
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

<!-- START_4a1c95497737f409d1bdf257e47eed8e -->
## update settings

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8888/peiko/first/laravel/public/api/user-settings/set-metrics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"measurement":10,"height":12,"feet":12,"age_range":11,"body_type_id":12}'

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
    "measurement": 10,
    "height": 12,
    "feet": 12,
    "age_range": 11,
    "body_type_id": 12
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
            'measurement' => 10,
            'height' => 12,
            'feet' => 12,
            'age_range' => 11,
            'body_type_id' => 12,
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


