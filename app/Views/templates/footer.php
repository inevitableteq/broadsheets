<?php
/**
 * Bootstrap 5.3 Compatible Footer for CodeIgniter 4
 * Put this file in: app/Views/templates/footer.php
 */
?>
</main> <footer class="site-footer bg-dark text-light pt-5 pb-3 mt-auto">
    <div class="container">
        <div class="row text-center text-md-start">
            
            <div class="col-md-4 mb-4">
                <h5 class="footer-heading text-uppercase text-primary mb-3">About Us</h5>
                <p class="text-muted small">
                    Building next-generation modern web applications using modern layouts with CodeIgniter 4 and Bootstrap 5.3. Clean, secure, efficient, and blazing fast.
                </p>
            </div>
            
            <div class="col-md-4 mb-4">
                <h5 class="footer-heading text-uppercase text-primary mb-3">Quick Navigation</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="<?= base_url(); ?>" class="text-muted text-decoration-none">Home</a></li>
                    <li><a href="<?= base_url('about'); ?>" class="text-muted text-decoration-none">About Company</a></li>
                    <li><a href="<?= base_url('services'); ?>" class="text-muted text-muted text-decoration-none">Our Services</a></li>
                    <li><a href="<?= base_url('contact'); ?>" class="text-muted text-decoration-none">Contact Support</a></li>
                </ul>
            </div>
            
            <div class="col-md-4 mb-4">
                <h5 class="footer-heading text-uppercase text-primary mb-3">Contact Info</h5>
                <p class="text-muted small mb-1"><strong class="text-light">Address:</strong> 123 Framework Street, Tech City</p>
                <p class="text-muted small mb-1"><strong class="text-light">Email:</strong> support@yourdomain.com</p>
                <p class="text-muted small"><strong class="text-light">Phone:</strong> +1 (555) 019-2834</p>
            </div>
            
        </div>
        
        <hr class="border-secondary my-4">
        
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                <p class="small mb-0 text-muted">&copy; <?= date('Y'); ?> Your Company Name. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <span class="small text-muted me-2">Powered by CodeIgniter 4 & Bootstrap 5.3</span>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>