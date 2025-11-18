//document.addEventListener('DOMContentLoaded', () => {
  const formTitle = document.getElementById('form-title');
  const loginForm = document.getElementById('login-form');
  const registerFields = document.getElementById('register-fields');
  const toggleFormBtn = document.getElementById('toggle-form');

  toggleFormBtn.addEventListener('click', () => {
    if (registerFields.style.display === 'none') {
      registerFields.style.display = 'block';
      formTitle.textContent = 'Register';
      toggleFormBtn.textContent = 'Login';
      loginForm.querySelector('.login-btn').textContent = 'send';
    } else {
      registerFields.style.display = 'none';
      formTitle.textContent = 'Login';
      toggleFormBtn.textContent = 'Register';
      loginForm.querySelector('.login-btn').textContent = 'sing in';
    }
  });

  loginForm.addEventListener('submit', (event) => {
    event.preventDefault();
    if (registerFields.style.display === 'block') {
      // Register new user
      const name = document.getElementById('name').value;
      const lastName = document.getElementById('last-name').value;
      const registerPhone = document.getElementById('register-phone').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm-password').value;

      if (password === confirmPassword) {
        alert('Usuario registrado exitosamente');
        // Aquí podrías agregar lógica para guardar al usuario
        console.log({
          name,
          lastName,
          registerPhone,
          email,
          password
        });
      } else {
        alert('Las contraseñas no coinciden');
      }
    } else {
      // Login de usuario
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;

      alert('Login exitoso');
      // Aquí podrías agregar lógica para autenticar al usuario
    }
  });
});
