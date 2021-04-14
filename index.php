<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>


<meta http-equiv="Content-Type" content="text/html;charset=utf-8"><title>Capture the Flag with Stuff</title>

<link rel="stylesheet" type="text/css" href="basic.css">
<style type="text/css">

body, td {
   line-height: 100%;
}

p
{
   text-indent: -2.5em;
   margin-top: 1pt;
   margin-bottom: 1pt;
   margin-left: 3.5em;
}

h2, .h2
{
   font-size: 14pt;
   color: #000000;
}

h3, .h3
{
   font-size: 11pt;
   color: #000000;
   margin-left: 0.5em;
}
</style></head><body>
<?php
require("../web_kgb_2000/includes/lib.php");
require("../web_kgb_2000/includes/template.php");
require("../web_kgb_2000/includes/template_diet.php");
require("../web_kgb_2000/includes/database.php");

$view_print = (isset($_GET['p']) ? ($_GET['p'] && true) : false);

$TEMPLATE_TOPIMAGE = array('url' => "/2000/images/headings/cen_ctfws.gif", 'alt' => "Capture the Flag with Stuff");
if ($view_print)
{
	template_pagetop_diet("Capture the Flag with Stuff", 'print');
}
else
{
	$NAV_THIS = "ctfws";

	template_pagetop("Capture the Flag with Stuff");
}
?>
<div class="background_dark" align="center">

<?php echo file_get_contents('history.html');?>

<h3>These are the revised rules for Capture the Flag with Stuff Version Too Point Eau.</h3>
<br>

</div>

<p>In Fall of '94, KGB ran a game of Capture-the-Flag, using the labyrinthine
corridors of Wean and Doherty Halls at CMU. It was quite successful (modulo
a few sprained ankles); a good time was had by all. But deep nasty things
in my brain began whispering that perhaps <i>more</i> fun might be made
available... by the addition of Stuff.
<p>Stuff is a key concept in game design. Pong plus Stuff makes Arkanoid.
Risk plus Stuff makes Cosmic Encounter. Rock-Scissors-Paper plus Stuff
makes Magic: the Gathering. Capture-the-Flag plus Stuff makes... <b>Capture-the-Flag
With Stuff</b>.
<p>In Fall of '07, Randall Munroe came to speak at CMU, on the very night of that semester's Capture-the-Flag with Stuff.  Ed Ryan publicly invited him to play, and this led to by far the largest game ever played, with over 250 people playing.  This led to discussion on how to adapt the game to its ever-growing size, out of which came several new idea.  And thus, <b>Capture the Flag with Stuff Version Too Point Eau was born.</b>

<p>In Spring of '21, due to a relentless onslaught of paninis, CtFwS was held in Minecraft, with a scale model of Wean and Doherty built by members of the KGB.</p>

<img src="ctfwsm.png" alt="Screenshot of Wean and Doherty exterior in Minecraft" width="1000" style="display: block;margin-left: auto;margin-right: auto;width: 50%;">

<p>In an attempt to make the game more understandable to those not willing to spend hours understanding every nuance of the rules, there are now three different rules pages:

<ul>
<li><a href="useful.php">Useful</a> - These are (hopefully) what you need to know to play.  They are written is normal English with the intent of clearly giving the important information.  Some fiddly details are missing, but you probably don't care about those anyway.</li>
<li><a href="full.php">Full</a> - These are the Official Rules.  They are numbered, attempt to define every term fairly rigorously, and are hopefully sound and complete.  If you love reading complicated documents that attempt to make a cohesive, fully consistent system out of a collection of fun ideas, this is the place for you.</li>
<li><a href="presentation.pdf">Presentation</a> - This is the rules presentation.  It is probably not useful unless you are presenting rules.</li>
</ul>


<?php

if ($view_print)
	template_pagebottom_diet();
else
	template_pagebottom();

?>


</body></html>
