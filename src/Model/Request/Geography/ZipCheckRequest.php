<?php

namespace RetailCrm\Boxberry\Model\Request\Geography;

use RetailCrm\Boxberry\Model\Request\RequestInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Class ListServices.
 *
 * @category Models
 *
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 *
 * @see     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ZipCheckRequest implements RequestInterface
{
    /**
     * Почтовый индекс
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Zip")
     */
    public $zip;

    /**
     * Код страны.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("CountryCode")
     */
    public $countryCode = '';
}