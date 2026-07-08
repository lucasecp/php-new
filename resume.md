# PHP Exam Resume

This resume follows the exam topics: PHP basics, arrays, forms, database, OOP, and security.

## 1. Basic PHP Syntax

PHP code starts with:

```php
<?php
echo "Hello PHP";
?>
```

Variables always start with `$`.

```php
$name = "Lucas";
$age = 25;
$price = 19.90;
$isStudent = true;
```

Common data types:

```php
$text = "Hello";      // string
$number = 10;        // integer
$decimal = 10.5;     // float
$active = true;      // boolean
$empty = null;       // null
```

String concatenation uses `.` instead of `+`.

```php
$firstName = "Lucas";
$message = "Hello, " . $firstName;
echo $message;
```

## 2. Operators

```php
$a = 10;
$b = 3;

echo $a + $b; // addition
echo $a - $b; // subtraction
echo $a * $b; // multiplication
echo $a / $b; // division
echo $a % $b; // modulo
```

Comparison operators:

```php
$a == $b;   // same value
$a === $b;  // same value and same type
$a != $b;   // different value
$a !== $b;  // different value or different type
$a > $b;
$a < $b;
$a >= $b;
$a <= $b;
```

Logical operators:

```php
$isLoggedIn = true;
$isAdmin = false;

$isLoggedIn && $isAdmin; // and
$isLoggedIn || $isAdmin; // or
!$isLoggedIn;            // not
```

## 3. Conditionals

```php
$grade = 8;

if ($grade >= 7) {
    echo "Approved";
} else {
    echo "Failed";
}
```

With `elseif`:

```php
$age = 18;

if ($age < 13) {
    echo "Child";
} elseif ($age < 18) {
    echo "Teenager";
} else {
    echo "Adult";
}
```

## 4. Loops

`for` is good when you know how many times to repeat.

```php
for ($i = 1; $i <= 5; $i++) {
    echo $i;
}
```

`while` repeats while a condition is true.

```php
$i = 1;

while ($i <= 5) {
    echo $i;
    $i++;
}
```

`foreach` is used to loop arrays.

```php
$names = ["Ana", "Lucas", "Maria"];

foreach ($names as $name) {
    echo $name;
}
```

## 5. Functions and Scope

Simple function:

```php
function greet($name) {
    return "Hello, " . $name;
}

echo greet("Lucas");
```

Function with typed parameters:

```php
function sum(int $a, int $b): int {
    return $a + $b;
}

echo sum(2, 3);
```

Scope means where a variable exists.

```php
$name = "Lucas";

function showName() {
    $name = "Ana";
    echo $name;
}

showName(); // Ana
echo $name; // Lucas
```

## 6. Arrays

Indexed array:

```php
$fruits = ["apple", "banana", "orange"];

echo $fruits[0]; // apple
```

Associative array:

```php
$user = [
    "name" => "Lucas",
    "email" => "lucas@example.com",
    "age" => 25
];

echo $user["name"];
```

Looping an associative array:

```php
foreach ($user as $key => $value) {
    echo $key . ": " . $value;
}
```

Useful array functions:

```php
count($fruits);
array_push($fruits, "grape");
in_array("apple", $fruits);
```

## 7. String Manipulation

```php
$text = "Learning PHP";

echo strtoupper($text); // LEARNING PHP
echo strtolower($text); // learning php
echo strlen($text);     // length
echo trim($text);       // removes spaces around text
```

## 8. Forms, GET and POST

HTML form using `POST`:

```php
<form method="POST" action="process.php">
    <input type="text" name="username">
    <button type="submit">Send</button>
</form>
```

Reading data with `$_POST`:

```php
$username = $_POST["username"];
echo $username;
```

Safer version with `filter_input`:

```php
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
echo $username;
```

HTML form using `GET`:

```php
<form method="GET" action="search.php">
    <input type="text" name="q">
    <button type="submit">Search</button>
</form>
```

Reading data with `$_GET`:

```php
$search = $_GET["q"];
echo $search;
```

Use `POST` for forms that create or change data. Use `GET` for search/filter pages.

