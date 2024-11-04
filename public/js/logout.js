document.querySelectorAll('a[data-logout]').forEach(a => {
  a.addEventListener('click', () => {
    document.querySelector('#logout').submit()
  })
})
