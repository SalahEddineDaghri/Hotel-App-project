<!-- Premium Facilities Section -->
<div class="container facilities-container">
    <div class="section-header text-center mb-5">
        <h2>Premium Facilities</h2>
        <p class="lead text-muted">Experience unparalleled comfort with our world-class amenities</p>
    </div>
    
    <div class="row g-4">
        <div class="col-md-4 col-6">
            <div class="facility-card text-center p-4 h-100">
                <div class="icon-box mx-auto mb-4">
                    <img src="/frontend/img/fasilitas/1.jpg" alt="Swimming Pool" class="img-fluid rounded-circle">
                </div>
                <h5>Infinity Pool</h5>
                <p class="text-muted mb-0">Stunning panoramic views while you swim</p>
            </div>
        </div>
        <div class="col-md-4 col-6">
            <div class="facility-card text-center p-4 h-100">
                <div class="icon-box mx-auto mb-4">
                    <img src="/frontend/img/fasilitas/2.jpg" alt="Wifi" class="img-fluid rounded-circle">
                </div>
                <h5>High-Speed WiFi</h5>
                <p class="text-muted mb-0">Fiber-optic connection throughout property</p>
            </div>
        </div>
        <div class="col-md-4 col-6">
            <div class="facility-card text-center p-4 h-100">
                <div class="icon-box mx-auto mb-4">
                    <img src="/frontend/img/fasilitas/3.jpg" alt="Breakfast" class="img-fluid rounded-circle">
                </div>
                <h5>Gourmet Breakfast</h5>
                <p class="text-muted mb-0">International & local cuisine buffet</p>
            </div>
        </div>
        <div class="col-md-4 col-6">
            <div class="facility-card text-center p-4 h-100">
                <div class="icon-box mx-auto mb-4">
                    <img src="/frontend/img/fasilitas/4.jpg" alt="Spa" class="img-fluid rounded-circle">
                </div>
                <h5>Luxury Spa</h5>
                <p class="text-muted mb-0">Traditional Balinese treatments</p>
            </div>
        </div>
        <div class="col-md-4 col-6">
            <div class="facility-card text-center p-4 h-100">
                <div class="icon-box mx-auto mb-4">
                    <img src="/frontend/img/fasilitas/5.jpg" alt="Fitness" class="img-fluid rounded-circle">
                </div>
                <h5>Fitness Center</h5>
                <p class="text-muted mb-0">24/7 access with premium equipment</p>
            </div>
        </div>
        <div class="col-md-4 col-6">
            <div class="facility-card text-center p-4 h-100">
                <div class="icon-box mx-auto mb-4">
                    <img src="/frontend/img/fasilitas/6.jpg" alt="Concierge" class="img-fluid rounded-circle">
                </div>
                <h5>Personal Concierge</h5>
                <p class="text-muted mb-0">Tailored experiences just for you</p>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-5">
        <a href="#contact" class="btn btn-outline-primary px-4">Inquire About Facilities</a>
    </div>
</div>
<style>
    /* Global Styles */
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #e74c3c;
        --accent-color: #3498db;
        --light-bg: #f8f9fa;
        --dark-bg: #343a40;
        --text-color: #333;
        --text-light: #6c757d;
    }
    
    body {
        font-family: 'Montserrat', sans-serif;
        line-height: 1.6;
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-weight: 700;
    }
    
    .lead {
        font-weight: 400;
    }
    
    .section-header {
        position: relative;
        padding-bottom: 15px;
    }
    
    .section-header:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: var(--secondary-color);
    }
    
    /* Hero Swiper */
    .hero-swiper-container {
        height: 100vh;
        min-height: 600px;
    }
    
    .hero-swiper {
        height: 100%;
    }
    
    .hero-slide {
        height: 100%;
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
    }
    
    .hero-slide:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
    }
    
    .hero-content {
        position: relative;
        z-index: 1;
        color: white;
        max-width: 800px;
    }
    
    .hero-title {
        font-size: 3.5rem;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    
    .hero-subtitle {
        font-size: 1.5rem;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }
    
    /* Booking Widget */
    .booking-widget-container {
        margin-top: -100px;
        position: relative;
        z-index: 10;
    }
    
    .booking-card {
        border-radius: 10px;
        overflow: hidden;
    }
    
    .booking-form {
        background: white;
    }
    
    .booking-promo {
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    }
    
    .promo-content {
        max-width: 250px;
    }
    
    /* Rooms Section */
    .room-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .room-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .room-image {
        height: 250px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .room-card:hover .room-image {
        transform: scale(1.05);
    }
    
    .room-badge {
        z-index: 2;
    }
    
    .room-meta {
        color: var(--text-light);
        font-size: 0.9rem;
    }
    
    /* Facilities Section */
    .facility-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    
    .facility-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-color: var(--accent-color);
    }
    
    .icon-box {
        width: 100px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(52, 152, 219, 0.1);
        border-radius: 50%;
    }
    
    /* Contact Section */
    .contact-container {
        position: relative;
    }
    
    .map-container {
        height: 100%;
        min-height: 300px;
    }
    
    /* Testimonials */
    .testimonials {
        background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('/nyoba/images/carousel/4.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    /* Special Offers */
    .special-offers {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    }
    
    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
        }
    }
    
    @media (max-width: 768px) {
        .booking-widget-container {
            margin-top: 0;
        }
        
        .hero-title {
            font-size: 2rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
        }
    }
</style>
