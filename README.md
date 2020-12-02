### Задание:

#### Необходимо реализовать чат на фреймворке Yii2, включающий в себя:


 1. Три роли: гость, пользователь, администратор. 
   1. Гость - может посматривать все сообщения, но не может их писать.
   2. Пользователь - может просматривать сообщения и писать их в чат.
   3. Администратор 
	- может писать и читать сообщения, 
	- сообщение администратора выделяется в общем списке сообщений, 
	- может просматривать таблицу пользователей, менять роли пользователей, 
	- может помечать сообщения некорректными: некорректные сообщения видны в чате только администратору и не видны другим пользователям (они должны быть как-то выделены). 
	- У администратора есть таблица со списком некорректных сообщений, он может просматривать таблицу «некорректных сообщений», и может вернуть сообщение в чат, тогда оно становится доступно всем.

 2. Чат необязательно делать realtime, то есть новые сообщения могут добавляться при обновлении страницы в браузере.

Это все должно выглядеть, как связка fronted и backend. Требований в верстке никаких нет, можно использовать стандартные возможности bootstrap, можно самому написать css.

## Установка 

### 1. Клонировать репозиторий 
```
git clone https://github.com/alxchegit/Yii2-Chat-2
```
### 2. Инициализируйте Yii и обновите зависимости и все пакеты
В терминале, находясь в папке с приложением, выполнить комманду:
```
php init
composer update
```
### 3. Настройте подключение к базе данных и заполнить её.
В файлике /path/to/yii-application/common/config/main-local.php внесите данные с вашими настройками сервера БД. 
В папке /path/to/yii-application/dump находится дамп базы. Необходимо импортировать

### 4. Залогиниться на сайт
Зарегистрироваться на сайта используя выдуманный email (рассылка письма подтверждения отключена). Или же в таблице User уже есть некоторые пользователи. 
- Админ
	- логин: admin
	- пароль: 111111111
- Пользователь
	- логин: mmisha
	- пароль: 111111111

### 5 Настроить web-сервер
Инструкция на английском https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/start-installation.md

### 6 Общая аутентификация для frantend или backend.

https://klisl.com/yii2-aut-front-back.html