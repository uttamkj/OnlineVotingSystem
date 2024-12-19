<!DOCTYPE html>
<html lang="en">
    <style>
        .carousel-item img {
            max-height: 500px;
            object-fit: cover;
            width: 100%;
        } 
        p{
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <div id="votingCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#votingCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#votingCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#votingCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/img1.jpg" class="d-block w-100" alt="Secure Voting">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Secure Online Voting</h5>
                        <p>Advanced encryption and multi-factor authentication.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/img2.jpg" class="d-block w-100" alt="Election Transparency">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Real-Time Results</h5>
                        <p>Transparent and instant election tracking.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/img3.jpg" class="d-block w-100" alt="Accessible Voting">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Accessible to Everyone</h5>
                        <p>Vote from anywhere, anytime with our mobile-friendly platform.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#votingCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#votingCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Card 1 -->
            <div class="col">
                <div class="card h-100">
                    <img src="images/i2.webp" class="card-img-top" alt="Card 1 Image">
                    <div class="card-body">
                        <h5 class="card-title">Municipal elections</h5>
                        <p class="card-text "> The elections are scheduled for 46 urban local bodies, including 5 municipal corporations and 41 municipal councils and nagar panchayats. Municipal Corporation elections are conducted to elect municipal councillors and ward representatives for municipal corporations in India. Jay Hind . For more click in the read me button.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col">
                <div class="card h-100">
                    <img src="images/i1.webp" class="card-img-top" alt="Card 2 Image">
                    <div class="card-body">
                        <h5 class="card-title">Lok Sabha elections</h5>
                        <p class="card-text ">General elections were held in India from 19 April to 1 June 2024 in seven phases, to elect all 543 members of the Lok Sabha. Votes were counted and the result was declared on 4 June to form the 18th Lok Sabha.The Lok Sabha is the lower house of India's bicameral Parliament, with the upper house being the Rajya Sabha.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col">
                <div class="card h-100">
                    <img src="images/i3.webp" class="card-img-top" alt="Card 3 Image">
                    <div class="card-body">
                        <h5 class="card-title">Assembly elections</h5>
                        <p class="card-text ">The 2024 elections in India includes the general election and elections to the Rajya Sabha, to state legislative assemblies, to Panchayats and urban local bodies.The Election Commission of India is an autonomous constitutional authority responsible for administering election processes in India.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>