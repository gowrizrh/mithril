# Mithril


![Mithril](screenshot.png)

## Environment
This project is written in PHP 8.3 with the lumen microframework.

## Running the project
1. Run `composer install`
2. Copy `.env.example` to `.env` and set `APP_DEBUG=false`
3. Simply open the project folder and use php's in built server to serve the public directory
4. `php -S localhost:8000 -t public`

### Using Postman
There is also a postman collection file included to debug the API with Postman. Simply import it, create an environment
and then create the following variables and values.

`scheme` - `http`

`host` - `localhost`

`port` - `8000`

`prefix` - `api`

### API Documentation

#### Endpoints

---
Find the number of days between two datetime parameters.

```
POST api/days
```
**Parameters**

`start` - An ISO 8601 date string 

`end` - An ISO 8601 date string 

Also see [`PHP DateTime::ATOM`](https://www.php.net/manual/en/class.datetimeinterface.php#datetime.constants.atom)

*Optional* `format` - Accepts `s` for seconds, `m` for minutes, `h` for hours and `y` for years, any other value is invalid.

---

Find the number of week days between two datetime parameters.

```
POST api/weekdays
```
**Parameters**

`start` - An ISO 8601 date string 

`end` - An ISO 8601 date string 

Also see [`PHP DateTime::ATOM`](https://www.php.net/manual/en/class.datetimeinterface.php#datetime.constants.atom)

*Optional* `format` - Accepts `s` for seconds, `m` for minutes, `h` for hours and `y` for years, any other value is invalid.

---

Find the number of complete weeks between two datetime parameters.

```
POST api/weeks
```
**Parameters**

`start` - An ISO 8601 date string 

`end` - An ISO 8601 date string 

Also see [`PHP DateTime::ATOM`](https://www.php.net/manual/en/class.datetimeinterface.php#datetime.constants.atom)

*Optional* `format` - Accepts `s` for seconds, `m` for minutes, `h` for hours and `y` for years, any other value is invalid.

---
