<?php
/**
 * Cytracon
 *
 * This source file is subject to the Cytracon Software License, which is available at https://www.cytracon.com/license
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 * If you wish to customize this module for your needs.
 * Please refer to https://www.cytracon.com for more information.
 *
 * @category  Cytracon
 * @package   Cytracon_Newsletter
 * @copyright Copyright (C) 2020 Cytracon (https://www.cytracon.com)
 */

namespace Cytracon\Newsletter\Block;

class Subscribe extends \Magento\Framework\View\Element\Template
{
    protected $_id;

    protected $_template = 'Cytracon_Newsletter::subscriber.phtml';

    /**
     * @var \Cytracon\Core\Helper\Data
     */
    protected $coreHelper;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Cytracon\Core\Helper\Data $coreHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->coreHelper = $coreHelper;
        $this->setData('height', 35);
    }

    /**
     * Retrieve form action url and set "secure" param to avoid confirm
     * message when we submit form from secure page to unsecure
     *
     * @return string
     */
    public function getFormActionUrl()
    {
        return $this->getUrl('mgznewsletter/subscriber/new', ['_secure' => true]);
    }

    /**
     * Retrieve form action url and set "secure" param to avoid confirm
     * message when we submit form from secure page to unsecure
     *
     * @return string
     */
    public function getEmailUrl()
    {
        return $this->getUrl('mgznewsletter/subscriber/email', ['_secure' => true]);
    }

    /**
     * @return string
     */
    public function getStyleHtml()
    {
        $styleHtml = '';
        $styles = [];
        $styles['width'] = $this->coreHelper->getStyleProperty($this->getData('width'));
        $styleHtml .= $this->coreHelper->getStyles('.' . $this->getHtmlId(), $styles);

        $styles = [];
        $styles['color'] = $this->coreHelper->getStyleColor($this->getData('btn_color'));
        $styles['background'] = $this->coreHelper->getStyleColor($this->getData('btn_bg_color'));
        $styles['border-color'] = $this->coreHelper->getStyleColor($this->getData('btn_bg_color'));
        if ($this->getData('btn_fullwidth')) {
            $styles['width'] = '100%';
        }
        $styleHtml .= $this->coreHelper->getStyles('.' . $this->getHtmlId() . ' .mgz-newsletter-btn', $styles);
        $styles = [];
        $styles['color'] = $this->coreHelper->getStyleColor($this->getData('btn_hover_color'));
        $styles['background'] = $this->coreHelper->getStyleColor($this->getData('btn_hover_bg_color'));
        $styleHtml .= $this->coreHelper->getStyles(
            '.' . $this->getHtmlId() . ' .mgz-newsletter-btn',
            $styles,
            ':hover'
        );

        $styles = [];
        $styles['height'] = $this->coreHelper->getStyleProperty($this->getData('height'));
        $styles['font-size'] = $this->coreHelper->getStyleProperty($this->getData('font_size'));
        $styleHtml .= $this->coreHelper->getStyles(
            ['.' . $this->getHtmlId() . ' .mgz-newsletter-btn',
                '.' . $this->getHtmlId() . ' input'],
            $styles
        );
        return $styleHtml;
    }

    public function getHtmlId()
    {
        if ($this->_id == null) {
            $this->_id = 'form' . time() . uniqid();
        }
        return $this->_id;
    }
}
