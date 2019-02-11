<?php
require("../../web_kgb_2000/includes/lib.php");
require("../../web_kgb_2000/includes/template.php");
require("../../web_kgb_2000/includes/template_diet.php");
require("../../web_kgb_2000/includes/database.php");

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
	<br>
	<i>A somewhat psychotic variation on a classic game</i>
	<br>
	<i>By Andrew Plotkin</i>
	<br>
	<i>Revised 2/7/2001 by Sean "Teki" Dobbs</i>
	<br>
	<i>Revised 11/14/2002 by David "dkitchin" Kitchin</i>
	<br>
	<i>Revised 3/10/2003, 11/7/2003, 3/25/2004, 11/19/2004, 3/24/05, <font color="#ff0000">3/30/06</font>
		by Benjamin "Hey You" Gilbert</i></center>

	<br>
	<br>
<h3 style="font-weight: normal;">These are the official rules for the Spring 2006 game of Capture the Flag with Stuff.<br>
Substantive changes relative to last semester's game are set in <font color="#ff0000">red</font>.</h3>
	<br>
<h3>These are the "classic" rules, in use at Carnegie Mellon until 2007.<br>
If you're looking for the current rules, see <a href="http://www.cmukgb.org/ctfws/">Version Too Point Eau</a>.</h3>
	<br>
<?php
if (!$view_print)
{
?>	<a href="classic.php?p=1">Printable Version</a>
<?php
}
?>
</div>
	<hr>
<p>In Fall of '94, KGB ran a game of Capture-the-Flag, using the labyrinthine
corridors of Wean and Doherty Halls at CMU. It was quite successful (modulo
a few sprained ankles); a good time was had by all. But deep nasty things
in my brain began whispering that perhaps <i>more</i> fun might be made
available... by the addition of Stuff.
<p>Stuff is a key concept in game design. Pong plus Stuff makes Arkanoid.
Risk plus Stuff makes Cosmic Encounter. Rock-Scissors-Paper plus Stuff
makes Magic: the Gathering. Capture-the-Flag plus Stuff makes... <b>Capture-the-Flag
With Stuff</b>.
<p>Herein are the rules.
<ul>
<li>
<i>Comments on the rules are given in this manner, as emphasized footnotes.
Comments are not rules; they are meant to clarify and explain the reasoning
behind the rules.</i></li>
</ul>

<hr>
<h2>
Base rules</h2>

<ul>
<li>
<i>These are the base rules to Capture-the-Flag, as clearly as I can state
them. All the Stuff modifies these rules. The rules are equally applicable
to two-team games and multiple-team games.</i></li>
</ul>
The game space is divided into some number of team territories and neutral
space. (There may also be forbidden territory, which no player may enter at
all during the game.) No two team territories may be directly adjacent; they
must be separated by at least ten feet of neutral space. You are within a
team's territory if any part of you is within that territory.
Players in neutral space are ethereal, meaning (roughly) that they cannot
capture, be captured or freed, free imprisoned teammates, use any Stuff, or
be affected by any Stuff.
<ul>
<li>
<i>No player can be in more than one team's territory at a time. The rules
could be extended to allow territories touching, but I don't feel like
it. Also note that territory is a three-dimensional volume; you are still
in a territory if you jump up from the floor.</i></li>
<li><i><font color="#ff0000">For walls that border on neutral space, the
boundary between team territory and neutral space is halfway through the wall.
For doors that border on neutral space, the outer half of the door is neutral
and the inner half is in team territory, regardless of whether the door is
open or closed. If you touch the inner half of such a door but are not
otherwise within team territory, you are still in neutral space.  (You just
happen to be adjacent to team territory.)</font></i></li>
</ul>
If you touch an enemy, and both of you are in your territory, he is captured
by you. You must lead him to your jail (see Glyph of Jail) at reasonable
speed (you may <i>not</i> hand him off to a teammate).  Once there, the
captive must "enter jail" by touching either the Jail or another prisoner
already in jail. A captor may not make any more captures until his captive
has entered jail.
<p>Prisoners may move around freely, as long as they all remain in constant
contact with the Jail (either directly or through a chain of other prisoners.)
<ul>
<li>
<i>It doesn't have to remain the same chain. Prisoners may rearrange themselves,
or form multiple chains. (Really, they should be called prisoner undirected
graphs, but never mind.) However, it is considered polite to enter jail
at the Glyph and form a single queue, so that the people who have been
imprisoned longest are closest to freedom.  Prisoner chains may stretch into
neutral space, but note that a prisoner in neutral space may
not be freed by a teammate.</i></li>

