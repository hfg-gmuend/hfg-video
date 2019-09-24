# HfG Video

Embed YouTube and Vimeo Videos using a helper function. 

## Requirements

This plugin requires Craft CMS 3.3.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require hfg/video

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for hfgvideo.

## Configuration

Embed parameters can be configured using a plugin specific config file. Create a new file called `video.php` in the `config`-Folder of your Craft installation. The following settings are available: 

```
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
```

## Usage

This plugin exposes a twig function that renders a YouTube or Vimeo Embed. 

```
<iframe src="{{ generateEmbedUrl(url) }}" frameborder="0" allowfullscreen></iframe>
```
