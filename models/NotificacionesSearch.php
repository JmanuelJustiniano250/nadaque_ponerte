<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * NotificacionesSearch represents the model behind the search form of `app\models\Notificaciones`.
 */
class NotificacionesSearch extends Notificaciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idnotificaciones', 'dia_envio', 'estado', 'tipo'], 'integer'],
            [['texto', 'fecha_modificacion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Notificaciones::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idnotificaciones' => $this->idnotificaciones,
            'fecha_modificacion' => $this->fecha_modificacion,
            'dia_envio' => $this->dia_envio,
            'estado' => $this->estado,
            'tipo' => $this->tipo,
        ]);

        $query->andFilterWhere(['like', 'texto', $this->texto]);

        return $dataProvider;
    }
}
