<footer class="footer">
  <section class="footer__join-section">
    <div>
      <h3 class="footer__join-title">Join our newsletter</h3>
      <p class="footer__join-description">We'll send you a nice letter once per week. No spam.</p>
    </div>

    <?php
    $email = $email_error = $email_success = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["email"])) {
        $email_error = "Email address is required.";
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $email_error = "Please enter a valid email address.";
        } else {
          $connection->query('INSERT INTO newsletter VALUES ("' . $email . '")');
          $email_success = "Subscription successful! Please check your email to confirm.";
        }
      }
    }

    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>

    <form class="footer__join-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input class="footer__join-input" type="email" name="email" placeholder="Enter your email">
      <button class="footer__join-btn">Subscribe</button>
    </form>
    <div class="footer__error"><?php echo $email_error; ?></div>
    <div class="footer__success"><?php echo $email_success; ?></div>
    </div>
  </section>

  <section class="footer__links-section">
    <div class="footer__logo-container">
      <a href="home.php"><img src=" img/stylenest.svg" alt="stylenest logo"></a>
      <h3 class="footer__logo-description">Craft stunning style journeys that weave more joy into every thread.</h3>
    </div>

    <div class="footer__links-container">
      <div class="footer__links-listing categories">
        <h4 class="footer__links-listing-heading">SHOP CATEGORIES</h4>
        <ul>
          <li class="footer__links-listing-item"><a href="products.php?category[]=unisex">Unisex</a></li>
          <li class="footer__links-listing-item"><a href="products.php?category[]=women">Women</a></li>
          <li class="footer__links-listing-item"><a href="products.php?category[]=men">Men</a></li>
        </ul>
      </div>

      <div class=" footer__links-listing">
        <h4 class="footer__links-listing-heading">SHOP COLLECTIONS</h4>
        <ul>
          <li class="footer__links-listing-item"><a href="products.php?collections[]=latest-arrivals">Latest arrivals</a></li>
          <li class="footer__links-listing-item"><a href="products.php?collections[]=urban">Urban Oasis</a></li>
          <li class="footer__links-listing-item"><a href="products.php?collections[]=cozy">Cozy Comfort</a></li>
          <li class="footer__links-listing-item"><a href="products.php?collections[]=fresh">Fresh Fusion</a></li>
        </ul>
      </div>
    </div>
  </section>

  <section class="footer__copyright-socials-section">
    <p class="footer__copyright">© 2024 StyleNest, Inc. All rights reserved.</p>

    <div class="footer__socials">
      <a href="https://www.youtube.com/"><i class="ri-youtube-line ri-xl"></i></a>
      <a href="https://www.instagram.com/"><i class="ri-instagram-line ri-xl"></i></a>
      <a href="https://www.facebook.com/"><i class="ri-facebook-box-line ri-xl"></i></a>
      <a href="https://github.com/"><i class="ri-github-line ri-xl"></i></a>
      <a href="https://x.com"><i class="ri-twitter-x-line ri-xl"></i></a>
    </div>
  </section>
</footer>