<li>
<i>It's also allowable for prisoners to be kept in the end of a hallway
or similar enclosed space, as long as a member of the team whose territory
this is watches over the jail (it's typical to have someone be the jailer,
though not required), and as long as the prisoners are not trying to escape
and are staying within 6-10 feet of the Glyph of Jail. Note that this applies
only to docile prisoners - those wanting to try to escape will get the
Rules Smackdown quickly. It is up to the jailer to decide how strictly
to enforce these rules, so play nice.</i></li>
</ul>
Every fifteen minutes, starting from the beginning of
play, all prisoners are released from their respective jails.  Released
prisoners must return to their home territor(ies) at reasonable speed, by the
most direct route.  Released prisoners are ethereal until they
re-enter their home territor(ies).

<p>If you touch a prisoner in another team's jail, he is freed, as long as
his freedom does not break the chain of captivity for any other prisoners.
Both of you must then return to your home territor(ies) at reasonable speed
and by the most direct route; you need not remain together. Both of you are
ethereal until you re-enter your home territor(ies).
<ul>
<li>
<i>If you touch someone in the middle of a prisoner chain, he is not freed
and you are not immune to capture; the touch does not count at all. He
cannot wait for his neighbors to join hands and then leave; you would have
to touch him again after they join.</i></li>
</ul>
At the beginning of the game, there is a timeout, usually fifteen or twenty
minutes long, during which no player may enter enemy territory; this is
so that flags and other magic items may be placed. Flags have special
restrictions on placement; see below.  The initial placement of each flag
must be approved or supervised by a judge.
<p>The game ends after one hour, or when there
remains only one team with uncaptured flags.  The winner
is the team with the greatest number of points.  In the case of a tie,
the winner is the tying team that reached its final point total
first.
<p>Magic items may be dropped or given away, but they may not be stolen
or yanked away from other people.

<h2>
Definitions of terms and supplementary rules</h2>

<dl>
<dt>
Flags</dt>

<dd>
Flags are large pieces of cloth or felt; 18 inches square is a good size.
Their magic is inherent; possession is all ten points of the Law.
There are three flags per team.  Before each game, the judges
will secretly decide how many points each particular flag is worth.

<ul>
<li><i>Obviously, judges should determine point values such that points
are equally accessible to both teams.  Flags should not all have the
same point value; this makes the game too predictable.
It is suggested that the set of flags {A, B, C} be mapped onto the point values {2,
3, 4}.</i></li>
<li><i>This system could be extended to an arbitrary number of flags,
depending on the number of players.</i></li>
</ul>

<br>You cannot move or touch your own team's flags once play has begun.
If a player is captured with an opposing team's flag in his possession,
he must drop the flag at the spot where he was tagged before being
escorted off to Jail.

<br><br>
When initially placed, flags must be no higher than six feet above the floor
(or at least within easy reaching distance) and at least half of the flag
must be visible from every possible viewing angle; in
addition, no more than one flag may be placed in a single hallway
or corridor.  <font color="#ff0000">If a flag is placed inside a container,
there must be an obvious way to remove the flag in one smooth motion.</font>

<ul>
<li><i>For the purposes of this rule, the Glyph of the Disgusting Doorknob
does not modify the number of exits in a room.</i></li>
<li><i>"Exits" also implies
"entrances".  A fire exit, whether alarmed or not, doesn't count as an "exit"
because it's impossible to get in that way.</i></li>
<li><i>The intent of the one-flag-per-corridor rule
is to prevent a team from placing all of its flags in one heavily-defended
area.  "Corridor" is ill-defined, but ultimately up to the judgement
of the supervising judge.  Mere distance between flags is not the only
controlling factor; it is also important that two flags not primarily
share common avenues of attack.  If in doubt, place flags on
different floors or in different parts of the building.</i></li>
<li><i><font color="#ff0000">The act of opening a door or lid and removing
a flag counts as a "smooth motion" if the lid is easily opened by lifting
or pulling.  Therefore, so long as the other placement rules are not
violated, flags may be placed in closed containers with transparent lids or
hanging out of closed containers with opaque lids.</font></i>
</ul>

<br>No flag may ever exist in a room or area with fewer than two exits, unless it is
being carried.  If a flag is dropped in an area with only one exit, a judge
must move it the shortest possible distance which satisfies this requirement.

