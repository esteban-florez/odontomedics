const selects = document.querySelectorAll('[data-change-reload]')
const form = document.querySelector('[method="GET"]')

selects.forEach(select => select.addEventListener('change', () => {
  form.submit()
}))
