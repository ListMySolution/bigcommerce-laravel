<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce;

use Illuminate\Support\ServiceProvider;

/**
 * BigCommerce integration service provider
 *
 * @author cosman
 *        
 */
class BigCommerceIntegrationProvider extends ServiceProvider
{

    protected $defer = true;

    public function register()
    {}

    /**
     *
     * {@inheritdoc}
     * @see \Illuminate\Support\ServiceProvider::provides()
     */
    public function provides()
    {
        return [];
    }
}