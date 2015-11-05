ASSN=rules

${ASSN}.pdf: ${ASSN}.ps
	ps2pdf ${ASSN}.ps

${ASSN}.ps: ${ASSN}.dvi
	dvips -t landscape ${ASSN}.dvi

${ASSN}.dvi: ${ASSN}.tex bkltprnt.sty
	latex ${ASSN}.tex
	latex ${ASSN}.tex
	latex ${ASSN}.tex

xdvi: ${ASSN}.dvi
#xdvi -s 6 -geometry 800x482+0-1  ${ASSN}.dvi > /dev/null 2>&1 &
	xdvi -geometry x1160+889+0  ${ASSN}.dvi > /dev/null 2>&1 &

clean:
	rm -f *.log *.aux *.log *.dvi *.ps *.pdf
