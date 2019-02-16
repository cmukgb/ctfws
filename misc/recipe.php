<?php
require("../../web_kgb_2000/includes/lib.php");
require("../../web_kgb_2000/includes/template.php");
require("../../web_kgb_2000/includes/template_diet.php");
require("../../web_kgb_2000/includes/database.php");

$view_print = (isset($_GET['p']) ? ($_GET['p'] && true) : false);

$TEMPLATE_TOPIMAGE = array('url' => "/2000/images/headings/cen_ctfws.gif", 'alt' => "Capture the Flag with Stuff");
if ($view_print)
{
	template_pagetop_diet("Capture the Flag with Stuff: Recipe", 'print');
}
else
{
	$NAV_THIS = "ctfws";

	template_pagetop("Capture the Flag with Stuff: Recipe");
}
?>
<div class="background_dark" align="center">
<br><i>Notes on running your own game</i><br>
<br>
<?php
if (!$view_print)
{
?>
<a href="recipe.php?p=1">Printable Version</a>
<?php
}
?>
</div>
	<hr>
<h2>Organization and play</h2>

<p>Each team should get one of each type of flag, glyph, 
wand, belt, and potion. (It's up to you whether duplicates 
are permissible. Some items are more valuable than others, so you
probably want to be careful - extra Long Wands of the Law can't
hurt, but extra Goombah's Belts would almost certainly be a Bad
Idea.  When you have 60 people on a team, four wands and four belts will
probably not be enough. :) )
<p>This game is meant to be played indoors. Lurking in hallways, finding
unexpected things around corners, and putting glyphs on doors are all integral
parts of the strategy. An outdoor version would take considerable fiddling.
Any takers?
<p>For the sake of sanity, you should have a central room in neutral territory
where the head judge will preside. He can answer questions, resolve disputes,
and so on. The players wouldn't mind if there were cold drinks there, either.
<p>If you have enough spare people, it is also helpful to have some field
judges who wander around and follow the action, so that questions can
be resolved more quickly.
<p>All this nonsense obviously takes a lot of familiarity with the rules.
It will probably take even more tolerance to play "at speed". Pay attention
to people; see what magic items they're carrying so you won't be surprised
if they seem to violate the rules.
<p>If it impossible for you to know something, don't worry about it. For
example, the Potion of Truth may only be used once per jailbreak; but if
you come across one and don't know if it's been used recently, assume it
hasn't. Make every reasonable effort to tell people about time limits and
countdowns.
<p>Every player should wear a watch.

<h2>Recipe</h2>

<ul>
<li>
16 feet (total) of black foam pipe insulation, 1.5 inch diameter. (Look
in hardware stores.)</li>

<li>
8 neutral-colored foam balls (black or white). If you can't find any, substitute
another 8 feet of pipe insulation; see below.</li>

<li>
20 feet each of blue, red, yellow, green, and brown cloth tape.</li>

<li>
A couple square yards each of pink, yellow, and orange felt. (Look in fabric
stores. Felt is reasonably cheap, it doesn't unravel like cloth, and when
you tie the belts on they don't come off. Don't yank on it, though.)</li>

<li>
Pink and yellow highlighter pens, preferably fat ones.</li>

<li>
As many rolls of masking tape as you can scare up. Each team will need
at least two.</li>

<li>
Several pairs of scissors.</li>

<li>
Cheap stopwatches of the kind used as party favors (optional).</li>

<li>
A black permanent marker.</li>

</ul>
The teams will be pink and yellow. (If the players object to the wimpy
colors, inform them that great wizards are above that sort of whining.
If they continue to complain, go home.)
<p>Cut the pink and yellow squares of felt into 18-by-18 inch squares. Set aside
three squares of each color to be the flags of each team.  Label each team's
flags "A", "B", and "C".  Cut the remaining quarters into armbands, 18
inches by one inch, which the team members will wear to identify themselves.
<p>Cut the orange felt into yard-long strips, and tie pairs of strips
together to produce eight orange belts, each about five and a half feet
long. Add bands of colored cloth tape to
form two of each kind of belt. (You could just use red, green, blue, and brown felt,
of course, but this is a little easier. I used orange because it's
distinct from the team colors and the other colors significant in the game.)
<p>Make up two of each kind of glyph, and color the borders with the highlighter
pens to indicate which team owns each. Make sure there's enough color to
be recognizable from down a long hallway. (You were wondering why the teams
are yellow and pink? Those are the highlighter colors I found. You could
make the glyphs on colored paper, if you wanted to be fancy. You could
rearrange the entire color scheme if you wanted. Just make sure the team
colors and the magic colors are all easily distinguishable.) Attach one
of the stopwatches to each glyph. (This way each glyph knows about Official
Game Time, and players know when they may move a glyph.)
<p>Cut the pipe insulation into eight 2-foot lengths. Put bands of colored
cloth tape around each length to make the eight wands (two of each type.)
Four bands of tape per wand is good.
<p>Put a band of colored tape around each foam ball. We couldn't find foam
balls in time, so we took eight 1-foot lengths of pipe insulation, bent
them into doughnuts, taped them that way, and added more bands of colored
tape.
<p>Allow at least half an hour for all this construction foofaraw, plus
another half-hour (hah!) to go over the rules and pick teams.

<?php

if ($view_print)
	template_pagebottom_diet();
else
	template_pagebottom();

?>
