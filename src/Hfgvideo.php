<?php
/**
 * hfgvideo plugin for Craft CMS 3.x
 *
 * Embed YouTube and Vimeo Videos
 *
 * @link      https://niklassonnenschein.de
 * @copyright Copyright (c) 2019 Niklas Sonnenschein
 */

namespace hfg\hfgvideo;

use hfg\hfgvideo\twigextensions\HfgvideoTwigExtension;
use hfg\hfgvideo\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 *
 * @author    Niklas Sonnenschein
 * @package   Hfgvideo
 * @since     1.0.0
 *
 * @property  Settings $settings
 * @method    Settings getSettings()
 */
class Hfgvideo extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * Hfgvideo::$plugin
     *
     * @var Hfgvideo
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * To execute your plugin’s migrations, you’ll need to increase its schema version.
     *
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * Set our $plugin static property to this class so that it can be accessed via
     * Hfgvideo::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     *
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Add in our Twig extensions
        Craft::$app->view->registerTwigExtension(new HfgvideoTwigExtension());

        Craft::info(
            Craft::t(
                'hfgvideo',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    public function getEmbed($url)
    {
      $embed = false;

      if ($this->_isYoutube($url)) {
          $url_parts = parse_url($url);
          parse_str($url_parts['query'], $segments);

          return '//www.youtube-nocookie.com/embed/' . $segments['v'] . '?' . http_build_query($this->getSettings()->youtube);
      } else if ($this->_isVimeo($url)) {
          $url_parts = parse_url($url);
          $segments = explode('/', $url_parts['path']);

          return '//player.vimeo.com/video/' . $segments[1] . '?' . http_build_query($this->getSettings()->vimeo);
      }


      if ($embed) {
        return $embed;
      }

      return null;
    }

    // Private Methods
    // =========================================================================

    /**
     * Is the url a youtube url
     * @param string $url
     * @return boolean
     */
    private function _isYoutube($url)
    {
        return strripos($url, 'youtube.com') !== FALSE;
    }

    /**
     * Is the url a vimeo url
     * @param string $url
     * @return boolean
     */
    private function _isVimeo($url)
    {
        return strripos($url, 'vimeo.com') !== FALSE;
    }


    // Protected Methods
    // =========================================================================

    /**
     * Creates and returns the model used to store the plugin’s settings.
     *
     * @return \craft\base\Model|null
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * Returns the rendered settings HTML, which will be inserted into the content
     * block on the settings page.
     *
     * @return string The rendered settings HTML
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'hfgvideo/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
