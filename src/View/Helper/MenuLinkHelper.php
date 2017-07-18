<?php
/**
 * CakePHP MenuLinkHelper
 * 
 * @author    rrd <rrd@webmania.cc>
 * @copyright 2017 Radharadhya dasa
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace MenuLink\View\Helper;

use MenuLink\View;
use Cake\View\Helper\HtmlHelper;

/**
 * Html Menu Link Helper class
 *
 * MenuLinkHelper adds an "active" css class for links what points
 * to the current url
 */
class MenuLinkHelper extends HtmlHelper
{
    /**
     * Adds an "active" css class to links which pointing to the current url
     *
     * @param  string|array      $title   The content to be wrapped by `<a>` tags.
     *   Can be an array if $url is null. If $url is null, $title will be used as both the URL and title.
     * @param  string|array|null $url     Cake-relative URL or array of URL parameters, or
     *   external URL (starts with http://)
     * @param  array             $options Array of options and HTML attributes.
     * @return string An `<a />` element.
     * @link https://book.cakephp.org/3.0/en/views/helpers/html.html#creating-links
     */
    public function menuLink($title, $url = null, array $options = [])
    {
        if (strtolower($this->request->getParam('controller')) == strtolower($url['controller'])
            && strtolower($this->request->getParam('action')) == strtolower($url['action'])
        ) {
                $options['class'] = 'active';
        }
        return parent::link($title, $url, $options);
    }
}
