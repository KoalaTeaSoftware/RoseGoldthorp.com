<section>
    <script>
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                let myObj = JSON.parse(this.responseText);
                let el = document.getElementById('intagramImage');
                el.setAttribute('src', myObj['imgList'][0]);
                el.setAttribute('alt', myObj['altList'][0]);
                el.setAttribute('title', myObj['altList'][0]);
                el.setAttribute("class", "img-fluid img-thumbnail fade-in");
            }
        };
        xmlhttp.open("GET", "https://stage.rosegoldthorp.com/api/instagram/", true);
        xmlhttp.send();
    </script>
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
            <script src="https://gumroad.com/js/gumroad.js"></script>
            <a class="btn btn-block brandedButton"
               style="margin-top: 1rem;"
               href="https://gum.co/rockyroad"
               target="_blank"
               data-gumroad-single-product="true">
                <span style="margin: 1rem; font-size: 3rem!important;">Buy the movie:<br>The Rocky Road</span>
            </a>
        </div>
        <div class="col-md" id="rightCol">
            <div class="card align-items-center" id="instagramFeed">
                <div class="card-body ">
                    <img id="intagramImage"
                         class="img-thumbnail"
                         src="/ass/WorkingCogs.gif"
                         alt="On it's way ..."
                         title="On it's way ..."
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
                                class="btn btn-default brandedButton">Get my newsletter
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>