## 9. Includes and Requires

```php
include "header.php";
require "config.php";
include_once "menu.php";
require_once "database.php";
```

Difference:

- `include`: warning if file is missing, script continues.
- `require`: fatal error if file is missing, script stops.
- `include_once` and `require_once`: load the file only one time.

Use `require` for important files like database connection and config.

## 10. MySQLi Basic Connection

```php
$conn = mysqli_connect("localhost", "root", "", "test");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected";
```

Simple insert with MySQLi:

```php
$name = "Lucas";

$sql = "INSERT INTO users (name) VALUES ('$name')";
mysqli_query($conn, $sql);
```

Simple read with MySQLi:

```php
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row["name"];
}
```

Important: direct variables inside SQL are not secure. Prepared statements are safer.

## 11. PDO Connection and Try/Catch

PDO is another way to connect to a database. It is usually cleaner and safer.

```php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected";
} catch (PDOException $e) {
    echo "Database error";
}
```

PDO insert with prepared statement:

```php
$name = "Lucas";

$stmt = $pdo->prepare("INSERT INTO users (name) VALUES (:name)");
$stmt->execute([
    "name" => $name
]);
```

PDO read:

```php
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo $user["name"];
}
```

## 12. Try/Catch

`try/catch` handles errors without breaking the whole page.

```php
try {
    // code that can fail
} catch (Exception $e) {
    echo "Something went wrong";
}
```

In exams, you may see it with PDO:

```php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
} catch (PDOException $e) {
    echo "Connection failed";
}
```

## 13. Object-Oriented Programming

Class is the blueprint. Object is an instance of the class.

```php
class User {
    public string $name;

    public function sayHello(): string {
        return "Hello, " . $this->name;
    }
}

$user = new User();
$user->name = "Lucas";

echo $user->sayHello();
```

Constructor:

```php
class Product {
    public string $name;
    public float $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

$product = new Product("Keyboard", 99.90);
echo $product->name;
```

Encapsulation uses `private` and public methods.

```php
class Account {
    private float $balance;

    public function __construct(float $balance) {
        $this->balance = $balance;
    }

    public function getBalance(): float {
        return $this->balance;
    }
}

$account = new Account(100);
echo $account->getBalance();
```

Important OOP words:

- Class: blueprint.
- Object: created from a class.
- Attribute/property: variable inside a class.
- Method: function inside a class.
- Constructor: runs when object is created.
- Encapsulation: protect data using `private`.

## 14. Security

Never trust user input.

Sanitize form data:

```php
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
```

Escape output in HTML:

```php
echo htmlspecialchars($name);
```

Hash passwords:

```php
$password = "123456";
$hash = password_hash($password, PASSWORD_DEFAULT);
```

Verify passwords:

```php
if (password_verify($password, $hash)) {
    echo "Correct password";
} else {
    echo "Wrong password";
}
```

Avoid SQL injection with prepared statements:

```php
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute([
    "email" => $email
]);
```

## 15. Comments and Organization

Single-line comment:

```php
// This is a comment
```

Multi-line comment:

```php
/*
This is a longer comment.
It can use many lines.
*/
```

Good organization:

```text
project/
  index.php
  process.php
  config.php
  database.php
  header.php
  footer.php
```

Example:

```php
require_once "database.php";
require_once "functions.php";
```

## Most Important Syntax to Memorize

```php
$name = "Lucas";
echo "Hello " . $name;

if ($age >= 18) {
    echo "Adult";
} else {
    echo "Minor";
}

for ($i = 0; $i < 10; $i++) {
    echo $i;
}

foreach ($users as $user) {
    echo $user["name"];
}

function sum($a, $b) {
    return $a + $b;
}

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
$hash = password_hash($password, PASSWORD_DEFAULT);
```

## Exam Strategy

Focus first on:

1. Variables, strings, conditionals, loops.
2. Arrays and `foreach`.
3. Forms with `$_POST` and `filter_input`.
4. PDO connection with `try/catch`.
5. Simple class with properties and methods.
6. `password_hash` and `password_verify`.

If you can write these from memory, you are in a strong position to pass.
