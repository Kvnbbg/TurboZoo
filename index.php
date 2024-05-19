<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Worm Extraction</title>
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
            left: 0;
            animation: roll 1s linear infinite;
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

    <script>
        let moneyAmount = 0;

        function addMoney() {
            moneyAmount += 100; // Adjust amount as needed
            document.getElementById("moneyAmount").textContent = "€" + moneyAmount;

            // Create and animate cash rolls
            const cashRoll = document.createElement("div");
            cashRoll.textContent = "💰"; // You can use any symbol for cash
            cashRoll.classList.add("cash-roll");
            document.body.appendChild(cashRoll);

            // Remove the cash roll after animation ends
            cashRoll.addEventListener("animationend", () => {
                cashRoll.remove();
            });
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
    </script>
</body>
</html>
