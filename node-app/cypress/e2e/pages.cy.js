/**
 * Verify that all expected pages can be visited and render their key content.
 */

const pages = [
  { path: '/', id: 'home', heading: 'Welcome' },
  { path: '/about', id: 'about', heading: 'About Rose Goldthorp' },
  { path: '/released-features', id: 'released-features', heading: 'Released Feature Films' },
  { path: '/period-brit-lit', id: 'period-brit-lit', heading: 'The Period Brit. Lit. Project' },
  { path: '/contact', id: 'contact', heading: 'Contact Me' },
]

const filmDetailSlugs = [
  { slug: 'the-rocky-road-to-freedom', title: 'The Rocky Road To Freedom' },
  { slug: 'fleurs-secret', title: "Fleur's Secret" },
  { slug: 'a-ghost-in-corsets', title: 'A Ghost In Corsets' },
  { slug: 'silverville', title: 'Silverville' },
  { slug: 'watcher', title: 'Watcher' },
]

describe('All expected pages are reachable', () => {
  pages.forEach(({ path, id, heading }) => {
    it(`"${heading}" page loads at ${path}`, () => {
      cy.visit(path)
      cy.get(`#${id}`).should('exist')
      cy.contains('h1', heading).should('be.visible')
    })
  })

  describe('Film detail pages', () => {
    filmDetailSlugs.forEach(({ slug, title }) => {
      it(`Film detail page for "${title}" loads`, () => {
        cy.visit(`/released-features/films/${slug}`)
        cy.get('#filmDetails').should('exist')
        cy.get('#filmTitle').should('contain.text', title)
        cy.get('#poster').should('be.visible')
      })
    })
  })
})
