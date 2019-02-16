DATE=$(shell date +%Y-%m)

all: full.php useful.php history.html handbook.html
	mkdir -p archive
	mkdir -p archive/${DATE}
	cp rules/full.txt archive/${DATE}/full.txt
	cp full.php archive/${DATE}/full.php
	cp useful.php archive/${DATE}/useful.php
	cp history.html archive/${DATE}/history.html
	cp handbook.pdf archive/${DATE}/handbook.pdf
	cp presentation.pdf archive/${DATE}/presentation.pdf

full.php: rules/full.txt rules/generate.rb
	# Also generates the PDF handbook
	cd rules && ruby generate.rb
	cp rules/full.php .
	cp rules/handbook.pdf .

useful.php: rules/useful.txt
	cp rules/useful.txt useful.php

history.html: rules/history.html
	cp rules/history.html history.html

handbook.html: rules/generate.rb rules/full.txt
handbook.html: $(patsubst %.svg,%.png.b64,$(wildcard rules/texfiles/*.svg))
handbook.html:
	cd rules && ruby generate.rb -T $@
	cp rules/handbook.html .

rules/texfiles/%.png : rules/texfiles/%.svg
	convert -density 1200 $< $@
%.b64 : %
	base64 -w 0 < $< > $@
