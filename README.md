<h1 align="center" >API-PHP</h1>

<a name="overview">

>## Contents
</a>

### [1. Overview](#overview)
### [2. URI and Versioning](#versioning)
### [3. Installation](#installation)
### [4. Items](#items)
### [5. Request](#request)
### [6. Credits](#credits)
### [7. License](#license)

<br>

---
<br>
<a name="overview">

>## Overview
</a>
 Api written in the php programming language for processing store products.

<br>

---
<a name="versioning">
<br>

>## URI and Versioning
</a>

We hope to improve the API over time. The changes won't always be backward compatible, so we're going to use versioning. This first iteration will have URIs prefixed with http://localhost:3000/v0/api and is structured as described below. There is currently no rate limit.

---

<a name="installation">
<br>

>## Installation
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

 Items identified by their heads, which are unique integers, and live under v0/api/items/{id}.

property|type|description
---|---|---
name|String|-
price|Integer|-
discount|Integer (0 -100)|-
images|Array|URLs
feedback|Array|reviews
description|Integer|-
cat|String|category
id|Integer| property read-only


**For example, http://localhost:3000/v0/api/items/0**

<br>

---
<br>

<a name="request">

>## Methods
</a>

### **1. GET**
URL : <a>http://localhost:3000/v0/api/items</a>

*You can also use the id parameter to get a specific item

<br>
Required parameters:
  
property|type
---|---
id|Integer

API responce: 

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

### **2. POST**
URL : <a>http://localhost:3000/v0/api/items</a>

<br>
<span style="color:orange">Strictly</span> required body parameters:

  property|type
  ---|---
  name|String
  price|Integer
  discount|Integer
  images|Array
  feedback|Array
  description|String
  cat|String


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

API responce: 

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

### **3. PUT**
URL : <a>http://localhost:3000/v0/api/items/{id}</a>

<br>
<span style="color:orange">Strictly</span> required parameters:

<br>

1. <div>
    In URL parameters:

    property|type
    ---|---
    id|Number
  </div>

2. <div>
    In body parameters:

    property|type
    ---|---
    name|String
    price|Integer
    discount|Integer
    images|Array
    feedback|Array
    description|String
    cat|String
   </div>


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

API responce: 

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

### **4. DELETE**
URL : <a>http://localhost:3000/v0/api/items/{id}</a>

<br>
<span style="color:orange">Strictly</span> required parameters:

<br>

1. <div>
    In URL parameters:

    property|type
    ---|---
    id|Number
   </div>


API responce: 

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