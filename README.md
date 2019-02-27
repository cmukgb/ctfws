# Capture the Flag with Stuff

A somewhat psychotic variation on a classic game.

* **Presented by the [Carnegie Mellon University KGB](http://www.cmukgb.org)**
* CMU KGB rules at [rules.cmukgb.org](http://rules.cmukgb.org)
* History at [ctfws.org](http://www.ctfws.org)

## Debian package requirements

```
sudo apt-get update
sudo apt-get install imagemagick texlive-latex-base texlive-latex-recommended texlive-fonts-recommended
```

## Generating the rules

1. You probably want to start by changing a couple header-stuffs for the current semester:

    * In `rules/generate.rb`, update the semester referenced in the `$semester` global variable.
    * In `rules/history.html`, right at the top, update the semester and the link to that semester's Facebook event.

2. After that, hopefully, you should just have to run `make`.  Hopefully.
