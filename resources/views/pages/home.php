
<div class="ftco-blocks-cover-1">
    <div class="site-section-cover overlay" style="background-image: url('/assets/images/hero.jpg')">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 text-center bg-black pt-3 pb-4" data-aos="fade-right">
                    <h1 class="mb-3 text-white">
                        <span class="text-warning"><?=config('app.name')?></span> Starter
                    </h1>
                    <h2 class="fs-17 mb-2 font-weight-bold">
                        <span class="text-yellow">CREATE YOUR WEB PROJECT </span>
                        <span class="text-white"> SO FAST</span>
                    </h2>
                    <h2 class="fs-33 mb-3 font-weight-bold">
                        <span class="text-white">Current version: </span>
                        <span class="price"><?=config('app.version')?></span>
                    </h2>
                    <button type="button" class="btn btn-warning font-weight-bold" id="showOrderBtn">
                        <i class="fa-solid fa-bell"></i> Social Links
                    </button>
                    <button type="button" class="btn btn-warning font-weight-bold"
                     onclick="window.location.href='https://github.com/<?=config('app.creator')?>/<?=config('app.name')?>/tree/main/docs'">
                        <i class="fas fa-file-alt"></i> Documentation
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="custom-alert" id="myAlert">
    <div class="alert-box">
        <span class="close-icon" id="closeBtn">&times;</span>
        <h5 class="font-weight-bold" id="orderNumber">SOCIAL LINK</h5>
        <img src="/assets/images/social.png" width="200" height="200" alt="">
        <div class="d-flex justify-content-end">
            <a class="bg-black" href="https://github.com/<?=config('app.creator')?>" target="_blank">
                <i class="fa-brands fa-github"></i> GitHub
            </a>
            <a class="bg-warning" href="https://instagram.com/<?=config('app.creator')?>" target="_blank">
                <i class="fa-brands fa-instagram"></i> Instagram
            </a>
            <a class="bg-info" href="https://t.me/<?=config('app.creator')?>" target="_blank">
                <i class="fa-brands fa-telegram"></i> Telegram
            </a>
        </div>
    </div>
</div>
