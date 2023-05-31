<div class="menu p-2 h-100 text-white p-0">
    <div class="icon-web">
    </div>
    <br>
    <div class="my-2 h-75 position-relative">
        <a class="<?= $CONTROLLER == "articles" ? 'active-option' : '' ?> option d-flex align-items-center p-2 text-decoration-none" href="<?= $BASE_URL ?>/articles">
            <i class="fa-solid fa-newspaper"></i>
            <p class="p-0 my-0 mx-2">Articles</p>
        </a>

        <a class="<?= $CONTROLLER == "news" ? 'active-option' : '' ?>  option d-flex align-items-center p-2 text-decoration-none" href="<?= $BASE_URL ?>/news">
            <i class="fa-solid fa-newspaper"></i>
            <p class="p-0 my-0 mx-2">News</p>
        </a>
    </div>
</div>