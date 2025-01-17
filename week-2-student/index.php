<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta name="description" content="This week we will look at how to connect to a database and save data to it">
        <title>Connecting & Saving to a Database</title>
        <!-- Because this is a PHP class I will be using Bootstrap for most of my styling. -->
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" >
        <!-- Bootstrap JS CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="./css/style.css">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- Header -->
        <header>
            <div>
                <a href="#"><img src="./img/php-logo.png" alt="PHP Logo"></a>
            </div>
            <nav>
                <menu>
                    <li><a href="#form">Save Person</a></li>
                </menu>
            </nav>
        </header>
        <section class="lesson-masthead">
            <div>
                <h1>Connecting to a Database & Saving Data</h1>
            </div>
        </section>
        <main>
          <!-- Lesson code starts here -->
          <section id="form" class="form-row row justify-content-center p-3">
            <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
              <h2>Add User</h2>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input1">First Name</label>
                <div class="col-sm-10">
                  <input type="text" name="fname" class="form-control" id="input1">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="input2">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" name="lname" class="form-control" id="input2">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="input3">Your Email</label>
                <div class="col-sm-10">
                  <input type="email" name="" class="form-control" id="input2">
                </div>
              </div>

              <div class="form-group">
                <label for="input4" class="col-sm-2 control-label">Age</label>
                <div class="col-sm-10">
                  <select name="age" class="form-control">
                    <option>Select Age</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="old">Older than dirt</option>
                  </select>
                </div>
              </div>

              <div class="form-group p-3">
                <input type="submit" class="btn btn-primary col-md-offset-10" value="Add User">
              </div>
            </form>
            <!-- add our PHP -->
            <div class="form-group submit-message">
              <?php
                require_once ('database.php');
                if(isset($_POST) & !empty($_POST)){
                  $fname = $database->sanitize($_POST['fname']);
                  $lname = $database->sanitize($_POST['lname']);
                  $age   = $database->sanitize($_POST['age']);
                  $email = $database->sanitize($_POST['email']);
                  $res   = $database->create($fname, $lname, $age, $email);
                  if($res){
                    echo "<p>User Added</p>";
                  }else{
                    echo "<p>Could not add user</p>";
                  }
                }
              ?>
            </div>
          </section>
        </main>
    </body>
</html>