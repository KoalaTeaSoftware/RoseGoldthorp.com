/**
 * Verify that all locally-hosted videos can be loaded and have a duration
 * longer than 20 seconds.
 *
 * Strategy: visit pages containing <video> elements, wait for metadata to load,
 * then assert duration > 20.
 */

const MIN_DURATION_SECONDS = 20

describe('Videos load and have sufficient duration', () => {
  it('Home page trailer video loads with duration > 20s', () => {
    cy.visit('/')
    cy.get('#hrTrailer', { timeout: 15000 }).should('exist')
    cy.get('#hrTrailer').then(($video) => {
      const video = $video[0]
      // If metadata is already loaded, check immediately; otherwise wait
      return new Cypress.Promise((resolve) => {
        if (video.readyState >= 1) {
          resolve()
        } else {
          video.addEventListener('loadedmetadata', () => resolve(), { once: true })
          // Trigger load in case preload didn't fire
          video.load()
        }
      }).then(() => {
        expect(video.duration).to.be.greaterThan(MIN_DURATION_SECONDS)
      })
    })
  })

  // Videos on the Released Features page (inside FilmCard components)
  const releasedFeatureVideos = [
    { title: 'The Well Beloved trailer', src: '/assets/filmDetails/the-well-beloved/the-well-beloved-trailer-720p.mp4' },
    { title: 'Hardy\'s Hand of Fate trailer', src: '/assets/filmDetails/hardys-hand-of-fate/HandOfFate-Trailer-720p.mp4' },
    { title: 'Hardy\'s Regrets trailer', src: '/assets/filmDetails/hardys-regrets/hardysRegretsTrailer@720p30.mp4' },
  ]

  describe('Released Features page videos', () => {
    releasedFeatureVideos.forEach(({ title, src }) => {
      it(`"${title}" loads with duration > ${MIN_DURATION_SECONDS}s`, () => {
        cy.visit('/released-features')
        cy.get(`video source[src="${src}"]`, { timeout: 15000 })
          .should('exist')
          .parent('video')
          .then(($video) => {
            const video = $video[0]
            return new Cypress.Promise((resolve) => {
              if (video.readyState >= 1) {
                resolve()
              } else {
                video.addEventListener('loadedmetadata', () => resolve(), { once: true })
                video.load()
              }
            }).then(() => {
              expect(video.duration).to.be.greaterThan(MIN_DURATION_SECONDS)
            })
          })
      })
    })
  })

  // Verify video files are reachable via HTTP (HEAD request).
  // This is especially useful for future "real world" runs where videos may go missing.
  describe('Video files return HTTP 200 (HEAD request)', () => {
    const allVideoSrcs = [
      '/assets/filmDetails/hardys-hand-of-fate/HandOfFate-Trailer-720p.mp4',
      '/assets/filmDetails/the-well-beloved/the-well-beloved-trailer-720p.mp4',
      '/assets/filmDetails/hardys-regrets/hardysRegretsTrailer@720p30.mp4',
    ]

    allVideoSrcs.forEach((src) => {
      it(`video file ${src} is reachable`, () => {
        cy.request({
          method: 'HEAD',
          url: src,
          failOnStatusCode: false,
        }).then((response) => {
          expect(response.status).to.eq(200)
        })
      })
    })
  })
})
