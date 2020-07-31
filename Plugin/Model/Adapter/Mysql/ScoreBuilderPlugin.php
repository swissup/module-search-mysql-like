<?php
/**
 * Plugin for Magento\Framework\Search\Adapter\Mysql\ScoreBuilder
 */
namespace Swissup\SearchMysqlLike\Plugin\Model\Adapter\Mysql;

class ScoreBuilderPlugin
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
     * @param \Magento\Framework\Search\Adapter\Mysql\ScoreBuilder $subject
     * @param $score
     * @param bool $useWeights
     * @return array
     */
    public function beforeAddCondition(
        \Magento\Framework\Search\Adapter\Mysql\ScoreBuilder $subject,
        $score,
        $useWeights = true
    ) {
        $condition = $this->likeHelper->getScoreConditionForMatchQuery($score);
        if ($condition) {
            $score = $condition;
        }
        return [$score, $useWeights];
    }
}
