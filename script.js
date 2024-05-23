const contactForm = document.getElementById('contactForm');
const formMessage = document.getElementById('form-message');

contactForm.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevent default form submission

  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;

  // Basic form validation (optional)
  if (name === '' || email === '' || message === '') {
    formMessage.textContent = 'Please fill in all required fields.';
    return;
  }

  // Simulate form submission (replace with actual email sending logic)
  formMessage.textContent = 'Thank you for contacting GoodSchool INternational ! Your message has been sent.';
  contactForm.reset(); // Reset form after successful submission
});
