<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portfolio - Hanif Aprillian</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/mycss.css" rel="stylesheet">
</head>
<body data-bs-spy="scroll"
      data-bs-target="#navbarMenu"
      data-bs-offset="100"
      tabindex="0">

<div class="scroll-progress">
    <div id="scrollProgress"></div>
</div>
<!-- =========================
     NAVBAR
========================= -->
<header>
    <nav class="navbar navbar-expand-md p-3 fixed-top">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand" href="#home">
                <img src="assets/img/logo.png" alt="Logo">
            </a>

            <!-- Hamburger -->
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ms-auto align-items-md-center">

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="#home">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="#services">
                            Services
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="#about">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="#contact">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>
</header>

<!-- =========================
     HERO
========================= -->
<section id="home" class="hero">

    <div class="container">

        <div class="row align-items-center">

            <!-- Teks -->
            <div class="col-lg-6">

                <p class="text-secondary mb-2">
                    Hello, I'm
                </p>

                <div class="hero-name">
                    Hanif Aprillian
                </div>

                <h1 class="mt-3">
                    Mechatronics
                    <br>
                    Engineering
                </h1>

                <p class="hero-description mt-4">
                    I am a Mechatronics Engineering student who is
                    interested in automation, electrical systems,
                    robotics, and PLC programming.
                </p>

                <div class="hero-buttons mt-4">

                    <a href="#Project"
                       class="btn btn-primary me-2">
                        My Project
                    </a>

                    <a href="#about"
                       class="btn btn-secondary">
                        Download CV
                    </a>

                </div>

            </div>


            <!-- Foto -->
            <div class="col-lg-6 text-center">

                <div class="profile-wrapper">

                    <img src="assets/img/SLPT99609.png"
                         alt="Hanif Aprillian"
                         class="hero-img">

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     EXPERTISE
========================= -->
<section id="services"
         class="expertise-section py-5">

    <div class="container py-5">

        <h2 class="section-title">
            My Expertise
        </h2>

        <p class="section-subtitle">
            Here are some of the skills I possess.
        </p>

        <div class="row g-4">

         <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "20242024_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nama, deskripsi, gambar FROM service";
// Execute the SQL query
$result = $conn->query($sql);

// Process the result set
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo '<div class="col-md-4">';

    echo '<div class="skill-card text-center">';

    echo '<h5>' . $row['nama'] . '</h5>';

    echo '<img src="assets/img/'. $row['gambar'] .'" alt="'. $row['gambar'] .'">';

    echo '<p class="text-muted">' . $row['deskripsi'] . '</p>';

    echo '</div>';

    echo '</div>';
  }
} else {
  echo "0 results";
}

$conn->close();
?>

        </div>

    </div>

</section>

<!-- =========================
     ABOUT
========================= -->

<section id="about" class="about-section py-5">

    <div class="container py-5">

        <h2 class="section-title">
            About Me
        </h2>

        <p class="section-subtitle">
            Get to know me and my interests.
        </p>


        <!-- =========================
             ROW ATAS
        ========================= -->

        <div class="row g-4">

           <!-- MY EXPERIENCE -->
<div class="col-lg-6">

    <div class="experience-wrapper">

    <div class="experience-card-inner">

        <!-- DEPAN -->
        <div class="card about-card experience-front h-100">

            <div class="card-body p-4">

                <h5>My Experience</h5>


                 <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "20242024_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, judul, deskripsi, periode, posisi FROM experience";

$result = $conn->query($sql);

$experiences = [];

?>

<div class="experience-items">

<?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        // Simpan data untuk JavaScript
        $experiences[] = $row;

        echo '
        <button
            type="button"
            class="experience-btn"
            onclick="showExperience(' . $row['id'] . ', event)">

            <img
                src="assets/img/ATMI.png"
                alt="' . htmlspecialchars($row['judul']) . '">

        </button>';
    }

} else {

    echo "<p>Belum ada data experience.</p>";
}

?>

</div>

<script>
    const experiences = <?= json_encode($experiences); ?>;
</script>

<?php
$conn->close();
?>

            </div>

        </div>


        <!-- BELAKANG -->
        <div class="card experience-back h-100">

            <div class="card-body p-4">

                <button
                    type="button"
                    class="btn btn-secondary btn-sm mb-3"
                    onclick="backToExperience(event)">

                    ← Back

                </button>

                <h5 id="experienceTitle">
                    Experience
                </h5>

                <p id="experienceDescription"></p>

                <p id="experiencePosition"></p>

                <p id="experiencePeriod"></p>

            </div>

        </div>

    </div>

</div>

</div>


           <!-- MY PERFORMANCE -->
