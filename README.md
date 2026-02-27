# Football Pickup

Plataforma para organizar y unirse a partidos de fútbol amistosos. Los usuarios pueden crear partidos, apuntarse a ellos, comentar y gestionar su perfil.

---

## Tecnologías utilizadas

- Laravel 12
- Breeze
- Livewire
- Tailwind CSS
- MySQL

---

## Instalación

Sigue estos pasos para instalar el proyecto en local:

### 1. Clonar el repositorio
```bash
git clone https://github.com/gregoridelrio/football-pickup.git
cd football-pickup
```

### 2. Instalar dependencias PHP
```bash
composer install
```

### 3. Instalar dependencias JavaScript
```bash
npm install
```

### 4. Copiar el archivo de entorno
```bash
cp .env.example .env
```

### 5. Generar la clave de la aplicación
```bash
php artisan key:generate
```

### 6. Configurar la base de datos

Abre el archivo `.env` y edita estas líneas con tus datos:
```env
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=football_pickup
DB_USERNAME=
DB_PASSWORD=
```

> Crea la base de datos `football_pickup` en tu gestor MySQL.

### 7. Configurar el correo electrónico (opcional)

Para probar la recuperación de contraseña, configura Mailtrap en tu `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=tu_username_de_mailtrap
MAIL_PASSWORD=tu_password_de_mailtrap
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@football-pickup.com"
MAIL_FROM_NAME="Football Pickup"
```

Si no quieres configurar email, puedes usar:
```env
MAIL_MAILER=log
```

Los emails se guardarán en `storage/logs/laravel.log`.

### 8. Ejecutar las migraciones
```bash
php artisan migrate
```

### 9. (Opcional) Ejecutar los seeders

Para tener datos de prueba:
```bash
php artisan db:seed
```

### 10. Iniciar el servidor

Abre dos terminales:

**Terminal 1:**
```bash
npm run dev
```
**Terminal 2:**
```bash
php artisan serve
```

Abre el navegador en `http://localhost:8000`

---

## Modelo de datos

| Tabla | Descripción |
|---|---|
| `users` | Usuarios registrados |
| `matches` | Partidos creados |
| `registrations` | Inscripciones de usuarios a partidos |
| `comments` | Comentarios en los partidos |

---

##  Estructura del proyecto
```
app/
├── Http/Controllers/     # Controladores (lógica HTTP)
├── Models/              # Modelos Eloquent
└── Livewire/            # Componentes Livewire
database/
├── migrations/          # Migraciones de BD
└── seeders/            # Datos de prueba
resources/
├── views/              # Vistas Blade
│   ├── auth/          # Login, registro, recuperar contraseña
│   ├── matches/       # CRUD de partidos
│   ├── livewire/      # Componentes Livewire
│   └── layouts/       # Layout principal
routes/
└── web.php            # Rutas de la aplicación
```
##  Foto recuperación de la contraseña (Mailtrap)
<img width="1107" height="975" alt="image" src="https://github.com/user-attachments/assets/42237b15-008c-4e4b-9a0a-1484bbaaf49f" />


