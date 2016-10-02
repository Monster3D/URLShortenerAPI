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

     /**
     * Test execute 
     *
     */
     public function testExecute()
     {
         $shortener = new Shortener('http://test.ru/');

         $driver = $this->getMockBuilder('Monster3D\Shortener\RequestDriver')
                ->setMethods(['execute'])
                ->disableOriginalConstructor()
                ->getMock();

         $driver->expects($this->once())
                ->method('execute')
                ->will($this->returnValue(new \stdClass()));

         $driver->init([]);
         $result = $shortener->execute($driver);
         $this->assertInstanceOf('\stdClass', $result);
     }
     
     /**
     * Test execute without contract 
     *
     * @expectedException Monster3D\Shortener\Exceptions\ShortenerException
     *
     */
     public function testExecuteWithoutDriverContract()
     {
         $shortener = new Shortener('http://test.ru/');
         $shortener->execute($this->getMock('WithOutContract'));
     }

     /**
     * Test execute if RequestDriver return invalid result
     *
     * @expectedException Monster3D\Shortener\Exceptions\ShortenerException 
     *
     */
     public function testExecuteDriverReturnError()
     {
         $shortener = new Shortener('http://test.ru/');

         $driver = $this->getMockBuilder('Monster3D\Shortener\RequestDriver')
                ->setMethods(['execute'])
                ->disableOriginalConstructor()
                ->getMock();

         $driver->expects($this->once())
                ->method('execute')
                ->will($this->returnValue($this->getMock('TestClass')));

         $driver->init([]);
         $result = $shortener->execute($driver);
         $this->assertInstanceOf('\stdClass', $result);
     }

 }