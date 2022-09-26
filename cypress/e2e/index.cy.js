describe('empty spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/mahasiswa')
    cy.get('body')
    cy.get('.text-gray-700').click()
    cy.get('[href="http://127.0.0.1:8000/mahasiswa?page=1"]').click()
    cy.get('.block').type("aira")
    cy.get('.absolute').click()
  })
})