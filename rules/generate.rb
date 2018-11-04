#!/usr/bin/ruby
# -*- coding: utf-8 -*-

# Not a whole lot to say; the HTML generation is kind of icky, but works pretty well.
# Usage is hopefully described well enough under usage.
#
# The input format is described in the input file.
#
# Questions/comments can be sent to Evan Danaher, at ctfws@edanaher.net

$hfudge = "0.765625in"
$vfudge = "0in"
$infiledefault = "full.txt"
$htmlfile = "full.php"
$pdffile = "handbook.pdf"
$plainhtmlfile = nil

def usage
   puts "Usage: #$0 [-H hoffset] [-V voffset] [-w out.html] [-p out.pdf] [infile]"
   puts "  -H     horizontal offset for pages, in TeX units (e.g., 0.1in, 3pt)"
   puts "  -V     vertical offset for pages, in TeX units (e.g., 0.1in, 3pt)"
   puts "  -w     output file for web/html [default: #$htmlfile]"
   puts "  -T     output file for html (no PHP) [no default]"
   puts "  -p     output file for pdf [default: #$pdffile]"
   puts "  infile input file [default: #$infiledefault]"
   exit
end

def getargs
   state = 0
   ARGV.each {|a|
      case state
      when 0
         case a
         when "-h"
            usage()
         when "--help"
            usage()
         when "-H"
            state = 1
         when "-V"
            state = 2
         when "-w"
            state = 3
         when "-p"
            state = 4
         when "-T"
            state = 5
         else
            if $infile != nil || a[0] == ?-
               puts "Error: multiple input files: `#$infile', `#{a}'"
               usage()
            end
            $infile = a
         end
      when 1
         $hfudge = a
         state = 0
      when 2
         $vfudge = a
         state = 0
      when 3
         $htmlfile = a
         state = 0;
      when 4
         $texfile = a
         state = 0;
      when 5
         $plainhtmlfile = a
         state = 0;
      end

   }
   $infile = $infiledefault if !$infile
end

# The file is stored as a list of sections; each section is a list [title,
# magic, subsection, subsection, ...], each subsection is a list [title, magic,
# [0, rule], [1, subrule] ...], where magic is the number of the section, or
# nil if the default should be used.

def show_array(arr)
   if arr.class == Array then
      inner = arr.collect {|x| show_array(x) + ", "}.inject("") {|x, y| x.to_s+y.to_s}
      inner = inner[0, inner.length - 2] if inner.length > 2
      "[" + inner + "]"
   else
      arr.to_s
   end
end

def read_file(f)
   lines = File.readlines(f)
   file = []

   lineacc = []
   sectacc = []
   subsectacc = []

   sectionc = nil
   subsectionc = nil
   supsectionc = nil

   lines.each { |l|
      l.sub!(/%.*$/, '')
      case l
         when /^\s*$/
         when /^@/
            subsectacc += [lineacc] if lineacc != []
            sectacc += [subsectacc] if subsectacc != []
            file += [sectacc] if sectacc != []

            sectacc = [l.strip, sectionc]
            sectionc = nil
            subsectacc = []
            lineacc = ""
         when /^![^!]/
            subsectacc += [lineacc] if lineacc != []
            sectacc += [subsectacc] if subsectacc != []
            file += [sectacc] if sectacc != []

            sectacc = [l[1,l.length].strip, sectionc]
            sectionc = nil
            subsectacc = []
            lineacc = ""

         when /^!![^!]/
            subsectacc += [lineacc] if lineacc != ""
            sectacc += [subsectacc] if subsectacc != []

            subsectacc = [l[2,l.length].strip, subsectionc]
            subsectionc = nil
            lineacc = ""
         when /^\*[^\*]/
            subsectacc += [lineacc] if lineacc != ""

            lineacc = [0, l[1,l.length].lstrip]
         when /^\*\*/
            subsectacc += [lineacc] if lineacc != ""

            lineacc = [1, l[2,l.length].lstrip]
         when /^:\*[^\*]/
            subsectacc += [lineacc] if lineacc != ""

            lineacc = [2, l[2,l.length].lstrip]
         when /^:\*\*/
            subsectacc += [lineacc] if lineacc != ""

            lineacc = [3, l[3,l.length].lstrip]
         when /^\\/
            case l.chomp
               when /^\\section = (.*)$/
                  sectionc = $1.to_i
               when /^\\subsection = (.*)$/
                  subsectionc = $1.to_i
            end
         else
            puts(l)
            lineacc[1] += l
      end
   }

   subsectacc += [lineacc] if lineacc != ""
   sectacc += [subsectacc] if subsectacc != []
   file += [sectacc]
   return file
