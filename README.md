<h1 align="center" >API-PHP</h1>

<a name="overview">

## Contents
</a>

### [1. Overview](#overview)
### [2. URI and Versioning](#versioning)
### [3. Installation](#installation)
### [4. Items](#items)
### [5. Request](#request)
### [6. Credits](#credits)
### [7. License](#license)

---

<a name="overview">
<br>

## Overview
</a>
 Api written in the php programming language for processing store products.

---
<a name="versioning">
<br>

## URI and Versioning
</a>

We hope to improve the API over time. The changes won't always be backward compatible, so we're going to use versioning. This first iteration will have URIs prefixed with http://localhost:3000/v0/api and is structured as described below. There is currently no rate limit.

---

<a name="installation">
<br>

## Installation
</a>

```text
git clone https://github.com/niktiin/api-php.git
cd api-php
```

---

<a name="items">
<br>

## Items
</a>

 Items identified by their heads, which are unique integers, and live under /api/items/{id}.

property|type|description
---|---|---
name|String|name of the item.
price|Nubmer|price of the item.
discount|Number| discount of the item. Number 0 - 100.
images|Array|image urls array.
feedback|Array|user reviews array.
description|String|description of the item.
cat|String|item category.
id|Nubmer|item id (read-only)

For example, http://localhost:3000/v0/api/items/0

---

<a name="request">
<br>

## Request
</a>

### 2. Method GET (Get item)
<br>
URL : <a>
  http://localhost:3000/v0/api/items
</a>
or 
<a>
  http://localhost:3000/v0/api/items/{id}
</a>
<br>
<br>

Required parameters:

#### 1. In URL parameters:

  property|type
  ---|---
  id|Number



#### Request example:

URL : <a>
  http://localhost:3000/v0/api/items/1
  </a>

Responce: 

```JSON
{
    "result": {
        "name": "item",
        "price": 100,
        "discount": 10,
        "feedback": [],
        "description": "description more 15 symbols........",
        "images": [
            "image_1.png"
        ],
        "cat": "face",
        "id": 1
    },
    "status": "OK",
    "message": ""
}
```
<br>

### 2. Method POST (Create item)
<br>
URL : <a>
  http://localhost:3000/v0/api/items
</a>
<br>
<br>

Strictly required parameters:

#### 1. In body parameters:

  property|type|description
  ---|---|---
  name|String|-
  price|Nubmer|-
  discount|Number| discount of the item. Number 0 - 100.
  images|Array|links to images
  feedback|Array|user reviews
  description|String|-
  cat|String|category

#### Request example:

URL : <a>
  http://localhost:3000/v0/api/items
  </a>

```JSON
{
    "name": "item",
    "price": 100,
    "discount": 10,
    "feedback": [],
    "description": "description more 15 symbols........",
    "images": ["image_1.png"],
    "cat": "face"
}
```

Responce: 

```JSON
{
    "result": {
        "name": "item",
        "price": 100,
        "discount": 10,
        "feedback": [],
        "description": "description more 15 symbols........",
        "images": [
            "image_1.png"
        ],
        "cat": "face",
        "id": 2
    },
    "status": "OK",
    "message": ""
}
```
<br>

### 3. Method PUT (Update item)
<br>
URL : <a>
  http://localhost:3000/v0/api/items/{id}
</a>
<br>
<br>

Strictly required parameters:
#### 1. In URL parameters:

  property|type
  ---|---
  id|Number

#### 2. In body parameters:

  property|type|description
  ---|---|---
  name|String|-
  price|Nubmer|-
  discount|Number| discount of the item. Number 0 - 100.
  images|Array|links to images
  feedback|Array|user reviews
  description|String|-
  cat|String|category

#### Request example:

URL : <a>
  http://localhost:3000/v0/api/items/2
  </a>

```JSON
{
    "name": "New item",
    "price": 100,
    "discount": 10,
    "feedback": [],
    "description": "description more 15 symbols........",
    "images": ["image_1.png"],
    "cat": "face"
}
```

Responce: 

```JSON
{
    "result": {
        "name": "New item",
        "price": 100,
        "discount": 10,
        "feedback": [],
        "description": "description more 15 symbols........",
        "images": [
            "image_1.png"
        ],
        "cat": "face",
        "id": 2
    },
    "status": "OK",
    "message": ""
}
```
<br>

### 4. Method DELETE (Delete item)
<br>
URL : <a>
  http://localhost:3000/v0/api/items/{id}
</a>
<br>
<br>

Strictly required parameters:
#### 1. In URL parameters:

  property|type
  ---|---
  id|Number


#### Request example:

URL : <a>
  http://localhost:3000/v0/api/items/2
  </a>

Responce: 

```JSON
{
    "result": {
        "name": "item",
        "price": 100,
        "discount": 10,
        "feedback": [],
        "description": "description more 15 symbols........",
        "images": [
            "image_1.png"
        ],
        "cat": "face",
        "id": 2
    },
    "status": "OK",
    "message": ""
}
```
<br>

---

<a name="credits">

## Credits
</a>

### [niktiin](https://github.com/niktiin)

</a>

---

<a name="license">

## License
</a>

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

---