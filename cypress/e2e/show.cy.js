describe('empty spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/mahasiswa')
    cy.get(':nth-child(2) > :nth-child(6) > form > .btn-info').click()
    cy.get('.btn').click()
  })
})