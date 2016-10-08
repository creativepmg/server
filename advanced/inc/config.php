<?
//Radio Options
$radio_ip = '198.100.152.234';
$radio_port = '8000';
$show_song_title = 'on'; // show_song_title: on - off. When it is on, it will show the currently playing song name on the player.
$show_album_art = 'on'; // Options: on - off. If this is on, the script will search the itunes search API for the currently playing song image and will show it on the player. If it doesnt find the image on itunes, it will not show the image and div. The script inserts the image file into <img src= name=nowplayingimage> in the player.php file. You can change the location of this image on the page or on your website. If $show_song_title is set off, this option will be ignored and set off. This is only available when $show_song_title is on.

$song_title_update = '1'; // The song name update interval in MINUTE form. 2 means 2 minute. That means the script will update the song name and album art every 2 minutes.

// Color Options, if you need white or transparent background use preimg.light.png and other .png files in the img folder, set them in js/player.css.
$song_title_color = '#049f21';
$player_background_color = '#0b0b0b';
$player_size_width = '400px'; // Minumum 400px is suggested, below 300 the song name will expand if it is long.
$song_title_width = '400px';


?>