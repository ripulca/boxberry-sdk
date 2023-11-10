<?php

namespace RetailCrm\Boxberry\Model\Response\Calculate\DeliveryCalculation;

use JMS\Serializer\Annotation as JMS;

/**
 * Class DeliveryCostsRequest.
 *
 * @category Models
 *
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 *
 * @see     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class DeliveryCosts
{
    /**
     * Рассчитывается как TotalPrice – PriceBase.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("PriceService")
     */
    public $priceService;

    /**
     * Стоимость всех начисленных  услуг с учетом скидки, руб.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TotalPrice")
     */
    public $totalPrice;

    /**
     * Тип услуги доставки:
     * 1 склад-склад
     * 2 склад-дверь.
     *
     * @var string
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("DeliveryTypeId")
     */
    public $deliveryTypeId;

    /**
     * Срок доставки в календарных днях.
     *
     * @var string
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("DeliveryPeriod")
     */
    public $deliveryPeriod;

    /**
     * Стоимость базовой услуги.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("PriceBase")
     */
    public $priceBase;
}
