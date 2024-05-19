<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Worm Extraction Game</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Define animation for cash rolls */
        @keyframes roll {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(100%); }
        }
        .cash-roll {
            position: absolute;
            top: 0;
            left: 50%;
            animation: roll 1s linear infinite;
            font-size: 2em;
        }
        /* Vault area */
        #vault {
            width: 100px;
            height: 100px;
            border: 2px solid #000;
            border-radius: 10px;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Digital Worm Extraction</h1>
        <div class="form-container">
            <form id="wormForm">
                <label for="metaverseData">Metaverse Data:</label>
                <textarea id="metaverseData" name="metaverseData" rows="5">In this virtual world, fear and anxiety creep into every corner. Insecurity lurks, threatening to undermine progress.</textarea>
                <button type="submit">Extract Worm</button>
            </form>
        </div>
        <div class="results">
            <h2>Results</h2>
            <p id="cleanedData">Cleaned Metaverse Data: </p>
            <p id="recycledMetadata">Recycled Metadata: </p>
        </div>
    </div>
    <div id="coffreFort">
        Coffre Fort: <span id="moneyAmount">€0</span>
    </div>
    <button onclick="addMoney()">Add Money</button>
    <button onclick="window.open('digital-worm.php', '_blank')">Open Digital Worm PHP</button>
    <div id="vault"></div>
    <div id="eventLog"></div>

    <script>
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
    </script>
</body>
</html>
