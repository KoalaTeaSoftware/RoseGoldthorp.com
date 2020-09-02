<?php
require_once "carousel/carousel.php";
?>
<section id="home">
    <div class="row align-items-center">
        <div class="col" id="leftCol">
            <div class="card" id="thisIsMe">
                <div class="card-body">
                    <img src="/chapters/home/rose.jpg" alt="This is me" id="me">
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4" id="centreCol">
            <div class="container">
                <?=
                /** @noinspection PhpUndefinedVariableInspection */
                // defined in require at top of file
                giveCarousel($carouselPageList, "                ") ?>
            </div>
        </div>
        <div class="col" id="rightCol">
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
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-head text-center">
                    <h1>Welcome</h1>
                </div>
                <div class="card-body text-center">
                    <p>We produce gripping content, customised to your requirements. Your own short films and web sites
                        are directed, edited and produced by our own in-house team. Your own content is managed by your
                        own account manager.
                    </p>
                    <p>Our content ranges from the creation of your <b>web site</b>, through the provision of
                        <b>blogs</b> and <b>videos</b>, to setting you up with your own <b>shop</b> and its own <b>affiliate
                            program</b>, or affiliate network link.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

