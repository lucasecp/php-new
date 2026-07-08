<?php
/*
|--------------------------------------------------------------------------
| PHP Basics for a React / Next.js Developer
|--------------------------------------------------------------------------
|
| Run this file with:
|   php basics.php
|
| PHP is usually executed on the server. In a web app, PHP can output HTML,
| read request data, talk to databases, and return responses.
|
| Big mental shift from JavaScript:
| - Variables always start with $
| - Statements usually end with ;
| - Arrays are used for both JS-like arrays and JS-like objects
| - PHP code starts inside an opening PHP tag
*/

echo "PHP BASICS\n";
echo "========== \\""\\";

/*
|--------------------------------------------------------------------------
| 1. Variables
|--------------------------------------------------------------------------
|
| Similar to let/const in JS, but every variable begins with $.
| PHP variables are dynamically typed, so the type can change.
*/

$name = "Lucas";
$age = 25;
$isDeveloper = true;

echo "1. Variables\n";
echo "Name: $name\n";
echo "Age: $age\n";
echo "Is developer? " . ($isDeveloper ? "yes" : "no") . "\n\n";

// You can reassign a variable to a different type, but avoid doing this often.
$age = "twenty five";
echo "Age after reassignment: $age\n\n";

/*
|--------------------------------------------------------------------------
| 2. Strings
|--------------------------------------------------------------------------
|
| PHP strings can use single quotes or double quotes.
|
| Single quotes:
| - Literal text
| - Variables are not expanded
|
| Double quotes:
| - Variables are expanded
| - Similar to a simple JS template literal
*/

$framework = "Next.js";

echo "2. Strings\n";
echo 'Single quotes do not read $framework' . "\n";
echo "Double quotes read the variable: $framework\n";

// Concatenation uses . instead of +.
$message = "I know " . $framework . " and I am learning PHP.";
echo $message . "\n";

// Useful string functions.
$text = "  learning php  ";
echo "Uppercase: " . strtoupper($text) . "\n";
echo "Trimmed: '" . trim($text) . "'\n";
echo "Length: " . strlen($text) . "\n\n";

/*
|--------------------------------------------------------------------------
| 3. Numbers
|--------------------------------------------------------------------------
|
| PHP has integers and floats.
| Math operators are close to JavaScript.
*/

$price = 99.90;
$quantity = 3;
$total = $price * $quantity;

echo "3. Numbers\n";
echo "Price: $price\n";
echo "Quantity: $quantity\n";
echo "Total: $total\n";
echo "Rounded total: " . round($total, 2) . "\n";
echo "Modulo, 10 % 3: " . (10 % 3) . "\n";
echo "Power, 2 ** 4: " . (2 ** 4) . "\n\n";

/*
|--------------------------------------------------------------------------
| 4. Booleans
|--------------------------------------------------------------------------
|
| true and false work like JS booleans.
| Common comparison operators:
| ==   equal value
| ===  equal value and same type
| !=   not equal
| !==  not equal value or type
| >, <, >=, <=
*/

$isLoggedIn = true;
$hasPermission = false;

echo "4. Booleans\n";
echo "Logged in and has permission? ";
echo ($isLoggedIn && $hasPermission) ? "yes\n" : "no\n";

echo "Logged in or has permission? ";
echo ($isLoggedIn || $hasPermission) ? "yes\n" : "no\n";

echo "Is not logged in? ";
echo (!$isLoggedIn) ? "yes\n\n" : "no\n\n";

/*
|--------------------------------------------------------------------------
| 5. Conditionals
|--------------------------------------------------------------------------
|
| if / elseif / else is almost the same idea as JavaScript.
| PHP also has match, which is similar to a cleaner switch expression.
*/

$score = 82;

echo "5. Conditionals\n";

if ($score >= 90) {
    echo "Grade: A\n";
} elseif ($score >= 70) {
    echo "Grade: B\n";
} else {
    echo "Grade: C\n";
}

$role = "admin";

$dashboard = match ($role) {
    "admin" => "Admin dashboard",
    "editor" => "Editor dashboard",
    "user" => "User dashboard",
    default => "Guest dashboard",
};

echo "Dashboard: $dashboard\n\n";

/*
|--------------------------------------------------------------------------
| 6. Loops
|--------------------------------------------------------------------------
|
| PHP supports for, while, do while, and foreach.
| foreach is the one you will use constantly with arrays.
*/

