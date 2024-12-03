<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoodSync</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Mochiy+Pop+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
        <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('logo/logoapk.png') }}" height="40" alt="Logo Moodsync">
                <span class="brand-text">MoodSync</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#feature">Feature</a></li>
                    <li class="nav-item"><a class="nav-link" href="#guide">Guide</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </div>
                {{-- <ul class="navbar-nav mb-lg-0">
                    <li class="nav-item"><a class="btn btn-secondary" href="login">Login</a>
                </ul> --}}
            </div>
        </div>
    </nav>

    <!-- Home Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image Column -->
                <div class="col-lg-6">
                    <img src="{{ asset('images/home.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <h1>
                        Discover Music <br>
                        That Matches Your Mood
                    </h1>
                    <p class="paragraph mb-10">
                        Have you ever found it difficult to find a song that fits your mood? MoodSync is here to answer your needs!<br>
                        MoodSync utilizes AI technology to recommend music that matches your facial expressions. Sad, Happy, Neutral, or Angry, we have the right song for you!
                        <br><br><br><br>
                        Come on, download MoodSync now and experience a more personal and heart-touching music experience!
                    </p>
                    <a class="btn btn-secondary" href="https://play.google.com/store" id="button-download">Download Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="title-feature" id="feature">
        <div class="container">
            <h3 class="text-center" style="margin-bottom: 60px">Main Feature</h3>
        </div>
    </section>

    <section class="feature">
        <div class="container-sm" id="container-feature">
            <div class="row align-items-center">
                <!-- Image Column -->
                <div class="col-lg-8">
                    <h1>
                        Facial Expression Detection Feature
                    </h1>
                    <p class="paragraph mb-10" id="feature-paragraph">
                        MoodSync's Facial Expression Detection feature is one of the key innovations that makes the app it's unique and sophisticated. 
                        By using the latest artificial intelligence (AI) technology, MoodSync is able to analyze your facial expressions through the 
                        camera and identify the feelings you are experiencing in real-time. The detected expressions are divided into four main categories: 
                        Angry, Sad, Neutral, and Happy.
                    </p>
                    <div class="feature-icons">
                        <img src="{{ asset('images/angry.svg') }}" alt="Angry" id="feature-angry">
                        <img src="{{ asset('images/sad.png') }}" alt="Sad">
                        <img src="{{ asset('images/netral.png') }}" alt="Neutral">
                        <img src="{{ asset('images/happy.png') }}" alt="Happy">
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center align-items-center" id="face-detection">
                    <div class="image-container">
                        <div class="background-rectangle"></div>
                        <img src="{{ asset('images/face_detection.png') }}" alt="Face Detection" class="foreground-image">
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>

    <!-- Guide Section -->
    <section class="guide" id="guide">
        <div class="container">
            <h3 class="text-center">How MoodSync Works?</h3>
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="image-container">
                        <img src="{{ asset('images/circle.png') }}" alt="" class="circle">
                        <div class="step-container">
                            <div class="col-md-4">
                                <img src="{{ asset('images/Camera 1.png') }}" alt="Step 1" class="img-fluid mb-3">
                                <div class="card">
                                    <div class="card-body text-center d-flex justify-content-center align-items-center">
                                        <p>The user uses the camera to detect facial expressions</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('images/Camera 2.png') }}" alt="Step 2" class="img-fluid mb-3">
                                <div class="card">
                                    <div class="card-body text-center d-flex justify-content-center align-items-center">
                                        <p>AI analyzes user expressions and expression results are displayed directly on the screen</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('images/Camera 3.png') }}" alt="Step 3" class="img-fluid mb-3">
                                <div class="card">
                                    <div class="card-body text-center d-flex justify-content-center align-items-center">
                                        <p>MoodSync compiles a playlist that matches the detected facial expressions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Slogan Section -->
    <section class="slogan" id="slogan">
        <div class="container">
            <img src="{{ asset('logo/logoapk.png') }}" height="40" alt="Logo Moodsync">
            <span class="brand-text">MoodSync</span><br>
            <h2>Music That Understands Your Feelings</h2>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-white">
        <div class="container">
            <div class="row" id="footer-row">
                <div class="col-lg-6">
                    <h5>Our Team</h5>
                    <p style="font-size: 12px">This application was developed by a team of Malang State 
                        Polytechnic students, Department of Information Technology, D4 Informatics 
                        Engineering Study Program. The team consists of four members who have expertise 
                        in various areas of technology and application development.</p>
                </div>
                {{-- <div class="col-md-3">
                    <h5>Features</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Face Expression Detection</a></li>
                        <li><a href="#" class="text-white">Playlist</a></li>
                        <li><a href="#" class="text-white">Recommendations</a></li>
                        <li><a href="#" class="text-white">Mood History</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Help Center</a></li>
                        <li><a href="#" class="text-white">FAQs</a></li>
                        <li><a href="#" class="text-white">Terms & Conditions</a></li>
                        <li><a href="#" class="text-white">Privacy Policy</a></li>
                    </ul>
                </div> --}}
                <div class="col-lg-6 d-flex justify-content-center align-items-center" id="contact">
                    <a href="#" class="text-white"><img src="{{ asset('logo/whatsapp.png') }}" height="30" width="30" alt="Logo1" style="margin-right: 20px;"></a>
                    <a href="#" class="text-white"><img src="{{ asset('logo/facebook.png') }}" height="30" width="30" alt="Logo2" style="margin-right: 20px;"></a>
                    <a href="#" class="text-white"><img src="{{ asset('logo/telegram.png') }}" height="30" width="30" alt="Logo3"></a>
                </div>
            </div>
            <div class="text-center">
                <p style="margin-top: 30px;">© 2024 MoodSync. All rights reserved.</p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>