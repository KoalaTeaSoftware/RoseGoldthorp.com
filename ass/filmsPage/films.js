// JavaScript Document
// to be pulled into the files page
"use strict";

function populateFilmListPage() {
    //alert("populaating the page");

    var defaultLocation = "on-release";

    // where does the url say we are?
    var weAreHere = window.location.href;
    var regex = /films\/([a-z0-9\-]*)$/gi;
    var whatToShow = regex.exec(weAreHere);

    // if the url is not that nice, then have us go to the default location
    if (whatToShow === null) {
        whatToShow = ["", defaultLocation];
    }

    //alert("setting the id to " + whatToShow[1]);
    // set up this so that we can us it in the data-getting game
    $("body").attr("id", whatToShow[1]);

    // make the menu bar look nice
    setNavHighlight();

    var whatToShow = $("body").attr("id");
    var dataRoot;

    switch (whatToShow) {
        case "present-films":
            dataRoot = allFilms.presentFilms;
            break;
        case "planned-films":
            dataRoot = allFilms.plannedFilms;
            break;
        default:
            // default to on-release
            dataRoot = allFilms.onRelease;
    }

    //alert("Going to use this data on the page: \n" + JSON.stringify(dataRoot));
    $("#title").text(dataRoot.title);

    var filmListObject = {
        "filmArray": dataRoot.list
    };

    //alert("\nGoing to use this list of film on the page: \n" + JSON.stringify(filmListObject));

    //console.log("Selected element contains: \n" + $(".card" ).html() + "---\n");
    w3.displayObject("listOfFilms", filmListObject);

    //guSetPageTitle(dataRoot.title);
    //fsShowTitle("title", dataRoot.title);
    //fsShowListContent("details", dataRoot);
}
