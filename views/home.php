<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Egypt - Travel Agency</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #4b2e2e;
            min-height: 100vh;
            background: linear-gradient(135deg, #f4a460 0%, #8b4513 40%, #b22222 100%);
        }

        /* Fixed Top Bar */
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(270deg,rgb(202, 67, 0) 1%,rgb(0, 0, 0) 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0px 24px;
            z-index: 1000;
            box-shadow: 0 2px 8px #0002;
        }
        .logo {
            font-size: 1.8rem;
            color:rgb(255, 255, 255);
            /* font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; */
            font-weight: bold;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            /* -webkit-text-stroke: 0.5px rgb(0, 0, 0); */
            /* text-stroke: 1px #fff; */
         /* Optional: add a subtle shadow for more contrast */
             /* text-shadow: 1px 1px 2px #fff8, 2px 2px 6px #0002; */
        }
    

        .dashboard-icon {
            background: none;
            border: none;
            color: #fff;
            font-size: 2.4rem; /* bigger icon */
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            transition: background 0.2s;
            position: relative;
            margin-right: 24px; /* shift left from scrollbar */
        }
    
        .dashboard-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 56px;
            background: #fff;
            color: #4b2e2e;
            min-width: 220px; /* bigger menu */
            border-radius: 10px;
            box-shadow: 0 4px 16px #0002;
            z-index: 2000;
            padding: 18px 0;
            animation: fadeIn 0.2s;
        }
        .dashboard-menu.show {
            display: block;
        }
        .dashboard-menu a {
            display: block;
            padding: 18px 32px;
            color: #4b2e2e;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: bold;
            transition: background 0.2s, color 0.2s;
            letter-spacing: 1px;
        }
        .dashboard-menu a:hover {
            background: #f4a460;
            color: #b22222;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px);}
            to { opacity: 1; transform: translateY(0);}
        }

        .hero {
            background: url('https://upload.wikimedia.org/wikipedia/commons/e/e3/Kheops-Pyramid.jpg') no-repeat center center/cover;
            min-height: 40vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            flex-direction: column;
            padding: 170px 10px 20px 10px;
            margin-top: 56px; /* Space for top bar */
        }

        .hero h1 {
            font-size: 2.5rem;
            margin: 0;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        .destinations {
            padding: 30px 5vw;
            background: rgba(252, 241, 225, 0.95);
        }

        .destinations h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: #b22222;
        }

        .destination {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 40px;
            align-items: center;
            background: linear-gradient(90deg, #fff8f0 60%, #f4a46022 100%);
            border-radius: 12px;
            box-shadow: 0 2px 10px #8b451322;
            overflow: hidden;
        }

        .destination img {
            width: 100%;
            max-width: 400px;
            height: 220px;
            object-fit: cover;
            border-radius: 12px 0 0 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            opacity: 1;
            transition: opacity 2s ease-in-out;
            background: #eee;
            flex-shrink: 0;
        }

        .destination img.hidden {
            opacity: 0;
        }

        .destination-content {
            flex: 1 1 200px;
            padding: 20px;
            min-width: 200px;
        }

        .destination-content h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: #8b4513;
        }

        .destination-content p {
            font-size: 1rem;
            line-height: 1.6;
        }

        footer {
            background: #4b2e2e;
            color: #fff;
            text-align: center;
            padding: 20px 10px;
        }

        @media (max-width: 900px) {
            .destination {
                flex-direction: column;
                align-items: stretch;
            }
            .destination img {
                border-radius: 12px 12px 0 0;
                max-width: 100%;
                height: 180px;
            }
            .destination-content {
                padding: 15px;
            }
        }

        @media (max-width: 600px) {
            .top-bar {
                flex-direction: column;
                height: auto;
                padding: 8px 8px;
            }
            .logo {
                font-size: 1.1rem;
                margin-bottom: 4px;
            }
            .dashboard-icon {
                font-size: 1.5rem;
                padding: 6px;
            }
            .hero h1 {
                font-size: 1.5rem;
            }
            .hero p {
                font-size: 1rem;
            }
            .destinations {
                padding: 15px 2vw;
            }
            .destination-content h3 {
                font-size: 1.1rem;
            }
            .destination-content p {
                font-size: 0.95rem;
            }
            .destination img {
                height: 130px;
            }
        }
    </style>
