/*const faqs = [
    {
        question: "What payment methods do you accept?",
        answer: "We accept credit/debit cards, PayPal, and cash on delivery."
    },
    {
        question: "What is your return policy?",
        answer: "You can return items within 30 days of purchase for a full refund."
    },
    {
        question: "Do you offer international shipping?",
        answer: "Yes, we offer international shipping to most countries."
    }
];

const chatBox = document.getElementById("chat-box");
const userInput = document.getElementById("user-input");

function sendMessage() {
    const userMessage = userInput.value.trim();
    if (userMessage !== "") {
        displayMessage(userMessage, "user");
        respondToUser(userMessage);
        userInput.value = "";
    }
}

function respondToUser(message) {
    let matched = false;
    faqs.forEach(faq => {
        if (message.toLowerCase().includes(faq.question.toLowerCase())) {
            displayMessage(faq.answer, "bot");
            matched = true;
        }
    });
    if (!matched) {
        displayMessage("Sorry, I didn't understand that. Could you please ask another question?", "bot");
    }
}

function displayMessage(message, sender) {
    const messageElement = document.createElement("p");
    messageElement.textContent = message;
    messageElement.classList.add(sender);
    chatBox.appendChild(messageElement);
    chatBox.scrollTop = chatBox.scrollHeight;
}
*/