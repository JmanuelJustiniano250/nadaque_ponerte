<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BannersSearch represents the model behind the search form about `app\models\Banners`.
 */
class BannersSearch extends Banners
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idbanner', 'idcategoria', 'target', 'estado'], 'integer'],
            [['titulo', 'foto', 'descripcion', 'url', 'fecha_regisro'], 'safe'],
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
        $query = Banners::find();

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
            'idbanner' => $this->idbanner,
            'idcategoria' => $this->idcategoria,
            'target' => $this->target,
            'fecha_regisro' => $this->fecha_regisro,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
