<script setup>
import { computed } from 'vue'
import filmData from '../data/filmData.json'
import workingCogsImg from '@/assets/images/WorkingCogs.gif'

const props = defineProps({
  slug: { type: String, required: true }
})

const film = computed(() => {
  return filmData.find(f => f.slug === props.slug) || null
})

const posterSrc = computed(() => {
  if (!film.value) return workingCogsImg
  return `/assets/filmDetails/${film.value.slug}/poster.jpg`
})
</script>

<template>
  <div id="filmDetails">
    <div class="jumbotron bg-light p-3">
      <h1 class="text-center" id="filmTitle">{{ film ? film.title : 'Unknown Film' }}</h1>
    </div>

    <template v-if="film">
      <div class="row">
        <div class="col-md-4" id="posterBox">
          <img alt="The Poster" title="The Poster" class="img-fluid" id="poster" :src="posterSrc">
        </div>
        <div class="col">
          <div class="row" id="descriptiveRow">
            <div id="description">
              <p v-for="(para, i) in film.text" :key="i" v-html="para"></p>
            </div>
          </div>
          <div class="row" v-if="film.links && film.links.length">
            <div id="linkBox">
              <div class="card">
                <div class="list-group" id="listOfLinks">
                  <a v-for="(link, i) in film.links" :key="i"
                     :href="link.code"
                     class="list-group-item newTabInd"
                     target="_blank">{{ link.text }}</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="diaRow" v-if="film.dia && film.dia.length > 10">
            <div id="diaBox">
              <h2 class="text-center" id="vidHeader">See the Director in Action</h2>
              <div class="ratio ratio-16x9">
                <iframe :src="film.dia" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>

    <template v-else>
      <p>Please go back to the <RouterLink to="/released-features">Released Features</RouterLink> page and try again.</p>
    </template>
  </div>
</template>

<style lang="scss" scoped>
@use "src/assets/livery" as *;

#filmDetails {
  .jumbotron {
    margin: 0;
    padding: 10px 2rem;
  }

  #descriptiveRow {
    font-size: 1.25rem;
  }

  #poster {
    margin: 1.5em auto 1.5em auto;
    max-width: 98%;
    border-style: solid;
    border-color: black;
    border-width: thin;
  }

  #linkBox, #diaBox {
    width: 100%;
  }

  #diaBox {
    .ratio {
      width: 75%;
      margin: auto;
    }
  }
}
</style>
