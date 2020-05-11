// JavaScript Document
'use strict';

function setNavHighlight() {
    var linkName = "";
    var weAreHere = $("body").attr("id");

    $("#nav > li").removeClass("active");

    if (weAreHere.length > 0) {
        linkName = "#" + weAreHere + "-link";
        $(linkName).addClass("active");
    } else {
        alert("No which nav item to highlight");
    }
}

///////////////////////////////////////////////////////////////////////////////
function toTitleCase(str) {
    return str.replace(/\w\S*/g, function (txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}

///////////////////////////////////////////////////////////////////////////////
function hyphenate(str) {
    return str.replace(/ /g, "-");
}

///////////////////////////////////////////////////////////////////////////////
function makeFilmTitle(str) {
    return hyphenate(toTitleCase(str));
}
