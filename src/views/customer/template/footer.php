    </div>
    <div class="kanan">
        <div class="navbar">
            <button class="btnnav acc"><p class="namesidebar">Hello, <?= $_SESSION['name'] ?></p></button>
            <button onclick="location.href='<?= BASEURL . '/customer/dashboard' ?>'" type="button" class="btnnav"><span class="material-symbols-outlined">home</span>Dashboard</button>
            <button onclick="location.href='<?= BASEURL . '/customer/book' ?>'" type="button" class="btnnav"><span class="material-symbols-outlined">book_2</span>Book</button>
            <button onclick="location.href='<?= BASEURL . '/logout' ?>'" type="button" class="btnnavlo"><span class="material-symbols-outlined">logout</span>Logout</button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const minusBtns = document.querySelectorAll(".minus-btn");
            const plusBtns = document.querySelectorAll(".plus-btn");
            const quantityInputs = document.querySelectorAll(".quantity-input");

            minusBtns.forEach(function(minusBtn, index) {
                minusBtn.addEventListener("click", function() {
                    let currentValue = parseInt(quantityInputs[index].value);
                    if (currentValue > 0) {
                        quantityInputs[index].value = currentValue - 1;
                    }
                });
            });

            plusBtns.forEach(function(plusBtn, index) {
                plusBtn.addEventListener("click", function() {
                    let currentValue = parseInt(quantityInputs[index].value);
                    quantityInputs[index].value = currentValue + 1;
                });
            });
        });
    </script>
</body>
</html>