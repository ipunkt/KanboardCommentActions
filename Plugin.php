<?php

namespace Kanboard\Plugin\commentactions;

use Kanboard\Core\Filter\LexerBuilder;
use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Plugin\KanboardSearchPlugin\Filter\AdvancedSearchFilter;

class Plugin extends Base
{
    public function initialize()
    {

    }

    public function onStartup()
    {
    }

    public function getPluginName()
    {
        return 'CommentActions';
    }

    public function getPluginDescription()
    {
        return ;
    }

    public function getPluginAuthor()
    {
        return 'ipunkt Business Solutions';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://www.ipunkt.biz/unternehmen/opensource';
    }
}
