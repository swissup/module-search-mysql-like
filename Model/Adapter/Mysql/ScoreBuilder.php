<?php

namespace Swissup\SearchMysqlLike\Model\Adapter\Mysql;

class ScoreBuilder extends \Magento\Framework\Search\Adapter\Mysql\ScoreBuilder
{
    /**
     * @var \Swissup\SearchMysqlLike\Helper\Mysql\Like
     */
    private $likeHelper;

    /**
     * @param \Swissup\SearchMysqlLike\Helper\Mysql\Like $likeHelper
     */
    public function __construct(
        \Swissup\SearchMysqlLike\Helper\Mysql\Like $likeHelper
    ) {
        $this->likeHelper = $likeHelper;
    }

    /**
     * {@inheritdoc}
     */
    public function addCondition($score, $useWeights = true) {
        $condition = $this->likeHelper->getScoreConditionForMatchQuery($score);
        if ($condition) {
            $score = $condition;
        }

        return parent::addCondition($score, $useWeights);
    }
}
