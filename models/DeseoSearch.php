<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DeseoSearch represents the model behind the search form of `app\models\Deseo`.
 */
class DeseoSearch extends Deseo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddeseo', 'idanuncio', 'idusuario'], 'integer'],
            [['fecha_registro'], 'safe'],
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
        $query = Deseo::find();

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
            'iddeseo' => $this->iddeseo,
            'fecha_registro' => $this->fecha_registro,
            'idanuncio' => $this->idanuncio,
            'idusuario' => $this->idusuario,
        ]);

        return $dataProvider;
    }
}
