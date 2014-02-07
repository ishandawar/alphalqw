<!-- KONICCHIWA! MINNA-SAN! -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Shop IDs</title>

        <link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />

        <link href="css/text.css" rel="stylesheet" type="text/css" media="all" />

        <link href="css/960.css" rel="stylesheet" type="text/css" media="all" />

        <link href="css/black.css" rel="stylesheet" type="text/css" media="all" />

        <link href="css/inventory.css" rel="stylesheet" type="text/css" media="all" />

        <link rel="stylesheet" type="text/css" href="ui/css/sleek/style.css"/>

        <link rel="shortcut icon" href="img/icon.png"/>

        <!--

        include Google's AJAX API loader 

        -->

        <script src="http://www.google.com/jsapi"> 
        </script>

        <!-- load JQuery and UI from Google -->

        <script type="text/javascript">

            google.load("jquery", "1");

            google.load("jqueryui", "1");

        </script>

        <script src="js/components.js" type="text/javascript"> 
        </script>

        <script src="js/effects.js" type="text/javascript"> 
        </script>

        <script src="js/AC_RunActiveContent.js" type="text/javascript"> 
        </script>

        <!--[if IE 6]>

        <style type="text/css" >

            p.error span, p.info span, p.notice span, p.success span { 

            postion:static;

            margin-right:15px;

        }

        p.todoitem a.close {

        margin-right:10px;

    }

    button.red, button.brown {

    padding:0px !important;

}

</style>

<![endif]-->

</head>

<body>

<!-- 960 Container 12 Columned Start -->

<div class="container_12">

<!-- Header Start -->

<div class="grid_5">

</div>

<!-- Header End -->

<div class="clear"> 
</div>

<!-- MENU START --> 
<div class="grid_12"> 
<ul id="menu"> 

</ul>  
</div> 
<!-- MENU END --> 
<!-- Submenu Start -->

<div class="grid_12" id="submenu">

<ul>

</ul>

</div>

<!-- Submenu End -->

<div class="clear"> 
</div> 
<!-- CONTENT START --> 
<div class="grid_9 cnt" id="left"> 
<div class="emsg"> 
</div> 
<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("eatl_db") or die(mysql_error());

$result = mysql_query("SELECT * FROM etl_items_shops ORDER BY shop_id") 
or die(mysql_error());  

echo "<table border='1'>";
echo "<tr> <th>Shop Name</th> <th>Shop ID</th> </tr>Mady By Lulz :D</tr>";
while($row = mysql_fetch_array( $result )) {
	echo "<tr><td>"; 
	echo $row['sName'];
	echo "</td><td>"; 
	echo $row['shop_id'];
	echo "</td></tr>"; 
} 

echo "</table>";
?>
</p> 
</div> 
<!-- CONTENT END --> 

<!-- 960 Container 12 Columned End -->

</body>

</html>

<!-- UWE CMS v.1 -->

<!--UberWorlds Evolution-->
