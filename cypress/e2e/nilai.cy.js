describe('empty spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/mahasiswa')
    cy.get(':nth-child(2) > :nth-child(6) > form > .btn-warning').click()
    cy.get('.mt-3').click()
    cy.visit('http://127.0.0.1:8000/mahasiswa')
    cy.get(':nth-child(2) > :nth-child(6) > form > .btn-warning').click()
    cy.get('[style="float: right"]').click()
  })
})