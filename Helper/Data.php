<?php

namespace Swissup\SearchMysqlLike\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Search\Model\QueryFactory;
use Swissup\SearchMysqlLike\Model\Config\Source\MysqlMethod;

class Data extends \Magento\Search\Helper\Data
{
    /**
     * @var string
     */
    const CONFIG_XML_PATH_ENABLE = 'ajaxsearch/main/enable';

    /**
     * @var string
     */
    const CONFIG_PATH_MYSQL_METHOD = 'ajaxsearch/mysql/search_method';

    /**
     * @var string
     */
    const CONFIG_PATH_MYSQL_LIKE_LIMIT = 'ajaxsearch/mysql/like_words_limit';

    /**
     *
     * @param  string $key
     * @param mixed $store
     * @return mixed
     */
    private function getConfig($key, $store = null)
    {
        return $this->scopeConfig->getValue(
            $key,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    /**
     * @param  int  $store
     * @param  string $key
     * @return boolean
     */
    private function isSetFlag($key, $store = null)
    {
        return $this->scopeConfig->isSetFlag($key, ScopeInterface::SCOPE_STORE, $store);
    }

    /**
     *
     * @param  int  $store
     * @return boolean
     */
    public function isEnabled($store = null)
    {
        return $this->isSetFlag(self::CONFIG_XML_PATH_ENABLE, $store);
    }

    /**
     * Check is MySQL Serach engine can use LILKE method for Catalog Search
     *
     * @param  mixed $store
     * @return boolean
     */
    public function canUseMysqlLike($store = null)
    {
        return $this->isEnabled($store)
            && $this->getConfig(self::CONFIG_PATH_MYSQL_METHOD, $store) == MysqlMethod::LIKE;
    }

    /**
     * @param  mixed $store
     * @return int
     */
    public function getMysqlLikeLimit($store = null)
    {
        return (int) $this->getConfig(self::CONFIG_PATH_MYSQL_LIKE_LIMIT, $store);
    }
}
