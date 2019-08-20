<?php
/**
 * hfgvideo plugin for Craft CMS 3.x
 *
 * Embed YouTube and Vimeo Videos
 *
 * @link      https://niklassonnenschein.de
 * @copyright Copyright (c) 2019 Niklas Sonnenschein
 */

namespace hfg\hfgvideo\models;

use hfg\hfgvideo\Hfgvideo;

use Craft;
use craft\base\Model;

/**
 * Hfgvideo Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Niklas Sonnenschein
 * @package   Hfgvideo
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    public $youtube = [
      "modestbranding" => 1,
      "showinfo" => 0,
      "rel" => 0,
      "color" => "white"
    ];

    public $vimeo = [
      "title" => 0,
      "byline" => 0,
      "portrait" => 0,
      "dnt" => 1
    ];

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }
}
