<template>
  <div id="furniture" class="row">
    <div class="col" id="main-content">
      <p id="banner">Rose Goldthorp</p>
      <p id="subTitle">Artist, Film Maker &amp; Enfant Terrible</p>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@use "src/assets/livery" as *;

#furniture {
  background-color: $banner-background;
  color: $banner-text;

  #main-content {
    padding: 0;
  }

  #banner {
    text-align: center;
    font-size: 6rem;
    font-weight: bold;
    line-height: 1;
    margin-bottom: 0;
  }

  #subTitle {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 0;
  }
}
</style>
