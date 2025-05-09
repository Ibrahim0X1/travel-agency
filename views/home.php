<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Egypt - Travel Agency</title>
    <style>
        /* General Reset */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #4b2e2e; /* Brown */
        }

        /* Hero Section */
        .hero {
            background: url('https://upload.wikimedia.org/wikipedia/commons/e/e3/Kheops-Pyramid.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin: 0;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .hero p {
            font-size: 1.5rem;
            margin-top: 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        /* Destinations Section */
        .destinations {
            padding: 50px 20px;
            background:rgb(252, 241, 225); /* Dark Orange */
        }

        .destinations h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
            color:rgb(0, 0, 0); /* Dark Red */
        }

        .destination {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 40px;
            align-items: center;
        }

        .destination img {
            width: 600px; /* Fixed width */
            height:400px; /* Fixed height */
            object-fit: cover; /* Ensures the image fits within the dimensions without distortion */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            opacity: 1;
            transition: opacity 1s ease-in-out; /* Smooth transition */
        }

        .destination img.hidden {
            opacity: 0; /* Fade out effect */
        }

        .destination-content {
            width: calc(100% - 320px); /* Adjust width to fit next to the fixed image size */
            padding: 20px;
        }

        .destination-content h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #8b4513; /* Dark Orange */
        }

        .destination-content p {
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Footer */
        footer {
            background: #4b2e2e; /* Brown */
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1>Welcome to Explore Egypt</h1>
            <p>Discover the beauty and history of Egypt's most iconic destinations</p>
        </div>
    </div>

    <!-- Destinations Section -->
    <div class="destinations">
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
        // Smooth Slideshow for Siwa Oasis
        const siwaImages = ["R.jpg", "OIP.jpg"];
        let siwaIndex = 0;
        const siwaImageElement = document.getElementById("siwa-image");

        setInterval(() => {
            const nextIndex = (siwaIndex + 1) % siwaImages.length; // Calculate next image index
            const nextImage = new Image(); // Preload the next image
            nextImage.src = siwaImages[nextIndex];

            siwaImageElement.classList.add("hidden"); // Start fade-out
            setTimeout(() => {
                siwaImageElement.src = nextImage.src; // Update the image source
                siwaImageElement.classList.remove("hidden"); // Start fade-in
            }, 1000); // Match the fade-out duration
            siwaIndex = nextIndex; // Update the current index
        }, 5000); // 6 seconds per image

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
            }, 1000);
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
            }, 1000);
            luxorIndex = nextIndex;
        }, 6000);
    </script>
</body>
</html>