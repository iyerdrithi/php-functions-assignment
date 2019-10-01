<?php

function generateLink($url, $label, $class) {
   $link = '<a href="' . $url . '" class="' . $class . '">';
   $link .= $label;
   $link .= '</a>';
   return $link;
}


function outputPostRow($number)  {

    include("travel-data.inc.php");

    $linkPost = 'post.php?id='. ${"postId". $number};
    $image = '<img src="images/' . ${"thumb". $number} . '" alt="' . ${"title". $number} . '" class="img-responsive"/>';

    $user =  (${"userName". $number}) ;
    $userLink = generateLink("user.php?id=" . ${"userId". $number}, $user,);

    echo '<div class="row">';
        echo '<div class="col-md-4">';
        echo generateLink($linkPost, $image);
        echo '</div>';
        echo '<div class="col-md-8"> ';
            echo '<h2>' . ${"title". $number} . '</h2>';
            echo '<div class="details">';
                echo 'Posted by ' . $userLink;
                echo '<span class="pull-right">' . ${"date". $number} . '</span>';
                echo '<p class="ratings">';

                echo ratingStars(${"reviewsRating". $number});
                echo ' ' . ${"reviewsNum". $number} .' Reviews';
                echo '</p>';
            echo '</div>';
            echo '<p class="excerpt">';
            echo ${"excerpt". $number};
            echo '</p>';
            echo '<p>' . generateLink($linkPost, 'Read more',) . '</p>';
        echo '</div>';
    echo '</div>';
    echo '<hr/>';

}

function ratingStars($rating) {
    $rating = "";

    // gold stars - first output
    for ($i=0; $i < $rating; $i++) {
        $rating .= '<img src="images/star-gold.svg" width="16" />';
    }

    // white stars
    for ($i=$rating; $i < 5; $i++) {
        $rating .= '<img src="images/star-white.svg" width="16" />';
    }

    return $rating;
}

?>
