<?php

namespace App\Config;

class Configuration
{
    const PRODUCT_NAME_MAX_LENGTH = 255;
    const PRODUCT_DESCRIPTION_MIN_LENGTH = 10;
    const PRODUCT_PROPERTY_NAME = 'name';

    const KEY_VALUE_IMAGE = 'image';
    const KEY_VALUE_IS_PUBLISHED = 'is_published';

    const PUBLIC_IMAGES_PATH = 'public/images/';
    const PRODUCTS_LIST_PATH = '/products';
    const PRODUCTS_CREATE_PATH = '/products/create';
}
