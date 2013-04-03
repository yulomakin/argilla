<?php
/**
 * @author Sergey Glagolev <glagolev@shogo.ru>
 * @link https://github.com/shogodev/argilla/
 * @copyright Copyright &copy; 2003-2013 Shogo
 * @license http://argilla.ru/LICENSE
 */
class BApplicationTest extends CTestCase
{
  /**
   * @var BApplication
   */
  public $app;

  public function setUp()
  {
    parent::setUp();

    $this->app = Yii::app();
  }

  public function testGetFrontendPath()
  {
    $path = $this->app->getFrontendPath();
    $file = str_replace('backend/protected/tests/unit/components', '', dirname(__FILE__));

    $this->assertEquals($path, $file);
  }

  public function testGetFrontendUrl()
  {
    $url  = $this->app->getFrontendUrl();
    $host = 'http://'.$_SERVER['HTTP_HOST']."/";

    $this->assertEquals($url, $host);
  }

  public function testTetUnitEnvironment()
  {
    $this->app->setUnitEnvironment('News', 'BNewsSection', 'index');

    $this->assertInstanceOf('BNewsSectionController', $this->app->controller);
    $this->assertEquals('bnewssection', $this->app->controller->id);

    $this->assertInstanceOf('NewsModule', $this->app->controller->module);

    $this->assertInstanceOf('CInlineAction', $this->app->controller->action);
    $this->assertEquals('index', $this->app->controller->action->id);
  }

  public function testEnd()
  {
    $this->app->end('1101');
    $this->assertEquals('1101', Yii::app()->user->getFlash('end')['status']);
  }
}