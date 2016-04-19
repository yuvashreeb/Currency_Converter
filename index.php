<?php 

if(isset($_POST['convert']))
{
    $amount=$_POST['amount'];
    $from=$_POST['from'];
    $to=$_POST['to'];
currency_convert($amount,$from,$to);
}
function currency_convert($amount,$from,$to)
{
  $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
  $get = explode("<span class=bld>",$get);
  $get = explode("</span>",$get[1]);  
  $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
  echo $converted_amount;
}

?>
<html>
    <head>
        <title>
            CURRENCY CONVERTER
        </title>
    </head>
    <body>
<h3>Currency Converter</h3>
        <form action="" method="post">
Amount:
            <input type="text" name="amount"/><p />
From:
        <input type="text" name="from"/><p />
To:
        <input type="text" name="to"/><p />
        <input type="submit" name="convert"/>
        </form>  
    </body>
</html>