echo "6. Loops\n";

echo "for loop:\n";
for ($i = 1; $i <= 3; $i++) {
    echo "- Item $i\n";
}

echo "while loop:\n";
$counter = 1;
while ($counter <= 3) {
    echo "- Counter $counter\n";
    $counter++;
}

echo "foreach loop:\n";
$technologies = ["HTML", "CSS", "React", "PHP"];

foreach ($technologies as $technology) {
    echo "- $technology\n";
}

echo "\n";

/*
|--------------------------------------------------------------------------
| 7. Functions
|--------------------------------------------------------------------------
|
| Functions are declared with function.
| You can type parameters and return values.
|
| In PHP, function names are usually snake_case in many codebases, although
| modern frameworks may also use camelCase for methods.
*/

echo "7. Functions\n";

function greet(string $name): string
{
    return "Hello, $name!";
}

function calculate_total(float $price, int $quantity): float
{
    return $price * $quantity;
}

echo greet("Lucas") . "\n";
echo "Calculated total: " . calculate_total(49.90, 2) . "\n";

// Default parameter value.
function create_button(string $label, string $type = "button"): string
{
    return "<button type=\"$type\">$label</button>";
}

echo create_button("Save", "submit") . "\n\n";

/*
|--------------------------------------------------------------------------
| 8. Arrays
|--------------------------------------------------------------------------
|
| PHP arrays can act like:
| - JS arrays: ordered list of values
| - JS objects: key/value data
|
| PHP calls object-like arrays "associative arrays".
*/

echo "8. Arrays\n";

// List-style array, like a JS array.
$colors = ["red", "green", "blue"];

echo "First color: " . $colors[0] . "\n";

$colors[] = "purple"; // Push new item.

foreach ($colors as $color) {
    echo "- Color: $color\n";
}

// Associative array, similar to a plain JS object.
$user = [
    "name" => "Lucas",
    "email" => "lucas@example.com",
    "stack" => ["React", "Next.js", "PHP"],
    "active" => true,
];

echo "User name: " . $user["name"] . "\n";
echo "User email: " . $user["email"] . "\n";
echo "Main stack item: " . $user["stack"][0] . "\n";

echo "User data:\n";
foreach ($user as $key => $value) {
    if (is_array($value)) {
        echo "- $key: " . implode(", ", $value) . "\n";
    } elseif (is_bool($value)) {
        echo "- $key: " . ($value ? "true" : "false") . "\n";
    } else {
        echo "- $key: $value\n";
    }
}

echo "\n";

/*
|--------------------------------------------------------------------------
| 9. Include and Require
|--------------------------------------------------------------------------
|
| PHP does not use imports exactly like React/Next.js.
| In simple PHP projects, you often split code into files and load them with:
|
| include      loads a file; warns if missing, then keeps running
| require      loads a file; errors if missing, then stops
| include_once loads it only one time
| require_once loads it only one time
|
| Use require for files your app needs to work, like config, functions, or
| database connections.
|
| Use include for optional templates, like a sidebar that can fail without
| breaking the whole page.
|
| Example:
|   require "config.php";
|   require_once "functions.php";
|   include "partials/header.php";
|
| Important:
| - The included file runs immediately at that spot
| - Variables from the current file are available inside the included file
| - Variables created in the included file are available after it is included
| - Be careful including files from user input, because that is dangerous
*/

echo "9. Include and Require\n";
echo "require is for necessary files.\n";
echo "include is for optional files.\n";
echo "require_once/include_once prevent loading the same file twice.\n\n";

/*
|--------------------------------------------------------------------------
| 10. Rendering PHP inside HTML
|--------------------------------------------------------------------------
|
| This is common in plain PHP files.
| You can close PHP, write HTML, then reopen PHP when needed.
|
| In a real web page, use htmlspecialchars() when printing user-controlled text.
*/

$pageTitle = "PHP Basics";
$items = [
    "variables",
    "strings",
    "numbers",
    "booleans",
    "conditionals",
    "loops",
    "functions",
    "arrays",
    "include / require",
];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($pageTitle) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($pageTitle) ?></h1>

    <p>
        This HTML was rendered by PHP. The syntax
        <code>&lt;?= ... ?&gt;</code>
        is a shortcut for echo.
    </p>

    <ul>
        <?php foreach ($items as $item): ?>
            <li><?= htmlspecialchars($item) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
