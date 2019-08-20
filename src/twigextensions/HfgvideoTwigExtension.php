<?php
/**
 * hfgvideo plugin for Craft CMS 3.x
 *
 * Embed YouTube and Vimeo Videos
 *
 * @link      https://niklassonnenschein.de
 * @copyright Copyright (c) 2019 Niklas Sonnenschein
 */

namespace hfg\hfgvideo\twigextensions;

use hfg\hfgvideo\Hfgvideo;

use Craft;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Niklas Sonnenschein
 * @package   Hfgvideo
 * @since     1.0.0
 */
class HfgvideoTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'Hfgvideo';
    }
    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
    * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('generateEmbedUrl', [$this, 'generateEmbedUrl']),
        ];
    }

    /**
     * Our function called via Twig; it can do anything you want
     *
     * @param null $text
     *
     * @return string
     */
    public function generateEmbedUrl($url = null)
    {
        return Hfgvideo::$plugin->getEmbed($url);
    }
}
