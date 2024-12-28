const select = document.querySelector('select#doctor_id')

document.querySelector('.modal')
  .addEventListener('hidden.bs.modal', () => select.value = '')

select.addEventListener('change', checkButton)
checkButton()

function checkButton() {
  submit.disabled = select.value === ''
}
