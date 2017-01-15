<?php
/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class ps_test extends Module implements WidgetInterface
{
    private $templates = array (
        'light' => 'nav.tpl',
        'rich' => 'ps_contactinfo-rich.tpl',
        'default' => 'ps_contactinfo.tpl',
    );

    public function __construct()
    {
        $this->name = 'ps_test';
        $this->author = 'Oscar';
        $this->version = '1';

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = "TEST";
        $this->description = "tEST TEST";
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        return parent::install()
            && $this->registerHook([
                'displayNav', // Standard hook
                'displayNav1', // For Classic-inspired themes
                'displayFooter',
                'actionAdminStoresControllerUpdate_optionsAfter',
            ])
        ;
    }

    public function renderWidget($hookName = null, array $configuration = [])
    {
        if ($hookName == null && isset($configuration['hook'])) {
            $hookName = $configuration['hook'];
        }

        if (preg_match('/^displayNav\d*$/', $hookName)) {
            $template_file = $this->templates['light'];
        } elseif ($hookName == 'displayLeftColumn') {
            $template_file = $this->templates['rich'];
        } else {
            $template_file = $this->templates['default'];
        }

        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));

        return $this->fetch('module:'.$this->name.'/'.$template_file);
    }

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $address = $this->context->shop->getAddress();

        $contact_infos = [
            'phone' => Configuration::get('PS_SHOP_PHONE'),
          
        ];

        return [
            'contact_infos' => $contact_infos,
        ];
    }

    public function hookActionAdminStoresControllerUpdate_optionsAfter()
    {
        foreach ($this->templates as $template) {
            $this->_clearCache($template);
        }

        return true;
    }
}
