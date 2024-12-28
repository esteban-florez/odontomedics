const btns = document.querySelectorAll('[data-date]')
const date = document.querySelector('.modal #date')
const time = document.querySelector('.modal #time')

btns.forEach(btn => btn.addEventListener('click', () => {
  date.value = btn.dataset.date
  time.value = btn.dataset.time
}))

document.querySelector('.modal').addEventListener('hidden.bs.modal', () => {
  date.value = ''
  time.value = ''
})

const failed = window._laravelFailedAction
if (failed) {
  Array.from(btns).find(btn => btn.dataset.action === failed).click()
}
