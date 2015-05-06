<!doctype html>
<!--/**************************************************
 * Auther: Howard La Flamme                     	  *
 * Title: 403 ERROR (403.php) 						  *
 * Description: displays if user tries to access 	  *
 *				a page they are not authorized to. 	  *
 * Revision: 0.1.5 5/6/2015                     	  *
 *****************************************************/-->

<html>
<head>
	<meta charset="UTF-8">
		<title>Couch Potato Hikers ERROR</title>
	<link href="css/maincss.css" rel="stylesheet" >
	<meta name="viewport" content="initial-scale=1.0" />

</head>
<body class="bodyError">
<div class="wrapper">

<header>
    <h1>Couch Potato Hikers</h1>
    <h1>403 ERROR</h1>
</header>

	<article class="contentError">

		<h1>Looks like you have wandered off the trail.</h1>
			<?php 
  				if(isset($_SESSION['error_message'])){?>
  					<h2 class="h2Error"><?php 
  					echo htmlentities($_SESSION['error_message']);?></h2>
  			<?php	
    			$_SESSION['error_message'] = null;
    		}?>
  		<h2 class="h2Error"><a class='link' href="index.php?action=pubhome">Click Here</a> to return to the Trail Head</h2>
	</article>
	<div class="contentFooter">	
		<h5>&copy;Copyright 2015 Couch Potato Hikers.  All rights reserved. </h5>
	    <div> Icons made by <a class="link" href="http://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a class="link" href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a class="link" href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
	</div><!--/footer-->
</div> <!--/wrapper-->
</body>
</html> 





