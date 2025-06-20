@extends('frontend.inc.main')
@section('title')
    {{-- <title>DONQUIXOTE | KAMAR #{{ $room->no }}</title> --}}
@endsection

@section('content')

<section class="contact-section py-5 bg-light" id="contact">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Get In Touch</h2>
            <p class="section-subtitle">We'd love to hear from you. Reach out anytime!</p>
        </div>
        
        <div class="row g-4">
            <!-- Map Column -->
                     <div class="col-lg-7 col-md-6">
    <div class="contact-map-container h-100">
        <div class="ratio ratio-16x9">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13271.954276809676!2d-5.003211!3d34.035441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzTCsDAyJzA3LjYiTiA1wrAwMCcxMS42Ilc!5e0!3m2!1sfr!2sma!4v1716480000000!5m2!1sfr!2sma"
                class="rounded shadow-sm" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="map-overlay-content">
            <div class="badge bg-white text-dark p-2">
                <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                <span>Av. Hassan II, Fès 30050, Maroc</span>
            </div>
        </div>
    </div>
</div>
            
            <!-- Contact Info Column -->
            <div class="col-lg-5 col-md-6">
                <div class="contact-info-card h-100">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <!-- Contact Methods -->
                            <div class="contact-methods mb-4">
                                <h4 class="mb-4"><i class="bi bi-headset me-2"></i> Contact Methods</h4>
                                
                                <div class="contact-method d-flex mb-3">
                                    <div class="method-icon bg-primary-light rounded-circle flex-shrink-0 me-3">
                                        <i class="bi bi-telephone text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Reservations</h6>
                                        <a href="tel:+625555555555" class="text-decoration-none">+62 555 5555 555</a>
                                    </div>
                                </div>
                                
                                <div class="contact-method d-flex mb-3">
                                    <div class="method-icon bg-primary-light rounded-circle flex-shrink-0 me-3">
                                        <i class="bi bi-whatsapp text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">WhatsApp</h6>
                                        <a href="https://wa.me/625555555555" class="text-decoration-none">+62 555 5555 555</a>
                                    </div>
                                </div>
                                
                                <div class="contact-method d-flex">
                                    <div class="method-icon bg-primary-light rounded-circle flex-shrink-0 me-3">
                                        <i class="bi bi-envelope text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Email</h6>
                                        <a href="mailto:reservations@hotelsamari.com" class="text-decoration-none">info@belahotel.com</a>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <!-- Social Media -->
                            <div class="social-media mb-4">
                                <h4 class="mb-4"><i class="bi bi-people me-2"></i> Follow Us</h4>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="#" class=" btn btn-outline-primary rounded-circle">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class=" btn btn-outline-primary rounded-circle">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                    
                                    </a>
                                    <a href="#" class=" btn btn-outline-primary rounded-circle">
                                        <i class="bi bi-youtube"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <!-- Business Hours -->
                            <div class="business-hours">
                                <h4 class="mb-4"><i class="bi bi-clock me-2"></i> Business Hours</h4>
                                <ul class="list-unstyled">
                                    <li class="d-flex justify-content-between mb-2">
                                        <span>Monday - Friday</span>
                                        <span class="text-dark fw-medium">8:00 AM - 10:00 PM</span>
                                    </li>
                                    <li class="d-flex justify-content-between mb-2">
                                        <span>Saturday</span>
                                        <span class="text-dark fw-medium">9:00 AM - 11:00 PM</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <span>Sunday</span>
                                        <span class="text-dark fw-medium">10:00 AM - 9:00 PM</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact Form (Optional) -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <h4 class="mb-4">Send Us a Message</h4>
                        <form class="contact-form">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="col-12">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" required>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="4" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-send me-2"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Contact Section Styles */
    .contact-section {
        background-color: #f8f9fa;
    }
    
    .section-header {
        position: relative;
    }
    
    .section-title {
        font-weight: 700;
        color: #2c3e50;
        position: relative;
        display: inline-block;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: #e74c3c;
    }
    
    .section-subtitle {
        color: #6c757d;
        font-size: 1.1rem;
    }
    
    .contact-map-container {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .map-overlay-content {
        position: absolute;
        bottom: 20px;
        left: 20px;
        z-index: 10;
    }
    
    .contact-info-card {
        height: 100%;
    }
    
    .method-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .bg-primary-light {
        background-color: rgba(52, 152, 219, 0.1);
    }
    
    .social-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .social-icon:hover {
        background-color: #3498db;
        color: white !important;
        transform: translateY(-3px);
    }
    
    .contact-form .form-control {
        border: 1px solid #dee2e6;
        padding: 10px 15px;
    }
    
    .contact-form .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
    }
    
    @media (max-width: 768px) {
        .contact-map-container {
            margin-bottom: 20px;
        }
        
        .map-overlay-content {
            position: relative;
            bottom: auto;
            left: auto;
            margin-top: 10px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Simple form validation for the contact form
        const contactForm = document.querySelector('.contact-form');
        
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Simple validation - in a real app you would add more robust validation
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const message = document.getElementById('message').value;
                
                if (name && email && message) {
                    // Here you would typically send the form data to your server
                    alert('Thank you for your message! We will get back to you soon.');
                    contactForm.reset();
                } else {
                    alert('Please fill in all required fields.');
                }
            });
        }
    });
</script>

@endsection
