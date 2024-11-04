const buttons = document.querySelectorAll('[data-action]')
const form = document.querySelector('#assign-doctor-modal form')
const select = document.querySelector('select#doctor_id')
const modal = document.querySelector('.modal')
const submit = document.querySelector('.modal button[type="submit"]')

const checkButton = () => {
  submit.disabled = select.value === ''
}

modal.addEventListener('hidden.bs.modal', () => select.value = '')

select.addEventListener('change', checkButton)

buttons.forEach(button => {
  button.addEventListener('click', () => form.action = button.dataset.action)
})

checkButton()
