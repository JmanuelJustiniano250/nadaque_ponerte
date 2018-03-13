<?php

namespace app\components;

use Yii;
use yii\base\Component;

class Funcions extends Component
{
    static public function upItem($model)
    {
        $idpk = $model->getPrimaryKey(true);
        foreach ($idpk as $key => $value) {
            $val2 = $model::find()->where(['<', $key, $value])->orderBy([$key => SORT_DESC])->one();
            if ($val2) {
                $model[$key] = 0;
                if ($model->save()) {
                    $model[$key] = $val2[$key];
                    $val2[$key] = $value;
                    $val2->save();
                    $model->save();
                }
            }
        }
        /*elseif(($id - 1)!=0){
            $model->idnoticia = $id - 1;
            $model->save();
        }*/
    }

    static public function downItem($model)
    {
        $idpk = $model->getPrimaryKey(true);
        foreach ($idpk as $key => $value) {
            $val2 = $model::find()->where(['>', $key, $value])->orderBy([$key => SORT_ASC])->one();
            if ($val2) {
                $model[$key] = 0;
                if ($model->save()) {
                    $model[$key] = $val2[$key];
                    $val2[$key] = $value;
                    $val2->save();
                    $model->save();
                }
            }
        }
    }

    static public function estado($model)
    {
        $visible = 1;
        if ($model->estado < $visible) {
            $model->estado = $model->estado + 1;
        } else {
            $model->estado = 0;
        }
        $model->save();

    }

    static public function destacado($model)
    {
        $destacado = 2;
        if ($model->estado < $destacado) {
            $model->estado = $model->estado + 1;
        } else {
            $model->estado = 0;
        }
        $model->save();

    }
    static public function destacado2($model)
    {
        $destacado = 5;
        if ($model->estado != $destacado) {
            $model->estado = 5;
        } else {
            $model->estado = 0;
        }
        $model->save();

    }


    static public function fecha($fecha=null,$corta=true,$string=false)
    {
        Yii::$app->formatter->locale = 'es-ES';
        if (is_null($fecha)) {
            $date['dia'] = Yii::$app->formatter->asDate('now', 'dd');
            if ($corta)
                $date['mes'] = Yii::$app->formatter->asDate('now', 'MMM');
            else
                $date['mes'] = Yii::$app->formatter->asDate('now', 'MMMM');
            $date['anio'] = Yii::$app->formatter->asDate('now', 'Y');
            $date['hora'] = Yii::$app->formatter->asDate('now', 'H:m');
        } else {
            $date['dia'] = Yii::$app->formatter->asDate($fecha, 'dd');
            if ($corta)
                $date['mes'] = Yii::$app->formatter->asDate($fecha, 'MMM');
            else
                $date['mes'] = Yii::$app->formatter->asDate($fecha, 'MMMM');
            $date['anio'] = Yii::$app->formatter->asDate($fecha, 'Y');
            $date['hora'] = Yii::$app->formatter->asDate($fecha, 'H:m');
        }
        if(!$string)
        return $date;
        return $date['dia'].' '.$date['mes'].' '.$date['anio'];
    }


}