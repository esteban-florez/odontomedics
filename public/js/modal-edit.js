const buttons = document.querySelectorAll('[data-action]')
const form = document.querySelector('.modal form')
const modal = document.querySelector('.modal')
const submit = document.querySelector('.modal button[type="submit"]')

buttons.forEach(button => {
  button.addEventListener('click', () => form.action = button.dataset.action)
})