end

def roman(n)
   if n == 0 then return "0"
   elsif n < 4 then return "I" * n
   elsif n == 4 then return "IV"
   elsif n < 9 then return "V" + ("I" * (n - 5))
   else return "ROMAN(" + n + ")"
   end
end

def letter(n)
   return "@ABCDEFGHIJKLMNOP"[n,1]
end

def number(n)
   return n.to_s
end

def letterl(n)
   return " abcdefghijklmnop"[n,1]
end

def check_label(line, labels, s, ss = nil, r = nil, sr = nil)
   if line =~ /^(.*[^\[]|)\[([a-zA-Z0-9_-]*)\]([^\]].*)$/m then
      labels[$2] = roman(s)
      labels[$2] += "." + letter(ss) if ss
      labels[$2] += "." + number(r) if r
      labels[$2] += "." + letterl(sr) if sr
      return "#$1#$3"
   end
   return line
end

def write_html(file, sections, plain)
   labels = {}
   lines = []
   sectionc = 0
   sections.each { |s|
      subsectionc = 0
      sectionc = s[1] if s[1]
      sectionc += 1
      s[0] = check_label(s[0], labels, sectionc)
      if s[0][0] == ?@ then
         lines += ["", "<h2 style=\"font-size: 16pt;\"> 0. " + s[0][1,s[0].length].strip + " </h2>"]
      else
         lines += ["", "<h2> " + roman(sectionc) + ". " + s[0] + " </h2>"]
      end
      s[2, s.length].each { |ss|
         subsectionc = ss[1] if ss[1]
         subsectionc += 1
         rulec = 0
         subrulec = 0
         ss[0] = check_label(ss[0], labels, sectionc, subsectionc)
         lines += ["", "<h3> " + roman(sectionc) + "." + letter(subsectionc) + ". " + ss[0] + " </h3>"]
         ss[2, ss.length].each {|n, r|
            highstart = n & 2 == 0 ? "" : '<span class="change">'
            highend = n & 2 == 0 ? "" : '</span>'
            if n & 1 == 0 then
               rulec += 1
               subrulec = 0
               r = check_label(r, labels, sectionc, subsectionc, rulec)
               lines += ["<p> " + highstart + roman(sectionc) + "." + letter(subsectionc) + "." + number(rulec) + ". " + r.chomp + highend + " </p>"]
            else
               subrulec += 1
               r = check_label(r, labels, sectionc, subsectionc, rulec, subrulec)
               lines += ["<p class=\"subrulec1\"> " + highstart + roman(sectionc) + "." + letter(subsectionc) + "." + number(rulec) + "." + letterl(subrulec) + ". " + r.chomp + highend + " </p>"]
            end

         }
      }
   }
   puts "========"
   puts lines
   if file then
      File.open(file, "w") { |f|
         if plain then
          f.puts(PLAINHTML_HEADER)
         else
          f.puts(PHP_HEADER)
         end
         lines.each {|l| f.puts(l.gsub(/\(:/, '<span class="change">').
                                  gsub(/:\)/, '</span>').
                                  gsub(/\[\[([a-zA-Z0-9_-]*)\]\]/) { labels[$1] }.
                                  gsub(/\{([^}]*)\}/) { "<a name=\"" + $1 + "\"/>" } ) }
         if plain then
          f.puts(PLAINHTML_FOOTER)
         else
          f.puts(PHP_FOOTER)
         end
      }
   end
