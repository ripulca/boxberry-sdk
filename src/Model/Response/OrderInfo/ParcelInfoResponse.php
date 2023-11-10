<?php

namespace RetailCrm\Boxberry\Model\Response\OrderInfo;

use RetailCrm\Boxberry\Model\Response\ArrayResponse;
use RetailCrm\Boxberry\Model\Response\OrderInfo\ParcelInfo\ParcelInfo;
use JMS\Serializer\Annotation as JMS;

/**
 * Class ParcelList.
 *
 * @category Models
 *
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 *
 * @see     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ParcelInfoResponse extends ArrayResponse
{
    /**
     * @var ParcelInfo[]
     *
     * @JMS\Type("array<RetailCrm\Boxberry\Model\Response\OrderInfo\ParcelInfo\ParcelInfo>")
     */
    public $result;
}
