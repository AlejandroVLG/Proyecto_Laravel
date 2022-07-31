<img src="/public/img/geeks.png" style="width:900px;"/>

---

# <center>Proyecto base de datos relacional.</center>
Proyecto hecho como práctica en el curso de FullStack Developer de GeeksHubs academy, con deploy realizado en: <br>
![Heroku](https://img.shields.io/badge/heroku-%23430098.svg?style=for-the-badge&logo=heroku&logoColor=white)

---

> Para crear esta base de datos se han utilizando las siguientes tecnologías:

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)  ![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white) ![JWT](https://img.shields.io/badge/JWT-black?style=for-the-badge&logo=JSON%20web%20tokens)

---

<center><img src="/public/img/Diagrama_entidad_relacion.png" style="width:800px;"/></center> 

---

>*  La base de datos sigue el esquema <b>MVC (Model-View-Controller).</b> 

>* Las contraseñas son encriptadas a través de <b>BCRYPTJS</b> y la base de datos usa el sistema <b>JSON Web Token</b>.

>* La base de datos incluye un CRUD completo de las tablas <b>USERS</b>, <b>GAMES</b>, <b>CHANNELS</b> and <b>MESSAGES</b> .</b>

---

## Listado de enpoints:

###### <center><span style="color:red"> USER</span></center> 

- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/register</b>
<img src="/public/img/Register.png"/>

>Añadir un <b>nuevo usuario.</b> Al crear un nuevo usuario se por defecto el rol de user en la tabla intermedia <b>role_user</b>.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/login</b>
<img src="/public/img/Login.png/">

>Al iniciar sesión con cualquier usuario se crea un token único vinculado a ese usuario.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/logout</b>
<img src="/public/img/Logout.png">

>Al cerrar sesión se inhabilita el token que el usuario tenia vinculado.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/myProfile</b>
<img src="/public/img/My_profile.png">

>Muestra los datos de perfil del usuario, se accede a través del token al perfil asociado a dicho token, de esta forma cada usuario únicamente puede modificar su perfil.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/editMyProfile/5</b>
<img src="/public/img/Edit_my_profile.png">

>Se pueden modificar uno o varios campos de nuestro perfil, accediendo a través de nuestro token y el ID de usuario asociado a dicho token. No hay posibilidad de editar otros perfiles.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/newGame</b>
<img src="/public/img/New_game.png">

>Da de alta en la base de datos un nuevo videojuego, requiere token.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/showGames</b>
<img src="/public/img/Show_all_games.png">

>Muestra todos los juegos, requiere token.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/showGamesById</b>
<img src="/public/img/Show_games_by_userID.png">

>Muestra solo los juegos que haya introducido un usuario específico, requiere token.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/editGame/8</b>
<img src="/public/img/Edit_game.png">

>Indicando el <b>ID</b> del juego en la <b>URL</b> del endpoint e introduciendo el token del creador del juego, permite editar datos del juego indicado.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/deleteGame/11</b>
<img src="/public/img/Delete_game.png">

>Indicando el <b>ID</b> del juego en la <b>URL</b> del endpoint e introduciendo el token del creador del juego, permite borrar el juego indicado.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/showGamesByTitle</b>
<img src="/public/img/Search_game_by_world_tag.png">

>Establece una busqueda con la palabra clave <b>world</b> y muestra todos los juegos que la incluyen en su título.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/newChannel</b>
<img src="/public/img/New_channel.png">

>Crea un nuevo canal relacionado con el juego que especifiquemos.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/getChannel</b>
<img src="/public/img/Show_all_channels.png">

>Muestra todos los canales existentes sustituyendo el campo <b>game_id</b> por el campo <b>title</b> de este.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/updateChannel/3</b>
<img src="/public/img/Edit_channel.png">

>Introduciendo el token de un <b>Super_admin</b>, permite hacer cambios en uno o varios campos del canal indicando el <b>ID</b> del canal en la <b>URL</b> del endpoint.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/deleteChannel/3</b>
<img src="/public/img/Delete_channel.png">

>Introduciendo el token del creador del canal e indicando el <b>ID</b> del canal en la <b>URL</b> del endpoint, permite borrar el canal.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/joinChannel/1</b>
<img src="/public/img/Enter_channel.png">

>Introduciendo el token e indicando el <b>ID</b> del canal en la <b>URL</b> del endpoint, permite acceder a ese canal creando un nuevo registro en la tabla intermedia <b>channel_user</b>.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/leaveChannel/1</b>
<img src="/public/img/Leave_channel.png">

>Introduciendo el token e indicando el <b>ID</b> del canal en la <b>URL</b> del endpoint, permite salir del canal eliminando el registro en la tabla intermedia <b>channel_user</b>.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/ShowChannelGame/4</b>
<img src="/public/img/Show_channels_by_ID.png">

>Indicando el <b>ID</b> del juego en la <b>URL</b> del endpoint, muestra los canales existentes del juego que le hayamos indicado.
---

- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/createMessage</b>
<img src="/public/img/New message.png">

> Introduciendo el token, el usuario asociado a este crea un mensaje en el canal que se indique.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/showMessages</b>
<img src="/public/img/Show_all_messages.png">

> Introduciendo el token, el usuario asociado a este puede ver los mensajes que ha enviado y en que canal.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/editMessage/1</b>
<img src="/public/img/Edit_message.png">

> Introduciendo el token e indicando el <b>ID</b> del mensaje en la <b>URL</b> del endpoint, el usuario asociado a ese token puede editar sus mensajes.
---
- <b>https://alejandro-bbdd-mysql-laravel.herokuapp.com/api/deleteMessage/1</b>
<img src="/public/img/Delete_message.png">

> Introduciendo el token e indicando el <b>ID</b> del mensaje en la <b>URL</b> del endpoint, el usuario asociado a este puede borrar sus mensajes.
---
## 🌐 Socials:
[![LinkedIn](https://img.shields.io/badge/LinkedIn-%230077B5.svg?logo=linkedin&logoColor=white)](https://www.linkedin.com/in/alejandrolaguia/) 

