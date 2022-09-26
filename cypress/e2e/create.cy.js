import { Input } from "postcss"

describe('empty spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/mahasiswa')
    cy.get('.float-right > .btn').click()
    cy.get('.row')
    cy.get('#Nim').type("2041720090")
    cy.get('#Nama').type("Siswi Diah")
    cy.get('#kelas').select("TI 2H")
    cy.get('#Jurusan').type("Teknologi Informasi")
    cy.get("input[type=file]").attachFile("siswi.jpg")
    cy.get('.btn').click()
  })
})