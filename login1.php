
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hermes</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Elite Online Store</span>
    <span class="site-heading-lower">Hermes</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg  navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="about.php">About Hermes</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="products.php">Products</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="store.php">Store</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="contact.php">Contact</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="page-section clearfix">
    <div class="container">
    
          <h2 class="section-heading mb-4">
            <span class="section-heading-upper"></span>
            <span class="section-heading-lower"></span>
          </h2>
          <p class="mb-3">
          </p>
          
        </div>
      </div>
    </div>
  </section>
  
     
  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-0">
              <?php
              session_start();
$xml=simplexml_load_file("data_login.xml") or die("Error: Cannot create object");

function died($error){
    echo"We are very sorry,but there where errors found with the form you subbmited";
    echo 'these errors appears below.<br/><br>';
    echo $error."<br /><br />";
    echo 'please go back and fix these errors.<br/><br>';
    die();
}
              
$error_message="";
$user='Maria';
$pass='222';

foreach($xml->children() as $data) {
  if(($_POST['form-username']==$user) && ($_POST['form-password']==$pass))
     {if(isset($_POST['remember']))
    {
    setcookie('form-username',$_POST['form-username'],time()+60*60*24*365);
  setcookie('form-password',$_POST['form-password'],time()+60*60*24*365);
    }else{
      setcookie('form-username',"");
  setcookie('form-password',"");
 }
    session_start();
    
    $_SESSION["user_name"]=$_POST["form-username"];
    
    header("Location:account.php");
             }
    }   
    
 

foreach($xml->children() as $data) {
if(($_POST['form-username']==$data->username) && ($_POST['form-password']==$data->password)){
    $_SESSION["user_name"]=$_POST["form-username"];
    
    header("location:accountuser.php");
  
}
}
foreach($xml->children() as $data) {

if(($_POST['form-username']!=$data->username) || ($_POST['form-passowrd']!=$data->password)){
  $error_message.='Nume sau parola gresita';
  break;
  
}
}

if(strlen($error_message)>0){
        died($error_message);
    }   
?> 

    
    ?> 
          
             
          </div>
  
    
          
            <div class="form-bottom" align="center" >
                <form action="login.php" method="post" >
   
                    <h2> <button   type="submit" class="btn btn-secondary" ><i>Try again</i></button></h2>
    
                            </form>
     </div>
          </div>
          
        </div>
        
      </div>
 
  </section>

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Your Website 2019</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

