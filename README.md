# web-project

Simple website.

## Getting Started

### Prerequisites

```
PHP 5.3 or greater
MySQL or other database (DB driver will need to be edited if not using MySQL)
Apache 
```

### Installing

1. Upload file to the directory of your choice.

```
git clone https://github.com/rinaadili/web-project.git
```

2. Create a database and insert the SQL code

```
./corporate.sql
```

3. Edit **functions/db_connect.php** base on your configuration

```
$servername = "localhost";  
$username = "root";
$password = "";
$dbname = "corporate";
```
4. Login 

```
localhost/login.php
```

## Version
```
Beta 2018
