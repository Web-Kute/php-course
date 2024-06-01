<?php
session_start();
$name = "";
$age = "";
$nameErr = "";
$ageErr = "";
$emailErr = "";
function validate_data($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = substr($data, 0, 15);
  $data = filter_var($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  // $data = preg_match("/^[a-z]\w{2,23}[^_]$/i", $_POST['name']);
  return $data;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['email'])) {
    $name = validate_data($_POST['name']);
    $nameErr = "";
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
    }
    $age = validate_data($_POST['age']);
    $ageErr = "";
    if (!preg_match("/^[0-9]*$/", $age)) {
      $ageErr = "Only numbers allowed";
    }
    $email = validate_data($_POST['email']);
    $emailErr = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Formulaire Ajout de contact</h1>
  <ul>
    <li>Host: <?php echo $_SERVER['HTTP_HOST']; ?></li>
    <li>Document Root: <?php echo $_SERVER['DOCUMENT_ROOT']; ?></li>
    <li>System Root: <?php echo $_SERVER['SystemRoot']; ?></li>
    <li>Server Name: <?php echo $_SERVER['SERVER_NAME']; ?></li>
    <li>Server Port: <?php echo $_SERVER['SERVER_PORT']; ?></li>
    <li>Current File Dir: <?php echo $_SERVER['PHP_SELF']; ?></li>
    <li>Request URI: <?php echo $_SERVER['REQUEST_URI']; ?></li>
    <li>Server Software: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
    <li>Client Info: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
    <li>Remote Address: <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
    <li>Remote Port: <?php echo $_SERVER['REMOTE_PORT']; ?></li>
  </ul>

  <!-- Pour éviter le Cross-site scripting (XSS) on utilise les fonctions htmlentities() ou htmlspecialchars() -->
  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <fieldset>
      <label for="name">Nom</label>
      <input type="text" name="name" id="name" value="" placeholder="Nom" required pattern="^[A-zÀ-ÿ ]*$" minlength="3" maxlength="15">
      <label for="age">Age</label>
      <input type="number" name="age" id="age" value="" placeholder="Age">
      <input type="email" name="email" id="email" value="" pattern="^[\w\-\.]+@([\w-]+\.)+[\w-]{2,}$" size="30" required placeholder="Email">
      <input type="submit" name="submit" id="submit" value="Envoyer" />
    </fieldset>
  </form>
  <?php
  $response = "<p>Mon nom est " . $name . " et j'ai " . $age . " ans. " . $email . ".</p>";
  echo $response;
  echo "<p>$nameErr</p>";
  echo "<p>$ageErr</p>";
  echo "<p>$emailErr</p>";
  // Using the array function to create an array of numbers
  $numbers = [1, 2, 3, 4, 5];

  // Strings as keys
  $hex = [
    'red' => '#f00',
    'green' => '#0f0',
    'blue' => '#00f',
  ];

  echo $hex['red'];
  // var_dump($hex);
  ?>
</body>

</html>
<?php
$people = [
  [
    'first_name' => 'Brad',
    'last_name' => 'Traversy',
    'email' => 'brad@gmail.com',
  ],
  [
    'first_name' => 'John',
    'last_name' => 'Doe'
  ],
  [
    'first_name' => 'Jane',
    'last_name' => 'Doe'
  ]
];

$file = 'extras/users.txt';

if (file_exists($file)) {
  // Returns the content and number of bytes read from the file on success, or FALSE on failure.
  // echo readfile('extras/users.txt');
$handle = fopen($file, 'r');
  $contents = fread($handle, filesize($file));
  fclose($handle);
  echo $contents;
}

function inverse($x) {
  if (!$x) {
    throw new Exception('Division by zero.');
  }
  return 1/$x;
}
inverse(0); 

$people2 = [
  // $person1, //   [...$person1]
  [
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email' => 'john@gmail.com',
  ],
  [
    'first_name' => 'Jane',
    'last_name' => 'Doe',
    'email' => 'jane@gmail.com',
  ],
];

// echo $people2[0]['first_name'];
// print_r(array_keys($people2));

if ('5' === 5) {
  echo "5 est égal à 5";
} else {
  echo "5 n'est pas égal à 5";
}

$t = date('H');

if ($t < 12) {
  echo 'Have a good morning!';
} elseif ($t < 17) {
  echo 'Have a good afternoon!';
} elseif ($t >= 17 && $t < 20) {
  echo 'Have a good evening!';
} else {
  echo 'Have a good night!';
}
$posts = ['Post One', 'Post Two', 'Post Three'];

foreach ($posts as $index => $post) {
  echo "{$index} - {$post} <br>";
}


$fruits = ['apple', 'banana', 'orange'];
$fruits[] = 'grape';

echo $fruits[3] . '<br>';
$chunkedArray = array_chunk($fruits, 2);
// var_dump($chunkedArray);
echo count($fruits);


// HTML Entities
$string2 = '&lgt;<h1>Hello World</h1>';
echo htmlentities($string2);
echo '<br>';
echo htmlspecialchars($string2);

echo htmlentities('<Il était une fois un être>.');
// Output: &lt;Il &eacute;tait une fois un &ecirc;tre&gt;.
//                ^^^^^^^^                 ^^^^^^^

echo htmlspecialchars('<Il était une fois un être>.');
// Output: &lt;Il était une fois un être&gt;.
// 
printf('%s is a %s', 'Brad', 'nice guy');
printf('1 + 1 = %f', 1 + 1); // float
?>



/**/

…or create a new repository on the command line
echo "# php-course" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M master
git remote add origin git@github.com:Web-Kute/php-course.git
git push -u origin master

git remote add origin git@github.com:Web-Kute/php-course.git
git branch -M master
git push -u origin master

 */