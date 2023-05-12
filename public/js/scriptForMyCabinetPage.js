const addAnswerBtn = document.querySelector('#add-answer-btn');
const answersContainer = document.querySelector('#answers-container');
let answerCount = 1;

addAnswerBtn.addEventListener('click', () => {
    const answerId = `answer${++answerCount}`;
    const newAnswerInput = document.createElement('input');
    newAnswerInput.type = 'text';
    newAnswerInput.classList.add('form-control');
    newAnswerInput.placeholder = `Enter answer ${answerCount}`;
    newAnswerInput.id = answerId;
    const newAnswerLabel = document.createElement('label');
    newAnswerLabel.for = answerId;
    newAnswerLabel.textContent = `Answer ${answerCount}:`;
    const newAnswerGroup = document.createElement('div');
    newAnswerGroup.classList.add('form-group');
    newAnswerGroup.appendChild(newAnswerLabel);
    newAnswerGroup.appendChild(newAnswerInput);
    answersContainer.appendChild(newAnswerGroup);
});

const createForm = document.getElementById('createForm');
createForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const questionInput = document.getElementById('question');
    const status = document.getElementById("status").value;
    const answerInputs = document.querySelectorAll('#answers-container input');
    const answers = [];

    answerInputs.forEach(input => {
        const title = input.value.trim();
        if (title !== '') {
            answers.push({
                title: title,
                numberOfVotes: 0
            });
        }
    });

    const survey = {
        title: questionInput.value.trim(),
        status: status,
        answers: answers
    };

    await fetch(createForm.action, {
        method: createForm.method,
        body: JSON.stringify(survey)
    })
        .then(response => {
            if (!response.ok) {
                alert('Error')
            } else {
                window.location.href = '/myCabinet';
            }
        })
})

async function sort(button) {
    await fetch(button.dataset.link, {
        method: 'get',
    })
        .then(response => response.text())
        .then(html => {
            const cardDeck = document.querySelector('.card-deck');
            while (cardDeck.firstChild) {
                cardDeck.removeChild(cardDeck.firstChild);
            }
            cardDeck.innerHTML = html
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

async function deleteSurvey(id) {
    await fetch('/survey/delete/?id='+id, {
        method: 'get',
    })
        .then(response => {
            if (!response.ok) {
                alert('Error')
            } else {
                window.location.href = '/myCabinet';
            }
        })
}