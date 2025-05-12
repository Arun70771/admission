<section id="footer-bottom" class="text-white py-4">
    <div class="container">
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <!-- Logo Section -->
                    <div class="col-md-3 mb-3">
                        <div class="footer-logo">    
                        <a href="index.html"> 
                            <img src="{{ asset('web/images/sau_log.png') }}" class="mb-2" alt="Logo"></a>
                            <p style="font-size: 0.8rem; text-align: left !important; font-weight: normal; line-height: 1.5;"> <i class="fa-solid fa-location-dot"></i> Rajpur Road, Maidan Garhi, New Delhi 110068, 011-35656600</p>
                        </div>
                    </div>
                    <!-- Links Section -->
                    <div class="col-md-3 mb-3">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="http://ae.sau.ac.in/modes-of-admission/" target="_blank">Modes of Admission</a></li>
                            <li><a href="http://ae.sau.ac.in/fee-details/" target="_blank">Fee Structure</a></li>
                            <li><a href="https://alumni.sau.int/" target="_blank">SAU Alumni</a></li>
                            <li><a href="https://sau.int/about/alumni-association/" target="_blank">Alumni
                                    Association</a></li>
                            <li><a href="https://sau.int/about/issues-of-sexual-harrasment/" target="_blank">Anti-Sexual
                                    Harassment
                                    Policy</a></li>
                            <li><a href="/admin/login" target="_blank">Admin Login</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 mb-3 ">
                        <h5>Contact Us</h5>
                        <ul class="list-unstyled">
                            <p class="fw-bold mb-0 p-0" style="font-size: 0.8rem;">Offline Admissions</p>
                            <li><a href=""><i class="fa-regular fa-envelope"></i> admission@sau.int</a></li>
                            <li><a href=""><i class="fa-solid fa-phone"></i> +011-35656600</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <p class="fw-bold mb-0 p-0" style="font-size: 0.8rem;">Virtual Campus</p>
                            <li><a href=""><i class="fa-regular fa-envelope"></i> info@vc.sau.int</a></li>
                            <li><a href=""><i class="fa-solid fa-phone"></i> +011-35656600</a></li>
                        </ul>
                    </div>

                    <!-- Feedback Section -->
                    <div class="col-md-3 text-center">
                        <h5>Connect with us</h5>
                        <div class="social-icons">
                            <a href="https://www.youtube.com/user/southasianuniversity">
                                <img src="{{asset('web/images/youtube.png')}}" alt="">
                            </a>
                            <a href="https://www.instagram.com/southasianuniversity/">
                                <img src="{{asset('web/images/insta.png')}}" alt="">
                            </a>
                            <a href="https://www.linkedin.com/school/south-asian-university/">
                                <img src="{{asset('web/images/linkedin.png')}}" alt="">
                            </a>
                            <a href="https://www.facebook.com/southasianuniversity/">
                                <img src="{{asset('web/images/fb.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</section>
<div class="container-fluid copy-write">
    <div class="text-center">
        <p>© 2025 Copyright. All rights reserved.</p>
    </div>
</div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
    ></script>

        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById("sidebar");
                const body = document.body;
                sidebar.classList.toggle("show");
                // body.classList.toggle("sidebar-open");
            }
        </script>
</body>
</html>
