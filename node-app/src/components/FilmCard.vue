<script setup>
defineProps({
  title: { type: String, required: true },
  slug: { type: String, default: '' },
  thumbnail: { type: String, default: '' },
  puff: { type: String, default: '' },
  extraHtml: { type: String, default: '' },
  linkable: { type: Boolean, default: false },
  videoSrc: { type: String, default: '' },
  videoPoster: { type: String, default: '' }
})
</script>

<template>
  <div class="card">
    <div class="card-body">
      <div class="row align-items-center">
        <div v-if="thumbnail" class="col-md-2 d-flex flex-row justify-content-center align-items-center">
          <img :alt="title + ' poster'" class="img-fluid filmThumbnail" :src="thumbnail">
        </div>
        <div class="col">
          <RouterLink v-if="linkable && slug" :to="'/released-features/films/' + slug">
            <h3 class="textLinkToFilmDetails linkText">{{ title }}</h3>
          </RouterLink>
          <h3 v-else>{{ title }}</h3>
          <p v-if="puff" class="filmPuff" v-html="puff"></p>
          <div v-if="extraHtml" v-html="extraHtml"></div>
          <slot></slot>
        </div>
        <div v-if="videoSrc" class="col-md-4">
          <div class="ratio ratio-16x9">
            <video controls preload="auto" :poster="videoPoster || undefined">
              <source :src="videoSrc" type="video/mp4">
            </video>
          </div>
          <p class="help m-auto" style="text-align: center; font-style: italic; font-size: small;">
            Not playing nicely on your iPad?<br>Try picture-in-picture, or maximising the player.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.filmThumbnail {
  max-width: 100%;
}
</style>
