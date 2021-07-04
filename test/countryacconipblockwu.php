<!DOCTYPE html>
<html>
<body>
<?php
  session_start();
  if (!isset($_SESSION['FirstVisit'])) 
  {
    if ($two_letter_country_code=="US")
      die();
    else 
      $_SESSION['FirstVisit'] = 1;
  }
?>p
if ($two_letter_country_code=="US")
  die();

<?php
$two_letter_country_code=iptocountry("101.102.103.104");

function iptocountry($ip) {   
    $numbers = preg_split( "/\./", $ip);   
    include("ip_files/".$numbers[0].".php");
    $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);   
    foreach($ranges as $key => $value){
        if($key<=$code){
            if($ranges[$key][0]>=$code){$country=$ranges[$key][1];break;}
            }
    }
    if ($country==""){$country="unkown";}
    return $country;
}
?>

<?php
$IPaddress=$_SERVER['REMOTE_ADDR'];
$two_letter_country_code=iptocountry($IPaddress);

if ($two_letter_country_code=="US"){
    print "This is ad number 1, because you are from USA";
    }else{
    print "This is ad number 2, because you are not from USA";
    }

function iptocountry($ip) {   
    $numbers = preg_split( "/\./", $ip);   
    include("ip_files/".$numbers[0].".php");
    $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);   
    foreach($ranges as $key => $value){
        if($key<=$code){
            if($ranges[$key][0]>=$code){$two_letter_country_code=$ranges[$key][1];break;}
            }
    }
    if ($two_letter_country_code==""){$two_letter_country_code="unkown";}
    return $two_letter_country_code;
}
?>
<?php
$IPaddress=$_SERVER['REMOTE_ADDR'];
$two_letter_country_code=iptocountry($IPaddress);
 
include("IP_FILES/countries.php");
$three_letter_country_code=$countries[ $two_letter_country_code][0];
$country_name=$countries[$two_letter_country_code][1];

print "Two letters code: $two_letter_country_code<br>";
print "Three letters code: $three_letter_country_code<br>";
print "Country name: $country_name<br>";

function iptocountry($ip) {
    $numbers = preg_split( "/\./", $ip);
    include("ip_files/".$numbers[0].".php");
    $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);
    foreach($ranges as $key => $value){
        if($key<=$code){
            if($ranges[$key][0]>=$code){$two_letter_country_code=$ranges[$key][1];break;}
            }
    }
    if ($two_letter_country_code==""){$two_letter_country_code="unkown";}
    return $two_letter_country_code;
}
?>
<?php
$IPaddress=$_SERVER['REMOTE_ADDR'];
$two_letter_country_code=iptocountry($IPaddress);
 
include("IP_FILES/countries.php");
$three_letter_country_code=$countries[ $two_letter_country_code][0];
$country_name=$countries[$two_letter_country_code][1];

print "Two letters code: $two_letter_country_code<br>";
print "Three letters code: $three_letter_country_code<br>";
print "Country name: $country_name<br>";

// To display flag
$file_to_check="flags/$two_letter_country_code.gif";
if (file_exists($file_to_check)){
                print "<img src=$file_to_check width=30 height=15><br>";
                }else{
                print "<img src=flags/noflag.gif width=30 height=15><br>";
                }

function iptocountry($ip) {
    $numbers = preg_split( "/\./", $ip);
    include("ip_files/".$numbers[0].".php");
    $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);
    foreach($ranges as $key => $value){
        if($key<=$code){
            if($ranges[$key][0]>=$code){$two_letter_country_code=$ranges[$key][1];break;}
            }
    }
    if ($two_letter_country_code==""){$two_letter_country_code="unkown";}
    return $two_letter_country_code;
}
?>
<?php
$a=24;
$b=18;
while($b<>0){
$r=$a % $b;
$a=$b;
$b=$r;}

echo ("$a");
?>

</body>
</html>
