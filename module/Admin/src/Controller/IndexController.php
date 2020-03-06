<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Admin\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Mvc\MvcEvent;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     * Execute the request
     *
     * @param  MvcEvent $e
     * @return mixed
     * @throws Exception\DomainException
     */
    public function onDispatch(MvcEvent $e)
    {
        $response = parent::onDispatch($e);
        $this->layout()->setTemplate('admin/admin');

        return $response;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }
}
