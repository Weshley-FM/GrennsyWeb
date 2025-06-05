<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaction Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3fdf4;
            color: #2e7d32;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #2e7d32;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #a5d6a7;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #81c784;
            color: white;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 6px;
            border: 1px solid #c8e6c9;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>

    <h2>🧾 Add Items (Vegetables & More)</h2>

    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf

        <table id="items-table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="items-body">
                <tr>
                    <td><input type="text" name="items[0][name]" required></td>
                    <td><input type="number" name="items[0][quantity]" min="1" value="1" required onchange="updateTotal(this)"></td>
                    <td><input type="number" name="items[0][price]" step="0.01" value="0.00" required onchange="updateTotal(this)"></td>
                    <td class="item-total">0.00</td>
                </tr>
            </tbody>
        </table>

        <button type="button" onclick="addItem()">+ Add Another Item</button>
        <br>
        <h3>Total: <span id="grand-total">0.00</span></h3>

        <button type="submit">Submit Transaction</button>
    </form>

    <script>
        let index = 1;

        function addItem() {
            const body = document.getElementById('items-body');
            const row = document.createElement('tr');

            row.innerHTML = `
                <td><input type="text" name="items[${index}][name]" required></td>
                <td><input type="number" name="items[${index}][quantity]" min="1" value="1" required onchange="updateTotal(this)"></td>
                <td><input type="number" name="items[${index}][price]" step="0.01" value="0.00" required onchange="updateTotal(this)"></td>
                <td class="item-total">0.00</td>
            `;

            body.appendChild(row);
            index++;
        }

        function updateTotal(el) {
            const row = el.closest('tr');
            const qty = row.querySelector('input[name*="[quantity]"]').value;
            const price = row.querySelector('input[name*="[price]"]').value;
            const total = (qty * price).toFixed(2);
            row.querySelector('.item-total').textContent = total;

            updateGrandTotal();
        }

        function updateGrandTotal() {
            let total = 0;
            document.querySelectorAll('.item-total').forEach(td => {
                total += parseFloat(td.textContent);
            });
            document.getElementById('grand-total').textContent = total.toFixed(2);
        }

        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', updateTotal);
        });
    </script>

</body>
</html>
