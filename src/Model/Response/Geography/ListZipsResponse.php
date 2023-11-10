<?php

namespace RetailCrm\Boxberry\Model\Response\Geography;

use RetailCrm\Boxberry\Model\Response\ArrayResponse;
use RetailCrm\Boxberry\Model\Response\Geography\ListZips\ListZips;
use JMS\Serializer\Annotation as JMS;

/**
 * Class ListZipsResponse.
 *
 * @category Models
 *
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 *
 * @see     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ListZipsResponse extends ArrayResponse
{
    /**
     * @var ListZips[]
     *
     * @JMS\Type("array<RetailCrm\Boxberry\Model\Response\Geography\ListZips\ListZips>")
     */
    public $result;
}
