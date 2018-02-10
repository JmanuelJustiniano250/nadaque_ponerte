<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DeseosSearch represents the model behind the search form about `app\models\Deseos`.
 */
class DeseosSearch extends Deseos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddeseo', 'idnuncio', 'idusuario'], 'integer'],
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
        $query = Deseos::find();

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
            'idnuncio' => $this->idnuncio,
            'fecha_registro' => $this->fecha_registro,
            'idusuario' => $this->idusuario,
        ]);

        return $dataProvider;
    }
}
