<?php
/**
 * hfgvideo plugin for Craft CMS 3.x
 *
 * Embed YouTube and Vimeo Videos
 *
 * @link      https://niklassonnenschein.de
 * @copyright Copyright (c) 2019 Niklas Sonnenschein
 */

/**
 * hfgvideo config.php
 *
 * This file exists only as a template for the hfgvideo settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'hfgvideo.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [

    // https://developers.google.com/youtube/player_parameters?hl=de
    "youtube" => [
      "modestbranding" => 1,
      "showinfo" => 0,
      "rel" => 0
    ],
    "vimeo" => [
      "title" => 0,
      "byline" => 0,
      "portrait" => 0,
      "dnt" => 1
    ]

];
