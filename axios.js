const verify = document.querySelector('#verify');
$request = () => {
    const answers = document.querySelectorAll("input:checked");
    const main = (document.querySelector(".top img")).id;
    answersArray = [];
    for (let i = 0; i < answers.length; i++) {
        // console.log(answers[i]);
        answersArray[i] = answers[i].id;
    }
    // console.log(answersArray);
    let answer = {
        answers: answersArray,
        main: main
    };

    axios.post("http://localhost/BIT/captch/req.php", answer)
        .then(function (response) {
            const verifyBlock = document.querySelector('.verify');
            verifyBlock.classList.add("hide");

            const answerBlock = document.querySelector('.answer');
            answerBlock.classList.add("show");

            const tryAgain = document.querySelector('.answer #verify');
            tryAgain.addEventListener('click', () => {
                window.location.reload();
            });

            const message = document.querySelector('.answer .message');
            if (response.data.atsakymas) {
                message.innerHTML = '<p class="success">You are human!</p>';
            } else {
                message.innerHTML = '<p class="wrong">You are robot!</p>';
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}

verify.addEventListener('click', $request);