/**
 * Verify that all images on each page load correctly.
 *
 * Strategy: a broken image typically renders at a very small height (0–20 px).
 * We assert that every <img> has a natural height greater than 30 px, which
 * proves the browser decoded a real image file rather than showing a
 * broken-image placeholder.
 */

const MIN_IMAGE_HEIGHT = 30 // pixels – any real image will exceed this

const pagesWithImages = [
  { path: '/', label: 'Home' },
  { path: '/about', label: 'About' },
  { path: '/released-features', label: 'Released Features' },
  { path: '/period-brit-lit', label: 'Period Brit Lit' },
]

const filmDetailSlugs = [
  'the-rocky-road-to-freedom',
  'fleurs-secret',
  'a-ghost-in-corsets',
  'silverville',
  'watcher',
]

describe('All images load correctly', () => {
  pagesWithImages.forEach(({ path, label }) => {
    it(`every <img> on "${label}" (${path}) has loaded`, () => {
      cy.visit(path)
      // Wait a moment for lazy / async images
      cy.wait(1000)
      cy.get('img').each(($img) => {
        // Carousel images that are off-screen may have 0 height until shown,
        // so we check naturalHeight which is set as soon as the file is decoded.
        cy.wrap($img)
          .should('have.prop', 'naturalHeight')
          .and('be.greaterThan', MIN_IMAGE_HEIGHT)
      })
    })
  })

  describe('Film detail page posters', () => {
    filmDetailSlugs.forEach((slug) => {
      it(`poster image loads for film "${slug}"`, () => {
        cy.visit(`/released-features/films/${slug}`)
        cy.get('#poster')
          .should('be.visible')
          .and('have.prop', 'naturalHeight')
          .and('be.greaterThan', MIN_IMAGE_HEIGHT)
      })
    })
  })
})
