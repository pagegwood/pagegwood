<?php


Filter::add('comment_form_defaults', function($arg) {

    $arg['class_submit'] = 'Button Button--two';

    return $arg;
});


function sw_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    global $post;
    ?>
    <li class="Comment" id="Comment-<?php echo $comment->comment_ID ?>">
        <div class="Comment-header paddingB1">
            <div class="Comment-icon">
                <img src="<?php echo get_avatar_url(get_comment_author_email()); ?>" class="image-circle" alt="<?php echo get_comment_author(); ?>">
            </div>
            <div class="Comment-meta">
                <div class="Comment-author weight-bold"><?php echo get_comment_author(); ?>

                </div>

                <time datetime="<?php echo $comment->comment_date_gmt; ?>" class="text-h8 text-gray font-secondary ml-10 inline-block uppercase">
                    <?php echo date('M j, Y', strtotime($comment->comment_date_gmt)); ?>
                </time>
            </div>
        </div>

        <div class="Comment-content Content">
            <?php comment_text(); ?>
        </div><!-- .comment-content -->

        <?php


        $post_id = get_the_ID();
        $comment_id = get_comment_ID();

        //get the setting configured in the admin panel under settings discussions "Enable threaded (nested) comments  levels deep"
        $max_depth = get_option('thread_comments_depth');
        //add max_depth to the array and give it the value from above and set the depth to 1
        $default = [
            'add_below'  => 'comment',
            'respond_id' => 'respond',
            'reply_text' => __('Reply'),
            'login_text' => __('Log in to Reply'),
            'depth'      => 1,
            'before'     => '',
            'after'      => '',
            'max_depth'  => $max_depth
        ];

        comment_reply_link($default,$comment_id,$post_id);
        ?>
    <?php

}
