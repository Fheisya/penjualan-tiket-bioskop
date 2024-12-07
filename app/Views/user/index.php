<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Website</title>
    <link rel="stylesheet" href="<?= base_url(); ?>template/user/style.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>

<body>
    <!-- Navbar  -->
    <header>
        <a href="#home" class="logo">
            <i class='bx bxs-movie'></i>EchaTix
        </a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <!-- menu  -->
        <ul class="navbar">
            <li><a href="#home" class="home-active">Home</a></li>
            <li><a href="#movies">Movies</a></li>
            <li><a href="#coming">Coming</a></li>
            <li><a href="#newsletter">Newsletter</a></li>
        </ul>
        <a href="login" class="btn">Sign In</a>
    </header>

    <!-- Home  -->
    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <?php foreach ($tbfilm as $key => $value) : ?>
                <div class="swiper-slide container">
                    <img src="<?= base_url('assets/img/poster/' . ($value['banner'] ?? 'default.jpg')); ?>" alt="">

                    <div class="home-text">
                        <h1> <br><?= $value['judul']; ?></h1>
                        <a href="" class="btn">Buy Now</a>
                        <a href="<?= $value['movie']; ?>" class="play">
                            <i class='bx bx-play'></i>
                        </a>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </section>

    <!-- Movies  -->
    <div class="movies" id="movies">
        <h2 class="heading">Opening This Week</h2>
        <!-- Movies container  -->
        <div class="movies-container">
            <!-- box-1  -->
            <?php foreach ($tbfilm as $key => $value) : ?>
                <div class="box">
                    <div class="box-img">
                        <img src="<?= base_url('assets/img/poster/' . $value['poster']); ?>" alt="Wicked" width="290" height="426">
                    </div>
                    <h3><?= $value['judul']; ?></h3>
                    <span><?= $value['durasi']; ?> | <?= $value['genre']; ?></span>
                </div>
            <?php endforeach; ?>
            <!-- box-2  -->

        </div>
    </div>

    <!-- coming  -->


    <!-- Newsletter /\ -->


    <!-- footer  -->

    <!-- Copyright  -->
    <div class="copyright">
        <p>&#169; CinemaTix</p>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>template/user/main.js"></script>
</body>

</html>