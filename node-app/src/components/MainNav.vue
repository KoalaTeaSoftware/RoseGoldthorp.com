<script setup>
import { useRoute } from 'vue-router'

const route = useRoute()

const navItems = [
  { id: 'homeNav', label: 'Home', to: '/' },
  { id: 'aboutNav', label: 'About', to: '/about' },
  { id: 'the-greenlandsNav', label: 'The Greenlands', href: 'https://the-greenlands.com/', external: true },
  { id: 'dd-nav', label: 'The Wessex Project', href: 'https://wessexdramas.org/', external: true },
  { id: 'scott-nav', label: 'The Scottland Project', href: 'https://scottlanddramas.org/', external: true },
  { id: 'released-featuresNav', label: 'Released Features', to: '/released-features' },
  { id: 'contactNav', label: 'Contact', to: '/contact' }
]

const isActive = (item) => {
  if (!item.to) return false
  if (item.to === '/') return route.path === '/'
  return route.path.startsWith(item.to)
}
</script>

<template>
  <nav id="mainNav" class="navbar navbar-expand-md">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button"
              data-bs-toggle="collapse" data-bs-target="#toggleableNavBar"
              aria-controls="toggleableNavBar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="toggleableNavBar">
        <div class="navbar-nav mx-auto">
          <template v-for="item in navItems" :key="item.id">
            <a v-if="item.external"
               class="nav-item nav-link"
               :id="item.id"
               :href="item.href"
               target="_blank">{{ item.label }}</a>
            <RouterLink v-else
                        class="nav-item nav-link"
                        :class="{ active: isActive(item) }"
                        :id="item.id"
                        :to="item.to">{{ item.label }}</RouterLink>
          </template>
        </div>
      </div>
    </div>
  </nav>
</template>

<style lang="scss" scoped>
@use "src/assets/livery" as *;

#mainNav {
  width: 100%;
  background-image: linear-gradient(to bottom, $nav_bg_gradient_light 0%, $nav_bg_gradient_dark 100%);
  border: thin solid $banner-text;
  padding: 0;

  .navbar-toggler {
    margin: 0.25rem auto;
  }

  .nav-item {
    border-color: $banner-text;
    border-width: 0 1px 0 1px;
    border-style: solid;
    margin: 0;
    padding-left: 0.75rem;
    padding-right: 0.75rem;
    font-style: normal;
    text-align: center;
    color: $nav_text !important;
  }

  .nav-item:hover {
    color: $banner-text !important;
  }

  .active {
    color: black !important;
  }
}
</style>
