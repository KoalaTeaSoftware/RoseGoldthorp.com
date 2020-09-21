<?php
require_once "carousel/carousel.php";
?>
<section>
    <div class="row align-items-center">
        <div class="col" id="leftCol">
            <div class="card" id="thisIsMe">
                <div class="card-body">
                    <img src="/chapters/home/rose.jpg" alt="This is me" id="me">
                </div>
            </div>
        </div>
        <div class="col " id="centreCol">
            <div class="container">
                <?=
                /** @noinspection PhpUndefinedVariableInspection */
                // defined in require at top of file
                giveCarousel($carouselPageList, "                ") ?>
            </div>
        </div>
        <div class="col" id="rightCol">
            <div class="card align-items-center" id="instagramFeed">
                <?php
                require_once "components/wpHandler.php";
                require_once "components/instagamHandler.php";
                $feed = readWPFeed("instagram");
                $imgs = getImgSourcesFromInstagramFeed($feed);
                $alts = getAltTagsFromInstagramFeed($feed);
                $firstImgSrc = $imgs[1][1]; // the first in the array links to the whole account
                $firstImgAlt = $alts[1][0]; // that first src does not have an alt, so the zeroth one is for the desired image
                $firstImgSrc .= "media"; // this get just the jpg, otherwise you get a whole BoB
                ?>
                <div class="card-body ">
                    <img class="img-fluid img-thumbnail"
                         src="<?= $firstImgSrc ?>"
                         alt="<?= $firstImgAlt ?>"
                    >
                </div>
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
                                class="btn btn-default brandedButton">Subscribe to my newsletter
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