end

def write_tex(file, fin)
   lines = File.readlines(fin)
   out = lines.collect {|l|
      l.gsub!(/\(:/, '')
      l.gsub!(/:\)/, '')
      l.sub!(/^!\s*([^!].*?)\s*$/, '\section{\1}')
      l.sub!(/^!!\s*(.*?)\s*$/, '\subsection{\1}')
      l.sub!(/^:?\*\s*([^*])/, '\rule \1')
      l.sub!(/^:?\*\*\s*/, '\subrule ')
      l.sub!(/^\\([a-z]*)\s*=\s*(.*?)\s*$/, '\setcounter{\1}{\2}')
      l.sub!(/^@\s*(.*?)\s*$/, '\def\thesection {\arabic{section}} \setcounter{section}{-1} \section{\1}')
      l.gsub!(/\[\[([a-zA-Z0-9_-]*)\]\]/, '\ref{\1}')
      l.sub!(/^(.*)\[([a-zA-Z0-9_-]*)\](.*)$/, '\1\3 \label{\2}')
      l.sub!(/section\{\{([^}]*)\}\s*/, 'section[\\tabimagewrapper{\1}]{')
   }
   if file then
      File.open(file, "w") { |f|
         f.puts(TEX_HEADER)
         f.puts("\\def\\vfudge{#{$vfudge}}")
         f.puts("\\def\\hfudge{#{$hfudge}}")
         f.puts("\\def\\tfudge{0pt}")
         lines.each {|l| f.puts l}
         f.puts(TEX_FOOTER)
      }
   end
end

PHP_HEADER = <<EOH
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>


<meta http-equiv="Content-Type" content="text/html;charset=utf-8"><title>Capture the Flag with Stuff</title>

<link rel="stylesheet" type="text/css" href="basic.css">
<style type="text/css">

