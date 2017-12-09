<?php require APPROOT . '/views/includes/header.php'; ?>
    <div class="row">
        <div class="col-sm-3">
            <div class="card card-1">
                <h4 class="card-title"><?php echo $data['user']->name; ?></h4>
                    Following <span class="badge badge-pill badge-success"><?php echo $data['user']->friends_count; ?></span>

                    Followers <span class="badge badge-pill badge-primary"><?php echo $data['user']->followers_count; ?></span>

                <p class="card-text"><?php echo $data['user']->description; ?></p>

            </div>
        </div>
        <div class="col-8 col-sm-8">
            <div class="row">
                <div class="col">
                    <h2 class="text-center"><?php echo $data['user']->name; ?>' timeline</h2>
                    <?php $start = 1; foreach ($data['tweets'] as $tweet) : ?>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $tweet->text; ?>

                                        <a href="<?php if(isset($tweet->entities->urls[0]->url)){echo $tweet->entities->urls[0]->url;} ?>"><?php if(isset($tweet->entities->urls[0]->url)){echo $tweet->entities->urls[0]->url;} ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $start++; endforeach; ?>
                </div>
            </div>
        </div>
    </div>



<?php require APPROOT . '/views/includes/footer.php'; ?>