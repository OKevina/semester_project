document.addEventListener("DOMContentLoaded", function() {
    const slidePage = document.querySelector(".slide-page");
    const firstNextBtn = document.querySelector(".firstNext");
    const emailInput = document.querySelector("#emailInput");
    const emailHiddenInputs = document.querySelectorAll("input[name='email']");

    let current = 1;

    firstNextBtn.addEventListener("click", function(event) {
        event.preventDefault();

        // Use AJAX to validate the email
        const email = emailInput.value;
        emailHiddenInputs.forEach(input => {
            input.value = email;
        });

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = xhr.responseText;
                if (response === 'found') {
                    slidePage.style.marginLeft = "-50%";
                    current += 1;
                } else {
                    slidePage.style.marginLeft = "-25%";
                    current += 1;
                }
            }
        };
        xhr.open('POST', '{{ route('check-email') }}', true); // Use the Laravel route
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(`email=${email}`);
    });
});
