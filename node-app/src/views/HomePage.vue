<script setup>
import ImgCarousel from '../components/ImgCarousel.vue'
import ytIconImg from '@/assets/images/yt_icon_rgb.png'

const carouselImages = [
  { src: '/assets/carousel/01watcher.jpg', alt: 'Poster and clip for featurette Watcher' },
  { src: '/assets/carousel/02silverville.jpg', alt: 'Poster and clip for featurette Silverville' },
  { src: '/assets/carousel/04fleurs-secret.jpg', alt: "Poster and clip for feature Fleur's Secret" },
  { src: '/assets/carousel/05rockyRoadToFreedom.jpg', alt: 'Poster and clip for feature The Rocky Road To Freedom' }
]
</script>

<template>
  <section id="home">
    <div class="row align-items-center">

      <div class="col-md" id="leftCol">
        <div class="card" id="thisIsMe">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <img src="/assets/filmDetails/the-well-beloved/the-well-beloved-poster@460w.jpg?v=2"
                     class="img-fluid"
                     alt="The Well Beloved poster">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md d-none d-md-block" id="centreCol">
        <div class="container">
          <ImgCarousel :images="carouselImages"/>
        </div>
      </div>

      <div class="col-md" id="rightCol">
        <div class="ratio ratio-16x9">
          <video id="hrTrailer" controls preload="auto">
            <source src="/assets/filmDetails/the-well-beloved/the-well-beloved-trailer-720p.mp4"
                    type="video/mp4">
          </video>
        </div>
        <p class="help m-auto" style="text-align: center; font-style: italic; font-size: small;">
          Not playing nicely on your iPad?<br>Try picture-in-picture, or maximising the player.
        </p>
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
              me a line if you want to employ, collaborate with, or just contact me.</p>
            <p>The two sorts of work that I have going on at the moment are:</p>
            <ol>
              <li>Dramatic Podcasting (The Wessex Dramas, and The Scottland Dramas)</li>
              <li>Making 'NO/LO budget' Thomas Hardy and Sir Walter Scott feature films.</li>
            </ol>
            <p>For quick reference, when I was a student, I made 5 feature films and co-wrote 12 other feature
              screenplays. As a schoolchild, I made 18 shorts. Since graduating, I have made 5 dramatic
              podcast seasons from the 6 feature film screenplays in the-greenlands.com
              storyworld. I have now, also, started on my period Brit. lit work, whose first story world is
              that of Thomas Hardy's Wessex, by co-adapting Hardy stories for 9 Hardy feature films. The
              Wessex Dramas' Project (for which I am the resident filmmaker) releases its fourth Hardy feature
              film at the end of 2027.</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <form class="d-inline-flex"
                      action="https://rosegoldthorp.us18.list-manage.com/subscribe/post?u=4f69f3e46ff085a594ff19706&amp;id=043e7cb483"
                      method="post"
                      target="_blank"
                      name="mc-embedded-subscribe-form"
                      id="mc-embedded-subscribe-form"
                      novalidate>
                  <div class="me-2">
                    <input id="mce-EMAIL" type="email" class="form-control" value="" name="EMAIL"
                           placeholder="email address" required>
                  </div>
                  <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_4f69f3e46ff085a594ff19706_043e7cb483" tabindex="-1" value="">
                  </div>
                  <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe"
                          class="btn brandedButton ms-1">Get my newsletter
                  </button>
                </form>
              </div>
              <div class="col text-end">
                <img id="yt-icon" :src="ytIconImg" alt="YouTube">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
@use "src/assets/livery" as *;

#home {
  #myCarousel {
    display: flex;
    align-items: center;
    height: fit-content;
  }

  #mc-embedded-subscribe-form {
    margin: auto !important;
  }

  #cta {
    p {
      margin: .75rem;
      font-size: x-large;
      text-align: center;
    }

    a {
      margin: .75rem;
    }
  }

  ol {
    list-style: none;

    li {
      margin-bottom: .3rem;
    }
  }

  #leftCol img {
    padding: 0.25em;
  }

  #yt-icon {
    height: 2em;
    padding: 0.25em;
    float: right;
  }
}
</style>
