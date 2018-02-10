<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * NoticiasSearch represents the model behind the search form about `app\models\Noticias`.
 */
class NoticiasSearch extends Noticias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idnoticia', 'idcategoria', 'estado'], 'integer'],
            [['fecha_noticia', 'fuente', 'foto', 'resumen', 'contenido', 'video', 'fecha_registro'], 'safe'],
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
        $query = Noticias::find();

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
            'idnoticia' => $this->idnoticia,
            'idcategoria' => $this->idcategoria,
            'fecha_noticia' => $this->fecha_noticia,
            'estado' => $this->estado,
            'fecha_registro' => $this->fecha_registro,
        ]);

        $query->andFilterWhere(['like', 'fuente', $this->fuente])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'resumen', $this->resumen])
            ->andFilterWhere(['like', 'contenido', $this->contenido])
            ->andFilterWhere(['like', 'video', $this->video]);

        return $dataProvider;
    }
}
