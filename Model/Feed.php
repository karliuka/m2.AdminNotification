<?php
/**
 * Faonni
 *  
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade module to newer
 * versions in the future.
 * 
 * @package     Faonni_AdminNotification
 * @copyright   Copyright (c) 2016 Karliuka Vitalii(karliuka.vitalii@gmail.com) 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Faonni\AdminNotification\Model;

use Magento\AdminNotification\Model\Feed as AdminNotificationFeed;

/**
 * AdminNotification Feed model
 */
class Feed extends AdminNotificationFeed
{
    /**
     * Feed url config path
     *
     * @var string
     */	
    const XML_FEED_URL_PATH = 'system/adminnotification/faonni_feed_url';
	
    /**
     * Retrieve feed url
     *
     * @return string
     */
    public function getFeedUrl()
    {
        $httpPath = $this->_backendConfig->isSetFlag(self::XML_USE_HTTPS_PATH) ? 'https://' : 'http://';
        if ($this->_feedUrl === null) {
            $this->_feedUrl = $httpPath . $this->_backendConfig->getValue(self::XML_FEED_URL_PATH);
        }
        return $this->_feedUrl;
    }	
}