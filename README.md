# Capture the Flag with Stuff

A somewhat psychotic variation on a classic game.

* **Presented by the [Carnegie Mellon University KGB](http://www.cmukgb.org)**
* CMU KGB rules at [rules.cmukgb.org](http://rules.cmukgb.org)
* History at [ctfws.org](http://www.ctfws.org)

## Generating the rules

1. You probably want to start by changing a couple header-stuffs for the current semester:

    * In `rules/generate.rb`, search for "These are the official rules for", and update the semester in that sentence, e.g.:
        ```
        <h3>These are the official rules for the Fall 2017 game of Capture the Flag with Stuff.</h3>
        ```
    * In `rules/history.html`, right at the top, update the semester and the link to that semester's Facebook event.

2. After that, hopefully, you should just have to run `make`.  Hopefully.
