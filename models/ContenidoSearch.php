<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ContenidoSearch represents the model behind the search form about `app\models\Contenido`.
 */
class ContenidoSearch extends Contenido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcontenido', 'idcategoria', 'estado'], 'integer'],
            [['titulo', 'contenido', 'fecha_modificacion'], 'safe'],
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
        $query = Contenido::find();

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
            'idcontenido' => $this->idcontenido,
            'idcategoria' => $this->idcategoria,
            'fecha_modificacion' => $this->fecha_modificacion,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'contenido', $this->contenido]);

        return $dataProvider;
    }
}
