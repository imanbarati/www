<html>
<head><style>body {
  background-color: lightblue;
}
.error {color: #FF0000;}

h1 {
  color: white;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}
</style>
</head>
<body>  

<?php
$eror = $name = $password = $gender = $number = $select = $check = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
/*(isset($_POST("name")&&
*/
  if (empty($_POST["name"])) {
    $eror = "need";
  } 
   if (empty($_POST["password"])) {
    $eror = "need";
  }
  if (empty($_POST["gender"])) {
    $eror = "need";
  }
  if (empty($_POST["number"])) {
    $eror = "need";
  }
  if (empty($_POST["select"])) {
    $eror = "need";
  }
  if (empty($_POST["check"])) {
    $eror = "need";
  }


/*
if(isset($_POST['name'])&&!empty($_POST['name'])&&
isset($_POST['gender'])&&!empty($_POST['gender'])&&
isset($_POST['password'])&&!empty($_POST['name'])&&
isset($_POST['number'])&&!empty($_POST['number'])&&
isset($_POST['select'])&&!empty($_POST['select'])&&
isset($_POST['check'])&&!empty($_POST['check']){
*/
  $name = test_input($_POST["name"]);
  $password = test_input($_POST["password"]);
  $gender = test_input($_POST["gender"]);
  $number = test_input($_POST["number"]);
  $select = test_input($_POST["select"]);
  $check = test_input($_POST["check"]);
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1 style="color:blue;">اطلاعات شما</h1>
<p style="color:red;">الزامی.</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">  <span class="error"><?php echo $eror;?></span>
  <br>
password:<input type="password" name="password"   <span class="error"><?php echo $eror;?></span>
Number:<input type="number" name="number">  <span class="error"><?php echo $eror;?></span>
  <br>
   <br><br>
    <label for="cars">انتخاب:</label>
 <select name="select">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select>  <span class="error"><?php echo $eror;?></span>

  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
    <span class="error"><?php echo $eror;?></span>
  <br>
Accept<input type="checkbox" value="accept" name="check">
<br>  <span class="error"><?php echo $eror;?></span>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>اطلاعات:</h2>";
echo $name;
echo "<br>";
echo $number;
echo "<br>";
echo $password;
echo "<br>";
echo $select;
echo "<br>";
echo $gender;
echo $check;
?>

</body>
</html>