<?php require APPROOT. '/views/includes/header.php'; ?>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-3"> <?php echo $data['title']; ?> </h1>
            <p class="lead">A minimalist twitter app for posting and reading tweets</p>
            <a href="<?php echo $data['url']; ?>" class="btn btn-dark">Login</a>
        </div>
    </div>
<?php require APPROOT. '/views/includes/footer.php'; ?>