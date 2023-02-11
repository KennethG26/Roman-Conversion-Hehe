<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roman Numeral Translator</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
if(isset($_POST["submit"])){
function value($r)
{
    if ($r == 'I')
    {
        return 1;
    }
    if ($r == 'V')
    {
        return 5;
    }
    if ($r == 'X')
    {
        return 10;
    }
    if ($r == 'L')
    {
        return 50;
    }
    if ($r == 'C')
    {
        return 100;
    }
    if ($r == 'D')
    {
        return 500;
    }
    if ($r == 'M')
    {
        return 1000;
    }
  
    return -1;
}
function romanToDecimal(&$roman)
{
    $res = 0;
  
    for ($i = 0; $i < strlen($roman); $i++)
    {
        $s1 = value($roman[$i]);
  
        if ($i+1 < strlen($roman))
        {
            $s2 = value($roman[$i + 1]);
            if ($s1 >= $s2)
            {
                $res = $res + $s1;
            }
            else
            {
                $res = $res + $s2 - $s1;
                $i++; 
            }
        }
        else
        {
            $res = $res + $s1;
            $i++;
        }
    }
    return $res;
}

$roman = $_POST["area"];
$number = romanToDecimal($roman);
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';


$T1= $_POST["area"];
$T2 = romanToDecimal($roman);
$T3 = $result;
}
?>
<div class = "Header">
    <h2>Roman To English Converter</h2>
    <img src = "img/logo-1.png">
</div>
<div class="main">
    <form action="" method="post">
        <p>Enter A Roman Numerals</p>
        <input type="text" name="area" value="<?php if(isset($T1)){echo $T1;}?>"/>
        <button type="submit" name="submit">Translate</button>
        <p>Interger</p>
        <input type="text" name="T2" value="<?php if(isset($T2)){echo $T2;}?>"readonly="readonly" />
        <p>English</p>
        <input type="text" name="T3" value="<?php if(isset($T3)){echo $T3;}?>"readonly="readonly" />
</form>
</div>
<div class = "Artist-Header">
    <h2>Our Memebers</h2>
</div>
  <div class = "artist-main-container">
    <div class = "artist-container">
        <div class = "artist-pic-1"><img src="img/Leader.png"></div>
        <div class = "artist-name-1"><p>Kenn Alsols</p></div>
        <div class = "artist-role-1"><p>Leader</p></div>
    </div>

    <div class = "artist-container">
        <div class = "artist-pic-1"><img src="img/Sample-2.png"></div>
        <div class = "artist-name-1"><p>Kenneth Garanzo</p></div>
        <div class = "artist-role-1"><p>Member</p></div>
    </div>

    <div class = "artist-container">
        <div class = "artist-pic-1"><img src="img/Sample-3.png"></div>
        <div class = "artist-name-1"><p>Rovic Ulaso</p></div>
        <div class = "artist-role-1"><p>Member</p></div>
    </div>

    <div class = "artist-container">
        <div class = "artist-pic-1"><img src="img/Sample-4.png"></div>
        <div class = "artist-name-1"><p>Airene Discaya</p></div>
        <div class = "artist-role-1"><p>Member</p></div>
    </div>

    <div class = "artist-container">
        <div class = "artist-pic-1"><img src="img/Sample-5.png"></div>
        <div class = "artist-name-1"><p>Rosario Catan</p></div>
        <div class = "artist-role-1"><p>Member</p></div>
    </div>
  </div>

</body>
</html>