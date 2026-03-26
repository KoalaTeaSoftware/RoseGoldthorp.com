# Asset Organisation

Assets are split between two locations based on how they are used:

## `src/assets/` — Processed by Vite (cache-busted, optimised)

Site-wide static assets imported in components via ES `import` statements.
Vite adds content hashes to filenames for cache-busting in production builds.

- `_livery.scss` — SCSS variables (imported via `@use`)
- `images/logo@16px.gif` — Favicon / small logo
- `images/logo@320px.gif` — Banner logo
- `images/WorkingCogs.gif` — Loading spinner (used in FilmDetail.vue)
- `images/yt_icon_rgb.png` — YouTube icon (used in HomePage.vue)
- `images/spinner.gif` — Alternative spinner

### Source (from PHP site `ass/`)
- `logo@16px.gif`, `logo@320px.gif`, `WorkingCogs.gif`, `yt_icon_rgb.png`, `spinner.gif`

## `public/assets/` — Served as-is (no processing)

Page-specific and dynamically-referenced assets. These are referenced via
absolute URL paths (e.g. `/assets/filmDetails/slug/poster.jpg`) and are
copied unchanged to the build output.

### `filmDetails/` — Film posters, trailers, thumbnails
Copied from PHP site `ass/filmDetails/public/`. Referenced dynamically by slug.

### `carousel/` — Home page carousel images
Copied from PHP site `chapters/home/carousel/`.
Note: `04fleur'sSecret.jpg` was renamed to `04fleurs-secret.jpg`.

### `about/` — About page assets
- `rose.jpg` — from `chapters/about/`

### `period-brit-lit/` — Period Brit Lit page assets
- `pblfScreengrab2.jpg` — from `chapters/period-brit-lit/`

### `the-greenlands/` — The Greenlands page assets
- `storiesScreenGrab2.jpg` — from `chapters/the-greenlands/`
