// Function to switch between Login and Register forms
function switchForm(formType) {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const tabLogin = document.getElementById('tabLogin');
    const tabRegister = document.getElementById('tabRegister');
    
    if (formType === 'login') {
        loginForm.classList.remove('hidden');
        registerForm.classList.add('hidden');
        tabLogin.classList.add('border-primary', 'text-primary');
        tabLogin.classList.remove('border-transparent', 'text-gray-500', 'hover:border-gray-300');
        tabRegister.classList.add('border-transparent', 'text-gray-500', 'hover:border-gray-300');
        tabRegister.classList.remove('border-primary', 'text-primary');
    } else if (formType === 'register') {
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');
        tabRegister.classList.add('border-primary', 'text-primary');
        tabRegister.classList.remove('border-transparent', 'text-gray-500', 'hover:border-gray-300');
        tabLogin.classList.add('border-transparent', 'text-gray-500', 'hover:border-gray-300');
        tabLogin.classList.remove('border-primary', 'text-primary');
    }
}

// Initialization and form submission simulation
document.addEventListener('DOMContentLoaded', () => {
    // Set the default form view on load
    switchForm('login'); 

    // Simulation for Login Form Submission
    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Login attempted! (Simulation: Redirect to home or dashboard)');
        // In a real app, you would send an AJAX request here.
        loginForm.reset();
    });

    // Simulation for Register Form Submission
    const registerForm = document.getElementById('registerForm');
    registerForm.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Registration successful! (Simulation: Redirect to verification or login)');
        // In a real app, you would send an AJAX request here.
        registerForm.reset();
        // Option to switch back to login after successful registration
        switchForm('login'); 
    });
});