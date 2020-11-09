# Welcome to Mithril

**Why name Mithril?**

Mithril is a metal from Middle-earth which resembles silver but is stronger and lighter than steel and, I like
lord of the rings 🙂


## Environment
This project is written on PHP 7.4 with the lumen microframework.

## Running the project
1. Run `composer install`
2. Simply open the project folder and use php's in built server to serve the public directory
3. `php -S localhost:8000 -t public`

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
