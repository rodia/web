<?php

declare(strict_types=1);

namespace AdminTest\Controller;

use Admin\Controller\IndexController;
use Laminas\Stdlib\ArrayUtils;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp() : void
    {
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/admin', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('admin');
        $this->assertControllerName(IndexController::class);
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('admin');
    }

    public function testInvalidRouteDoesNotCrash()
    {
        $this->dispatch('/admin/route', 'GET');
        $this->assertResponseStatusCode(404);
    }
}
