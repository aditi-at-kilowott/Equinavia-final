document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const faqAnswer = question.nextElementSibling;

            // Toggle the 'active' class on the question to rotate the icon
            question.classList.toggle('active');

            // Toggle the height of the answer div
            if (faqAnswer.style.maxHeight) {
                faqAnswer.style.maxHeight = null;
                faqAnswer.style.padding = '0 20px';
            } else {
                faqAnswer.style.maxHeight = faqAnswer.scrollHeight + 'px';
                faqAnswer.style.padding = '20px';
            }
        });
    });
});