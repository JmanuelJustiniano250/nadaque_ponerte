<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CategoriasSearch represents the model behind the search form about `app\models\Categorias`.
 */
class CategoriasSearch extends Categorias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcategoria', 'estado', 'idpadre', 'idmodulo'], 'integer'],
            [['nombre', 'alias', 'fecha_registro'], 'safe'],
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
        $query = Categorias::find();

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
            'idcategoria' => $this->idcategoria,
            'fecha_registro' => $this->fecha_registro,
            'estado' => $this->estado,
            'idpadre' => $this->idpadre,
            'idmodulo' => $this->idmodulo,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'alias', $this->alias]);

        return $dataProvider;
    }
}
