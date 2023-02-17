<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\data\Pagination;

class AcademicYear extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $pages = new Pagination([
            'totalCount' => 30,
            'forcePageParam' => false,
            'pageSizeParam' => false,
            'pageSize' => 9,
        ]);

        return AcademicYearLinkPager::widget([
            'pagination' => $pages,
            'maxButtonCount' => 3,
            'currentPage' => $this->getCurrentPage(),
            'arrayAcademicYearLabel' => $this->getArrayAcademicYearLabel(),
            'arrayAcademicYear' => $this->getArrayAcademicYear(),
            'firstPageLabel' => 'Начало',
            'lastPageLabel' => 'Конец',
            'options' => [
                'class' => 'pagination pagination-circle pg-blue mb-0'],
            'linkOptions' => ['class' => 'page-link'],
            'linkContainerOptions' => ['class' => 'page-item'],
        ]);

    }

    protected function getArrayAcademicYearLabel() {
        $arrayAcademicYear = $this->getArrayAcademicYear();

        foreach ($arrayAcademicYear as &$year) {
            $nextYear = $year + 1;
            $year = $year . " - " . $nextYear;
        }
        unset($year);

	    return $arrayAcademicYear;	
    }

    protected function getArrayAcademicYear() {
        $firstAcademicYear = Yii::$app->params['firstAcademicYear'];
        $step = Yii::$app->params['countAcademicYears'];
        $currentYear = date ('Y');
        $lastYear = date('Y', strtotime('+' . $step . ' years', strtotime($currentYear))); 
        $arrayAcademicYear = [];

        for ($year = $firstAcademicYear; $year <= $lastYear; $year++) {
            array_push($arrayAcademicYear, (string)$year);
        }

	    return $arrayAcademicYear;	
    }

    protected function getCurrentAcademicYear() {
        $year = \Yii::$app->request->get('year');

        $this->setCurrentAcademicYear($year);

        return Yii::$app->params['currentAcademicYear'];
    }

    protected function setCurrentAcademicYear($year) {
        Yii::$app->params['currentAcademicYear'] = empty($year) ? date('Y') : $year;
        return Yii::$app->params['currentAcademicYear'];
    }

    protected function getCurrentPage() {
        $arrayAcademicYear = $this->getArrayAcademicYear();
        $currentYear = $this->getCurrentAcademicYear();
        $currentPage = array_search($currentYear, $arrayAcademicYear);

        return $currentPage;
    }
}
