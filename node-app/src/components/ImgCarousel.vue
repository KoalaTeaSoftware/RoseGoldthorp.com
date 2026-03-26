<script setup>
defineProps({
  images: {
    type: Array,
    required: true
    // each item: { src: String, alt: String }
  },
  id: {
    type: String,
    default: 'myCarousel'
  }
})
</script>

<template>
  <div :id="id" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner">
      <div v-for="(img, index) in images"
           :key="index"
           class="carousel-item"
           :class="{ active: index === 0 }">
        <img class="d-block w-100 img-fluid" :src="img.src" :alt="img.alt">
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@use "src/assets/livery" as *;

.carousel-inner {
  text-align: center;
  padding: 0.25em;
}

.carousel-item > img {
  margin: auto;
  border: thin groove $banner-text;
}
</style>
