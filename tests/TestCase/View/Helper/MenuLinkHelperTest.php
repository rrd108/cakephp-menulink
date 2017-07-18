<?php
namespace MenuLink\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Cake\Http\ServerRequest;
use MenuLink\View\Helper\MenuLinkHelper;

/**
 * MenuLink\View\Helper\MenuLinkHelper Test Case
 */
class MenuLinkHelperTest extends TestCase
{
    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->View = $this->getMockBuilder('Cake\View\View')
            ->setMethods(['append'])
            ->getMock();
        $this->menuLink = new menuLinkHelper($this->View);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->menuLink, $this->View);
        parent::tearDown();
    }

    /**
     * Test menuLink method
     *
     * @return void
     */
    public function testMenuLink()
    {
        $this->menuLink->request = new ServerRequest(['webroot' => '']);
        $this->menuLink->request->params = [
            'controller' => 'posts',
            'action' => 'index'
            ];

        $link = $this->menuLink->menuLink(
            'Link text',
            [
                'controller' => 'posts', 
                'action' => 'index'
            ]
        );
        $this->assertContains('class="active"', $link);

        $link = $this->menuLink->menuLink(
            'Link text',
            [
                'controller' => 'posts', 
                'action' => 'add'
            ]
        );
        $this->assertNotContains('class="active"', $link);        
    }
}
