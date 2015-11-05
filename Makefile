DATE=$(shell date +%Y-%m)

all: full.php useful.php presentation.pdf
	mkdir -p archive
	mkdir -p archive/${DATE}
	cp rules/full.txt archive/${DATE}/full.txt
	cp full.php archive/${DATE}/full.php
	cp useful.php archive/${DATE}/useful.php
	cp handbook.pdf archive/${DATE}/handbook.pdf
	cp presentation/presentation.tex archive/${DATE}/presentation.tex
	cp presentation.pdf archive/${DATE}/presentation.pdf

full.php: rules/full.txt rules/generate.rb
	# Also generates the handbook
	cd rules && ruby generate.rb
	cp rules/full.php .
	cp rules/handbook.pdf .

useful.php: rules/useful.txt
	cp rules/useful.txt useful.php

presentation.pdf: presentation/presentation.tex
	cd presentation && pdflatex presentation.tex
	cp presentation/presentation.pdf .
