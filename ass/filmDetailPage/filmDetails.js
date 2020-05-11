// JavaScript Document
// to be pulled into the fileDetails page
"use strict";
$(document).ready(function () {
    var defaultLocation = "Silverville";

    // where does the url say we are?
    var weAreHere = window.location.href;
    var regex = /film\/([a-z0-9\-]*)$/gi;
    var whatToShow = regex.exec(weAreHere);

    // if the url is not that nice, then have us go to the default location
    if (whatToShow === null) {
        // actually, show an alert with an error message. Have a button that will take the person home
        // in the mean time, for testing purposes, show a default
        whatToShow = defaultLocation;
    } else {
        whatToShow = whatToShow[1];
    }

    // see if we can find this film
    //$.*.list[?(@.location=='A-Ghost-In-Corsets')]
    var path = "$.*.list[?(@.location=='" + whatToShow + "')]";
    console.log("Looking for: " + path);

    var filmDataArray = jsonPath(allFilms, path);
    var filmData = filmDataArray[0];

    if (filmData !== false) {
        populatePage(filmDataArray[0]);
    }
    //  ToDo: else - i.e. if the data can't be found, then show an alert, like the proper solution to the dodgy name decision above
});

function populatePage(filmData) {
    var otherHost = location.hostname;
    var otherHostDataPath = "/data/filmDetails/";
    var linksHtmlInsert = "";
    var descrHtmlInsert = "";

    console.log("selected the data:\n" + JSON.stringify(filmData));

    $("#body").attr("id", filmData.location);
    $("#title").html(filmData.filmTitle);
    $("#poster").attr("src", window.location.protocol + "//" + otherHost + otherHostDataPath + filmData.location + "/poster.jpg");

    if (typeof filmData.fbLink !== "undefined" && filmData.fbLink.length > 0) {
        $("#fbEmbed").attr("src", filmData.fbLink);
    } else {
        $("#descriptiveRow").html("<!-- no fb page -->\n<div id=\"description\"></div>");
    }

    console.log("Going to make the descriptive text out of: " + JSON.stringify(filmData.longText));
    var desciptiveTextData = filmData.longText;
    var numTextParas = desciptiveTextData.length;
    for (i = 0; i < numTextParas; i++) {
        descrHtmlInsert += "<p>" + desciptiveTextData[i] + "</p>\n";
    }
    if (descrHtmlInsert.length > 0) {
        $("#description").html(descrHtmlInsert);
    } else {
        $("#description").html(" <!--no links -->");
    }

    console.log("Going to make the links list using: " + JSON.stringify(filmData.links));
    var numbLinks = filmData.links.length;
    var regex = /^http/i;
    for (var i = 0; i < numbLinks; i++) {
        var linkName = filmData.links[i].linkName;
        var linkSrc = filmData.links[i].code;
        console.log("This links is: txt: " + linkName + " href: " + linkSrc);
        if (linkSrc.length > 0) {
            if (regex.test(linkSrc)) {
                console.log("This is is link out of site");
            } else {
                //linkSrc = otherHost + linkSrc;
                linkSrc = linkSrc;
            }
            var rowHtml = '<a href="' + linkSrc + '" class="list-group-item" target="_blank"><span class="linkText">' + linkName + '</span><img src="/ass/glob/newTab.gif" alt="The link creates a new tab for the content" class="newTabInd"/></a>';
            linksHtmlInsert += rowHtml;
        }
    }
    if (linksHtmlInsert.length > 0) {
        $("#listOfLinks").html(linksHtmlInsert);
    } else {
        $("#linkBox").html(" <!--no links -->");
    }

    if (typeof filmData.diaLink !== "undefined" && filmData.diaLink.length > 0) {
        $("#vid").attr("src", filmData.diaLink);
        if (filmData.diaText !== "" && filmData.diaText !== undefined && filmData.diaText.length > 0) {
            document.getElementById("vidHeader").innerHTML = filmData.diaText;
        }
    } else {
        $("#diaBox").html("");
    }

    // make the menu bar look nice
    // find out which stage this fiml is in
    //setNavHighlight( <onRlease | plannde | whatever> );
}
