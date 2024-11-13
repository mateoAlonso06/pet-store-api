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
