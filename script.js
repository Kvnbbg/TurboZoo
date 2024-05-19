document.getElementById('wormForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const metaverseData = document.getElementById('metaverseData').value;

    fetch('digital-worm.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'metaverseData=' + encodeURIComponent(metaverseData),
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('cleanedData').textContent = 'Cleaned Metaverse Data: ' + data.cleanedData;
        document.getElementById('recycledMetadata').textContent = 'Recycled Metadata: ' + data.recycledMetadata.join(', ');
    })
    .catch(error => console.error('Error:', error));
});

let moneyAmount = 0;
const vaultGoal = 1000;
const events = [
    { name: 'Climatic Change', impact: -50 },
    { name: 'Earth Pole Change', impact: -100 },
    { name: 'Asteroid Impact', impact: -200 },
    { name: 'Human War', impact: -150 },
    { name: 'Economic Boom', impact: 200 },
    { name: 'Technological Advancement', impact: 100 }
];

function addMoney() {
    moneyAmount += 100; // Adjust amount as needed
    document.getElementById("moneyAmount").textContent = "€" + moneyAmount;

    // Create and animate cash rolls
    const cashRoll = document.createElement("div");
    cashRoll.textContent = "💰"; // You can use any symbol for cash
    cashRoll.classList.add("cash-roll");
    document.body.appendChild(cashRoll);

    // Animate cash falling into the vault
    const vault = document.getElementById("vault");
    const cashClone = cashRoll.cloneNode(true);
    cashClone.style.position = 'absolute';
    cashClone.style.top = '0';
    cashClone.style.left = '50%';
    vault.appendChild(cashClone);

    // Remove the cash roll after animation ends
    cashRoll.addEventListener("animationend", () => {
        cashRoll.remove();
    });

    // Remove the cash clone after falling into the vault
    setTimeout(() => {
        cashClone.remove();
    }, 1000); // Match with the duration of the animation

    checkGoal();
}

function checkGoal() {
    if (moneyAmount >= vaultGoal) {
        alert("Congratulations! You've reached the vault goal!");
    }
}

function randomEvent() {
    const event = events[Math.floor(Math.random() * events.length)];
    moneyAmount += event.impact;
    if (moneyAmount < 0) moneyAmount = 0;
    document.getElementById("moneyAmount").textContent = "€" + moneyAmount;
    logEvent(event.name, event.impact);
}

function logEvent(name, impact) {
    const eventLog = document.getElementById("eventLog");
    const logEntry = document.createElement("p");
    logEntry.textContent = `${name} occurred! Impact: ${impact >= 0 ? '+' : ''}${impact}`;
    eventLog.appendChild(logEntry);
}

function showNotification() {
    const notifications = [
        "You have a new message from Metaverse-Chat!",
        "Metaverse-Chat: Your friend just posted a new update!",
        "Metaverse-Chat: Check out the latest news in your network.",
        "Metaverse-Chat: You have 3 new notifications."
    ];
    const notification = notifications[Math.floor(Math.random() * notifications.length)];

    const notificationDiv = document.createElement("div");
    notificationDiv.classList.add("notification");
    notificationDiv.textContent = notification;

    document.body.appendChild(notificationDiv);

    setTimeout(() => {
        notificationDiv.remove();
    }, 5000); // Remove notification after 5 seconds
}

document.getElementById('wormForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const metaverseData = document.getElementById('metaverseData').value;

    fetch('digital-worm.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'metaverseData=' + encodeURIComponent(metaverseData),
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('cleanedData').textContent = 'Cleaned Metaverse Data: ' + data.cleanedData;
        document.getElementById('recycledMetadata').textContent = 'Recycled Metadata: ' + data.recycledMetadata.join(', ');
    })
    .catch(error => console.error('Error:', error));
});

setInterval(randomEvent, 5000); // Trigger random events every 5 seconds
setInterval(showNotification, 10000); // Show notification every 10 seconds