p
{
   text-indent: -2.5em;
   margin-top: 1pt;
   margin-bottom: 2pt;
   margin-left: 3.5em;
}
p.subrulec1
{
   margin-left: 7em;
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

span.change
{
   color: red;
}
</style></head><body>

<?php
require("../../includes/lib.php");
require("../../includes/template.php");
require("../../includes/template_diet.php");
require("../../includes/database.php");

$view_print = (isset($_GET['p']) ? ($_GET['p'] && true) : false);

$TEMPLATE_TOPIMAGE = array('url' => "/images/headings/cen_ctfws.gif", 'alt' => "Capture the Flag with Stuff");
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

<h3>These are the official rules for the Fall 2018 game of Capture the Flag with Stuff.</h3>
<br>
<?php
if (!$view_print)
{
?> <a href="full.php?p=1">Printable Version</a>
<?php
}
?>

</div>
EOH

PHP_FOOTER = <<EOH
<?

if ($view_print)
   template_pagebottom_diet();
else
   template_pagebottom();

?>


</body></html>
EOH

# Only used for testing; the PHP header is normally used.

HTML_HEADER = <<EOH
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>


<meta http-equiv="Content-Type" content="text/html;charset=utf-8"><title>Capture the Flag with Stuff</title>

<link rel="stylesheet" type="text/css" href="ctfws_formal_rules_files/basic.css">
<style type="text/css">

p
{
   text-indent: -2.5em;
   margin-top: 1pt;
   margin-bottom: 2pt;
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
</style></script></head><body>

<html>
	<head>
		<title>Capture the Flag with Stuff</title>
		<link rel="stylesheet" type="text/css" href="/styles/basic.css">	</head>
	<body bgcolor="#ffffff" text="#000000" link="#ff4000" alink="#ffde2a" vlink="#da3700" topmargin="0" leftmargin="0" bottommargin="0" rightmargin="0">
		<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td id="background_left" width="50%"></td>
				<td width="780" align="center" valign="top">
					<br>
					<table width="660" cellpadding="0" cellspacing="0" border="0" style="margin-bottom: 10px;">
						<tr>
							<td width="165" align="center">
								<a class="nav_header" href="/activities">Activities</a>
							</td>
							<td width="165" align="center">
								<a class="nav_header" href="/distractions">Distractions</a>
							</td>
							<td width="165" align="center">
								<a class="nav_header" href="/people">People</a>
							</td>
							<td width="165" align="center">
								<a class="nav_header" href="/propaganda">Propaganda</a>
							</td>
						</tr>
					</table>
					<a href="/"><img id="header_banner" src="/images/nabners/booth03_0.jpg" width="780" height="140" border="0" alt="Carnegie Mellon KGB" style="margin-bottom: 10px;"></a><br>
					<table width="660" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td>
<div align="center">
	<img class="heading" src="/images/headings/cen_ctfws.gif" height="30" alt="Capture the Flag with Stuff">
</div>
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
	<i>Revised 3/10/2003, 11/7/2003, 3/25/2004, 11/19/2004, 3/24/05, 3/30/06
		by Benjamin "Hey You" Gilbert</i>
	<br>
	<i>Revised 3/2008 by edanaher, csjackso, ddagradi, cmartens, jgg, csawyer, ehohenst, mglisson...</i>
	<br>
	<i>Revised 8/10/2008, <font color="#ff0000">2/8/2009</font> by edanaher</i>
	<br>
	<i>Classic rules may be found <a href="ctfws_old.php">here</a></i></center>

	<br>
	<br>
<h3>These are the official rules for the Spring 2008 game of Capture the Flag with Stuff.</h3>
	<br>
	<a href="ctfws_rules_full.php?p=1">Printable Version</a>

</div>
EOH

# Only used for testing; the PHP footer is normally used.
HTML_FOOTER = <<EOH

								<br>
								<hr size="2" color="#000000">
								<div class="small">
									<p>
										Current top banner: Booth 2003 exterior. (credit: Benjamin Gilbert)										Reload for a new one.
									</p>
									<p>
										Copyright &copy; <a href="mailto:exec@cmukgb.org">The Carnegie Mellon KGB</a>.<br>
										Top banner and other media copyright &copy; their respective owners.<br>
									</p>
								</div>
								<br>
								<br>
							</td>
						</tr>
					</table>
				</td>
				<td id="background_right" width="50%"></td>
			</tr>
		</table>
	</body>
</html>
EOH

PLAINHTML_HEADER = <<EOH
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>


<meta http-equiv="Content-Type" content="text/html;charset=utf-8"><title>Capture the Flag with Stuff</title>

<style type="text/css">

p
{
   text-indent: -2.5em;
   margin-top: 1pt;
   margin-bottom: 2pt;
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
</style></script></head><body>

<html>
	<head>
		<title>Capture the Flag with Stuff</title>
	</head>
	<body bgcolor="#ffffff" text="#000000" link="#ff4000" alink="#ffde2a" vlink="#da3700" topmargin="0" leftmargin="0" bottommargin="0" rightmargin="0">
EOH

# Only used for testing; the PHP footer is normally used.
PLAINHTML_FOOTER = <<EOH

								<br>
								<hr size="2" color="#000000">
								<div class="small">
									<p>
										Copyright &copy; <a href="mailto:exec@cmukgb.org">The Carnegie Mellon KGB</a>.<br>
									</p>
								</div>
							</td>
						</tr>
					</table>
				</td>
				<td id="background_right" width="50%"></td>
			</tr>
		</table>
	</body>
</html>
EOH

TEX_HEADER = <<EOH
\\documentclass[12pt]{article}
\\usepackage{palatino}
\\usepackage{graphicx}

\\setlength{\\textheight}{6in}
\\setlength{\\textwidth}{4.45in}
\\usepackage[print]{booklet}
\\source{\\magstep0}{8.5in}{11in}
\\target{\\magstepminus1}{9.0in}{6.5in}
\\setlength{\\oddsidemargin}{1.5in}
\\setlength{\\evensidemargin}{1.5in}

\\def\\rulespace{0.64in}
\\def\\ruleshift{0.60in}
\\def\\ruleshiftright{0.10in}

\\tolerance=5000

\\newcounter{indented}
\\newcounter{rulecount}[subsection]
\\def\\therulecount{\\thesubsection.\\arabic{rulecount}}
\\def\\rule{\\refstepcounter{rulecount}
          \\setcounter{subrulecount}{0}
              \\filbreak
              \\vskip 3pt plus 10pt
             \\ifnum\\value{indented}=0
                 \\advance \\leftskip by \\rulespace
                 \\advance \\rightskip by \\ruleshiftright
              \\fi
              \\value{indented} = 1
              \\noindent \\rlap{\\hspace{-\\ruleshift}\\therulecount}}
\\newcounter{subrulecount}[rulecount]
\\def\\thesubrulecount{\\therulecount.\\alph{subrulecount}}
\\def\\subrule{\\refstepcounter{subrulecount}
              \\filbreak
              \\vskip 3pt plus 10pt
              \\noindent \\rlap{\\hspace{-\\ruleshift}\\thesubrulecount}}


\\let\\sectionreal = \\section
\\def\\section#1{\\ifnum\\value{indented}=1
                  \\advance \\leftskip by -\\rulespace
                  \\advance \\rightskip by -\\ruleshiftright
                  \\value{indented}=0
               \\fi \\penalty-1500 \\sectionreal{#1}}
\\let\\subsectionreal = \\subsection
\\renewcommand{\\subsection}[2][*]{\\ifnum\\value{indented}=1
                     \\advance \\leftskip by -\\rulespace
                     \\advance \\rightskip by -\\ruleshiftright
                     \\value{indented}=0
                  \\fi \\penalty-800 \\subsectionreal{#2}
                     \\if*#1 \\else
                     \\labeltab{#1}
                     \\fi}

\\def\\thesection {\\Roman{section}}
\\newenvironment{segment}
               {\\begin{tabular}{p{0.45in}p{3.70in}}}
               {\\end{tabular} \\vfill}
\\renewcommand{\\arraystretch}{1.3}

\\def\\asciiAlph#1{\\ifnum0=\\value{#1}@\\else\\Alph{#1}\\fi}
\\def\\thesubsection {\\Roman{section}.\\asciiAlph{subsection}}

\\newdimen{\\tabspaceleft}
\\tabspaceleft 6in
\\def\\bufferedtabs{}
\\newcount\\tabsproduced
\\newcount\\tabsproduced
\\newcount\\tabsconsumed
\\def\\labeltab#1{
   \\advance\\tabsproduced by 1
   \\mark{\\the\\tabsproduced}
   \\let\\bufferedtabsold = \\bufferedtabs
   \\edef\\bufferedtabs{\\bufferedtabsold,\\the\\tabsproduced}
   \\expandafter\\newbox \\csname bufferedtab\\the\\tabsproduced \\endcsname
   \\setbox\\csname bufferedtab\\the\\tabsproduced \\endcsname\\vbox{#1}
}

\\def\\tabimagewrapper#1{\\resizebox{!}{20pt}{\\includegraphics{#1.eps}}}

\\begin{document}
EOH

TEX_FOOTER=<<EOH
\\end{document}
EOH

getargs()

rules = read_file($infile)

write_html($htmlfile, rules, false)
write_html($plainhtmlfile, rules, true)

write_tex("texfiles/rules.tex", $infile)
system "cd texfiles; make; cp rules.pdf ../#$pdffile; make clean"
