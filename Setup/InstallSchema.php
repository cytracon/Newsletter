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

namespace Cytracon\Newsletter\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $setup->getConnection()->addColumn(
            $setup->getTable('newsletter_subscriber'),
            'subscriber_firstname',
            [
                'type'    => Table::TYPE_TEXT,
                'length'  => 255,
                'comment' => 'Subscriber Firstname'
            ]
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('newsletter_subscriber'),
            'subscriber_lastname',
            [
                'type'    => Table::TYPE_TEXT,
                'length'  => 255,
                'comment' => 'Subscriber Lastname'
            ]
        );

        $installer->endSetup();
    }
}
