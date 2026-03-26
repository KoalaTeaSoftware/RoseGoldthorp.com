/**
 * Verify that external navigation links in the navbar are not broken.
 *
 * We use cy.request() to check each external URL returns HTTP 200,
 * rather than clicking them (which would navigate away from the app).
 */

const externalNavLinks = [
  { id: 'the-greenlandsNav', href: 'https://the-greenlands.com/' },
  { id: 'dd-nav', href: 'https://wessexdramas.org/' },
  { id: 'scott-nav', href: 'https://scottlanddramas.org/' },
]

describe('External nav-bar links are not broken', () => {
  beforeEach(() => {
    cy.visit('/')
  })

  externalNavLinks.forEach(({ id, href }) => {
    it(`nav link #${id} (${href}) returns HTTP 200`, () => {
      // Confirm the link is present in the DOM with the expected href
      cy.get(`#${id}`)
        .should('have.attr', 'href', href)
        .and('have.attr', 'target', '_blank')

      // Verify the remote URL is reachable
      cy.request({
        url: href,
        failOnStatusCode: false,
      }).then((response) => {
        expect(response.status).to.eq(200)
      })
    })
  })
})
