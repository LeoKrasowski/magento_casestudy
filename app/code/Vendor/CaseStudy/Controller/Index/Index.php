<?php
namespace Vendor\CaseStudy\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    protected $scopeConfig;

    public function __construct(Context $context, ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function execute()
    {
        $greeting = $this->scopeConfig->getValue('casestudy/general/greeting', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        /** @var \Magento\Framework\Controller\Result\Raw $result */
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents($greeting);
        return $result;
    }
}
