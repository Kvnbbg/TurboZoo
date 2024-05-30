<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Worm Extraction Game</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ddd;
        }

        #vault {
            width: 100px;
            height: 100px;
            border: 2px solid #000;
            border-radius: 10px;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
            text-align: center;
            line-height: 100px;
            font-size: 1.5em;
        }

        .cash-roll {
            position: absolute;
            top: 0;
            left: 50%;
            animation: roll 1s linear infinite;
            font-size: 2em;
        }

        @keyframes roll {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(100%); }
        }

        #eventLog {
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .light-mode {
            background-color: #f0f0f0;
            color: #000;
        }

        .dark-mode {
            background-color: #333;
            color: #fff;
        }

        #leaderboard {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.8);
        }

        #leaderboard h2 {
            text-align: center;
        }

        #leaderboard table {
            width: 100%;
            border-collapse: collapse;
        }

        #leaderboard th, #leaderboard td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        #leaderboard th {
            background-color: #f4f4f4;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: gold;
            color: black;
            margin-left: 10px;
        }
    </style>
</head>
<body class="light-mode">
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
        <div id="coffreFort">
            Coffre Fort: <span id="moneyAmount">€0 cost of purification</span>
        </div>
        <button onclick="addMoney()">Purification</button>
        <button onclick="toggleMode()">Toggle Dark/Light Mode</button>
        <div id="vault">Vault</div>
        <div id="eventLog"></div>
        <div id="leaderboard">
            <h2>Leaderboard</h2>
            <table>
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody id="leaderboardBody">
                    <tr>
                        <td>Player 1 <span class="badge">Champion</span></td>
                        <td>1500</td>
                    </tr>
                    <tr>
                        <td>Player 2</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>Player 3</td>
                        <td>900</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

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
            moneyAmount += 100;
            document.getElementById("moneyAmount").textContent = "€" + moneyAmount;

            const cashRoll = document.createElement("div");
            cashRoll.textContent = "💰";
            cashRoll.classList.add("cash-roll");
            document.body.appendChild(cashRoll);

            const vault = document.getElementById("vault");
            const cashClone = cashRoll.cloneNode(true);
            cashClone.style.position = 'absolute';
            cashClone.style.top = '0';
            cashClone.style.left = '50%';
            vault.appendChild(cashClone);

            cashRoll.addEventListener("animationend", () => {
                cashRoll.remove();
            });

            setTimeout(() => {
                cashClone.remove();
            }, 1000);

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

        function toggleMode() {
            const body = document.body;
            body.classList.toggle("dark-mode");
            body.classList.toggle("light-mode");
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

        setInterval(randomEvent, 5000);
    </script>
</body>
</html>
