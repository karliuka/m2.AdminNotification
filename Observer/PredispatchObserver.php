<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Faonni\AdminNotification\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Backend\Model\Auth\Session;
use Faonni\AdminNotification\Model\FeedFactory;

/**
 * AdminNotification observer
 */
class PredispatchObserver implements ObserverInterface
{
    /**
     * @var \Faonni\AdminNotification\Model\FeedFactory
     */
    protected $_feedFactory;

    /**
     * @var \Magento\Backend\Model\Auth\Session
     */
    protected $_backendAuthSession;

    /**
     * @param \Faonni\AdminNotification\Model\FeedFactory $feedFactory
     * @param \Magento\Backend\Model\Auth\Session $backendAuthSession
     */
    public function __construct(
        FeedFactory $feedFactory,
        Session $backendAuthSession
    ) {
        $this->_feedFactory = $feedFactory;
        $this->_backendAuthSession = $backendAuthSession;
    }

    /**
     * Predispath admin action controller
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if ($this->_backendAuthSession->isLoggedIn()) {
            $feedModel = $this->_feedFactory->create();
            /* @var $feedModel \Faonni\AdminNotification\Model\Feed */
            $feedModel->checkUpdate();
        }
    }
}