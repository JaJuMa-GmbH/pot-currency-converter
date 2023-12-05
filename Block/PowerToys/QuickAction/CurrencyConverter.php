<?php

namespace Jajuma\PotCurrencyConverter\Block\PowerToys\QuickAction;

use Jajuma\PowerToys\Block\PowerToys\QuickAction;
use Jajuma\PowerToys\Helper\Data;
use Magento\Framework\View\Element\Template;

/**
 * Class CurrencyConverter
 * @package Jajuma\PotCurrencyConverter\Block\PowerToys\QuickAction
 */
class CurrencyConverter extends QuickAction
{

    /**
     * @var Data
     */
    protected $powerToysHelper;

    /**
     * QuickAction constructor.
     * @param Template\Context $context
     * @param Data $powerToysHelper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Data $powerToysHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->powerToysHelper = $powerToysHelper;
    }

    /**
     * Is enable
     *
     * @return true
     */
    public function isEnable(): bool
    {
        $enableValue = $this->getData('enable');
        if (in_array($enableValue, ['true', 'false'])) {
            return $this->getData('enable') == 'true';
        } else {
            return (bool)$this->powerToysHelper->getScopeConfig($enableValue);
        }
    }

}
