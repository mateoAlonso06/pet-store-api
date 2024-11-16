
## API Endpoints - Productos

### 1. **GET /productos**
**Descripción**: Obtiene todas las productos.

- **Método**: `GET`
- **URL**: `/productos`
#### Respuesta exitosa
- **Código**: `200 OK`
- **Cuerpo**:
  ```json
  [
     {
        "id_producto": 1
        "id_categoria": 1,
        "nombre": "Abrigo para Gato",
        "descripcion": "Abrigo de lana para gato, ideal para el invierno",
        "precio": 1200,
        "peso_neto": 0.2,
        "fecha_empaquetado": "2024-05-10",
        "fecha_vencimiento": null,
        "stock": 10,
        "id_proveedor": 2
      }
  ]
  ```

  #### Errores

- **500 Internal Server Error**: Problema en el servidor.

  ---

### 2.GET /productos/:id
**Descripción**: Obtiene un producto específico por su ID.

- **Método**: GET
- **URL**: /productos/{id}

**Parámetros**
**id**: Identificador único del producto (requerido).

#### Respuesta exitosa
- **Código**: `200 OK`
- **Cuerpo**:
```json
{
    "id_producto": 1
    "id_categoria": 1,
    "nombre": "Abrigo para Gato",
    "descripcion": "Abrigo de lana para gato, ideal para el invierno",
    "precio": 1200,
    "peso_neto": 0.2,
    "fecha_empaquetado": "2024-05-10",
    "fecha_vencimiento": null,
    "stock": 10,
    "id_proveedor": 2
}
```

#### Errores

- **404 Not Found**: Categoría no encontrada.
- **500 Internal Server Error**: Problema en el servidor.

----

### 3. POST /productos
**Descripción**: Inserta un nuevo producto.

- **Método**: POST
- **URL**: /productos

**Parámetros del cuerpo (JSON)**
- **nombre**: Nombre del producto (requerido).

**Respuesta exitosa**
- **Código**: 201 Created
- **Cuerpo**:
```json
{
    "id_producto": 1
    "id_categoria": 1,
    "nombre": "Abrigo para Gato",
    "descripcion": "Abrigo de lana para gato, ideal para el invierno",
    "precio": 1200,
    "peso_neto": 0.2,
    "fecha_empaquetado": "2024-05-10",
    "fecha_vencimiento": null,
    "stock": 10,
    "id_proveedor": 2
}
```

#### Errores
- **400 Bad Request**: Parámetros faltantes o incorrectos.
- **500 Internal Server Error**: Error en el servidor.

---

### 4. DELETE /productos/
**Descripción**: Elimina un producto por su ID.

- **Método**: DELETE
- **URL**: /productos/:id

**Parámetros**
- **id**: Identificador único del producto (requerido).

**Respuesta exitosa**
- **Código**: 200 OK
- **Cuerpo**:
```json
{
    "id_producto": 3,
    "id_categoria": 2,
    "nombre": "Arena para Gatos",
    "descripcion": "Arena higiénica con control de olores, bolsa de 5kg",
    "precio": 1500,
    "peso_neto": 5.0,
    "fecha_empaquetado": "2024-04-01",
    "fecha_vencimiento": "2025-04-01",
    "stock": 30,
    "id_proveedor": 1
}
```

**Errores**
- **404 Not Found**: Categoría no encontrada.
- **500 Internal Server Error**: Error en el servidor.

---

### 5. PUT /productos/
**Descripción**: Actualiza una categoría por su ID.

- **Método**: PUT
- **URL**: /productos/:id

**Parámetros**
- **id**: Identificador único del producto (requerido).

**Parámetros del cuerpo (JSON)**
- **nombre**: Nombre actualizado de la categoría (opcional).

**Respuesta exitosa**
- **Código**: 200 OK
- **Cuerpo**:
```json
{
  "id": 1,
  "nombre": "Alimentos y Bebidas"
}
```
### Errores
- **404 Not Found**: Categoría no encontrada.
- **400 Bad Request**: Parámetros faltantes o incorrectos.
- **500 Internal Server Error**: Error en el servidor.



----------------CATEGORIAS----------------

## API Endpoints - Categorías

### 1. **GET /categorias**
**Descripción**: Obtiene todas las categorías.

- **Método**: `GET`
- **URL**: `/categorias`
  
#### Respuesta exitosa
- **Código**: `200 OK`
- **Cuerpo**:
  ```json
  [
    {
      "id": 1,
      "nombre": "Alimentos"
    },
    {
      "id": 2,
      "nombre": "Juguetes"
    }
  ] 

#### Errores
- **500 Internal Server Error**: Problema en el servidor.

---

### 2.GET /categorias/:id
**Descripción**: Obtiene una categoría específica por su ID.

- **Método**: GET
- **URL**: /categorias/{id}

**Parámetros**
**id**: Identificador único de la categoría (requerido).

#### Respuesta exitosa
- **Código**: `200 OK`
- **Cuerpo**:
```json
{
  "id": 1,
  "nombre": "Alimentos"
}
```

#### Errores
- **404 Not Found**: Categoría no encontrada.
- **500 Internal Server Error**: Error en el servidor.

---

### 3. POST /categorias
**Descripción**: Inserta una nueva categoría.

- **Método**: POST
- **URL**: /categorias

**Parámetros del cuerpo (JSON)**
- **nombre**: Nombre de la categoría (requerido).

**Respuesta exitosa**
- **Código**: 201 Created
- **Cuerpo**:
```json
{
  "id": 3,
  "nombre": "Ropa"
}
```

#### Errores
- **400 Bad Request**: Parámetros faltantes o incorrectos.
- **500 Internal Server Error**: Error en el servidor.

---

### 4. DELETE /categorias/
**Descripción**: Elimina una categoría por su ID.

- **Método**: DELETE
- **URL**: /categorias/:id

**Parámetros**
- **id**: Identificador único de la categoría (requerido).

**Respuesta exitosa**
- **Código**: 200 OK
- **Cuerpo**:
```json
{
  "mensaje": "Categoría eliminada con éxito."
}
```

**Errores**
- **404 Not Found**: Categoría no encontrada.
- **500 Internal Server Error**: Error en el servidor.

---

### 5. PUT /categorias/
**Descripción**: Actualiza una categoría por su ID.

- **Método**: PUT
- **URL**: /categorias/:id

**Parámetros**
- **id**: Identificador único de la categoría (requerido).

**Parámetros del cuerpo (JSON)**
- **nombre**: Nombre actualizado de la categoría (opcional).

**Respuesta exitosa**
- **Código**: 200 OK
- **Cuerpo**:
```json
{
  "id": 1,
  "nombre": "Alimentos y Bebidas"
}
```
### Errores
- **404 Not Found**: Categoría no encontrada.
- **400 Bad Request**: Parámetros faltantes o incorrectos.
- **500 Internal Server Error**: Error en el servidor.
