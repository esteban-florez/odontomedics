document.querySelectorAll('a[data-form]').forEach(a => {
  const id = a.dataset.form
  a.addEventListener('click', () => {
    document.querySelector(`#${id}`).submit()
  })
})
