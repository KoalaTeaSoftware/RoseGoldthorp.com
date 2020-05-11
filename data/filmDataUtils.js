// JavaScript Document
"use strict";


// this hunts for the film object, given its name.
// Current structure is used when the film data is all in one JSON object. Its guts will change when data is stored in a database.
// It appears to return the null as a string
function getFilmByName(nameOfFilmToFind) {
    var encodedName = guEncodeFileName(nameOfFilmToFind);
    var patt = new RegExp(encodedName, "i");
    var stage = "";
    var film = null;
    var thisFilmName = "";
    var result = null;

    for (stage in allFilms) {
        for (film in allFilms[stage].list) {
            thisFilmName = guEncodeFileName(allFilms[stage].list[film].name);

            if (patt.test(thisFilmName)) {
                result = allFilms[stage].list[film];
            }
        } //end for all the films
    } // for all the stages

    return result;
}
