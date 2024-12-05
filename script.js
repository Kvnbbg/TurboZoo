document.getElementById('verifyButton').addEventListener('click', function () {
    const link1 = document.getElementById('link1').value.trim();
    const link2 = document.getElementById('link2').value.trim();
    const resultDiv = document.getElementById('result');

    if (link1 === link2) {
        resultDiv.innerHTML = "<p>Links match perfectly!</p>";
        resultDiv.className = "result-section success";
    } else {
        resultDiv.innerHTML = "<p>Links do not match!</p>";
        resultDiv.className = "result-section error";
    }
});

document.getElementById('trigger777').addEventListener('click', function () {
    const testURL = "https://www.example.com/trigger-777-test";
    document.getElementById('link1').value = testURL;
    document.getElementById('link2').value = testURL;

    const popEffect = document.getElementById('popEffect');
    popEffect.classList.remove('hidden');
    popEffect.classList.add('active');

    // Remove effect after animation
    setTimeout(() => {
        popEffect.classList.remove('active');
        popEffect.classList.add('hidden');

        // Redirect to 777.html
        window.location.href = '777.html';
    }, 1000);
});
