import { defineConfig } from 'cypress'

export default defineConfig({
  e2e: {
    baseUrl: process.env.CYPRESS_BASE_URL || 'http://localhost:5173',
    supportFile: 'cypress/support/e2e.js',
    specPattern: 'cypress/e2e/**/*.cy.js',
    // Videos and iframes can be slow to load
    defaultCommandTimeout: 15000,
    pageLoadTimeout: 30000,
    // Avoid issues with cross-origin iframes (Vimeo/YouTube embeds)
    chromeWebSecurity: false,
  },
})
