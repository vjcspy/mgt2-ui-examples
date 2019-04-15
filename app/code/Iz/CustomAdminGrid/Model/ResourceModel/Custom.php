<?php


namespace Iz\CustomAdminGrid\Model\ResourceModel;


class Custom extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('custom_admin_grid', 'id_column');
    }
}