</head>
<body>
    <!-- Fixed Top Bar -->
    <div class="top-bar">
        <span class="logo">UNIQUE DESTINATIONS</span>
        <div style="position:relative;">
            <button class="dashboard-icon" id="dashboardMenuBtn" aria-label="Dashboard Menu">&#9776;</button>
            <div class="dashboard-menu" id="dashboardMenu">
                <a href="sign_up_form.php">Sign Up</a>
                <a href="sign in.php">Sign In</a>
                <a href="#destinations">Destinations</a>
                <a href="search_guide.php">Search for a Guide</a>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to Explore Egypt</h1>
        <p>Discover the beauty and history of Egypt's most iconic destinations</p>
    </div>

    <!-- Destinations Section -->
    <div class="destinations" id="destinations">
        <h2>Our Top Destinations</h2>

        <!-- Destination 1: Siwa Oasis -->
        <div class="destination">
            <img id="siwa-image" src="R.jpg" alt="Siwa Oasis">
            <div class="destination-content">
                <h3>Siwa Oasis</h3>
                <p>Siwa Oasis is a hidden gem in the Western Desert of Egypt. Known for its stunning landscapes, salt lakes, and ancient ruins, Siwa offers a tranquil escape from the bustling cities. Explore the Temple of the Oracle and enjoy the serene beauty of this unique destination.</p>
            </div>
        </div>

        <!-- Destination 2: The Pyramids of Giza -->
        <div class="destination">
            <img id="pyramids-image" src="https://upload.wikimedia.org/wikipedia/commons/e/e3/Kheops-Pyramid.jpg" alt="Pyramids of Giza">
            <div class="destination-content">
                <h3>Pyramids of Giza</h3>
                <p>The Pyramids of Giza are one of the Seven Wonders of the Ancient World. These iconic structures, including the Great Pyramid of Khufu, are a testament to Egypt's rich history and architectural brilliance. Don't miss the Sphinx, a symbol of mystery and power.</p>
            </div>
        </div>

        <!-- Destination 3: Luxor -->
        <div class="destination">
            <img id="luxor-image" src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Luxor_Temple.jpg" alt="Luxor Temple">
            <div class="destination-content">
                <h3>Luxor</h3>
                <p>Luxor is often referred to as the world's greatest open-air museum. Home to the Valley of the Kings, Karnak Temple, and Luxor Temple, this city is a treasure trove of ancient Egyptian history. Experience the grandeur of the pharaohs in this remarkable destination.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Explore Egypt. All rights reserved.</p>
    </footer>

    <script>
        // Dashboard menu toggle
        const dashboardBtn = document.getElementById('dashboardMenuBtn');
        const dashboardMenu = document.getElementById('dashboardMenu');
        document.addEventListener('click', function(e) {
            if (dashboardBtn.contains(e.target)) {
                dashboardMenu.classList.toggle('show');
                dashboardBtn.classList.toggle('active');
            } else if (!dashboardMenu.contains(e.target)) {
                dashboardMenu.classList.remove('show');
                dashboardBtn.classList.remove('active');
            }
        });

        // Smooth Slideshow for Siwa Oasis
        const siwaImages = ["R.jpg", "OIP.jpg"];
        let siwaIndex = 0;
        const siwaImageElement = document.getElementById("siwa-image");

        setInterval(() => {
            const nextIndex = (siwaIndex + 1) % siwaImages.length;
            const nextImage = new Image();
            nextImage.src = siwaImages[nextIndex];

            siwaImageElement.classList.add("hidden");
            setTimeout(() => {
                siwaImageElement.src = nextImage.src;
                siwaImageElement.classList.remove("hidden");
            }, 2000); // 2s fade
            siwaIndex = nextIndex;
        }, 6000);

        // Smooth Slideshow for Pyramids of Giza
        const pyramidsImages = [
            "https://upload.wikimedia.org/wikipedia/commons/e/e3/Kheops-Pyramid.jpg",
            "https://media.tacdn.com/media/attractions-splice-spp-674x446/09/6f/30/a2.jpg"
        ];
        let pyramidsIndex = 0;
        const pyramidsImageElement = document.getElementById("pyramids-image");

        setInterval(() => {
            const nextIndex = (pyramidsIndex + 1) % pyramidsImages.length;
            const nextImage = new Image();
            nextImage.src = pyramidsImages[nextIndex];

            pyramidsImageElement.classList.add("hidden");
            setTimeout(() => {
                pyramidsImageElement.src = nextImage.src;
                pyramidsImageElement.classList.remove("hidden");
            }, 2000);
            pyramidsIndex = nextIndex;
        }, 6000);

        // Smooth Slideshow for Luxor
        const luxorImages = [
            "1.jpg",
            "R (1).jpg"
        ];
        let luxorIndex = 0;
        const luxorImageElement = document.getElementById("luxor-image");

        setInterval(() => {
            const nextIndex = (luxorIndex + 1) % luxorImages.length;
            const nextImage = new Image();
            nextImage.src = luxorImages[nextIndex];

            luxorImageElement.classList.add("hidden");
            setTimeout(() => {
                luxorImageElement.src = nextImage.src;
                luxorImageElement.classList.remove("hidden");
            }, 2000);
            luxorIndex = nextIndex;
        }, 6000);
    </script>
</body>
</html>