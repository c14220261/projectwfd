

<div class="flex items-center space-x-2 mb-4 w-1/2 ml-4 mt-11 ">
    <input type="text" id="searchInput" placeholder="Search cars..." class="border p-2 w-full" />
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const carCards = document.querySelectorAll('.car-card');  // Update to match the class of your car items

        carCards.forEach(card => {
            const model = card.querySelector('.car-model') ? card.querySelector('.car-model').textContent.toLowerCase() : '';
            const year = card.querySelector('.car-year') ? card.querySelector('.car-year').textContent.toLowerCase() : '';
            const status = card.querySelector('.car-status') ? card.querySelector('.car-status').textContent.toLowerCase() : '';
            const rental = card.querySelector('.car-rental') ? card.querySelector('.car-rental').textContent.toLowerCase() : '';

            if (model.includes(searchTerm) || year.includes(searchTerm) || status.includes(searchTerm) || rental.includes(searchTerm)) {
                card.style.display = '';  // Show the card
            } else {
                card.style.display = 'none';  // Hide the card
            }
        });
    });
</script>
