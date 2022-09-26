describe('empty spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/mahasiswa')
    cy.get('body')
    cy.get(':nth-child(2) > :nth-child(6) > form > .btn-primary').click()
    cy.get("input[type=file]").attachFile("siswi.jpg")
    cy.get('.btn').click()
  })
})