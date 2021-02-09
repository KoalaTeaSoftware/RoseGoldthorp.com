<section>
    <script>
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                let myObj = JSON.parse(this.responseText);
                let el = document.getElementById('instagramImage');
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
                    <img src="/chapters/home/rose.jpg" alt="This is me" id="me" class="img-thumbnail">
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
            <div id="cta">
                <script src="https://gumroad.com/js/gumroad.js"></script>
                <p class="mt-4 mb-0">My movie The Rocky Road to Freedom is available now!</p>
                <a class="btn btn-block brandedButton mt-0"
                   style="margin-top: 1rem;"
                   href="https://gum.co/rockyroad"
                   target="_blank"
                   data-gumroad-single-product="true">
                    <span style="margin: 1rem; font-size: 3rem!important;">Buy the movie</span>
                </a>
            </div>
        </div>
        <div class="col-md" id="rightCol">
            <div class="card align-items-center" id="instagramFeed">
                <div class="card-body ">
                    <img id="instagramImage"
                         class="img-thumbnail"
                         src="/ass/WorkingCogs.gif"
                         alt="On it's way ..."
                         title="On it's way ...">
                </div>
                <div class="card-footer">
                    <a href="https://www.instagram.com/rosegoldthorpfilms/" target="_blank"
                       rel="noopener nofollow" class="m-auto">
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
                    <p>Hello and welcome to my web site. Have a mooch around and get an idea of what I'm up to, and drop
                        me a line if you want to employ, collaborate with, or just contact me.
                    </p>
                    <p>I already have a producer, and the two sorts of collaborating that I have going on at the moment
                        are:
                    </p>
                    <ol>
                        <li>Podcasting (largely voice acting)</li>
                        <li>Helping packaging, financing and selling my planned films, either the fantasy cycle
                            (<a href="https://the-greenlands.com/" target="_blank">The Greenlands</a>), or my period
                            brit lit features (see my <!--suppress HtmlUnknownTarget -->
                            <a href="/period-brit-lit" target="_blank">Period Brit Lit chapter</a>)
                        </li>
                    </ol>
                    <p> For quick reference, when I was a student, I made 5 feature films and co-wrote 12 other feature
                        screenplays. As a schoolchild, I made 18 shorts. Since graduating, I have made 3 dramatic
                        podcast seasons, launched and populated the-greenlands.com transmedia project, and am designing
                        and planning my Period Brit. Lit. transmedia project.
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
                          novalidate>
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