<div class="col-lg-6">

    <div class="performance-wrapper">

        <div class="performance-card-inner">

            <!-- ================= FRONT ================= -->
            <div class="card about-card performance-front h-100">

                <div class="card-body p-4">

                    <div class="performance-header">

                        <h5 class="mb-0">
                            My Performance
                        </h5>

                        <button
                            type="button"
                            class="vote-btn"
                            onclick="openVote(event)">

                            Vote

                        </button>

                    </div>


                    <div class="chart-container">

                        <canvas id="myChart"></canvas>

                    </div>

                </div>

            </div>


            <!-- ================= BACK ================= -->
            <div class="card performance-back h-100">

                <div class="card-body p-4">

                    <button
                        type="button"
                        class="btn btn-secondary btn-sm mb-3"
                        onclick="closeVote(event)">

                        ← Back

                    </button>


                   <div class="vote-options">

    <button
        type="button"
        class="vote-option"
        onclick="giveVote('Very Dissatisfied', this)"
        style="background-color: red;">

        Very Dissatisfied

    </button>


    <button
        type="button"
        class="vote-option"
        onclick="giveVote('Dissatisfied', this)"
        style="background-color: rgb(255, 166, 0);">

        Dissatisfied

    </button>


    <button
        type="button"
        class="vote-option"
        onclick="giveVote('Neutral', this)"
        style="background-color: rgb(255, 251, 0);">

        Neutral

    </button>


    <button
        type="button"
        class="vote-option"
        onclick="giveVote('Satisfied', this)"
        style="background-color: rgb(166, 255, 0);">

        Satisfied

    </button>


    <button
        type="button"
        class="vote-option"
        onclick="giveVote('Very Satisfied', this)"
        style="background-color: rgb(0, 255, 0);">

        Very Satisfied

    </button>

</div>

<p id="voteResult"></p>

                </div>

            </div>

        </div>

    </div>

</div>

        </div>


        <!-- =========================
             MY PROJECT
        ========================= -->

        <div class="row mt-4" id="Project">

            <div class="col-12">

                <div class="card about-card project-card">

                    <div class="card-body p-4">

                        <h5>
                            My Project
                        </h5>


                        <div class="project-items">


                            <!-- PROJECT 1 -->
                            <button class="project-btn">

                                <div class="project-content">

                                    <img src="assets/img/project.jpg"
                                         alt="Project 1">

                                    <span>
                                        Project 1
                                    </span>

                                </div>

                            </button>


                            <!-- PROJECT 2 -->
                            <button class="project-btn">

                                <div class="project-content">

                                    <img src="assets/img/project.jpg"
                                         alt="Project 2">

                                    <span>
                                        Project 2
                                    </span>

                                </div>

                            </button>


                            <!-- PROJECT 3 -->
                            <button class="project-btn">

                                <div class="project-content">

                                    <img src="assets/img/project.jpg"
                                         alt="Project 3">

                                    <span>
                                        Project 3
                                    </span>

                                </div>

                            </button>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     CONTACT
========================= -->
<section id="contact"
         class="contact-section py-5">

    <div class="container py-5">

        <h2 class="section-title">
            Contact Me
        </h2>

        <div class="row g-5"; style="margin-top: 10px;">

            <!-- Contact Information -->
            <div class="col-md-5">

                <div class="contact-info">

                    <h4 class="mb-4">
                        Let's Work Together
                    </h4>

                    <p class="text-secondary">
                        Have a project or opportunity?
                        Feel free to contact me.
                    </p>


                    <!-- Email -->
                    <div class="contact-item">

                        <img src="assets/img/mail.png"
                             alt="Email">

                        <a href="mailto:hanifaprillian1987@gmail.com">
                            hanifaprillian1987@gmail.com
                        </a>

                    </div>


                    <!-- Phone -->
                    <div class="contact-item">

                        <img src="assets/img/phone.png"
                             alt="Phone">

                        <a href="tel:+6283113683400">
                            +62 831-1368-3400
                        </a>

                    </div>


                    <!-- Social Media -->
                    <div class="mt-4">

                        <button class="social-btn">
                            <img src="assets/img/ld.png"
                                 alt="LinkedIn">
                        </button>

                        <button class="social-btn">
                            <img src="assets/img/x.png"
                                 alt="X">
                        </button>

                        <button class="social-btn"
                            onclick="window.open('https://www.instagram.com/hanf__404?igsh=aWlmZjVzNHZjd25s', '_blank')">

                            <img src="assets/img/ig.png"alt="Instagram">

                        </button>

                    </div>

                </div>

            </div>


            <!-- Contact Form -->
            <!-- Contact Form -->
<div class="col-md-7">

    <div class="contact-form">

        <h4 class="text-dark mb-4">
            Send Me a Message
        </h4>

        <form action="proses_pesan.php" method="POST">

            <div class="mb-3">

                <input
                    type="text"
                    class="form-control"
                    placeholder="Your Name"
                    name="nama"
                    required>

            </div>


            <div class="mb-3">

                <input
                    type="email"
                    class="form-control"
                    placeholder="Your Email"
                    name="email"
                    required>

            </div>


            <div class="mb-3">

                <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Your Message"
                    name="pesan"
                    required></textarea>

            </div>


            <button
                type="submit"
                class="btn btn-primary send-btn">

                Send Message

            </button>

        </form>

    </div>

</div>

        </div>

    </div>

</section>


<!-- =========================
     FOOTER
========================= -->
<footer class="py-4 text-center">

    <div class="container">

        <p class="mb-0">
            © 2026 Hanif Aprillian.
            All rights reserved.
        </p>

    </div>

</footer>

<script src="assets/js/chart.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/myjs.js"></script>

</body>
</html>