<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $name = sanitizeInput($_POST['name']);
    $email = validateEmail($_POST['email']);
    $message = sanitizeInput($_POST['message']);

    // Escape for safe output
    $safeName = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeEmail = htmlspecialchars($email, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeMessage = htmlspecialchars($message, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // Safely echo or use these
    echo "Name: $safeName<br>Email: $safeEmail<br>Message: $safeMessage";
}

// Sanitize function: trims + strips tags
function sanitizeInput($data) {
    return trim(strip_tags($data));
}

// Validate email function
function validateEmail($email) {
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    } else {
        return 'Invalid email';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>juristjenkins portfolio</title>
  <style>
    /* Prevent Horizontal Scrolling */
    html, body {
      overflow-x: hidden;
    }

    /* Global Styles */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: Garamond, 'Times New Roman';
      /* Animated dark gradient background */
      background: linear-gradient(-45deg, #0e033d, #1f0672, #0e033d, #460a55);
      background-size: 200% 200%;
      animation: gradientBG 10s ease-in-out infinite;
      color: #edf0e0;
      line-height: 1.6;
    }
    @keyframes gradientBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    a {
      color: #1e90ff;
      text-decoration: none;
    }
    a:hover {
      text-decoration: none;
    }

    /* Responsive Container */
    .container {
      width: 90%;
      max-width: 1100px;
      margin: 0 auto;
      padding: 20px;
      /* Subtle glow effect around the container */
      box-shadow: 0 0 20px rgba(30, 144, 255, 0.3);
    }

    /* Header & Navigation */
    header {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      padding: 20px 30px;
      width: 100%;
      border-radius: 40px;
      /* Animated gradient border background */
      background: linear-gradient(45deg, rgba(51, 51, 246, 0.5), rgba(255, 0, 195, 0.5));
      box-shadow: 0 0 15px rgba(255, 0, 195, 0.6);
      animation: headerGlow 3s ease-in-out infinite alternate;
    }
    @keyframes headerGlow {
      from { filter: brightness(0.95); }
      to { filter: brightness(1.1); }
    }
    header h1 {
      font-size: 2rem;
    }
    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }
    nav ul li {
      font-size: 1rem;
    }
    
    /* Avatar */
    .avatar-container {
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      border-radius: 0.95rem;
      transition: transform 0.3s ease;
    }
    .avatar-container:hover {
      transform: scale(1.05);
    }
    .avatar_image {
      width: 55px;
      height: 55px;
      border: 3px solid #fff;
      border-radius: 30px;
      box-shadow: 0 0 10px #ff1177, 0 10px 0px #0d61feb6, 10px 5px 0px #ff00c3, -10px 0px 0px #0099ff, 0 -10px 0px #e20dfea8;
    }

    /* Hero Section */
    .hero {
      text-align: center;
      padding: 80px 20px;
      position: relative;
    }
    .hero h2 {
      font-size: 2.5rem;
      margin-bottom: 10px;
      color: #ff00c3;
      text-shadow: 0 0 10px #ff00c3;
    }
    .hero h3 {
      font-size: 2rem;
      margin-bottom: 10px;
      color: #1e90ff;
      text-shadow: 0 0 10px #1e90ff;
    }
    .hero p {
      font-size: 1.2rem;
      margin-bottom: 20px;
      opacity: 0.9;
    }
    
    /* Neon Buttons & Effects */
    .neon-button {
      display: flex;
      justify-content: center;
      text-align: center;
      width: 94%;
      margin: 10px auto;
      background-color: hsla(334, 89%, 82%, 0);
      border: 1px solid rgba(255, 96, 165, 0.42);
      padding: 5px;
      text-transform: uppercase;
      font-weight: bold;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 0 3px #ff11786a, 0 0 3px #ff11788c;
    }
    .neon-button:hover {
      color: white;
      background-color: hsla(334, 100%, 50%, 0.4);
      box-shadow: 0 0 10px rgb(172, 7, 79), 0 0 10px #ff1177, 0 0 20px #ff1177;
      transform: scale(1.05);
      transition-duration: 500ms;
    }
    .neon {
      display: flex;
      justify-content: center;
      text-align: center;
      width: max-content;
      margin: 10px auto;
      color: #0099ff;
      background-color: hsla(334, 61%, 67%, 0.15);
      border: 1px solid rgba(255, 96, 165, 0.42);
      padding: 5px;
      text-transform: uppercase;
      font-weight: bold;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 0 3px #ff11786a, 0 0 3px #ff11788c;
    }
    .neon:hover {
      color: dodgerblue;
      background-color: hsla(334, 100%, 50%, 0.4);
      box-shadow: 0 0 10px rgb(172, 7, 79), 0 0 10px #ff1177, 0 0 20px #ff1177;
      transform: scale(1.05);
      transition-duration: 500ms;
    }

    /* Bounce Animation for neon-b */
    @keyframes bounce {
      0%, 100% {
        transform: translateY(-25%);
        animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
      }
      50% {
        transform: translateY(0);
        animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
      }
    }
    .neon-b {
      display: flex;
      justify-content: center;
      text-align: center;
      width: max-content;
      margin: 10px auto;
      color: #0099ff;
      background-color: hsla(334, 61%, 67%, 0.15);
      border: 1px solid rgba(255, 96, 165, 0.42);
      padding: 5px;
      text-transform: uppercase;
      font-weight: bold;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 0 3px #ff11786a, 0 0 3px #ff11788c;
      animation: bounce 1s infinite;
    }
    .neon-b:hover {
      color: dodgerblue;
      background-color: hsla(334, 100%, 50%, 0.4);
      box-shadow: 0 0 10px rgb(172, 7, 79), 0 0 10px #ff1177, 0 0 20px #ff1177;
      transform: scale(1.05);
      transition-duration: 500ms;
      animation: none;
    }
    
    /* Spin & Pulse Animations */
    @keyframes spin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    .neon-p {
      display: flex;
      justify-content: center;
      text-align: center;
      width: max-content;
      margin: 10px auto;
      color: #0099ff;
      background-color: hsla(334, 61%, 67%, 0.15);
      border: 1px solid rgba(255, 96, 165, 0.42);
      padding: 8px;
      text-transform: uppercase;
      font-family: Garamond, 'Times New Roman';
      font-weight: bold;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 0 3px #ff11786a, 0 0 3px #ff11788c;
      animation: pulse 1s infinite;
    }
    .neon-p:hover {
      color: dodgerblue;
      background-color: hsla(334, 100%, 50%, 0.4);
      box-shadow: 0 0 10px rgb(172, 7, 79), 0 0 10px #ff1177, 0 0 20px #ff1177;
      transform: scale(1.05);
      transition-duration: 500ms;
      animation: pulse 2s infinite;
    }
    .neon-box {
        display: flex;
        justify-content: center;
        text-align: left;
        width: 100%;
        background-color: hsla(334, 61%, 67%, 0.148);
        border: 1px solid rgba(255, 96, 165, 0.42);
        padding: 3px;
        font-family: Garamond, 'Times New Roman';
        border-radius: 10px;
        box-shadow: 0 0 3px #ff11786a, 0 0 3px #ff11788c;
      }

    /* About Section */
    .about {
      padding: 15px;
      border-bottom: 1px solid rgba(255, 96, 165, 0.42);
    }
    .about h2 {
      font-size: 2rem;
      margin-bottom: 20px;
      text-align: center;
      text-shadow: 0 0 8px #ff1177;
    }
    .about p {
      font-size: 1rem;
      max-width: 800px; /* For larger screens */
      margin: auto;
      word-wrap: break-word;
      overflow-wrap: break-word;
      line-height: 1.7;
    }
    /* Adjust about text on smaller screens */
    @media (max-width: 768px) {
      .about p {
        max-width: 95%;
        font-size: 0.95rem;
      }
    }

    /* Portfolio Section */
    .portfolio {
      padding: 40px 0;
    }
    .portfolio h2 {
      font-size: 2rem;
      text-align: center;
      margin-bottom: 20px;
      text-shadow: 0 0 8px #1e90ff;
    }
    .projects {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 45px;
      margin: auto;
    }
    .project {
      background-color: #1e1e1e;
      border-radius: 8px;
      overflow: hidden;
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
      box-shadow: -5px -5px 10px rgba(255, 0, 234, 0.43),
                  5px 5px 10px rgba(0, 110, 255, 0.43);
      position: relative;
    }
    .project img {
      width: 100%;
      height: auto;
      display: block;
      transition: transform 0.3s ease;
    }
    .project:hover img {
      transform: scale(1.05);
    }
    .project-content {
      padding: 15px;
    }
    .project-content h3 {
      font-size: 1.3rem;
      margin-bottom: 10px;
    }
    .project-content p {
      font-size: 0.95rem;
      color: #ccc;
      margin-bottom: 15px;
    }
    .project:hover {
      transform: scale(1.03);
      box-shadow: -5px -5px 10px rgb(255, 0, 234),
                  5px 5px 10px rgb(0, 110, 255);
    }

    /* Contact Section */
    .contact {
      padding: 20px;
      text-align: center;
      font-family: Garamond, 'Times New Roman', Times, serif;
    }
    .contact h2 {
      font-size: 2rem;
      margin-bottom: 20px;
      text-shadow: 0 0 8px #1e90ff;
    }
    .contact form {
      max-width: 500px;
      margin: auto;
      padding: 0 10px;
    }
    .contact input,
    .contact textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: none;
      border-radius: 5px;
      background-color: rgba(0, 145, 255, 0.178);
      font-family: Garamond, 'Times New Roman', Times, serif;
    }
    .contact input {
      height: 40px;
      color: rgb(20, 150, 255);
      font-size: large;
    }
    .contact::placeholder {
      color: #fff;
      font-family: Garamond, 'Times New Roman', Times, serif;
      font-size: small;
    }
    .contact textarea {
      resize: vertical;
      min-height: 100px;
      color: rgb(0, 150, 255);
      font-size: medium;
    }
    
    /* Contact Info Grid (3x3) */
    .contact-info {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      margin: 20px auto;
      padding: 20px 10px;
    }
    .info-item {
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 10px;
      font-size: 0.9rem;
    }
    .icon {
      width: 1.5rem;
      margin-right: 5px;
    }

    /* Footer */
    footer {
      text-align: center;
      padding: 20px 0;
      border-top: 1px solid #0059ff74;
      font-size: 0.9rem;
      color: #919191;
    }

    /* Overlay Text (if used) */
    .overlay-text {
      position: absolute;
      top: 80%;
      left: 42%;
      transform: translate(-50%, -50%);
      color: dodgerblue;
      font-size: 4rem;
      text-align: left;
      font-weight: bolder;
      -webkit-text-stroke: 1.5px white;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    .one-time-animation {
      animation: fadeIn 2s ease-in-out forwards;
      animation-iteration-count: 1;
    }
    @keyframes slideIn {
      from { transform: translateX(-100%); }
      to { transform: translateX(0); }
    }
    .slide-animation {
      animation: slideIn 1.5s ease-in-out forwards;
    }
    @keyframes slideInRight {
      from { transform: translateX(100%); }
      to { transform: translateX(0); }
    }
    .slide-in-right-animation {
      animation: slideInRight 2s ease-in-out forwards;
    }

    /* Media Queries */
    /* Tablets & smaller screens */
    @media (max-width: 768px) {
      header {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }
      nav ul {
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
      }
      .hero h2 {
        font-size: 2rem;
      }
      .hero h3 {
        font-size: 1.8rem;
      }
      .hero p {
        font-size: 1rem;
      }
      .projects {
        grid-template-columns: 1fr;
      }
      .contact-info {
        grid-template-columns: 1fr;
      }
    }
    /* Mobile Phones */
    @media (max-width: 480px) {
      header h1 {
        font-size: 1.5rem;
      }
      .hero h2 {
        font-size: 1.8rem;
      }
      .hero h3 {
        font-size: 1.6rem;
      }
      .hero p {
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Header with Navigation -->
    <header>
      <div class="avatar-container">
        <img class="avatar_image" src="my avatar.png" alt="Avatar" />
        <h2 style="color:#ff00c3; margin-left: 20px;">Graphic Designer and Web Developer</h2>
      </div>
      <nav>
        <ul>
          <li class="neon-button"><a href="#about">About</a></li>
          <li class="neon-button"><a href="#portfolio">Portfolio</a></li>
          <li class="neon-button"><a href="#contact">Contact</a></li>
          <li class="neon-button">
            <a href="https://drive.google.com/file/d/1I6ZGimVja7XZIXD5_ChBsGUfUetZQf9Y/view?usp=drive_link" target="_blank">CV</a>
          </li>
        </ul>
      </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
      <div class="one-time-animation">
        <span style="font-size: large; color: #0051ff;">
          <h2 class="slide-animation">Welcome to My Portfolio</h2>
        </span>
        <span style="font-size: large; color: #ff1177;">
          <h3 class="slide-in-right-animation">Jurist Jenkins Smith</h3>
        </span>
        <p>"Explore my creative world of unique designs and innovative programming."</p>
        <a class="neon" href="#portfolio">View Portfolio</a>
      </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
      <div class="one-time-animation">
        <h2>About Me</h2>
        <div class="neon-box">
          <p>
            I am a passionate graphic designer with a strong focus on modern aesthetics and innovative design solutions. My work spans across various design disciplines including branding, advertising, and digital design.<br/><br/>Learning comprehensively on the job, I continue to develop a broad skills set in areas such as Web Development with HTML 5, CSS 3, Tailwind CSS, Dynamic Web Development with JavaScript, Backend Development with PHP, Tools & Hosting in Web Development with XAMPP, Database Management with MySQL as well as AI Integration, Project Development, and a ChatGPT-Powered FAQ System with APIs.<br/><br/>As a young technophile, I've always been driven by a passion for innovation and a desire to harness technology. With a belief in effort-driven progress, I've developed a growth mindset that has enabled me to improve in various fields—even public speaking. Now, I'm eager to dive deeper into modern technology and explore its vast possibilities.
          </p>
        </div>
      </div>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio" id="portfolio">
      <h2>My Work</h2>
      <div class="projects">
        <div class="project">
          <img src="Isalyn personal mockups.jpg" alt="Isalyn mockup" />
          <div class="project-content">
            <h3>Brand Identity</h3>
            <p>A modern brand identity for a Fragrance Company.</p>
          </div>
        </div>
        <div class="project">
          <img src="Isalyn enterprise.jpg" alt="Isalyn logo" />
          <div class="project-content">
            <h3>Brand Identity</h3>
            <p>A modern brand identity for a Fragrance Company.</p>
          </div>
        </div>
        <div class="project">
          <img src="Isalyn Thank you flyer.jpg" alt="Isalyn Thank you" />
          <div class="project-content">
            <h3>Brand Identity</h3>
            <p>A modern brand identity for a Fragrance Company.</p>
          </div>
        </div>
        <div class="project">
          <img src="hoodie white 2.jpg" alt="Verp hoodie" />
          <div class="project-content">
            <h3>Brand Identity</h3>
            <p>A modern brand identity for a Casual Clothing Company.</p>
          </div>
        </div>
        <div class="project">
          <img src="Verp bag 3.jpg" alt="Verp bag" />
          <div class="project-content">
            <h3>Brand Identity</h3>
            <p>A modern brand identity for a Casual Clothing Company.</p>
          </div>
        </div>
        <div class="project">
          <img src="Verp cap balenciaga.png" alt="Verp cap" />
          <div class="project-content">
            <h3>Brand Identity</h3>
            <p>A modern brand identity for a Casual Clothing Company.</p>
          </div>
        </div>
        <div class="project">
          <img src="Verp logo Original.jpg" alt="Verp logo" />
          <div class="project-content">
            <h3>Logo Design</h3>
            <p>A meaningful yet simple logo design for a Clothing Company.</p>
          </div>
        </div>
        <div class="project">
          <img src="Emf logo 2.png" alt="Project 2" />
          <div class="project-content">
            <h3>Logo Design</h3>
            <p>A deep and meaningful logo design for a Non-Governmental Organisation.</p>
          </div>
        </div>
        <div class="project">
          <img src="3J logo.jpg" alt="Project 2" />
          <div class="project-content">
            <h3>Logo Design</h3>
            <p>My very own Advertising Company's Logo. 3J Media Print with a focus on Graphic Design, Digital Printing, and Web Design.</p>
          </div>
        </div>
      </div>
      <br>
      <div class="projects" style="justify-content: center; align-items: center;">
        <a class="neon-b" href="https://www.instagram.com/3jmediaprint?igsh=YzljYTk1ODg3Zg==" target="_blank">Instagram</a>
        <span style="font-size: large; color: #ff1178b1; text-align: center; margin: 20px;">
          <h3>View more of my works on my socials</h3>
        </span>
        <a class="neon-b" href="https://www.facebook.com/3j.media" target="_blank">Facebook</a>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
      <h2>Contact Me</h2>
      <form action method="post">
        <input class="contact" name="name" type="text" placeholder="Your Name" required />
        <input class="contact" name="email" type="email" placeholder="Your Email" required />
        <textarea class="contact" name="message" placeholder="Your Message" required></textarea>
        <button class="neon-p" type="submit">Send Message</button>
      </form>
      <br>
    </section>
    <hr>
    <br>

    <!-- Contact Info Section (3x3 Grid) -->
    <div class="contact-info">
      <div class="info-item">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="dodgerblue">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25Z" />
        </svg>
        Phone: (+233) 556 252 406
      </div>
      <div class="info-item">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="dodgerblue">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
        </svg>
        Email: juristjenkins@gmail.com
      </div>
      <div class="info-item">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="dodgerblue">
          <path d="M10.9,2.1c-4.6,0.5-8.3,4.2-8.8,8.7c-0.5,4.7,2.2,8.9,6.3,10.5C8.7,21.4,9,21.2,9,20.8v-1.6c0,0-0.4,0.1-0.9,0.1 c-1.4,0-2-1.2-2.1-1.9c-0.1-0.4-0.3-0.7-0.6-1C5.1,16.3,5,16.3,5,16.2C5,16,5.3,16,5.4,16c0.6,0,1.1,0.7,1.3,1c0.5,0.8,1.1,1,1.4,1 c0.4,0,0.7-0.1,0.9-0.2c0.1-0.7,0.4-1.4,1-1.8c-2.3-0.5-4-1.8-4-4c0-1.1,0.5-2.2,1.2-3C7.1,8.8,7,8.3,7,7.6C7,7.2,7,6.6,7.3,6 c0,0,1.4,0,2.8,1.3C10.6,7.1,11.3,7,12,7s1.4,0.1,2,0.3C15.3,6,16.8,6,16.8,6C17,6.6,17,7.2,17,7.6c0,0.8-0.1,1.2-0.2,1.4 c0.7,0.8,1.2,1.8,1.2,3c0,2.2-1.7,3.5-4,4c0.6,0.5,1,1.4,1,2.3v2.6c0,0.3,0.3,0.6,0.7,0.5c3.7-1.5,6.3-5.1,6.3-9.3 C22,6.1,16.9,1.4,10.9,2.1z" />
        </svg>
        GitHub: TechSmithjenkins
      </div>
      <div class="info-item">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50" stroke-width="1.5" stroke="dodgerblue">
          <path d="M 13 5 L 16 14 L 16 20 L 18 20 L 18 14 L 21 5 L 19 5 L 17 11 L 15 5 L 13 5 z M 24 9 C 22.9 9 22.400781 9.1992188 21.800781 9.6992188 C 21.100781 10.199219 21 10.6 21 12 L 21 17 C 21 18 21.200781 18.699219 21.800781 19.199219 C 22.400781 19.799219 23 20 24 20 C 25.1 20 25.599219 19.799219 26.199219 19.199219 C 26.899219 18.699219 27 18 27 17 L 27 12 C 27 11.1 26.799219 10.299219 26.199219 9.6992188 C 25.599219 9.0992188 25 9 24 9 z M 29 9 L 29 18 C 29 19 30 20 31 20 C 32 20 32.6 19.5 33 19 L 33 20 L 35 20 L 35 9 L 33 9 L 33 17 C 33 17.7 32.2 18 32 18 C 31.8 18 31 18 31 17 L 31 9 L 29 9 z M 24 11 C 24.3 11 25 11 25 12 L 25 17 C 25 18 24.3 18 24 18 C 23.7 18 23 18 23 17 L 23 12 C 23 11.2 23.4 11 24 11 z M 24.949219 21.886719 C 19.899219 21.874219 14.850781 21.9 9.8007812 22 C 9.1007813 22 8.4007812 22.100781 7.8007812 22.300781 C 7.3007812 22.500781 6.8007812 22.7 6.3007812 23 C 5.8007812 23.4 5.3003906 23.800391 4.9003906 24.400391 C 4.6003906 24.800391 4.4007812 25.199609 4.3007812 25.599609 C 4.1007812 26.299609 4 27.100781 4 27.800781 C 3.9 31.100781 3.9 34.399609 4 37.599609 C 4 38.199609 4.1007813 38.8 4.3007812 39.5 C 4.6007812 40.6 5.1996094 41.7 6.0996094 42.5 C 6.3996094 42.7 6.6003906 42.899609 6.9003906 43.099609 C 7.3003906 43.299609 7.6 43.499609 8 43.599609 C 8.6 43.899609 9.2007812 44 9.8007812 44 C 19.900781 44.2 29.999609 44.2 40.099609 44 C 40.799609 44 41.499609 43.899219 42.099609 43.699219 C 42.599609 43.499219 43.099609 43.3 43.599609 43 C 44.099609 42.6 44.6 42.199609 45 41.599609 C 45.3 41.199609 45.499609 40.800391 45.599609 40.400391 C 45.799609 39.700391 46 38.999219 46 38.199219 L 46 27.900391 C 46 27.200391 45.899609 26.399219 45.599609 25.699219 C 45.499609 25.299219 45.3 24.9 45 24.5 C 44.6 24 44.199219 23.499609 43.699219 23.099609 C 43.199219 22.799609 42.699219 22.500781 42.199219 22.300781 C 41.499219 22.100781 40.799609 22 40.099609 22 C 35.049609 21.95 29.999219 21.899219 24.949219 21.886719 z M 32.583984 23.916016 C 35.093359 23.925391 37.599609 23.95 40.099609 24 C 40.499609 24 40.900781 24.099219 41.300781 24.199219 C 41.900781 24.399219 42.5 24.699609 43 25.099609 C 43.2 25.299609 43.300391 25.399609 43.400391 25.599609 C 43.600391 25.899609 43.700781 26.100391 43.800781 26.400391 C 44.000781 26.900391 44 27.300781 44 27.800781 L 44 38.099609 C 44 38.599609 43.900781 39.1 43.800781 39.5 C 43.700781 39.8 43.600391 40.100781 43.400391 40.300781 C 43.300391 40.500781 43.1 40.700781 43 40.800781 C 42.5 41.300781 42.000781 41.599219 41.300781 41.699219 C 40.900781 41.799219 40.499609 41.800391 40.099609 41.900391 C 29.999609 42.100391 20.000391 42 9.9003906 42 C 9.5003906 42 8.9996094 41.900781 8.5996094 41.800781 C 8.2996094 41.700781 8.1003906 41.6 7.9003906 41.5 C 7.7003906 41.4 7.5003906 41.199609 7.4003906 41.099609 C 6.8003906 40.499609 6.3992188 39.8 6.1992188 39 C 5.9992188 38.5 6 37.999609 6 37.599609 C 5.9 34.399609 6 31.100391 6 27.900391 C 6 27.400391 6.0992187 26.9 6.1992188 26.5 C 6.2992187 26.2 6.3996094 25.899609 6.5996094 25.599609 C 6.6996094 25.399609 6.9 25.199609 7 25.099609 C 7.5 24.599609 8.0992188 24.299219 8.6992188 24.199219 C 9.0992187 23.999219 9.6 24 10 24 C 17.5 24 25.055859 23.887891 32.583984 23.916016 z M 11 26 L 11 28 L 13 28 L 13 40 L 15 40 L 15 28 L 17 28 L 17 26 L 11 26 z M 26 26 L 26 40 L 28 40 L 28 39 C 28.4 39.5 28.9 40 30 40 C 30.6 40 31.100391 39.499609 31.400391 39.099609 C 31.700391 38.699609 32 38.2 32 37.5 L 32 31.5 C 32 30.6 31.700391 29.999609 31.400391 29.599609 C 31.100391 29.099609 30.500391 28.900391 29.900391 28.900391 C 29.500391 28.900391 29.200391 28.999219 28.900391 29.199219 C 28.600391 29.399219 28.2 29.6 28 30 L 28 26 L 26 26 z M 36.300781 28.900391 C 35.300781 28.900391 34.5 29.099609 34 29.599609 C 33.4 30.199609 33.099609 30.900781 33.099609 31.800781 L 33.099609 36.5 C 33.099609 37.5 33.400391 38.300391 33.900391 38.900391 C 34.400391 39.500391 35.099609 39.800781 36.099609 39.800781 C 37.099609 39.800781 37.900391 39.6 38.400391 39 C 38.900391 38.5 39 37.699609 39 36.599609 L 39 36 L 37 36 L 37 36.400391 C 37 37.000391 36.900781 37.399609 36.800781 37.599609 C 36.700781 37.799609 36.4 37.900391 36 37.900391 C 35.6 37.900391 35.299219 37.799609 35.199219 37.599609 C 35.099219 37.399609 35 37.1 35 36.5 L 35 35 L 39.099609 35 L 39.099609 31.699219 C 39.099609 30.799219 38.900391 30.099609 38.400391 29.599609 C 37.900391 29.099609 37.300781 28.900391 36.300781 28.900391 z M 18 29 L 18 38 C 18 38.6 18.3 38.899219 18.5 39.199219 C 18.8 39.599219 19.300781 40 19.800781 40 C 20.200781 40 20.6 40.000781 21 39.800781 C 21.4 39.600781 21.6 39.4 22 39 L 22 40 L 24 40 L 24 29 L 22 29 L 22 37 C 21.8 37.2 21.8 38 21 38 C 20.3 38 20 37.2 20 37 L 20 29 L 18 29 z M 29 30.5 C 29.6 30.5 30 31 30 32 L 30 37 C 30 37.6 29.6 38 29 38 C 28.4 38 28 37.8 28 37.5 L 28 31.5 C 28 31 28.4 30.5 29 30.5 z" />
        </svg>
        Youtube: TechSmith
      </div>
      <div class="info-item">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50" stroke-width="1.5" stroke="dodgerblue">
          <path d="M 5.9199219 6 L 20.582031 27.375 L 6.2304688 44 L 9.4101562 44 L 21.986328 29.421875 L 31.986328 44 L 44 44 L 28.681641 21.669922 L 42.199219 6 L 39.029297 6 L 27.275391 19.617188 L 17.933594 6 L 5.9199219 6 z M 9.7167969 8 L 16.880859 8 L 40.203125 42 L 33.039062 42 L 9.7167969 8 z" />
        </svg>
        X: JenkinsJurist
      </div>
      <div class="info-item">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50" stroke-width="1.5" stroke="dodgerblue">
          <path d="M 9 4 C 6.2504839 4 4 6.2504839 4 9 L 4 41 C 4 43.749516 6.2504839 46 9 46 L 41 46 C 43.749516 46 46 43.749516 46 41 L 46 9 C 46 6.2504839 43.749516 4 41 4 L 9 4 z M 9 6 L 41 6 C 42.668484 6 44 7.3315161 44 9 L 44 41 C 44 42.668484 42.668484 44 41 44 L 9 44 C 7.3315161 44 6 42.668484 6 41 L 6 9 C 6 7.3315161 7.3315161 6 9 6 z M 14 11.011719 C 12.904779 11.011719 11.919219 11.339079 11.189453 11.953125 C 10.459687 12.567171 10.011719 13.484511 10.011719 14.466797 C 10.011719 16.333977 11.631285 17.789609 13.691406 17.933594 A 0.98809878 0.98809878 0 0 0 13.695312 17.935547 A 0.98809878 0.98809878 0 0 0 14 17.988281 C 16.27301 17.988281 17.988281 16.396083 17.988281 14.466797 A 0.98809878 0.98809878 0 0 0 17.986328 14.414062 C 17.884577 12.513831 16.190443 11.011719 14 11.011719 z M 11 19 A 1.0001 1.0001 0 0 0 10 20 L 10 39 A 1.0001 1.0001 0 0 0 11 40 L 17 40 A 1.0001 1.0001 0 0 0 18 39 L 18 33.134766 L 18 20 A 1.0001 1.0001 0 0 0 17 19 L 11 19 z M 20 19 A 1.0001 1.0001 0 0 0 19 20 L 19 39 A 1.0001 1.0001 0 0 0 20 40 L 26 40 A 1.0001 1.0001 0 0 0 27 39 L 27 29 C 27 28.170333 27.226394 27.345035 27.625 26.804688 C 28.023606 26.264339 28.526466 25.940057 29.482422 25.957031 C 30.468166 25.973981 30.989999 26.311669 31.384766 26.841797 C 31.779532 27.371924 32 28.166667 32 29 L 32 39 A 1.0001 1.0001 0 0 0 33 40 L 39 40 A 1.0001 1.0001 0 0 0 40 39 L 40 28.261719 C 40 25.300181 39.122788 22.95433 37.619141 21.367188 C 36.115493 19.780044 34.024172 19 31.8125 19 C 29.710483 19 28.110853 19.704889 27 20.423828 L 27 20 A 1.0001 1.0001 0 0 0 26 19 L 20 19 z M 12 21 L 16 21 L 16 33.134766 L 16 38 L 12 38 L 12 21 z M 21 21 L 25 21 L 25 22.560547 A 1.0001 1.0001 0 0 0 26.798828 23.162109 C 26.798828 23.162109 28.369194 21 31.8125 21 C 33.565828 21 35.069366 21.582581 36.167969 22.742188 C 37.266572 23.901794 38 25.688257 38 28.261719 L 38 38 L 34 38 L 34 29 C 34 27.833333 33.720468 26.627107 32.990234 25.646484 C 32.260001 24.665862 31.031834 23.983076 29.517578 23.957031 C 27.995534 23.930001 26.747519 24.626988 26.015625 25.619141 C 25.283731 26.611293 25 27.829667 25 29 L 25 38 L 21 38 L 21 21 z" />
        </svg>
        LinkedIn: juristjenkins
      </div>
    </div>

    <!-- Footer -->
    <footer>
      <p>&copy; 2025 juristjenkins@gmail.com All rights reserved.</p>
    </footer>
  </div>
<!-- Static App Form Collection Script -->
<script src="https://static.app/js/static-forms.js" type="text/javascript"></script>

<script src="https://static.app/js/static.js" type="text/javascript"></script>
</body>
</html>