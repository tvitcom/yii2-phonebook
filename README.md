# TESCASE

Создать телефонную книгу, в которой есть такие операции

- просмотр списка контактов
- просмотр выбранного контакта
- редактирование контакта
- добавление контакта
- удаление контакта

У каждого контакта может быть

- имя
- фамилия
- номер телефона (от 0 до 20 номеров телефона для даного контакта)

Задание должно быть выполнено на  php framework. 

##### Prerequisites

Runtime: PHP 7.x, Compposer.phar
DB: Mysql
HttpServer: Apache/Nginx
CVS: Git

##### Setup

```sh
ssh-add id_rsa_macuser
cd .../[Your_WWW]/approot
git clone ssh://git@projectapp.top:17777/~git/testcase/macuser.git .
php composer.phar update
```

Setup new user and database.
Change filename from _db.php to approot/config/db.php
change filename from _params.php to approot/config/params.php
change filename from _web.php to approot/config/web.php
and setup the appropriate settings
