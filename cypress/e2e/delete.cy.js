describe('empty spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/mahasiswa')
    cy.get(':nth-child(4) > :nth-child(6) > form > .btn-danger').click()
  })
})