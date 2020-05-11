<?php
require_once "components/util-errorHandler.php";
require_once "components/util-feedHandler.php";

require_once "components/storyBoard.php";
require_once "components/carousel.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!-- It is hard to make iPad Chrome _really_ refresh. We make small changes now and again, and you don't see them! -->
    <!-- This is not likely to be that embarrassing, because, I expect, many visitors are first-time, and most assets are fast -->
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Mon, 01 April 2019 1:00:00 GMT"/>
    <meta http-equiv="pragma" content="no-cache"/>

    <link rel="icon" type="img/png" href="/ass/icon.png"/>
    <title>Rose Goldthorp</title>

    <!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- ends Twitter Bootstrap dependencies -->

    <!-- the w3schools stuff, may need own copy of this one day -->
    <script src="/ass/glob/w3js.js"></script>

    <!-- Own stuff -->
    <link rel="stylesheet" href="/ass/glob/glob.css">
    <script src="/ass/glob/glob.js"></script>
    <link rel="stylesheet" href="/ass/glob/banner/banner.css">
    <link rel="stylesheet" href="/ass/glob/nav/nav.css">

    <script src="ass/glob/carousel/carouselData.js"></script>
    <link rel="stylesheet" href="ass/glob/carousel/carousel.css">
    <link rel="stylesheet" href="ass/homePage/home.css">
</head>
<body id="home" onLoad="setNavHighlight()">
<div class="container-fluid">
    <div id="banner">
        <h1>Rose Goldthorp: <span id="bannerspan">Writer, Director, Production Manager and Editor</span></h1>
    </div>
    <nav class="navbar navbar-custom" role="navigation">
        <!-- have commented this out because it throws the main nav elements off centre will want to use these 3 images, however. maybe in banner?
    div class="navbar-header">
          <a class="navbar-brand" href="https://twitter.com/darkrosefilmsnz" target="_blank">
            <img class="img-responsive banner-icon social-icon" src="/ass/banner/icon-social-twitter.png" alt="Open a new tab on our twitter" id="twitter">
          </a>
          <a class="navbar-brand" href="https://www.youtube.com/channel/UCXTKEMG8k66nYpI5EbCztKw/featured" target="_blank">
            <img class="img-responsive banner-icon social-icon" src="/ass/banner/icon-social-youtube.png" alt="Open a new tab on our youtube channel" id="youtube"> </a>
          <a class="navbar-brand" href="https://www.facebook.com/darkrosefilmsnz/" target="_blank">
            <img class="img-responsive banner-icon social-icon" src="/ass/banner/icon-social-facebook.png" alt="Open a new tab on our facebook channel" id="facebook">
          </a>
        </div-->
        <!-- ToDo fix and enable the missing functionality here -->
        <ul id="nav" class="nav navbar-nav">
            <li id="home-link" class="active"><a href="/index.php">Home</a></li>
            <li id="on-release-link"><a href="/films/on-release">On Release</a></li>
            <li id="present-films-link"><a href="/films/present-films">Comedy Features</a></li>
            <li id="planned-films-link"><a href="/films/planned-films">Period Features</a></li>
            <li id="about-link"><a href="/about.html">About</a></li>
            <li id="media-link"><a href="/media.html">Media</a></li>
            <li id="juvenilia-link"><a href="/juvenilia">Juvenilia</a></li>
            <!-- li id="contact-link"><a href="/contact.html">Contact</a></li -->
        </ul>
    </nav>
    <section id="content">
        <div class="row">
            <div class="col-sm-3" id="leftCol">
                <div class="card" id="thisIsMe">
                    <div class="card-body"><img class="img-fluid" src="ass/homePage/rose.jpg" alt="This is me">
                        <a href="https://youtu.be/XJR9n8VbvoM" target="_blank" class="btn-block btn-lg brandedButton"
                           role="button">Show&nbsp;Reel 2019</a>
                        <a href="https://vimeo.com/274978505" target="_blank" class="btn-block btn-lg brandedButton"
                           role="button">Show&nbsp;Reel 2014 - 2018</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-5" id="centreCol">
                <?= giveCarousel($carouselPageList, "                ") ?>

                <div class="card">
                    <div class="card-head">
                        <h2>Welcome</h2>
                    </div>
                    <div class="card-body">
                        <p>Here be some of my work. I'm still in my early 20s, which they say is very young for writer /
                            directors, but I'm having great fun and can't think of a better way of life.
                        </p>
                    </div>
                </div>

            </div>

            <div class="col" id="rightCol">
                <div class="card">
                    <div class="card-body">
                        <div class="row" id="mc_embed_signup">
                            <form class="form-inline"
                                  action="https://rosegoldthorp.us18.list-manage.com/subscribe/post?u=4f69f3e46ff085a594ff19706&amp;id=043e7cb483"
                                  method="post"
                                  target="_blank"
                                  name="mc-embedded-subscribe-form"
                                  id="mc-embedded-subscribe-form"
                                  novalidate
                            >
                                <div class="form-group">
                                    <!--label for="mce-EMAIL"><small>Sign up to our news letter:</small> </label-->
                                    <input id="mce-EMAIL" type="email" class="form-control" value="" name="EMAIL"
                                           placeholder="email address" required>
                                </div>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                    <input type="text" name="b_4f69f3e46ff085a594ff19706_043e7cb483" tabindex="-1"
                                           value="">
                                </div>
                                <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe"
                                        class="btn btn-default">Subscribe to my newsletter
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card" id="storyboarding">
                    <div class="card-head">
                        <h2>This is the story boarding of my next feature film</h2>
                    </div>
                    <div class="card-body">
                        <?= $storyBoardVidHTML ?>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
</body>
</html>