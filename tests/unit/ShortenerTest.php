<?php
/**
 * This file is part of the UrlShortener package.
 *
 * (c) Nikolay Baev aka Monster3D <gametester3d@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 namespace Monster3D\Shortener\Tests\Unit;

 /**
 * @package         ShortenerTest
 * @author          Nikolay Baev <gametester3d@gmail.com>
 * @copyright       Nikolay Baev <gametester3d@gmail.com>
 * @license         http://opensource.org/licenses/mit-license.php  The MIT License (MIT)
 * @link            https://github.com/Monster3D/php-url-shortenert
 */

 use Monster3D\Shortener\Shortener;
 use Monster3D\Shortener\Exceptions\ShortenerException;

 class ShortenerTest extends \PHPUnit_Framework_TestCase 
 {
     /**
     * setUp
     *
     */
     public function setUp()
     {
         //void
     }

     /**
     * tearDown
     *
     */
     public function tearDown()
     {
         //void
     }

     /**
     * Test base creating object 
     *
     */
     public function testBaseCreateObject()
     {
         $shortener = new Shortener('http://test.ru/');
         $this->assertInstanceOf('Monster3D\Shortener\Shortener', $shortener);
     }

     /**
     * Test validate url
     *
     * @expectedException Monster3D\Shortener\Exceptions\ShortenerException
     *
     */
     public function testCheckUrl()
     {
         $shortener = new Shortener('test');
     }
     public function testExecute()
     {
         
     }

 }