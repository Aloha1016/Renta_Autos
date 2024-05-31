const loginForm = document.getElementById('loginForm') || null
const registrarsForm = document.getElementById('registrarsForm') || null
const btnSignUp = document.getElementById('signUp') || null

if (loginForm) {
  loginForm.addEventListener('submit', (event) => {
    console.log('@@@ submit')
    event.preventDefault()
    const form = new FormData(loginForm)
console.log('form', form)
    fetch('../backend/index.php', {
      method: 'POST',
      body: form
    })
    .then((response) => response.json())
    .then((res) => {
      console.log('@@ res => ', res)
      if (res.message === 'Inicio Satisfactorio') {
        window.location.href = '../frontend/home.html'
      }
    })
    .catch((err) => {
      console.log('@@ err => ', err)
    })
  })
}

if (registrarsForm) {
  registrarForm.addEventListener('submit', (event) => {
    console.log('@@@ submit')
    event.preventDefault()
    
    const form = new FormData(registrarsForm)
console.log('form',form)
    
    fetch('../backend/index.php', {
      method: 'POST',
      body: form
    })
    .then((response) => response.json())
    .then((res) => {
      console.log('@@ res => ', res)
      if (res.message === 'Usuario Registrado Satisfactoriamente') {
        window.location.href = '../frontend/index.html'
      }
    })
    .catch((err) => {
      console.log('@@ err => ', err)
    })
  })
}
