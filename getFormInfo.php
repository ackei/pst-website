<?php

$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$birthday = $_REQUEST['birthday'];
$sex = $_REQUEST['sex'];
if ($sex == 'male'){
  $sex = 'm';
}
else if ($sex =='female'){
  $sex = 'f';
}
else{
  $sex = 'o';
}

require 'connectDatabase.php';

$count = $dbh->exec("INSERT INTO users(first_name,last_name,email,password,birthday,gender) 
  VALUES ('{$first_name}','{$last_name}','{$email}','{$password}','{$birthday}','{$sex}')");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
    <title>Princeton SciTech Test Website by Allen</title>
  </head>

  <body>
    <div id="container">
      <div class="inner">

        <header>
          <h1>Records Saved Thus Far</h1>
          <h2><?php echo $count; ?> row added to the database<br /></h2>
        </header>

        <hr>

        <section id="main_content">
          <h3>
            <a id="welcome" class="anchor" href="#welcome" aria-hidden="true"></span></a>Welcome</h3>

            <p>Here's what you submitted:</p>
            <p>
        First Name: <?php echo $first_name ?><br />
        Last Name: <?php echo $last_name?><br />
        E-mail: <?php echo $email?><br />
        Password: <?php echo $password ?><br />
        Birthday: <?php echo $birthday ?><br />
        Sex: <?php echo $sex ?><br />
              <br />
              <a href="index.html">Go Back</a>
              <br />
              <br />
              Current Stored Names in Database:
            </p>

            <?php
        try {

          $sql = "SELECT * FROM users";
          foreach ($dbh->query($sql) as $row)
              {
                print $row['first_name'] . ' ' . $row['last_name'] . '<br />';
              }
          $dbh = null;
        }
        catch (PDOException $e){
          echo $e->getMessage();
        }
      ?>

        </div>
      </div>
    </body>
    </html>