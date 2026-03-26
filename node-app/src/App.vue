<script setup>
import BannerBox from "./components/BannerBox.vue";
import MainNav from "./components/MainNav.vue";
</script>

<template>
  <BannerBox/>
  <MainNav/>
  <div id="pageContents" class="container-fluid align-content-center">
    <RouterView/>
  </div>
  <div id="footer" class="row"></div>
</template>

<style lang="scss">
@use "src/assets/livery" as *;

body {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

a {
  font-weight: bold;
  font-style: italic;
  color: $banner-text !important;
}

h1, h2 {
  text-align: center;
}

.lead {
  font-weight: bold;
  margin-bottom: .5rem;
  text-align: center;
}

.brandedButton {
  background-image: linear-gradient(to bottom, $nav_bg_gradient_light 0%, $nav_bg_gradient_dark 100%);
  color: $banner-text !important;
  text-shadow: 1px 1px black;
  border-color: $banner-text;
  box-shadow: 5px 5px $banner-text;
  text-align: center;
  border-radius: 20px !important;
}

.brandedButton:hover {
  color: $nav_text;
}

.img-thumbnail {
  border-color: $banner-text;
  padding: 0.25rem;
  border-radius: 10px;
}

.card {
  margin: .25rem;
  border-color: $banner-text;
}

figcaption {
  text-align: center;
}

.newTabInd::after {
  content: " \29C9";
  font-style: normal;
  font-size: 0.8em;
}

.newTabInd {
  padding-right: 0.5rem;
  text-decoration: underline;
}

.fade-in {
  animation: fadeIn ease $fade_in_speed;
}

@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

#footer {
  height: 2rem;
}
</style>