<ul>
<li><i>This means that flags may be brought into elevators.  If a flag is
dropped in an elevator, the judge should move it outside the elevator on the
same floor on which its carrier was captured.</i></li>
</ul>

<br>If you carry another team's flag to the judges' room, your team
earns the number of points associated with that flag.  That flag then drops
out of play for the remainder of the game.

<br><br>Flags cannot be dispelled.  <font color="#ff0000">Flags that are carried by a player <u>continuously
dispel</u> the magic of all other items carried by that player.  Each such item
will remain ineffective as long as both it and the flag are
carried by the same person, and for one minute afterward.</font>
<ul><li><i><font color="#ff0000">The Belt of Your Ninja Forces are Doomed to
Obscurity is an exception; see its section below.</font></i></li></ul>
</dd>

<dt>
Armbands</dt>
<dd>
Armbands are narrow strips of cloth or felt, in the team colors.  Each
player must wear an armband indicating his team membership.
<ul>
<li><i>Armbands do not necessarily have to be worn on the arm.</i></li>
</ul>
</dd>

<dt>
Belts</dt>

<dd>
Belts are long sashes of cloth or felt; five feet long and five inches
wide is good. (The ends will dangle.) The magic is invoked by tying it
around your waist. Belts cannot be worn by multiple
people at the same time (though Goombah's Belt can be shared, see below).
No player may <font color="#ff0000">wear</font> more than one belt at a time.</dd>

<dt>
Potions</dt>

<dd>
Potions are foam-rubber balls. Bonking the subject over the head with the
ball invokes the magic. (Silly, but unambiguous.)</dd>

<dt>
Wands</dt>

<dd>
Wands are floppy two-foot lengths of foam rubber. Whapping the subject
(anywhere) and shouting the keyword invokes the magic.  <font color="#ff0000">
Each use of a keyword invokes, at most, one wand on one subject</font>.
<ul>
<li><i><font color="#ff0000">For example, if you have two Long Wands of the Law and want to use
both of them, you must use the keyword twice.  If you have one Long Wand
and want to whap two people, you must use the keyword twice.</font></i></li>
</ul>
</dd>

<dt>
Glyphs</dt>

<dd>
Glyphs are large sheets of paper or posterboard marked with the spell (in
big letters). A glyph is owned by a particular team, and will be marked with that team's
color. It functions as long as it is taped to a wall or floor
<font color="#ff0000">contiguous with that team's territory</font>,
and has no effect when carried. Only members of the owning team may move it,
and it only affects members of enemy teams (with the exceptions noted below).
Glyphs may not be <font color="#ff0000">carried</font> into neutral
or enemy territory and may not be placed <font color="#ff0000">on a neutral or enemy
surface or</font> within ten feet of a flag.

<br><br>
Glyphs may only be moved in the 60-second period following a jailbreak.
When the 60 seconds are up, the glyph must be placed
on the nearest wall which satisfies the placement
rules.  Players carrying a glyph are ethereal.

<br><br>
If a flag is dropped within ten feet of a glyph <u>other than the Glyph of
Jail</u>, the glyph must be removed from the wall or
floor until the next jailbreak, when it must be reinstated by the owning
team under the regular movement rules.
</dd>

<dt>
One charge</dt>

<dd>
An item with this attribute may only be used once; it must then be recharged
by touching it to any Glyph of Charging. If you pass the item to a teammate,
you should remember to say whether it is charged or not. If the item passes
to an enemy, it is automatically recharged.
<ul>
<li><i><font color="#ff0000">Wands cannot be discharged merely by using
the keyword; they must whap a valid target.</font></i></li>
</ul></dd>

<dt>
Capturing<font color="#ff0000">/Imprisonment</font></dt>

<dd>
<font color="#ff0000">A captured player is called a "captive" until he enters
jail and a "prisoner" thereafter.</font>  A captive must follow his captor to jail.
A player, once captured, cannot drop magic items (other than flags) or give them
to a teammate, and must give up any items he possesses, if asked. (To his captor
or his captor's teammate.)  <font color="#ff0000">Captured players (whether captives
or prisoners) may not move or touch enemy flags except as described in
the Flags section above.  Captives may not use magic items, but prisoners may.</font>
<ul>
<li><i>Capturing another player is a voluntary
act.  If an opponent walks up to you in your own territory and touches
you, he is not automatically your captive.</i></li>
<li><i><font color="#ff0000">The distinction between
captives and prisoners prevents newly captured players from immediately freeing themselves
through various annoying means, such as stunning their captors with the
Wand of Stun or dispelling a Belt of Twofer.  These means are annoying because
their success or failure depends on whether they use their item before
their captor asks them to give up that item, forcing both captor and captive
to try to act as quickly as possible.  Rather than placing special-case
prohibitions on every item which could create this race condition, we allow
the captor a few moments to confiscate any (non-concealable) magic item.
However, if the captor fails to do so, the captured player may make full use
of the item once he reaches jail and becomes a prisoner.  The ability
to draw a bright line in the sand seems worth the additional complexity.</font></i></li>
</ul>
</dd>

<dt>
Stunning</dt>

<dd>
A stunned player must sit down on the floor and wait until the stun wears
off. He is incapable of capturing or freeing anyone. He may easily be captured
according to the normal rules, in which case he is unstunned and must get
up to go to jail. If a player is stunned while leading a captive to jail,
the captive is freed. A player may not be stunned again if he is already
stunned.  <font color="#ff0000">Captured players cannot be stunned.</font>

<ul>
<li>
<i>A stunned player is not restrained from anything else; he may talk,
use magic items, etc.</i></li>
<li>
<i>Note that a stunned player is <u>not</u> required to give up items.</i></li>
</ul></dd>

<dt>
Dispelling</dt>

<dd>
Dispelling an item nullifies its magical properties; you may treat it as a mundane
piece of foam. Exception: nullifying a Glyph does not give you the right to move
it. Except where noted, dispelling an item does not cancel magical effects
which have already occurred.
<ul>
<li><i>For example, dispelling a Glyph of the Net allows anyone to pick up the magic
items piled there (since the Glyph is inactive).  Dispelling a Wand of Stun doesn't wake up
anyone stunned by it, but does prevent it from being used until the dispel wears off.  And dispelling
a Glyph of Alarm doesn't allow anyone to stop shouting.</i></li>
<li><i>A one-charge item may not be recharged while dispelled.</i></li>
</ul></dd>

<dt>
Ethereal</dt>

<dd>
A player who is ethereal cannot be captured or freed, capture others,
free imprisoned teammates, use magic items, or be affected by magic items.
<font color="#ff0000">Ethereal players in enemy territory may not pick
up magic items or move items not already in their possession.</font>
<ul>
<li><i><font color="#ff0000">Players who become ethereal do not lose
properties they already have.  In particular, a stunned player
who becomes ethereal remains stunned until the stun wears off.</font></i></li>
</ul>
</dd>

<dt>
Concealment</dt>

<dd>
Most items must be worn or carried openly. The only exceptions are items
tagged "concealable". A concealed item must be brought out into the
open to be used. A captured player must give up a concealed item if asked, but
only if the asker really knows the player has it.

<ul>
<li><i>That is, you cannot just tell your captive or prisoner "give me all your
concealed items".  Or rather, you can, but it won't necessarily work.</i></li>
<li><i>In particular, flags and armbands may not be concealed.</i></li>
<li><i>Dispelling an item does not alter its concealability.</i></li>
</ul></dd>

<dt>
Seeing</dt>

<dd>
Some glyphs affect you when you see them, if you are close enough.

<ul>
<li>
<i>Take this literally: if it crosses your vision, and you are within the
range, it affects you. No ducking back and saying "whoops!" Contrariwise,
if your eyes are closed or your head is averted, so that it doesn't hit
your retina, it doesn't affect you.</i></dd>
</li>
</ul>

<dt>
Jailbreaks</dt>
<dd>
Every fifteen minutes, all prisoners are released from their respective jails.
See the Base Rules.
</dd>
</dl>

<h2>
The Stuff</h2>

<h3>Glyphs</h3>
<dl>
<dt>
Glyph of Jail <b>(labeled with the mystical phrase "Jail")</b></dt>

<dd>
This is the jail; see the base rules for its definition.  It may be
moved only if there are no prisoners in jail, and cannot be dispelled.</dd>

<dt>
Glyph of Charging <b>("Still Going")</b></dt>

<dd>
Any magic item touched to this regains full charge. Unlike other glyphs,
the Glyph of Charging may be used by anyone.  It is still true that
only the owning team may move it.</dd>

<dt>
Glyph of Entrancement <b>("Gotcha")</b></dt>

<dd>
If you see an enemy Glyph of Entrancement,
and you are within ten feet of it, you are stunned. The stun lasts
five minutes.  Dispelling a Glyph of
Entrancement wakes up everyone stunned by it.</dd>

<dt>
Glyph of the Disgusting Doorknob <b>("Yukko")</b></dt>

<dd>
If an enemy Glyph of the Disgusting Doorknob
is on the side of a door facing you, you may not open the door or prevent
it from closing. If the Glyph is mounted next to
buttons controlling an elevator, you may not push any of the buttons
or prevent the doors from closing.  If the Glyph is mounted on
one of a set of doors, you may not open any of the doors in the set or
prevent them from closing.
<ul>
<li><i>This means that double doors, or a building entrance consisting of
several adjacent doors, can be blocked with a single Disgusting Doorknob.</i></li>
<li><i>You do not have to see the Glyph in order for it to be effective.  Closing
your eyes does not enable you to go through the door.</i></li>
</ul>
</dd>

<dt>
Glyph of the Net <b>("Thanks")</b></dt>

<dd>
If you see an enemy Glyph of the Net, and
you are within ten feet of it, you must place one magic item on the floor
next to it. If you have no items, nothing happens, and you <font color="#ff0000">cannot</font> leave a
flag even if you have no other items. The Glyph can only affect you once
every five minutes. You may not pick up magic items sitting next to an
enemy Glyph of the Net.
</dd>

<dt>
Glyph of Alarm <b>("Alarm")</b></dt>

<dd>
If you see an enemy Glyph of Alarm, and you are within ten feet of it, you
must shout "Alarm", "Warning", or "AHH!" (or something like that) as loud as
you can for five minutes or until you are captured or return to neutral space.
<ul>
<li><i>Singing "Yankee Doodle" (or "I'm a Little Teapot") at the top of
your lungs is also sufficient.
</i></li>
</ul>
</dd>

</dl>
<h3>Potions</h3>
<dl>

<dt>
Potion of Lubrication <b>(brown; one charge; concealable)</b></dt>

<dd>
A prisoner who has this item may use it by bonking himself on the
head with it. He may then "slip out" of jail -- just walk away -- as long
as this does not break the chain of captivity for any other prisoners.

<ul>
<li>
<i>Note that using this item does NOT give you safe passage out.</i></li>
</ul></dd>

<dt>
Potion of Truth <b>(blue; one charge)</b></dt>

<dd>
A person may use this on another player by bonking him over the head
with it. He may then ask six yes/no questions. The victim may lie no
more than once. The victim may say "I don't know" if he really doesn't
know (he may not lie about that), but then that question doesn't count
against the six. This potion is recharged, not by a Glyph of Charging,
but by a jailbreak.  The Potion continues to
affect the victim until it is recharged or all six questions are exhausted.

<ul>
<li>
<i>The questioner may ask the same question more than once.</i></li>
<li>
<i>The questioner may ask questions unrelated
to the game, if he so chooses.  In this case, the victim may refuse
to answer the question, but then it won't count against the six.</i></li>
<li><i>The victim need not hang around waiting to be asked
questions, but must make a reasonable attempt to answer each question
he hears.</i></li>
</ul></dd>

<dt>
Potion of Jolt <b>(green; one charge; concealable)</b></dt>

<dd>
A stunned player who is bonked with this is awakened.

<ul>
<li>
<i>You may use this on yourself.</i></li>
</ul></dd>

<dt>
Light Grenade <b>(red)</b></dt>

<dd>
If you pick up this potion or voluntarily accept it from someone, you are
stunned for five minutes. It has no effect if it is thrown at you (as long
as you don't catch it). This item may safely be picked up during the
initial "set-up" period.

<ul>
<li><i>The Light Grenade only goes off when it is picked up.  If it doesn't
go off when you pick it up (during the set-up period or because it has been
dispelled), you can safely carry it around.</i></li>
<li><i>You can safely move the Light Grenade by kicking it around.</i></li>
<li><i><font color="#ff0000">Giving a Light Grenade to someone is not
"using" a Light Grenade.  This means that the Light Grenade still works
if you give it away while ethereal or captive.</font></i></li>
</ul></dd>

</dl>
<h3>Wands</h3>
<dl>

<dt>Long Wand of the Law <b>(blue; keyword "gotcha!")</b></dt>
<dd>
If the bearer whaps a person or object with this, he is considered
to have touched him or it, and they continue to touch while the Wand is
in contact.

<ul>
<li>
<i>This counts for all forms of touching in the rules, including capturing,
staying in contact with jail, and freeing teammates.</i></li>

<li>
<i>It is convenient to not require the keyword when whapping an object
or teammate. On the other hand, it's clearer if you use the keyword.</i></li>
</ul></dd>

<dt>
Wand of Stun <b>(green; "stun!"; one charge)</b></dt>

<dd>
Anyone whapped by this is stunned for one minute.  Both ends of the Wand
must touch the ground before it may be used again.

<ul>
<li><i>In other words, for the Wand to be recharged,
it must have touched a Glyph of Charging <u>and</u> both ends must have touched
the ground.</i></li>
</ul></dd>

<dt>
Wand of Vengeance <b>(red; "toast!")</b></dt>

<dd>If the bearer whaps an enemy with this, in the
<i>whappee's</i> home territory, the whappee is captured. The
wielder must lead his captive back to his jail as directly as possible, and both
he and his captive are ethereal until they enter the wielder's home territory.
When this item is used, the whapper must immediately drop it in the whappee's
home territory. <u>You may not move or pick up this item if it is in
enemy territory</u>; you may only do so in your own or neutral space.

<ul>
<li>
<i>Remember, this only works in the victim's territory; it has no effect
in the bearer's territory or neutral space.</i></li>
<li>
<i>If the victim has a captive, the captive is freed.</i></li>
<li>
<i><font color="#ff0000">Since the bearer becomes ethereal immediately
after using the Wand and cannot use two wands at the same moment, it is not
possible to capture two enemies at once using two Wands of Vengeance and a
Belt of Twofer.</font></i></li>
</ul></dd>

<dt>
Wand of Dispel <b>(brown; "dispel!"; one charge; concealable)</b></dt>

<dd>
Whapping a magic item dispels its magic for one minute. Whapping a person
dispels the magic of all the items he is carrying for one minute.  See
"dispelling" in the Definitions section, above.

<ul>
<li>
<i>Note that whapping is distinct from touching. You can recharge a Wand
of Dispel at a Glyph of Charging, or nullify the Glyph, depending
on whether you use the keyword.</i></li>

<li>
<i>If two Wands of Dispel whap each other, both are dispelled.</i></li>
</ul></dd>

</dl>
<h3>Belts</h3>
<dl>

<dt>
Belt of Twofer <b>(red)</b></dt>

<dd>
The wearer may capture two enemy players at a time. <font color="#ff0000">At any
time after capturing the first, the wearer may attempt to capture another.</font>
The first must sit down and wait; <font color="#ff0000">if</font> the wearer
captures a second, he must go straight back to the first, and then lead them
both to jail.  <font color="#ff0000">The wearer may make multiple attempts
to capture a second player, but cannot spend more than a total of 60
seconds doing so; after his time is up, he must lead his first captive to jail.</font>

<ul>
<li><i>Note that the first captive is captured, not stunned.</i></li>
<li><i>If the Belt is dispelled, the second captive (if any) is freed.</i></li>
</ul>
</dd>

<dt>Goombah's Belt of Humiliating Protection <b>(green)</b></dt>
<dd>The wearer is totally immune to capture and stunning,
as long as he is skipping and loudly singing
"Yankee Doodle". <font color="#ff0000">Any number of teammates may
share this protection by holding hands with the wearer, either directly
or through a chain of other teammates, so long as they are all skipping and
singing along, and so long as none of them is protected by a different belt.</font>
This item is not effective in elevators, for reasons that are probably obvious.
<ul>
<li>
<i>This may look overpowered, but consider that an enemy can pretty much
follow you around until you leave his territory, and you have to keep using
the magic the whole way.  And you can't sneak up on anyone.</i></li>
<li>
<i>Once captured or stunned, you cannot use Goombah's Belt to get free / wake
up. This means that it will protect you from the Glyph of Entrancement, but
only if you're using the Belt when you first see the Glyph (and continue to
use it as long as you see it and are in range.)</i></li>
<li>
<i>Note that Goombah's Belt does not protect against a Glyph of the Net.
It <u>does</u> protect against the Wand of Vengeance.</i></li>
<li><i>The Belt <u>is</u> affected by the Wand of Dispel, if the wearer is hit. If a
group is using the Belt, and any of them are hit, the Belt fails for the
whole group. This holds even if there are two Goombah's Belts in the group
(e.g. if the defending team has captured another team's Belt). Both
Belts are dispelled, and cannot be used by the attacking team for one
minute.  The same rules apply for a flag: if any member
of the group acquires one, the Belt(s) fail for the whole group.</i></li>
</ul>
</dd>

<dt>
Belt of Chastity <b>(blue)</b></dt>

<dd>
When active, the Belt of Chastity makes the wearer
immune to capture by members of the opposite sex, but also prevents them
from having members of the opposite sex as captives.  The Belt of Chastity is only
active when the wearer is singing "I'm a Little Teapot."

<ul>
<li><i>
The Belt of Chastity <u>only</u> protects against capture, including by
the Wand of Vengeance.  It does not protect against stunning or against
a Glyph of the Net, and can be dispelled by a Wand of Dispel.</i></li>

<li><i>
Unlike Goombah's Belt of Humiliating Protection, the Belt of Chastity does not
require that the wearer sing at the top of their lungs to be effective.  A
normal singing volume is sufficient.</i></li>

<li><i>
If the wearer begins singing while holding a member of the opposite sex
captive, the captive is freed.</i></li>

<li><i>
<font color="#ff0000">The wearer may be part of a Goombah chain as
long as the Belt of Chastity is not active.  If the wearer is whapped with the
Wand of Dispel, Goombah's Belt(s) and the Belt of Chastity both fail.
If a different player in the chain is whapped with the Wand, Goombah's
Belt(s) fail but the Belt of Chastity does not.</font></i></li>
</ul></dd>

<dt>
Belt of Your Ninja Forces are Doomed to Obscurity <b>(brown)</b></dt>
<dd>
When the wearer of the Belt
of Your Ninja Forces are Doomed to Obscurity is captured, the Belt serves
as a captive in his stead.  The captor must then escort the
Belt to his jail, while the wearer remains free.  The Belt reverts from
a captive to a magic item when it touches the Glyph of Jail (and ownership
transfers to the capturing team). <font color="#ff0000">If the captor is
stunned or captured on the way to his jail, he must drop the Belt (which immediately
reverts to a magic item) and cannot pick it up again for one minute.</font>  If the
wearer is captured by someone with a Belt of Twofer, the captor gets
two captives (the wearer and the Belt) and any previous captive is
immediately freed. The Belt's magic does <i>not</i> work against
a Wand of Vengeance or a Long Wand of the Law. <font color="#ff0000">The
Belt is <i>not</i> dispelled by flags.</font>
<ul>
<li>
<i>The belt does not provide immunity from capture, only a surrogate
captive.  After handing the belt to a would-be captor, the wearer
can be immediately captured by a different enemy.  Thus it's a good
idea not to be caught by two enemy players at once.</i>
</li>
<li>
<i>The captors of the Belt of Your Ninja Forces
are Doomed to Obscurity may bonk it with the Potion of Truth if they
so choose, so long as the belt is a captive and not a magic item.
In this case, all of its answers are deemed to be "I don't know".
</i>
</li>
<li>
<i>If an enemy captures the wearer while the
wearer is stunned, the belt will still serve as a surrogate captive.
The wearer must surrender it to his captor but does not become
unstunned.
</i>
</li>
</ul>
</dd>
</dl>

<h2>
Organization and play</h2>

<p>(Note: This space used to contain general
notes on running a game of Capture the Flag with Stuff.  However,
most of you are probably most interested in how we play the game
at CMU, so we've moved these notes to
<?php
if (!$view_print)
{
?><a href="recipe.php">their own page</a>
<?php
} else {
?>
<a href="recipe.php?p=1">their own page</a>
<?php
}
?>
for those of you who want to run your own game.)

<p>At CMU we play in Doherty and Wean halls.  Doherty is smaller and more
complicated; Wean is just big.  Teams swap buildings after each game.
Neutral territory includes the Great Outdoors, the space between
the two buildings (including the elevator between Doherty and Wean),
and the bridge to Newell-Simon. Where there are double sets of doors (as with the
front entrances of both buildings), the space between them is considered
part of the building (i.e., <i>not</i> neutral space).  However,
for the players' sanity, restrooms are neutral space.  <font color="#ff0000">
Forbidden territory varies from semester to semester, depending on building
construction and the like; at a minimum, it includes labs, clusters, the Doherty
machine shop, and the Engineering and Science Library.</font>

<p>Before play, we meet in Wean 7500 to go over rules and divide up teams.
We do not keep that room after the start of the first game,
so you must bring your belongings to the judges' room after the rules
presentation.  Thus, the fewer belongings you bring, the less hauling
you'll need to do while the game timer is running.

<p>Each team will receive at least one of each type of glyph, wand,
belt, and potion.  Items that are more valuable, such as Goombah's
Belt of Humiliating Protection and the Belt of Chastity, will be
distributed one to a team.  Less valuable items such as the Long
Wand of the Law and the Potion of Lubrication will have multiple
copies per team. Each team will also receive some number of flags.

<p>All this nonsense obviously takes a lot of familiarity with the rules.
It takes even more tolerance to play "at speed". Pay attention
to people; see what magic items they're carrying so you won't be surprised
if they seem to violate the rules.  Cheat sheets will be distributed
before the game.

<p>If it impossible for you to know something, don't worry about it. For
example, the Potion of Truth may only be used once per jailbreak; but if
you come across one and don't know if it's been used recently, assume it
hasn't. Make every reasonable effort to tell people about time limits and
countdowns.  It helps to wear a watch.

<p>After each game, players should return to Doherty 2315.  The final
score will be announced, the judges will make any announcements, and teams
will be rebalanced for the next game.  There will also be time for players
to ask questions.  <b><u>If you know the location of any Stuff, you should
go collect it before returning to 2315.</u></b>  We can't start the next game
until all the Stuff has been returned, which invariably leads to a lot of sitting
around while people go find it.

<p>The judges' room is Wean 8427, right on the boundary between Doherty
and Wean.  A neutral corridor is marked on the floor in masking tape, allowing
Doherty team members to safely reach the judges' room.  If you come late or
leave early, report to 8427 to receive or relinquish your armband.  If
you capture a flag, you'll want to bring it here too.  There will also be
judges wandering through both buildings; they can answer questions
but cannot accept flags.

<p>We generally have time for three games in a night and finish around midnight or 1 AM.

<h2>Sportsmanship</h2>
<p>The point of the game is to have fun.  Strategy,
cleverness, and... um... close readings of the rules are encouraged.  Excessive
competitiveness is strongly discouraged.  There are some interesting
strategies that are made possible by cooperative effort, but players shouldn't
necessarily feel that they have to go along with a large group.  Solo,
independent exploration is a viable tactic.
<p>Players should exhibit good sportsmanship.  Physically impeding
or blocking other players (e.g., maintaining physical contact with an opposing Goombah
chain or preventing them from passing, or placing obstacles in players' paths) is
a major offense and may cause the Wrath of the Judges to come down upon you. In addition,
while deceit is an integral part of the game, you may not conceal, obfuscate,
or lie about:
<ul>
<li>Whether you're in the game
<li>Your team membership
<li>Whether the game has started or ended
<li>What non-concealable items you have
<li>The charge and dispel status of wands or potions (knowingly)
<li>Whether a player has been stunned, captured, imprisoned, or tagged
</ul>
You also may not fabricate or replicate game items or interfere with
official timekeeping.
<p>This game only works if people actually follow the rules.  Some of this stuff
is very hard to enforce, and the judges have a hard enough time dealing with
legitimate questions of interpretation (and misunderstandings) without
being your mother.  Do everyone a favor: respect the judges and don't cheat.
<p><font color="#ff0000">Notwithstanding the foregoing, judges must sometimes
make rulings outside the strict scope of these
rules (for example, if the rules do not cover a particular situation, or if
a player violates the principles of sportsmanship in sufficiently
creative ways).  For this reason, <b><i><u>judges have the authority to make and enforce any
ruling related to gameplay, including the authority to eject
players from the game</u></i></b>.</font>

<h2>
Credits</h2>

<ul>
<li>
Designed and written by <a href=http://www.eblong.com/zarf/home.html>Andrew Plotkin</a>
(erkyrath@eblong.com)</li>

<li>
Primary inspiration from <i>The Rules of Moopsball,</i> Gary Cohn.</li>

<li>
Wand of Vengeance inspired by Farslayer in Fred Saberhagan's <i>Books of
Swords.</i></li>

<li>
Light Grenade inspired by <i>Mom and Dad Save the World.</i></li>

<li>
Belt of Humiliating Protection inspired by the thought of otherwise rational
adults bouncing down a hallway singing at the top of their lungs.</li>

<li>
Belt of Chastity conceived by David Kitchin (dkitchin@andrew.cmu.edu).  Music
selection for Belt of Chastity courtesy of Alisa Grishman (alisag@andrew.cmu.edu).
</li>

<li>
Belt of Your Ninja Forces are Doomed to Obscurity conceived by David Kitchin (dkitchin@andrew.cmu.edu).
</li>

<li>
Multiple-flag point system developed by committee (blame
exec@cmukgb.org).
</li>

</ul>
<?php

if ($view_print)
	template_pagebottom_diet();
else
	template_pagebottom();

?>
