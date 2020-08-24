<?php
require_once "carousel/carousel.php";
?>
<section id="home">
    <div class="row align-items-center">
        <div class="col-sm-3" id="leftCol">
            <div class="card" id="thisIsMe">
                <div class="card-body">
                    <img class="img-fluid" src="/chapters/home/rose.jpg" alt="This is me">
                </div>
            </div>
        </div>
        <div class="col-sm-5" id="centreCol">
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
                    <h2>Welcome</h2>
                </div>
                <div class="card-body">
                    <h2>Advertainment</h2>
                    <p>The modern consumer no longer tolerates thirty second blasts on the subject of your product, they
                        just click away.
                        People can now consume only stories that interest them. In my chapter
                        <a href="/advertainment" title="Go to the Advertainment chapter">Advertainment</a>, I explain
                        how I can help you by
                        creating short documentary, or a short narrative that can enthuse your customer.
                    </p>
                    <h2>Social Media Marketing</h2>
                    <p>Not only must your films me made, but they must be spoken about on as many platforms as possible.
                        In my chapter
                        <!--suppress SpellCheckingInspection -->
                        <a href="socialmediamarketeer" title="Go to the Social Media Marketing chapter">Social Media
                            Marketing</a>, I show you
                        how I can help you with this.
                    </p>
                    <h2>Feature Films</h2>
                    <p>I will shoot my fifth feature film in the summer of 2021. My love is for 'Costume' and 'Fantasy'
                        films. Visit my
                        chapter <a href="filmmaker" title="Go to the Film Maker chapter">Film Maker</a> to see more
                        about films that I have
                        made, and the 'costume film' production company that I am setting up next year
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

