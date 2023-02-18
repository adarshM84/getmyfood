<?php
// print_r($currentPage);
$clientName = "GET MY FOOD";
$desc = "This website is designed by Adarsh Mishra.";

$currentPage = htmlspecialchars(basename($_SERVER['PHP_SELF']));
// $title='';
// $keywords='';

switch ($currentPage) {
  case 'dashboard.php':
    $keywords    = 'GET MY FOOD';
    $title       = 'DASHBOARD - ' . $clientName;
    $description = $desc;
    break;

    case 'adminLogin.php':
      $keywords    = 'GET MY FOOD';
      $title       = 'Login - ' . $clientName;
      $description = $desc;
      break;


  default:
    if (strpos(htmlspecialchars($_SERVER['PHP_SELF']), 'about.php')) {
      $keywords    = 'GET MY FOOD';
      $title       = 'DASHBOARD';
      $description = $desc;
      break;
    }
    break;
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- jquery link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- font awesom -->
  <script src="https://use.fontawesome.com/ed481f8158.js"></script>
  <script src="https://kit.fontawesome.com/f19617ca8d.js" crossorigin="anonymous"></script>

  <title><?php echo $title ?></title>
  <meta name="keywords" content="<?php echo $keywords ?>" />
  <meta name="description" content="<?php echo $description ?>">
  <link rel="stylesheet" href="css/coustom.css?v=<?php echo rand(); ?>">
  <link rel="shortcut icon" href="../images/fevicon.ico" type="image/x-icon">
</head>