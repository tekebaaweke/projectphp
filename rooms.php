<?php
$pageTitle = 'Our Rooms';
include 'header.php';
?>
     
     <!-- Rooms Section -->
    <section class="rooms" id="rooms">
        <h2 class="section-title">Our Rooms</h2>
        <div class="rooms-container">
            <div class="room-card">
                <div class="room-img">
                    <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Deluxe Room">
                </div>
                <div class="room-info">
                    <h3>Arrive  Room</h3>
                    <p><b>20 Room Arrives</b></p>
                    <p class="room-price">300 birr/night</p>
                    <div class="room-features">
                        <div class="room-feature">
                            <i class="fas fa-user-friends"></i>
                            <span>2 Guests</span>
                        </div>
                        <div class="room-feature">
                            <i class="fas fa-bed"></i>
                            <span>1Bed</span>
                        </div>
                    </div>
                    <p>Spacious room with modern amenities and stunning city views.</p>
                    <button class="btn" style="margin-top: 1rem;">Book Now</button>
                </div>
            </div>
            <div class="room-card">
                <div class="room-img">
                    <img src="https://images.unsplash.com/photo-1586105251261-72a756497a11?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Executive Suite">
                </div>
                <div class="room-info">
                    <h3>Executive Suite</h3>
                    <p class="room-price">350 birr/night</p>
                    <div class="room-features">
                        <div class="room-feature">
                            <i class="fas fa-user-friends"></i>
                            <span>4 Guests</span>
                        </div>
                        <div class="room-feature">
                            <i class="fas fa-bed"></i>
                            <span> 2 Beds</span>
                        </div>
                    </div>
                    <p>Luxurious suite with separate living area and premium amenities.</p>
                    <button class="btn" style="margin-top: 1rem;">Book Now</button>
                </div>
            </div>
            <div class="room-card">
                <div class="room-img">
                    <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Presidential Suite">
                </div>
                <div class="room-info">
                    <h3>Presidential Suite</h3>
                    <p class="room-price">500 birr/night</p>
                    <div class="room-features">
                        <div class="room-feature">
                            <i class="fas fa-user-friends"></i>
                            <span>1 Guest</span>
                        </div>
                        <div class="room-feature">
                            <i class="fas fa-bed"></i>
                            <span>1 Bed</span>
                        </div>
                    </div>
                    <p>Ultimate luxury with panoramic views and exclusive services.</p>
                    <button class="btn" style="margin-top: 1rem;">Book Now</button>
                </div>
            </div>
        </div>
        
    </section>

<?php include 'footer.php'; ?>