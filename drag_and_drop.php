<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Basket Game</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional: Add CSS for styling -->
</head>
<style>
  .fruit {
    width: 100px;
    height: 50px;
    background-color: #f1c40f; /* Yellow color for fruits */
    text-align: center;
    line-height: 50px;
    cursor: move; /* Change cursor to indicate draggable */
    margin-bottom: 10px;
}

.basket {
    width: 200px;
    height: 100px;
    background-color: #3498db; /* Blue color for baskets */
    text-align: center;
    line-height: 100px;
    color: white;
    margin-top: 20px;
}
  
  </style>
<body>
    <div class="fruit" id="apple" draggable="true">Apple</div>
    <div class="fruit" id="banana" draggable="true">Banana</div>
    <div class="fruit" id="orange" draggable="true">Orange</div>
    
    <div class="basket" id="appleBasket">Apple Basket</div>
    <div class="basket" id="bananaBasket">Banana Basket</div>
    <div class="basket" id="orangeBasket">Orange Basket</div>

    <script>
  // Get all fruit elements
const fruits = document.querySelectorAll('.fruit');

// Loop through each fruit and add event listeners for drag start and drag end
fruits.forEach(fruit => {
    fruit.addEventListener('dragstart', dragStart);
    fruit.addEventListener('dragend', dragEnd);
});

// Function to handle drag start
function dragStart(event) {
    event.dataTransfer.setData('text/plain', ''); // Required for Firefox
    event.target.classList.add('dragging'); // Add a class for styling
}

// Function to handle drag end
function dragEnd(event) {
    event.target.classList.remove('dragging'); // Remove the dragging class
}

// Get all basket elements
const baskets = document.querySelectorAll('.basket');

// Loop through each basket and add event listeners for drag over, drag enter, drag leave, and drop
baskets.forEach(basket => {
    basket.addEventListener('dragover', dragOver);
    basket.addEventListener('dragenter', dragEnter);
    basket.addEventListener('dragleave', dragLeave);
    basket.addEventListener('drop', drop);
});

// Function to handle drag over
function dragOver(event) {
    event.preventDefault(); // Prevent default behavior
}

// Function to handle drag enter
function dragEnter(event) {
    event.preventDefault(); // Prevent default behavior
    this.classList.add('hovered'); // Add a class for styling
}

// Function to handle drag leave
function dragLeave() {
    this.classList.remove('hovered'); // Remove the hovered class
}

// Function to handle drop
function drop(event) {
    event.preventDefault(); // Prevent default behavior
    const draggedElement = document.querySelector('.dragging');
    const fruitId = draggedElement.id;
    const basketId = this.id;

    // Check if the dropped fruit matches the basket
    if (basketId === fruitId + "Basket") {
        this.appendChild(draggedElement); // Append the dragged element to the drop zone
    }
    this.classList.remove('hovered'); // Remove the hovered class
}

  
  </script> <!-- JavaScript file to handle drag and drop functionality -->
</body>
</html>
