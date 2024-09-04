<?php
require_once 'includes/dbh.inc.php';

$query="SELECT * FROM menu";
$result=mysqli_query($conn,$query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Café</title>
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="style.css">
<style>
    .current-order {
    width: 50%;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.order-items {
    
    overflow-y: auto;
    margin-bottom: 20px;

}

.order-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.order-item-img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
}

.order-item-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-grow: 1;
}

.price {
    font-weight: bold;
    color: #333;
}

.quantity-control {
    display: flex;
    align-items: center;
}

.quantity-btn {
    padding: 5px;
    background-color: #f0f0f0;
    border: none;
    cursor: pointer;
    margin: 0 5px;
}

.order-summary {
    padding: 10px 0;
    border-top: 1px solid #e0e0e0;
    margin-top: 0px;
    width: 50%;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    padding: 5px 0;
}

.summary-total {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
    padding-top: 10px;
}

.payment-button {
    width: 100%;
    padding: 10px;
    background-color: #ff6f00;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-size: medium;
    margin-top: 10px;
}

.payment-button:hover {
    background-color: #e65c00;
}
</style>
</head>

<body>
    <header>
        <h1>The Gallery Café</h1>
    </header><br>


    <header class="functions">
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#reservations">Reservations</a></li>
                <li><a href="#specials">Specials</a></li>
                <li><a href="#login">Reviews</a></li>
                <li><a href="#about">About Us</a></li>

            </ul>
        </nav>
    </header>








    <!-- home page -->


    <section class="home" id="home">

        <div class="content">
            <h3>Savor the Flavor... Relish the Moment.....</h3>

            <p>
                Welcome to The Gallery Café, where every dish is a masterpiece and every moment is a delight. Enjoy
                artfully crafted meals in a cozy, inviting setting.
            </p>

        </div>


    </section>



    <!-- menu page -->

    <section class="menu" id="menu">
        <div>
            <h2>ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo
            </h2>
            <h2>Menu</h2>


            <div>
                <input class="search" type="text" id="searchCuisine" placeholder="Search by Cuisine"><br><br>
            </div>

            <div class="menu-container">
                <div id="menuItems">

                </div>

                <div id="menuImages">
                    <img src="img/img17.jpg" alt="">
                    <img src="img/img18.jpg" alt="">
                    <img src="img/img19.jpg" alt="">
                    <img src="img/img20.jpg" alt="">
                    <img src="img/img22.jpg" alt="">
                    <img src="img/img21.jpg" alt="">
                </div>
            </div>
        </div>

    </section>








    <div id="orderMessage" class="hidden">Your Order has been Confirmed.</div>



    <!-- table reservations -->


    <section id="reservations" class="reservations">
        <h2>---------------</h2>
        <h2>Reserve a Table</h2>
        <form id="reservationForm">

            <label class="name" for="name">Name:</label>
            <input type="text" id="name" size="" required>

            <label class="email" for="email">Email:</label>
            <input type="email" id="email" required>

            <label class="date" for="date">Date:</label>
            <input type="date" id="date" required>

            <label class="time" for="time">Time:</label>
            <input type="time" id="time" required>

            <label class="guests" for="guests">Number of Guests:</label>
            <input type="number" id="guests" required>

            <button type="submit">Reserve</button>

        </form>
    </section>





    <!-- specials -->



    <section class="specials" id="specials">

        <div>
            <h2>Specials</h2>
        </div>

        <div id="special-Items"></div>

        <div>
            <h2>....</h2><br>

            <h2>Beverages</h2>

            <div class="specials-container">
                <div id="specialItems">
                    <div class="special-item">
                    <?php
                    while($row=mysqli_fetch_assoc($result)){
                      ?>
                       <div class="special-item">
                      <h3><?php echo $row['itemName']; ?></h3>
                       <p>Price: Rs.<?php echo $row['price']; ?></p>
                       <button class="order-button" 
                        data-item-name="<?php echo $row['itemName']; ?>" 
                        data-price="<?php echo $row['price']; ?>">Order</button>                                  
                      </div>              
                      <?php
                    }
                    ?>
                                      
                        
                    </div>
                  
                </div>

               
    <section class="current-order" id="currentOrder">
        <div class="order-header">
            <h2>Current Order</h2>
            <button class="order-settings">⚙</button>
        </div>

        <div class="order-items" id="orderItems">
            <!-- Order items will be dynamically added here -->
        </div>
      
    
                <div class="order-summary">
                         <div class="summary-total">
                        <p>Total</p>
                        <p id="total">$34.86</p>
                    </div>
                   <button class="payment-button" id="confirmPayment">Confirm Payment</button>
                </div>
            </section>
        

                </div>
            </div>
        </div>



    </section>






    <!-- Reviews -->


    <section id="login">
        <h2>Customer Reviews</h2>

        <div class="reviews-section">
            <h1>Our Customers</h1>
            <div class="review-summary">
                <h2>Reviews</h2>
                <p>4.5 <span>★</span> <span>Over 135 Reviews</span></p>
                <button>Write a Review</button>
            </div>
            <div class="reviews-grid">
                <div class="review-card">
                    <div class="review-header">
                        <img src="img/img40.jpg" alt="User Image">
                        <div>
                            <h3>Tim Timor</h3>
                            <p>3 weeks ago</p>
                        </div>
                    </div>
                    <div class="review-rating">
                        <span>★★★★★</span>
                    </div>
                    <p>What AN experience!! 5* all the way! From the time we landed to the time we were escorted back...
                    </p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <img src="img/img41.jpg" alt="User Image">
                        <div>
                            <h3>Nabee Khan</h3>
                            <p>4 weeks ago</p>
                        </div>
                    </div>
                    <div class="review-rating">
                        <span>★★★★★</span>
                    </div>
                    <p>Loved our stay at Kuda. Everyone was so accommodating and hospitable beyond expectations!</p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <img src="img/img42.jpg" alt="User Image">
                        <div>
                            <h3>Evan Ho</h3>
                            <p>1 month ago</p>
                        </div>
                    </div>
                    <div class="review-rating">
                        <span>★★★★★</span>
                    </div>
                    <p>Thanks so much to your team (and especially our butler Fatheh and Manoj) who runs...</p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <img src="img/img43.jpg" alt="User Image">
                        <div>
                            <h3>Rasha</h3>
                            <p>6 months ago</p>
                        </div>
                    </div>
                    <div class="review-rating">
                        <span>★★★★★</span>
                    </div>
                    <p>This resort is amazing, everything is amazing, the food is delicious...</p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <img src="img/img44.jpg" alt="User Image">
                        <div>
                            <h3>Anirina Emerson</h3>
                            <p>7 months ago</p>
                        </div>
                    </div>
                    <div class="review-rating">
                        <span>★★★★★</span>
                    </div>
                    <p>Good points: Very stylish and beautiful place to enjoy your holidays...</p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <img src="img/img45.jpg" alt="User Image">
                        <div>
                            <h3>Anirina Emerson</h3>
                            <p>7 months ago</p>
                        </div>
                    </div>
                    <div class="review-rating">
                        <span>★★★★★</span>
                    </div>
                    <p>Good points: Very stylish and beautiful place to enjoy your holidays...</p>
                </div>
            </div>
        </div>





    </section>










    <!-- about -->


    <section id="about">
        <h2>About Us</h2>
    </section>

    <section class="about">
        <div class="container">
            <div class="about-text">
                <h2 class="AboutOur Restaurant">About Our Restaurant</h2>
                <p>Welcome to The Gallery Café, where culinary artistry meets a warm and inviting atmosphere. Located in
                    the heart of Colombo, our restaurant is a haven for food enthusiasts who appreciate the finest in
                    Sri Lankan, Chinese, and Italian cuisines.</p>
                <p> At The Gallery Café, we believe that dining is not just about food; it’s about an experience. Our
                    dedicated team of chefs and staff are passionate about delivering a dining experience that blends
                    tradition with innovation, ensuring every dish is crafted with the freshest ingredients and utmost
                    care. Whether you're here for a casual meal, a special celebration, or a serene escape from the
                    bustling city, The Gallery Café offers a unique and memorable experience that leaves a lasting
                    impression. Join us and indulge in a culinary journey that celebrates the rich flavors and diverse
                    cultures that inspire our menu.

                </p>
            </div>
            <div class="about-image">
                <img src="img/img16.jpg" alt="Chef">
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service-items">
                <div class="service-item">
                    <i class="icon-chef"></i>
                    <h3>Best Chef</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="service-item">
                    <i class="icon-tables"></i>
                    <h3>150 Tables</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="service-item">
                    <i class="icon-wine"></i>
                    <h3>Best Wines</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="service-item">
                    <i class="icon-offers"></i>
                    <h3>Special Offers</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="service-item">
                    <i class="icon-payment"></i>
                    <h3>Card Payment</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="service-item">
                    <i class="icon-terrace"></i>
                    <h3>Terrace</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="our-team">
        <div class="container">
            <h2>Our Team</h2>
            <div class="team-members">
                <div class="team-member">
                    <img src="img/img46.jpg" >
                    <h3>John Doe</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="social-icons">
                        <a href="#"><i class="icon-facebook"></i></a>
                        <a href="#"><i class="icon-twitter"></i></a>
                        <a href="#"><i class="icon-instagram"></i></a>
                    </div>
                </div>
                <div class="team-member">
                    <img src="img/img47.jpg" alt="Team Member">
                    <h3>Jane Smith</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="social-icons">
                        <a href="#"><i class="icon-facebook"></i></a>
                        <a href="#"><i class="icon-twitter"></i></a>
                        <a href="#"><i class="icon-instagram"></i></a>
                    </div>
                </div>
                <div class="team-member">
                    <img src="img/img50.jpg" alt="Team Member">
                    <h3>Emily White</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="social-icons">
                        <a href="#"><i class="icon-facebook"></i></a>
                        <a href="#"><i class="icon-twitter"></i></a>
                        <a href="#"><i class="icon-instagram"></i></a>
                    </div>
                </div>
                <div class="team-member">
                    <img src="img/img48.jpg" alt="Team Member">
                    <h3>Michael Brown</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="social-icons">
                        <a href="#"><i class="icon-facebook"></i></a>
                        <a href="#"><i class="icon-twitter"></i></a>
                        <a href="#"><i class="icon-instagram"></i></a>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="newsletter">
                <h2>Newsletter</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <form action="#">
                    <input type="email" placeholder="Email">
                    <button type="submit">Send</button>
                </form>
            </div>
            <div class="footer-links">
                <div class="footer-column">
                    <h3>My Account</h3>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="#">My Reservation</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Information</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Working Time</h3>
                    <ul>
                        <li>Monday - Friday: 9 am to 12 am</li>
                        <li>Saturday - Sunday: 2 pm to 10 pm</li>
                        <li>Breakfast: 7 am to 12 pm</li>
                        <li>Lunch: 12 pm to 3 pm</li>
                        <li>Dinner: 7 pm to 12 am</li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul>
                        <li>129 S Main Street</li>
                        <li>New Delhi, India</li>
                        <li>+91 1234567890</li>
                        <li>info@thegallerycafe.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>



   <script>
   document.addEventListener('DOMContentLoaded', function() {
    const orderButtons = document.querySelectorAll('.order-button');
    const orderItemsContainer = document.getElementById('orderItems');
    let total = 0;
    let orders = []; 
    orderButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemName = this.getAttribute('data-item-name');
            const itemPrice = parseFloat(this.getAttribute('data-price'));

            const orderItem = document.createElement('div');
            orderItem.classList.add('order-item');

            orderItem.innerHTML = `
                <div class="order-item-info">
                    <h3>${itemName}</h3>
                    <p class="price">Rs.${itemPrice.toFixed(2)}</p>
                    <div class="quantity-control">
                        <button class="quantity-btn decrease">-</button>
                        <span class="quantity">1</span>
                        <button class="quantity-btn increase">+</button>
                    </div>
                </div>
            `;

            orderItemsContainer.appendChild(orderItem);

            const increaseBtn = orderItem.querySelector('.increase');
            const decreaseBtn = orderItem.querySelector('.decrease');
            const quantityDisplay = orderItem.querySelector('.quantity');
            let quantity = 1; 

            total += itemPrice; 
            document.getElementById('total').textContent = `Rs.${total.toFixed(2)}`;

            orders.push({ itemName, itemPrice, quantity }); 
            increaseBtn.addEventListener('click', function() {
                quantity += 1;
                quantityDisplay.textContent = quantity;
                total += itemPrice;
                document.getElementById('total').textContent = `Rs.${total.toFixed(2)}`;

                orders = orders.map(order => 
                    order.itemName === itemName ? { ...order, quantity } : order
                );
            });

            decreaseBtn.addEventListener('click', function() {
                if (quantity > 1) {
                    quantity -= 1;
                    quantityDisplay.textContent = quantity;
                    total -= itemPrice; 
                    document.getElementById('total').textContent = `Rs.${total.toFixed(2)}`;

                    orders = orders.map(order => 
                        order.itemName === itemName ? { ...order, quantity } : order
                    );
                }
            });
        });
    });

   
    document.getElementById('confirmPayment').addEventListener('click', function() {
       
        fetch('processOrder.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ orders, total })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
        })
        .catch((error) => {
            console.error('Error:', error);
            
        });
    });
});


   </script>
</body>

</html>