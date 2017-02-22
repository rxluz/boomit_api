---
title: Appock API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the Appock API reference.
[Get Postman Collection](http://api_vitaeh.appock.co/docs/collection.json)
<!-- END_INFO -->

#/admin/users

CRUD users
<!-- START_90dae5ab6b40b27441dfac68a28e32ee -->
## [post] /auth

Users admin authentication requires an user allowed to use the admin area
`Requires authentication: no`

> Example request:

```bash
curl "http://localhost/api/admin/v1/users/auth" \
-H "Accept: application/json" \
    -d "email"="consequatur" \
    -d "nickname"="consequatur" \
    -d "password"="consequatur" \
    -d "facebook_token"="consequatur" \
    -d "admin_mode"="1" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/users/auth",
    "method": "POST",
    "data": {
        "email": "consequatur",
        "nickname": "consequatur",
        "password": "consequatur",
        "facebook_token": "consequatur",
        "admin_mode": true
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/admin/v1/users/auth`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  optional  | Minimum: `2`
    nickname | string |  optional  | Minimum: `3`
    password | string |  optional  | Minimum: `5`
    facebook_token | string |  optional  | Minimum: `5`
    admin_mode | boolean |  optional  | 

<!-- END_90dae5ab6b40b27441dfac68a28e32ee -->
<!-- START_0d0eeefbb816036b9854405acb1ae5c6 -->
## [get] /

Get all users registered
`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/admin/v1/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/users",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/users`

`HEAD api/admin/v1/users`


<!-- END_0d0eeefbb816036b9854405acb1ae5c6 -->
<!-- START_9f51a170e2e1913c0529cb47f32520c7 -->
## [get] /{user_id}

Get a single user infos
`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/admin/v1/users/{user_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/users/{user_id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/users/{user_id}`

`HEAD api/admin/v1/users/{user_id}`


<!-- END_9f51a170e2e1913c0529cb47f32520c7 -->
<!-- START_42d3401d731bbad25072419af98830b7 -->
## [post] /

Create a new user
`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/admin/v1/users" \
-H "Accept: application/json" \
    -d "name"="optio" \
    -d "email"="kamille22@example.com" \
    -d "password"="optio" \
    -d "facebook_token"="optio" \
    -d "admin"="1" \
    -d "petshop_id"="optio" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/users",
    "method": "POST",
    "data": {
        "name": "optio",
        "email": "kamille22@example.com",
        "password": "optio",
        "facebook_token": "optio",
        "admin": true,
        "petshop_id": "optio"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/admin/v1/users`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Minimum: `5`
    email | email |  required  | 
    password | string |  required  | Minimum: `5`
    facebook_token | string |  optional  | Minimum: `5`
    admin | boolean |  optional  | 
    petshop_id | string |  optional  | Valid petshop id

<!-- END_42d3401d731bbad25072419af98830b7 -->
<!-- START_1ab32022639e423f48feb07a0f3d7306 -->
## [patch] /{user_id}

Update user infos
`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/admin/v1/users/{user_id}" \
-H "Accept: application/json" \
    -d "name"="quaerat" \
    -d "email"="burnice.olson@example.org" \
    -d "password"="quaerat" \
    -d "facebook_token"="quaerat" \
    -d "admin"="1" \
    -d "petshop_id"="quaerat" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/users/{user_id}",
    "method": "PATCH",
    "data": {
        "name": "quaerat",
        "email": "burnice.olson@example.org",
        "password": "quaerat",
        "facebook_token": "quaerat",
        "admin": true,
        "petshop_id": "quaerat"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PATCH api/admin/v1/users/{user_id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  optional  | Minimum: `5`
    email | email |  optional  | 
    password | string |  optional  | Minimum: `5`
    facebook_token | string |  optional  | Minimum: `5`
    admin | boolean |  optional  | 
    petshop_id | string |  optional  | Valid petshop id

<!-- END_1ab32022639e423f48feb07a0f3d7306 -->
<!-- START_adcef28e8e5315b1f3517d4fa1683abd -->
## [delete] /{user_id}

Disable user
`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/admin/v1/users/{user_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/users/{user_id}",
    "method": "DELETE",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`DELETE api/admin/v1/users/{user_id}`


<!-- END_adcef28e8e5315b1f3517d4fa1683abd -->
<!-- START_d417e05bd78b72d4f297613c440dbcb1 -->
## [put] /{user_id}

Enable users
`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/admin/v1/users/{user_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/users/{user_id}",
    "method": "PUT",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PUT api/admin/v1/users/{user_id}`


<!-- END_d417e05bd78b72d4f297613c440dbcb1 -->
#/admin/categories

CRUD categories
<!-- START_7254739c738bf9f1a9ff99b8c7d8cba3 -->
## api/admin/v1/categories

> Example request:

```bash
curl "http://localhost/api/admin/v1/categories" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/categories",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
[
    {
        "name": "a213121486509511",
        "id": 85,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-07 23:18:31",
        "updated_at": "2017-02-13 22:38:22",
        "parent_category_id": 95,
        "animal_types": [
            1,
            2,
            3,
            4
        ]
    },
    {
        "name": "a213121486509570",
        "id": 86,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-07 23:19:29",
        "updated_at": "2017-02-07 23:19:29",
        "parent_category_id": null,
        "animal_types": []
    },
    {
        "name": "a213121486510166",
        "id": 87,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-07 23:29:26",
        "updated_at": "2017-02-07 23:29:26",
        "parent_category_id": null,
        "animal_types": []
    },
    {
        "name": "a213121486510661",
        "id": 88,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-07 23:37:40",
        "updated_at": "2017-02-08 21:06:25",
        "parent_category_id": 95,
        "animal_types": []
    },
    {
        "name": "a213121486510767",
        "id": 89,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-07 23:39:27",
        "updated_at": "2017-02-07 23:39:27",
        "parent_category_id": 85,
        "animal_types": []
    },
    {
        "name": "a213121486510782",
        "id": 90,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-07 23:39:42",
        "updated_at": "2017-02-07 23:39:42",
        "parent_category_id": 86,
        "animal_types": []
    },
    {
        "name": "a213121486510966",
        "id": 91,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-07 23:42:46",
        "updated_at": "2017-02-07 23:42:46",
        "parent_category_id": 86,
        "animal_types": []
    },
    {
        "name": "PARENTa213121486511139",
        "id": 92,
        "type": "0",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-07 23:45:38",
        "updated_at": "2017-02-07 23:45:38",
        "parent_category_id": null,
        "animal_types": [
            1,
            2,
            3,
            4
        ]
    },
    {
        "name": "Categoria teste 1",
        "id": 93,
        "type": "0",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-08 00:02:27",
        "updated_at": "2017-02-08 00:02:27",
        "parent_category_id": null,
        "animal_types": [
            0,
            1,
            2,
            3
        ]
    },
    {
        "name": "ASDasdasdasd",
        "id": 94,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-08 00:06:22",
        "updated_at": "2017-02-13 23:23:16",
        "parent_category_id": 93,
        "animal_types": [
            0,
            2,
            3,
            4,
            5
        ]
    },
    {
        "name": "Teste categoria com animais",
        "id": 95,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-08 00:12:17",
        "updated_at": "2017-02-15 22:53:59",
        "parent_category_id": 93,
        "animal_types": [
            0,
            1,
            3
        ]
    },
    {
        "name": "Teste categoria sem animais, categoria filha",
        "id": 96,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-08 00:12:48",
        "updated_at": "2017-02-08 00:12:48",
        "parent_category_id": 92,
        "animal_types": []
    },
    {
        "name": "Categoria mae teste final",
        "id": 97,
        "type": "0",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-08 20:47:39",
        "updated_at": "2017-02-08 20:48:58",
        "parent_category_id": 92,
        "animal_types": [
            0,
            1,
            2
        ]
    },
    {
        "name": "Categoria filha teste final",
        "id": 98,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-08 20:48:46",
        "updated_at": "2017-02-08 20:59:31",
        "parent_category_id": 92,
        "animal_types": []
    },
    {
        "name": "xxxxxx",
        "id": 99,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-08 20:50:53",
        "updated_at": "2017-02-08 20:50:53",
        "parent_category_id": 85,
        "animal_types": []
    },
    {
        "name": "zzzzzzz",
        "id": 100,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-08 20:59:47",
        "updated_at": "2017-02-08 21:00:14",
        "parent_category_id": 92,
        "animal_types": [
            0,
            2,
            5
        ]
    },
    {
        "name": "asdasdasd",
        "id": 101,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-08 21:00:39",
        "updated_at": "2017-02-08 21:00:39",
        "parent_category_id": 93,
        "animal_types": []
    },
    {
        "name": "asdasdasdasd",
        "id": 102,
        "type": "0",
        "petshop_id": 2,
        "active": 1,
        "created_at": "2017-02-08 23:28:14",
        "updated_at": "2017-02-08 23:28:14",
        "parent_category_id": null,
        "animal_types": [
            0,
            3,
            4
        ]
    },
    {
        "name": "a213121486831689",
        "id": 103,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-11 16:48:09",
        "updated_at": "2017-02-11 16:48:09",
        "parent_category_id": 86,
        "animal_types": []
    },
    {
        "name": "a213121486831696",
        "id": 104,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-11 16:48:16",
        "updated_at": "2017-02-11 16:48:16",
        "parent_category_id": 86,
        "animal_types": []
    },
    {
        "name": "dSFDSAFSDFSADFDAS",
        "id": 105,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-13 22:43:06",
        "updated_at": "2017-02-13 22:43:06",
        "parent_category_id": 92,
        "animal_types": []
    },
    {
        "name": "MAE MAE EDIT NOW IS DAUGHTER",
        "id": 106,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-13 22:44:21",
        "updated_at": "2017-02-13 22:46:49",
        "parent_category_id": 92,
        "animal_types": [
            2
        ]
    },
    {
        "name": "ASASdaSDASDASDASDASdasdASD",
        "id": 107,
        "type": "0",
        "petshop_id": 2,
        "active": 1,
        "created_at": "2017-02-15 23:01:08",
        "updated_at": "2017-02-15 23:01:08",
        "parent_category_id": null,
        "animal_types": [
            0,
            2,
            4,
            5
        ]
    },
    {
        "name": "ASASdaSDASDASDASDASdasdASD",
        "id": 108,
        "type": "0",
        "petshop_id": 2,
        "active": 1,
        "created_at": "2017-02-15 23:01:11",
        "updated_at": "2017-02-15 23:01:11",
        "parent_category_id": null,
        "animal_types": [
            0,
            2,
            4,
            5
        ]
    },
    {
        "name": "a213121487376130",
        "id": 109,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-18 00:02:09",
        "updated_at": "2017-02-18 00:02:09",
        "parent_category_id": 86,
        "animal_types": []
    },
    {
        "name": "PARENTa213121487560178",
        "id": 110,
        "type": "0",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-20 03:09:38",
        "updated_at": "2017-02-20 03:09:38",
        "parent_category_id": null,
        "animal_types": [
            1,
            2,
            3,
            4
        ]
    },
    {
        "name": "PARENTa213121487560182",
        "id": 111,
        "type": "0",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-20 03:09:42",
        "updated_at": "2017-02-20 03:09:42",
        "parent_category_id": null,
        "animal_types": [
            1,
            2,
            3,
            4
        ]
    },
    {
        "name": "a213121487560185",
        "id": 112,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-20 03:09:44",
        "updated_at": "2017-02-20 03:09:44",
        "parent_category_id": 86,
        "animal_types": []
    },
    {
        "name": "a213121487560186",
        "id": 113,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-20 03:09:45",
        "updated_at": "2017-02-20 03:09:45",
        "parent_category_id": 86,
        "animal_types": []
    },
    {
        "name": "a213121487560461",
        "id": 114,
        "type": "1",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-20 03:14:20",
        "updated_at": "2017-02-20 03:14:20",
        "parent_category_id": 86,
        "animal_types": []
    },
    {
        "name": "asdasdasdasd",
        "id": 115,
        "type": "0",
        "petshop_id": 2,
        "active": 1,
        "created_at": "2017-02-21 04:58:43",
        "updated_at": "2017-02-21 04:58:43",
        "parent_category_id": null,
        "animal_types": [
            0,
            2,
            4,
            5
        ]
    },
    {
        "name": "PARENTa213121487653179",
        "id": 116,
        "type": "0",
        "petshop_id": 1,
        "active": 1,
        "created_at": "2017-02-21 04:59:39",
        "updated_at": "2017-02-21 04:59:39",
        "parent_category_id": null,
        "animal_types": [
            1,
            2,
            3,
            4
        ]
    }
]
```

### HTTP Request
`GET api/admin/v1/categories`

`HEAD api/admin/v1/categories`


<!-- END_7254739c738bf9f1a9ff99b8c7d8cba3 -->
<!-- START_d010c813283e5c5aa672bdfd764f6789 -->
## api/admin/v1/categories/{category_id}

> Example request:

```bash
curl "http://localhost/api/admin/v1/categories/{category_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/categories/{category_id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/categories/{category_id}`

`HEAD api/admin/v1/categories/{category_id}`


<!-- END_d010c813283e5c5aa672bdfd764f6789 -->
<!-- START_f8d54af30af1baba8fcf4f601d486e4a -->
## api/admin/v1/categories

> Example request:

```bash
curl "http://localhost/api/admin/v1/categories" \
-H "Accept: application/json" \
    -d "animal_type"="provident" \
    -d "type"="1" \
    -d "name"="provident" \
    -d "parent_category_id"="provident" \
    -d "petshop_id"="provident" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/categories",
    "method": "POST",
    "data": {
        "animal_type": "provident",
        "type": true,
        "name": "provident",
        "parent_category_id": "provident",
        "petshop_id": "provident"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/admin/v1/categories`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    animal_type | array |  optional  | Required if `type` is `0`
    type | boolean |  required  | 
    name | string |  required  | Minimum: `2`
    parent_category_id | string |  optional  | Required if `type` is `1` Valid petshops_category id
    petshop_id | string |  optional  | Valid petshop id

<!-- END_f8d54af30af1baba8fcf4f601d486e4a -->
<!-- START_c772daefef6a1ae918ed1cd1eb976993 -->
## api/admin/v1/categories/{category_id}

> Example request:

```bash
curl "http://localhost/api/admin/v1/categories/{category_id}" \
-H "Accept: application/json" \
    -d "animal_type"="ad" \
    -d "type"="1" \
    -d "name"="ad" \
    -d "parent_category_id"="ad" \
    -d "petshop_id"="ad" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/categories/{category_id}",
    "method": "PATCH",
    "data": {
        "animal_type": "ad",
        "type": true,
        "name": "ad",
        "parent_category_id": "ad",
        "petshop_id": "ad"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PATCH api/admin/v1/categories/{category_id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    animal_type | array |  optional  | Required if `type` is `0`
    type | boolean |  required  | 
    name | string |  required  | Minimum: `2`
    parent_category_id | string |  optional  | Required if `type` is `1` Valid petshops_category id
    petshop_id | string |  optional  | Valid petshop id

<!-- END_c772daefef6a1ae918ed1cd1eb976993 -->
#/admin/orders

CRUD orders
<!-- START_7c168563fe6cd340a191db03cbae4c11 -->
## api/admin/v1/orders

> Example request:

```bash
curl "http://localhost/api/admin/v1/orders" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/orders",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/orders`

`HEAD api/admin/v1/orders`


<!-- END_7c168563fe6cd340a191db03cbae4c11 -->
<!-- START_88a79d3777de5e5adfd5e442f425971e -->
## api/admin/v1/orders/{order_id}

> Example request:

```bash
curl "http://localhost/api/admin/v1/orders/{order_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/orders/{order_id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/orders/{order_id}`

`HEAD api/admin/v1/orders/{order_id}`


<!-- END_88a79d3777de5e5adfd5e442f425971e -->
#/admin/petshops

CRUD petshops, areas, ratings and more
<!-- START_146439906bdb1b58facf367717fe630d -->
## api/admin/v1/petshops/{petshop_id}/areas

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/areas" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/areas",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/petshops/{petshop_id}/areas`

`HEAD api/admin/v1/petshops/{petshop_id}/areas`


<!-- END_146439906bdb1b58facf367717fe630d -->
<!-- START_605724b70ac770c644bdf992d35c6238 -->
## api/admin/v1/petshops/{petshop_id}/areas

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/areas" \
-H "Accept: application/json" \
    -d "type"="amet" \
    -d "active"="1" \
    -d "address"="amet" \
    -d "delivery_time"="8" \
    -d "delivery_fee"="8" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/areas",
    "method": "POST",
    "data": {
        "type": "amet",
        "active": true,
        "address": "amet",
        "delivery_time": 8,
        "delivery_fee": 8
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/admin/v1/petshops/{petshop_id}/areas`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    type | string |  required  | 
    active | boolean |  required  | 
    address | string |  required  | 
    delivery_time | numeric |  required  | 
    delivery_fee | numeric |  required  | 

<!-- END_605724b70ac770c644bdf992d35c6238 -->
<!-- START_e4c7f22852195e86932bea1f4b87b1a7 -->
## api/admin/v1/petshops/{petshop_id}/areas/{area_id}

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/areas/{area_id}" \
-H "Accept: application/json" \
    -d "type"="eligendi" \
    -d "active"="1" \
    -d "address"="eligendi" \
    -d "delivery_time"="5421907" \
    -d "delivery_fee"="5421907" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/areas/{area_id}",
    "method": "PATCH",
    "data": {
        "type": "eligendi",
        "active": true,
        "address": "eligendi",
        "delivery_time": 5421907,
        "delivery_fee": 5421907
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PATCH api/admin/v1/petshops/{petshop_id}/areas/{area_id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    type | string |  optional  | 
    active | boolean |  optional  | 
    address | string |  optional  | 
    delivery_time | numeric |  optional  | 
    delivery_fee | numeric |  optional  | 

<!-- END_e4c7f22852195e86932bea1f4b87b1a7 -->
<!-- START_4892bfb7c356864caf80f78aada2d404 -->
## api/admin/v1/petshops/{petshop_id}/openinghours

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/openinghours" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/openinghours",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/petshops/{petshop_id}/openinghours`

`HEAD api/admin/v1/petshops/{petshop_id}/openinghours`


<!-- END_4892bfb7c356864caf80f78aada2d404 -->
<!-- START_6d7cb42e707668c70172c5e9ff9b3004 -->
## api/admin/v1/petshops/{petshop_id}/openinghours

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/openinghours" \
-H "Accept: application/json" \
    -d "day"="ut" \
    -d "hour_init"="23:42" \
    -d "hour_end"="23:42" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/openinghours",
    "method": "POST",
    "data": {
        "day": "ut",
        "hour_init": "23:42",
        "hour_end": "23:42"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/admin/v1/petshops/{petshop_id}/openinghours`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    day | string |  required  | 
    hour_init | date |  required  | Date format: `H:i`
    hour_end | date |  required  | Date format: `H:i`

<!-- END_6d7cb42e707668c70172c5e9ff9b3004 -->
<!-- START_6eb40ee0837800057fb1f6800b2a7988 -->
## api/admin/v1/petshops/{petshop_id}/ratings

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/ratings" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/ratings",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/petshops/{petshop_id}/ratings`

`HEAD api/admin/v1/petshops/{petshop_id}/ratings`


<!-- END_6eb40ee0837800057fb1f6800b2a7988 -->
<!-- START_7baa923ac4f9e14cb67ac5c29aceef55 -->
## api/admin/v1/petshops/{petshop_id}/ratings/{rating_id}

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/ratings/{rating_id}" \
-H "Accept: application/json" \
    -d "petshop_comment"="et" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/ratings/{rating_id}",
    "method": "PATCH",
    "data": {
        "petshop_comment": "et"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PATCH api/admin/v1/petshops/{petshop_id}/ratings/{rating_id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    petshop_comment | string |  required  | 

<!-- END_7baa923ac4f9e14cb67ac5c29aceef55 -->
<!-- START_fada9644a9202a9404be63d8764bef03 -->
## api/admin/v1/petshops

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
[
    {
        "id": 1,
        "company_name": "uiiuyiu1486430236",
        "email": "1486430236iuyiu@sadsa.com",
        "ie": "3243211487376962",
        "cnpj": "18.437.647\/0001-40",
        "trade_name": "iuyiuy1486430236",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/gllrpxmksoheyfl0qe7g.png",
        "active": 1,
        "created_at": "2017-02-07 22:55:14",
        "updated_at": "2017-02-18 00:16:04"
    },
    {
        "id": 2,
        "company_name": "uiiuyiu1486509171",
        "email": "1486509171iuyiu@sadsa.com",
        "ie": "3243211486509171",
        "cnpj": "83.098.286\/0001-17",
        "trade_name": "iuyiuy1486509171",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/juedkmclxnv7nehnsmma.png",
        "active": 1,
        "created_at": "2017-02-07 23:12:53",
        "updated_at": "2017-02-07 23:12:53"
    },
    {
        "id": 3,
        "company_name": "uiiuyiu1486595008",
        "email": "1486595008iuyiu@sadsa.com",
        "ie": "3243211486595008",
        "cnpj": "58.456.212\/0001-68",
        "trade_name": "iuyiuy1486595008",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/zphivs3ftjxs5ujaxr3g.png",
        "active": 1,
        "created_at": "2017-02-08 23:03:38",
        "updated_at": "2017-02-08 23:03:38"
    },
    {
        "id": 4,
        "company_name": "uiiuyiu1486831593",
        "email": "1486831593iuyiu@sadsa.com",
        "ie": "3243211486831593",
        "cnpj": "26.275.631\/0001-07",
        "trade_name": "iuyiuy1486831593",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/plh8fjab77118fwlhd0u.png",
        "active": 1,
        "created_at": "2017-02-11 16:46:45",
        "updated_at": "2017-02-11 16:46:45"
    },
    {
        "id": 5,
        "company_name": "uiiuyiu1487026237",
        "email": "1487026237iuyiu@sadsa.com",
        "ie": "3243211487026237",
        "cnpj": "47.161.731\/0001-82",
        "trade_name": "iuyiuy1487026237",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/uvcr7mkfcnzkgb6mukjq.png",
        "active": 1,
        "created_at": "2017-02-13 22:50:49",
        "updated_at": "2017-02-13 22:50:49"
    },
    {
        "id": 6,
        "company_name": "uiiuyiu1487026254",
        "email": "1487026254iuyiu@sadsa.com",
        "ie": "3243211487026254",
        "cnpj": "45.740.836\/0001-60",
        "trade_name": "iuyiuy1487026254",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "asdasdasdasdasd",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/gdbvgnq4g9qupsp025wk.png",
        "active": 1,
        "created_at": "2017-02-13 22:51:04",
        "updated_at": "2017-02-13 22:51:04"
    },
    {
        "id": 7,
        "company_name": "Novo petshop",
        "email": "asdasd@gmail.com",
        "ie": "55456456",
        "cnpj": "12.256.771\/0001-23",
        "trade_name": "Novo petshop LTDA",
        "phone": "123123123",
        "address": "123123123",
        "google_address": "Sao paulo",
        "google_city": "sadasd",
        "zip_code": "123123123",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/oqcqbpzn4jfzqhczlnfz.png",
        "active": 1,
        "created_at": "2017-02-13 23:18:47",
        "updated_at": "2017-02-13 23:18:47"
    },
    {
        "id": 8,
        "company_name": "uiiuyiu1487115189",
        "email": "1487115189iuyiu@sadsa.com",
        "ie": "3243211487115189",
        "cnpj": "25.522.719\/0001-13",
        "trade_name": "iuyiuy1487115189",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/xzaocza5dmmqcemed5mn.png",
        "active": 1,
        "created_at": "2017-02-14 23:33:12",
        "updated_at": "2017-02-14 23:33:12"
    },
    {
        "id": 9,
        "company_name": "uiiuyiu1487117680",
        "email": "1487117680iuyiu@sadsa.com",
        "ie": "3243211487117680",
        "cnpj": "14.216.838\/0001-21",
        "trade_name": "iuyiuy1487117680",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/pt5ff3fqrmswplif74sq.png",
        "active": 1,
        "created_at": "2017-02-15 00:14:49",
        "updated_at": "2017-02-15 00:14:49"
    },
    {
        "id": 10,
        "company_name": "uiiuyiu1487199750",
        "email": "1487199750iuyiu@sadsa.com",
        "ie": "3243211487199750",
        "cnpj": "74.018.386\/0001-03",
        "trade_name": "iuyiuy1487199750",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/qesqjkf02u93lh0ajrsg.png",
        "active": 1,
        "created_at": "2017-02-15 23:02:40",
        "updated_at": "2017-02-15 23:02:40"
    },
    {
        "id": 11,
        "company_name": "PetShopXX",
        "email": "asdasdasdasdasdasdasdasd@gmail.com",
        "ie": "5645645645646",
        "cnpj": "65.037.459\/0001-05",
        "trade_name": "PetShop LTdAASd",
        "phone": "11111111",
        "address": "asdasdasd",
        "google_address": "ASDasdasdasd",
        "google_city": "sadasd",
        "zip_code": "565564564",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/ozrdnwujonp8ynbz6on3.png",
        "active": 1,
        "created_at": "2017-02-15 23:05:07",
        "updated_at": "2017-02-15 23:05:07"
    },
    {
        "id": 12,
        "company_name": "asdasdasdasd",
        "email": "3asdasdasdasd@gmail.com",
        "ie": "123123123123123",
        "cnpj": "02.244.812\/0001-08",
        "trade_name": "asdasdasdasdasd",
        "phone": "12312312312312",
        "address": "asdasdasdasdasd",
        "google_address": "asdasdasdasdasdasd",
        "google_city": "sadasd",
        "zip_code": "56456456456456",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/t8lidjkanzxqplldwwow.png",
        "active": 1,
        "created_at": "2017-02-15 23:07:49",
        "updated_at": "2017-02-15 23:07:49"
    },
    {
        "id": 13,
        "company_name": "ASDASdasdasdasdasdasdasd",
        "email": "asdasdASxx@gmail.com",
        "ie": "123123123123",
        "cnpj": "92.276.245\/0001-64",
        "trade_name": "aDASdasdasdasdASd",
        "phone": "123123123123",
        "address": "asdasdasdasd",
        "google_address": "asdasdASdasd",
        "google_city": "sadasd",
        "zip_code": "213123123123",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/elywtp9vvycql70ipuyc.png",
        "active": 1,
        "created_at": "2017-02-15 23:11:30",
        "updated_at": "2017-02-15 23:11:30"
    },
    {
        "id": 17,
        "company_name": "uiiuyiu1487200470",
        "email": "1487200470iuyiu@sadsa.com",
        "ie": "3243211487200470",
        "cnpj": "64.835.973\/0001-23",
        "trade_name": "iuyiuy1487200470",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/r3eitcmxmxw4zrypvuyg.png",
        "active": 1,
        "created_at": "2017-02-15 23:14:40",
        "updated_at": "2017-02-15 23:14:40"
    },
    {
        "id": 18,
        "company_name": "Nome Fantasiaaa",
        "email": "asdasdxx@gmail.com",
        "ie": "14141414",
        "cnpj": "83.761.329\/0001-00",
        "trade_name": "RAzao Social LTDA",
        "phone": "11101010",
        "address": "rua das na\u00e7oes",
        "google_address": "SasdSS",
        "google_city": "sadasd",
        "zip_code": "7501500",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/vah06ccx5dshsiqn1hcb.png",
        "active": 1,
        "created_at": "2017-02-15 23:19:21",
        "updated_at": "2017-02-15 23:19:21"
    },
    {
        "id": 19,
        "company_name": "NOmeee Fantasiaaa",
        "email": "asdxxkdkd@gmail.com",
        "ie": "1414155258",
        "cnpj": "78.085.011\/0001-09",
        "trade_name": "RAzaooo Social LTDAA",
        "phone": "123123123",
        "address": "rua das na\u00e7oes tres",
        "google_address": "Sadpasdo",
        "google_city": "sadasd",
        "zip_code": "84751258",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/xm6sihcuwfoalonmkxoq.png",
        "active": 1,
        "created_at": "2017-02-15 23:20:21",
        "updated_at": "2017-02-15 23:20:21"
    },
    {
        "id": 20,
        "company_name": "uiiuyiu1487376938",
        "email": "1487376938iuyiu@sadsa.com",
        "ie": "3243211487376938",
        "cnpj": "84.015.594\/0001-02",
        "trade_name": "iuyiuy1487376938",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/btzsh6vgmyksscgzjkfk.png",
        "active": 1,
        "created_at": "2017-02-18 00:15:40",
        "updated_at": "2017-02-18 00:15:40"
    },
    {
        "id": 21,
        "company_name": "uiiuyiu1487388053",
        "email": "1487388053iuyiu@sadsa.com",
        "ie": "3243211487388053",
        "cnpj": "77.713.723\/0001-62",
        "trade_name": "iuyiuy1487388053",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/aplvyr7sjkseyfvshsyi.png",
        "active": 1,
        "created_at": "2017-02-18 03:21:04",
        "updated_at": "2017-02-18 03:21:04"
    },
    {
        "id": 22,
        "company_name": "uiiuyiu1487388153",
        "email": "1487388153iuyiu@sadsa.com",
        "ie": "3243211487388153",
        "cnpj": "83.212.446\/0001-07",
        "trade_name": "iuyiuy1487388153",
        "phone": "786786",
        "address": "uiyiuyu",
        "google_address": "12312",
        "google_city": "sadasd",
        "zip_code": "897676",
        "picture": "https:\/\/res.cloudinary.com\/appock-co\/image\/upload\/c_fill,h_250,w_250\/puwsfkkw6yca81w7oumi.png",
        "active": 1,
        "created_at": "2017-02-18 03:22:45",
        "updated_at": "2017-02-18 03:22:45"
    }
]
```

### HTTP Request
`GET api/admin/v1/petshops`

`HEAD api/admin/v1/petshops`


<!-- END_fada9644a9202a9404be63d8764bef03 -->
<!-- START_2e3e5a1666bef26fdae272a4eec9df97 -->
## api/admin/v1/petshops/{petshop_id}

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/petshops/{petshop_id}`

`HEAD api/admin/v1/petshops/{petshop_id}`


<!-- END_2e3e5a1666bef26fdae272a4eec9df97 -->
<!-- START_3f4a8c1ff37ed4f2345889784f7e6d93 -->
## api/admin/v1/petshops

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops" \
-H "Accept: application/json" \
    -d "cnpj"="non" \
    -d "ie"="non" \
    -d "company_name"="non" \
    -d "trade_name"="non" \
    -d "phone"="non" \
    -d "email"="parker.naomi@example.net" \
    -d "address"="non" \
    -d "google_address"="non" \
    -d "zip_code"="non" \
    -d "picture"="non" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops",
    "method": "POST",
    "data": {
        "cnpj": "non",
        "ie": "non",
        "company_name": "non",
        "trade_name": "non",
        "phone": "non",
        "email": "parker.naomi@example.net",
        "address": "non",
        "google_address": "non",
        "zip_code": "non",
        "picture": "non"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/admin/v1/petshops`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    cnpj | string |  required  | 
    ie | string |  required  | 
    company_name | string |  required  | 
    trade_name | string |  required  | 
    phone | string |  required  | 
    email | email |  required  | 
    address | string |  required  | 
    google_address | string |  required  | 
    zip_code | string |  required  | 
    picture | string |  required  | 

<!-- END_3f4a8c1ff37ed4f2345889784f7e6d93 -->
<!-- START_9f8a3eb8922f35db229b140a6a995f7b -->
## api/admin/v1/petshops/{petshop_id}

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}" \
-H "Accept: application/json" \
    -d "cnpj"="exercitationem" \
    -d "ie"="exercitationem" \
    -d "company_name"="exercitationem" \
    -d "trade_name"="exercitationem" \
    -d "phone"="exercitationem" \
    -d "email"="barry.okon@example.org" \
    -d "address"="exercitationem" \
    -d "google_address"="exercitationem" \
    -d "zip_code"="exercitationem" \
    -d "picture"="exercitationem" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}",
    "method": "PATCH",
    "data": {
        "cnpj": "exercitationem",
        "ie": "exercitationem",
        "company_name": "exercitationem",
        "trade_name": "exercitationem",
        "phone": "exercitationem",
        "email": "barry.okon@example.org",
        "address": "exercitationem",
        "google_address": "exercitationem",
        "zip_code": "exercitationem",
        "picture": "exercitationem"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PATCH api/admin/v1/petshops/{petshop_id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    cnpj | string |  optional  | 
    ie | string |  optional  | 
    company_name | string |  optional  | 
    trade_name | string |  optional  | 
    phone | string |  optional  | 
    email | email |  optional  | 
    address | string |  optional  | 
    google_address | string |  optional  | 
    zip_code | string |  optional  | 
    picture | string |  optional  | 

<!-- END_9f8a3eb8922f35db229b140a6a995f7b -->
#/../../{petshop_id}/products

CRUD products, stocks, promotions
<!-- START_67be530e8cc4a450cb7f9159100bd859 -->
## api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks`

`HEAD api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks`


<!-- END_67be530e8cc4a450cb7f9159100bd859 -->
<!-- START_646244a68be50a425b590c871f926182 -->
## api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks" \
-H "Accept: application/json" \
    -d "description"="dolor" \
    -d "price"="38" \
    -d "current_stock"="38" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks",
    "method": "POST",
    "data": {
        "description": "dolor",
        "price": 38,
        "current_stock": 38
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    description | string |  required  | Minimum: `3`
    price | numeric |  required  | 
    current_stock | numeric |  required  | 

<!-- END_646244a68be50a425b590c871f926182 -->
<!-- START_e1518a32e14c11727d368d32cc28f143 -->
## api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}" \
-H "Accept: application/json" \
    -d "current_stock"="197944821" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}",
    "method": "PATCH",
    "data": {
        "current_stock": 197944821
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PATCH api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    current_stock | numeric |  required  | 

<!-- END_e1518a32e14c11727d368d32cc28f143 -->
<!-- START_df13c61d50ee7a4c4f0f5a8c6a6524e5 -->
## api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}/promotions

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}/promotions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}/promotions",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}/promotions`

`HEAD api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}/promotions`


<!-- END_df13c61d50ee7a4c4f0f5a8c6a6524e5 -->
<!-- START_402b438dbac87b1228d573e8c0cd21a4 -->
## api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}/promotions

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}/promotions" \
-H "Accept: application/json" \
    -d "type"="1" \
    -d "percent"="899" \
    -d "value"="899" \
    -d "expires"="1981-11-07" \
    -d "description"="magnam" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}/promotions",
    "method": "POST",
    "data": {
        "type": true,
        "percent": 899,
        "value": 899,
        "expires": "1981-11-07",
        "description": "magnam"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/admin/v1/petshops/{petshop_id}/products/{product_id}/stocks/{stock_id}/promotions`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    type | boolean |  required  | 
    percent | numeric |  optional  | Required if the parameters `value` are not present.
    value | numeric |  optional  | Required if the parameters `percent` are not present.
    expires | date |  required  | 
    description | string |  required  | Minimum: `3`

<!-- END_402b438dbac87b1228d573e8c0cd21a4 -->
<!-- START_8a339fab05e268780f1efcd955ba0146 -->
## api/admin/v1/petshops/{petshop_id}/products

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/products" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/products",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/petshops/{petshop_id}/products`

`HEAD api/admin/v1/petshops/{petshop_id}/products`


<!-- END_8a339fab05e268780f1efcd955ba0146 -->
<!-- START_9b88ff124476b2d52e28b377d0c90160 -->
## api/admin/v1/petshops/{petshop_id}/products/{product_id}

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/admin/v1/petshops/{petshop_id}/products/{product_id}`

`HEAD api/admin/v1/petshops/{petshop_id}/products/{product_id}`


<!-- END_9b88ff124476b2d52e28b377d0c90160 -->
<!-- START_bf0d696aef39e53da68e63a87f666a40 -->
## api/admin/v1/petshops/{petshop_id}/products

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/products" \
-H "Accept: application/json" \
    -d "name"="quia" \
    -d "brand"="quia" \
    -d "especifications"="quia" \
    -d "stock_low"="83" \
    -d "categories"="quia" \
    -d "picture"="quia" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/products",
    "method": "POST",
    "data": {
        "name": "quia",
        "brand": "quia",
        "especifications": "quia",
        "stock_low": 83,
        "categories": "quia",
        "picture": "quia"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/admin/v1/petshops/{petshop_id}/products`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Minimum: `3`
    brand | string |  required  | Minimum: `3`
    especifications | string |  optional  | Minimum: `3`
    stock_low | numeric |  required  | 
    categories | array |  required  | Valid petshops_category id
    picture | string |  optional  | 

<!-- END_bf0d696aef39e53da68e63a87f666a40 -->
<!-- START_8b7aa02b1993ee192faf02f97e3aface -->
## api/admin/v1/petshops/{petshop_id}/products/{product_id}

> Example request:

```bash
curl "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}" \
-H "Accept: application/json" \
    -d "name"="aut" \
    -d "brand"="aut" \
    -d "especifications"="aut" \
    -d "stock_low"="8" \
    -d "categories"="aut" \
    -d "picture"="aut" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/admin/v1/petshops/{petshop_id}/products/{product_id}",
    "method": "PATCH",
    "data": {
        "name": "aut",
        "brand": "aut",
        "especifications": "aut",
        "stock_low": 8,
        "categories": "aut",
        "picture": "aut"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PATCH api/admin/v1/petshops/{petshop_id}/products/{product_id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  optional  | Minimum: `3`
    brand | string |  optional  | Minimum: `3`
    especifications | string |  optional  | Minimum: `3`
    stock_low | numeric |  optional  | 
    categories | array |  optional  | Valid category id
    picture | string |  optional  | 

<!-- END_8b7aa02b1993ee192faf02f97e3aface -->
#/app/users

CRUD users
<!-- START_1ac0d989f3b1c8c9d14e73ecc8420819 -->
## [get] /address

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/user/address" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user/address",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/user/address`

`HEAD api/app/v1/user/address`


<!-- END_1ac0d989f3b1c8c9d14e73ecc8420819 -->
<!-- START_049e4ad4e06ea1bc2624bc4d95bee11a -->
## [get] /address/{address_id}

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/user/address/{address_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user/address/{address_id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/user/address/{address_id}`

`HEAD api/app/v1/user/address/{address_id}`


<!-- END_049e4ad4e06ea1bc2624bc4d95bee11a -->
<!-- START_d8378ec8bc8da558d1521bb5ea661f29 -->
## [post] /address

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/user/address" \
-H "Accept: application/json" \
    -d "name"="eum" \
    -d "address"="eum" \
    -d "number"="eum" \
    -d "ajunct"="eum" \
    -d "zip_code"="eum" \
    -d "lat"="9643" \
    -d "long"="9643" \
    -d "city"="eum" \
    -d "state"="eum" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user/address",
    "method": "POST",
    "data": {
        "name": "eum",
        "address": "eum",
        "number": "eum",
        "ajunct": "eum",
        "zip_code": "eum",
        "lat": 9643,
        "long": 9643,
        "city": "eum",
        "state": "eum"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/app/v1/user/address`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    address | string |  required  | 
    number | string |  required  | 
    ajunct | string |  required  | 
    zip_code | string |  required  | 
    lat | numeric |  required  | 
    long | numeric |  required  | 
    city | string |  required  | 
    state | string |  required  | Minimum: `2` Maximum: `2`

<!-- END_d8378ec8bc8da558d1521bb5ea661f29 -->
<!-- START_2b0be4b07436fcfcf68d07be60ad1a5d -->
## [patch] /address

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/user/address/{address_id}" \
-H "Accept: application/json" \
    -d "name"="labore" \
    -d "address"="labore" \
    -d "number"="labore" \
    -d "ajunct"="labore" \
    -d "zip_code"="labore" \
    -d "lat"="939" \
    -d "long"="939" \
    -d "city"="labore" \
    -d "state"="labore" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user/address/{address_id}",
    "method": "PATCH",
    "data": {
        "name": "labore",
        "address": "labore",
        "number": "labore",
        "ajunct": "labore",
        "zip_code": "labore",
        "lat": 939,
        "long": 939,
        "city": "labore",
        "state": "labore"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PATCH api/app/v1/user/address/{address_id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    address | string |  required  | 
    number | string |  required  | 
    ajunct | string |  required  | 
    zip_code | string |  required  | 
    lat | numeric |  required  | 
    long | numeric |  required  | 
    city | string |  required  | 
    state | string |  required  | Minimum: `2` Maximum: `2`

<!-- END_2b0be4b07436fcfcf68d07be60ad1a5d -->
<!-- START_2bf717b9a6021c2db873933c79ac13d1 -->
## [get] /pets

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/user/pets" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user/pets",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/user/pets`

`HEAD api/app/v1/user/pets`


<!-- END_2bf717b9a6021c2db873933c79ac13d1 -->
<!-- START_f7b61d482a61ef5766a8adda0140f761 -->
## [get] /pets/{pets_id}

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/user/pets/{pets_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user/pets/{pets_id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/user/pets/{pets_id}`

`HEAD api/app/v1/user/pets/{pets_id}`


<!-- END_f7b61d482a61ef5766a8adda0140f761 -->
<!-- START_e710f3be24a6ca1f6a7998cf2629e82f -->
## [post] /pets

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/user/pets" \
-H "Accept: application/json" \
    -d "type"="corrupti" \
    -d "name"="corrupti" \
    -d "picture"="corrupti" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user/pets",
    "method": "POST",
    "data": {
        "type": "corrupti",
        "name": "corrupti",
        "picture": "corrupti"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/app/v1/user/pets`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    type | string |  required  | 
    name | string |  required  | Minimum: `2`
    picture | string |  required  | 

<!-- END_e710f3be24a6ca1f6a7998cf2629e82f -->
<!-- START_c285c95a7a525d28f0ef24e8aa2383ff -->
## [patch] /pets

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/user/pets/{pets_id}" \
-H "Accept: application/json" \
    -d "type"="molestias" \
    -d "name"="molestias" \
    -d "picture"="molestias" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user/pets/{pets_id}",
    "method": "PATCH",
    "data": {
        "type": "molestias",
        "name": "molestias",
        "picture": "molestias"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PATCH api/app/v1/user/pets/{pets_id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    type | string |  required  | Maximum: `1`
    name | string |  required  | 
    picture | string |  required  | 

<!-- END_c285c95a7a525d28f0ef24e8aa2383ff -->
<!-- START_c5227d3cd287b4fdafbf8014c0771024 -->
## [get] /

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/user`

`HEAD api/app/v1/user`


<!-- END_c5227d3cd287b4fdafbf8014c0771024 -->
<!-- START_4142847e7f2fb6609d4db5d144335f2d -->
## [post] /

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/user" \
-H "Accept: application/json" \
    -d "name"="et" \
    -d "email"="uratke@example.net" \
    -d "password"="et" \
    -d "facebook_token"="et" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user",
    "method": "POST",
    "data": {
        "name": "et",
        "email": "uratke@example.net",
        "password": "et",
        "facebook_token": "et"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/app/v1/user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Minimum: `5`
    email | email |  required  | 
    password | string |  required  | Minimum: `5`
    facebook_token | string |  optional  | Minimum: `5`

<!-- END_4142847e7f2fb6609d4db5d144335f2d -->
<!-- START_7aaa5d5cec630266f6bc8d5d6a9bf565 -->
## [post] /auth

`Requires authentication: no`

> Example request:

```bash
curl "http://localhost/api/app/v1/user/auth" \
-H "Accept: application/json" \
    -d "email"="doloribus" \
    -d "password"="doloribus" \
    -d "facebook_token"="doloribus" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user/auth",
    "method": "POST",
    "data": {
        "email": "doloribus",
        "password": "doloribus",
        "facebook_token": "doloribus"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/app/v1/user/auth`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  optional  | Minimum: `2` Valid user email Required if the parameters `password` are present.
    password | string |  optional  | Minimum: `5` Required if the parameters `email` are present.
    facebook_token | string |  optional  | Minimum: `5` Valid user facebook_token Required if the parameters `password` or `email` are not present.

<!-- END_7aaa5d5cec630266f6bc8d5d6a9bf565 -->
<!-- START_45676bc890eb50d49514275ba516953f -->
## [patch] /

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/user" \
-H "Accept: application/json" \
    -d "name"="quae" \
    -d "email"="hettinger.paxton@example.org" \
    -d "password"="quae" \
    -d "facebook_token"="quae" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/user",
    "method": "PATCH",
    "data": {
        "name": "quae",
        "email": "hettinger.paxton@example.org",
        "password": "quae",
        "facebook_token": "quae"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PATCH api/app/v1/user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  optional  | Minimum: `5`
    email | email |  optional  | 
    password | string |  optional  | Minimum: `5`
    facebook_token | string |  optional  | Minimum: `5`

<!-- END_45676bc890eb50d49514275ba516953f -->
#/app/petshops

PETSHOPS/CATEGORIES/PROMOTIONS/PRODUCTS list
<!-- START_69d690fc8ea8785fde40eb307195b820 -->
## [get] /

`Requires authentication: no`

> Example request:

```bash
curl "http://localhost/api/app/v1/petshops" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/petshops",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/petshops`

`HEAD api/app/v1/petshops`


<!-- END_69d690fc8ea8785fde40eb307195b820 -->
<!-- START_cb41bdce12d6c2ab34440b864160f2f4 -->
## [get] /promotions

`Requires authentication: no`

> Example request:

```bash
curl "http://localhost/api/app/v1/petshops/promotions" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/petshops/promotions",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/petshops/promotions`

`HEAD api/app/v1/petshops/promotions`


<!-- END_cb41bdce12d6c2ab34440b864160f2f4 -->
<!-- START_75a6014e2f412df39bdce589176fc043 -->
## [get] /{petshop_id}

`Requires authentication: no`

> Example request:

```bash
curl "http://localhost/api/app/v1/petshops/{petshop_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/petshops/{petshop_id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/petshops/{petshop_id}`

`HEAD api/app/v1/petshops/{petshop_id}`


<!-- END_75a6014e2f412df39bdce589176fc043 -->
<!-- START_54ad49a00716aebaac2c99903dc61df0 -->
## [get] {petshop_id}/byaddress/{address_id}

Returns all information about a single petshop and the delivery fee for the given user's address

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/petshops/{petshop_id}/byaddress/{address_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/petshops/{petshop_id}/byaddress/{address_id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/petshops/{petshop_id}/byaddress/{address_id}`

`HEAD api/app/v1/petshops/{petshop_id}/byaddress/{address_id}`


<!-- END_54ad49a00716aebaac2c99903dc61df0 -->
<!-- START_fc4d254568caaa5fca8e9ef2d5563f78 -->
## [get] /byaddress/{address_id}

Returns all avaliable petshops for the given user's address

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/petshops/byaddress/{address_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/petshops/byaddress/{address_id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/petshops/byaddress/{address_id}`

`HEAD api/app/v1/petshops/byaddress/{address_id}`


<!-- END_fc4d254568caaa5fca8e9ef2d5563f78 -->
<!-- START_390fb87bbd7cb31c8332f5f2b7335003 -->
## [get] /promotions/byaddress/{address_id}

Returns all avaliable promotions for the given user's address

`Requires authentication: yes`

> Example request:

```bash
curl "http://localhost/api/app/v1/petshops/promotions/byaddress/{address_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/petshops/promotions/byaddress/{address_id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/petshops/promotions/byaddress/{address_id}`

`HEAD api/app/v1/petshops/promotions/byaddress/{address_id}`


<!-- END_390fb87bbd7cb31c8332f5f2b7335003 -->
<!-- START_7575269a730785601948d37659fd6152 -->
## [get] /{petshop_id}/categories

`Requires authentication: no`

> Example request:

```bash
curl "http://localhost/api/app/v1/petshops/{petshop_id}/categories" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/petshops/{petshop_id}/categories",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/petshops/{petshop_id}/categories`

`HEAD api/app/v1/petshops/{petshop_id}/categories`


<!-- END_7575269a730785601948d37659fd6152 -->
<!-- START_71f88a3daeb221a223811b0a6e78f14f -->
## [get] /{petshop_id}/categories/{category_id}/products

`Requires authentication: no`

> Example request:

```bash
curl "http://localhost/api/app/v1/petshops/{petshop_id}/categories/{category_id}/products" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/petshops/{petshop_id}/categories/{category_id}/products",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/app/v1/petshops/{petshop_id}/categories/{category_id}/products`

`HEAD api/app/v1/petshops/{petshop_id}/categories/{category_id}/products`


<!-- END_71f88a3daeb221a223811b0a6e78f14f -->
#/app/others
<!-- START_1044065a0977dfcc0970ff2ea6dbfddf -->
## [post] /contacts

`Requires authentication: no`

> Example request:

```bash
curl "http://localhost/api/app/v1/others/contacts" \
-H "Accept: application/json" \
    -d "email"="ona21@example.net" \
    -d "name"="cumque" \
    -d "message"="cumque" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/app/v1/others/contacts",
    "method": "POST",
    "data": {
        "email": "ona21@example.net",
        "name": "cumque",
        "message": "cumque"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/app/v1/others/contacts`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 
    name | string |  required  | 
    message | string |  required  | 

<!-- END_1044065a0977dfcc0970ff2ea6dbfddf -->
