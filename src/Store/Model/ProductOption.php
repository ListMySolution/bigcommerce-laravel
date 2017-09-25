<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 *
 * @author cosman
 *        
 */
class ProductOption extends BaseModel
{

    const TYPE_DROPDOWN = 'dropdown';

    const TYPE_RADIO_BUTTONS = 'radio_buttons';

    const TYPE_RECTANGLES = 'rectangles';

    const TYPE_PRODUCT_LIST = 'product_list';

    const TYPE_PRODUCT_LIST_WITH_IMAGES = 'product_list_with_images';

    const TYPE_SWATCH = 'swatch';

    /**
     *
     * @var int
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $display_name;

    /**
     *
     * @var string
     */
    protected $type = self::TYPE_DROPDOWN;

    /**
     *
     * @var int
     */
    protected $sort_order;

    /**
     *
     * @var ProductOptionValue[]
     */
    protected $option_values = [];

    /**
     *
     * @var array
     */
    protected $config = [];
}