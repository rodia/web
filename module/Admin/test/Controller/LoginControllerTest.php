<?php

declare(strict_types=1);

namespace AdminTest\Controller;

use Admin\Controller\LoginController;
use Laminas\Stdlib\ArrayUtils;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class LoginControllerTest extends AbstractHttpControllerTestCase
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
        $this->dispatch('/admin/login', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('admin');
        $this->assertControllerName(LoginController::class);
        $this->assertControllerClass('LoginController');
        $this->assertMatchedRouteName('login');
    }

    public function testInvalidRouteDoesNotCrash()
    {
        $this->dispatch('/admin/login/smoke', 'GET');
        $this->assertResponseStatusCode(404);
    }
}
