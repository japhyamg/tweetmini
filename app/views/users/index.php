<?php require APPROOT . '/views/includes/header.php'; ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="card-body">
                <h4 class="card-title"><?php echo $data['user']->name; ?></h4>
                <button class="btn btn-default">Following <span class="badge badge-pill badge-success"><?php echo $data['user']->friends_count; ?></span></button>
                <button class="btn btn-default">Followers <span class="badge badge-pill badge-success"><?php echo $data['user']->followers_count; ?></span></button>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col">
                    <?php flash('tweet_message'); ?>
                    <form action="<?php echo URLROOT ?>/users/index" method="post">
                        <div class="form-group">
                            <textarea name="tweet" class="form-control" placeholder="What's happening?" id="" cols="30" rows="2"><?php echo $data['tweet']; ?></textarea>
                            <span class="invalid-feedback"><?php echo $data['tweet_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-right">Tweet</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Lastest Tweet</h2>
                    <?php foreach ($data['tweets'] as $tweet) : ?>
                        <div class="card mb-1">
                            <div class="card-body">
                                <?php echo $tweet->text; ?>

                                <a href="<?php if(isset($tweet->entities->urls[0]->url)){echo $tweet->entities->urls[0]->url;} ?>"><?php if(isset($tweet->entities->urls[0]->url)){echo $tweet->entities->urls[0]->url;} ?></a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>



<?php require APPROOT . '/views/includes/footer.php'; ?>