<?php
include("login.include.php");
include $_SERVER['DOCUMENT_ROOT'] . '/webServiceCaller.include.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<title>Trade History</title>
<META NAME="ROBOTS" CONTENT="NONE, NOARCHIVE">
<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
<meta http-equiv="Expires" content="Tue, 04 Dec 1997 21:29:02 GMT">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery/jquery.gallerax-0.2.js"></script>
<link rel="stylesheet" type="text/css" href="2leveltab.css" />
<script type="text/javascript" src="2leveltab.js"></script>
<style type="text/css">
@import "gallery.css";
</style>
</head>

<body>
<a name="glosstop"></a> <center><img src="images/banner.jpg" width="810" height="160" alt="NASDAQ Ninja logo" /></center>
<!-- end #header -->

<!-- begin menu stuff -->
<ul id="maintab" class="basictab">
    <li rel="homesubs"><a href="home.php"><img src="images/Home.jpg" onmouseover=this.src="images/Homeselected.jpg" 
        onmouseout=this.src="images/Home.jpg" /></a></li>
    <li rel="tradesubs"><a href="trading.php"><img src="images/Trade.jpg" onmouseover=this.src="images/Tradeselected.jpg" 
        onmouseout=this.src="images/Trade.jpg" /></a></li>
    <li rel="looksubs"><a href="lookup.php"><img src="images/Lookup.jpg" 
        onmouseover=this.src="images/Lookupselected.jpg" onmouseout=this.src="images/Lookup.jpg" /></a></li>
    <li rel="setsubs"><a href="settings.php"><img src="images/Settings.jpg" onmouseover=this.src="images/Settingsselected.jpg" 
        onmouseout=this.src="images/Settings.jpg" /></a></li>
    <li class="selected" rel="helpsubs"><a href="help.php"><img src="images/Help.jpg" 
        onmouseover=this.src="images/Helpselected.jpg" onmouseout=this.src="images/Help.jpg" /></a></li>
    <li rel="aboutsubs"><a href="about.php"><img src="images/About_Us.jpg" 
        onmouseover=this.src="images/About_Usselected.jpg" onmouseout=this.src="images/About_Us.jpg" /></a></li>
    <li rel="contactsubs"><a href="contact.php"><img src="images/Contact_Us.jpg" 
        onmouseover=this.src="images/Contact_Usselected.jpg" onmouseout=this.src="images/Contact_Us.jpg" /></a></li>
</ul>

<div id="homesubs" class="submenustyle"></div>
<div id="tradesubs" class="submenustyle">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="buy.php">Buy</a>
<a href="sell.php">Sell</a>
<a href="currentcash.php">Current Cash</a>
<a href="tradehistory.php">Trade History</a>
</div>

<div id="looksubs" class="submenustyle">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="newspg.php">NASDAQ News</a>
</div>

<div id="setsubs" class="submenustyle"></div>

<div id="helpsubs" class="submenustyle">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="faq.php"><img src="images/FAQ.jpg" onmouseover=this.src="images/FAQselected.jpg" 
    onmouseout=this.src="images/FAQ.jpg" /></a>
<a href="glossary.php"><img src="images/Glossaryselected.jpg" 
    onmouseover=this.src="images/Glossaryselected.jpg" onmouseout=this.src="images/Glossaryselected.jpg" /></a>
</div>
<div id="aboutsubs" class="submenustyle"></div>
<div id="contactsubs" class="submenustyle"></div>

<script type="text/javascript">
//initialize tab menu, by passing in ID of UL
initalizetab("maintab")
</script>

<!-- end #menu -->

<?php  

class TradeHistory
{
   public $numShares,$price,$symbol,$date,$userID;
};
function GetTradeHistory
{
   $history = new TradeHistory(
   $req->history->numShares,               
   $req->history->price,                  
   $req->history->symbol,                
   $req->history->transDate,             
   $req->history->userID,     
   );
   $history->mysql_query("CALL getTradeHistory(userID)")
      or die('Could not locate trade history: ' .mysql_error());
   $token = $POST['token'];
   $userID = mysql_query("call getUserID(token)");
};
   echo 'trade history php called';
?>

<div id="footer">
    <p> &copy; 2012 Southern Oregon University 1250 Siskiyou Boulevard Ashland, OR 97520 541-552-7672</p>
    <p> Webpages may include live content from third parties.</p>
    <p> Allergy Information:  Transmitted on a network that also transmits pictures of tree nuts.</p>
    <p> </p>
</div>
<!-- end #footer -->
</body>
</html>