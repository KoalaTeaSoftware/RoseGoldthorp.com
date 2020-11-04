<section>
    <div class="row align-items-center">
        <div class="col-md" id="leftCol">
            <div class="card" id="thisIsMe">
                <div class="card-body">
                    <img src="/chapters/home/rose.jpg" alt="This is me" id="me">
                </div>
            </div>
        </div>
        <div class="col-md d-none d-md-block " id="centreCol">
            <div class="container">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
                    <div class="carousel-inner" id="caroInner">
                        <div class="carousel-item">
                            <img class="img-fluid" src="/chapters/home/carousel/01watcher.jpg"
                                 alt="Poster and clip for featurette Watcher">
                        </div>
                        <div class="carousel-item active">
                            <img class="img-fluid" src="/chapters/home/carousel/02silverville.jpg"
                                 alt="Poster and clip for featurette Silverville">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid" src="/chapters/home/carousel/03aGhostInCorsets.jpg"
                                 alt="Poster and clip for feature A Ghost In Corsets">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid" src="/chapters/home/carousel/04fleur'sSecret.jpg"
                                 alt="Poster and clip for feature Fleur's Secret">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid" src="/chapters/home/carousel/05rockyRoadToFreedom.jpg"
                                 alt="Poster and clip for feature The Rocky Road To Freedom">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md" id="rightCol">
            <div class="card align-items-center" id="instagramFeed">
                <!--div class="card-body ">
                    <img id="intagramImage"
                         class="img-fluid img-thumbnail"
                         src="/ass/WorkingCogs.gif"
                         alt="On it's way ..."
                    >
                </div-->
                <div class="card-footer">
                    <a href="https://www.instagram.com/rosegoldthorpfilms/" target="_blank" rel="noopener nofollow">
                        Follow me on Instagram</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-head text-center">
                    <h1>Welcome</h1>
                </div>
                <div class="card-body text-center">
                    <p>We produce gripping content, customised to your requirements. Your own short films and web
                        sites
                        are directed, edited and produced by our own in-house team. Your own content is managed by
                        your
                        own account manager.
                    </p>
                    <p>Our content ranges from the creation of your <b>web site</b>, through the provision of
                        <b>blogs</b> and <b>videos</b>, to setting you up with your own <b>affiliate
                            stores</b>.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <form class="form-inline"
                          action="https://rosegoldthorp.us18.list-manage.com/subscribe/post?u=4f69f3e46ff085a594ff19706&amp;id=043e7cb483"
                          method="post"
                          target="_blank"
                          name="mc-embedded-subscribe-form"
                          id="mc-embedded-subscribe-form"
                          novalidate
                    >
                        <div class="form-group">
                            <!--suppress HtmlFormInputWithoutLabel -->
                            <input id="mce-EMAIL" type="email" class="form-control" value="" name="EMAIL"
                                   placeholder="email address" required>
                        </div>
                        <!--suppress HtmlFormInputWithoutLabel -->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <!--suppress HtmlFormInputWithoutLabel -->
                            <input type="text" name="b_4f69f3e46ff085a594ff19706_043e7cb483" tabindex="-1"
                                   value="">
                        </div>
                        <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe"
                                class="btn btn-default brandedButton">Get my newsletter
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once "components/wpHandler.php";
require_once "components/instagamHandler.php";
$feed = readWPFeed("instagram");
$imgs = getImgSourcesFromInstagramFeed($feed);
$alts = getAltTagsFromInstagramFeed($feed);
$firstImgSrc = $imgs[1][1]; // the first in the array links to the whole account
$firstImgAlt = $alts[1][0]; // that first src does not have an alt, so the zeroth one is for the desired image
$firstImgSrc .= "media"; // this get just the jpg, otherwise you get a whole BoB
// make the redrawing of the instagram happen when the doc is ready.
//<script>
//    $(document).ready(function () {
/*        document.getElementById("intagramImage").setAttribute("src", "<?= $firstImgSrc ?>");*/
/*        document.getElementById("intagramImage").setAttribute("alt", "<?= $firstImgAlt ?>");*/
//    })
//</script>
//?>



