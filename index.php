<!DOCTYPE html>
<html>
  <head>
    <title>Coffre Fort</title>
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
    <div id="coffreFort">
      Coffre Fort: <span id="moneyAmount">€0</span>
    </div>
    <button onclick="addMoney()">Add Money</button>

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
    </script>
  </body>
</html>