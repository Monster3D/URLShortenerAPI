<?php
/**
 * This file is part of the UrlShortener package.
 *
 * (c) Nikolay Baev aka Monster3D <gametester3d@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Monster3D\Shortener;
use Monster3D\Shortener\Interfaces\DriverInterface;
use Monster3D\Shortener\RequestDriver;
use Monster3D\Shortener\Config;
use Monster3D\Shortener\Exceptions\ShortenerException;


/**
 * @package         Shortener
 * @author          Nikolay Baev <gametester3d@gmail.com>
 * @copyright       Nikolay Baev <gametester3d@gmail.com>
 * @license         http://opensource.org/licenses/mit-license.php  The MIT License (MIT)
 * @link            https://github.com/Monster3D/php-url-shortenert
 */

class Shortener
{
    /**
    * Long url
    * 
    * @var string
    *
    */
    private $url;
    
    /**
     * @param string
     * 
     */
    public function __construct($url)
    {
        $this->checkUrl($url);
        $this->url = $url;
    }
    
    /**
    * Get result after exec driver
    *
    * @return \stdClass
    *
    * @throw Monster3D\Shortener\Exceptions\ShortenerException 
    *
    */
    public function execute($driver)
    {
        if (!$driver instanceof DriverInterface) {
            throw new ShortenerException('Invalid contract interface driver');
        }
        $result = $driver->execute();
       
        if (!$result instanceof \stdClass) {
            throw new ShortenerException('Internal error driver');
        }
        return $result; 
    }
    
    /**
    * Check validate url
    *
    * @param string
    *
    * @throw Monster3D\Shortener\Exceptions\ShortenerException
    *
    */
    public function checkUrl($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new ShortenerException('Invalid url: ' . $url);
        }
    }

}