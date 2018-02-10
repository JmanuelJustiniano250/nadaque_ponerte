<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AnunciosSearch represents the model behind the search form of `app\models\Anuncios`.
 */
class AnunciosSearch extends Anuncios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idanuncio', 'idcategoria', 'idusuario', 'estado', 'enable', 'idcompra', 'filtro'], 'integer'],
            [['titulo', 'decripcion', 'otra_descripcion', 'codigo', 'foto', 'precio', 'fecha_registro', 'fecha_aprobado'], 'safe'],
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
        $query = Anuncios::find();

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
            'idanuncio' => $this->idanuncio,
            'idcategoria' => $this->idcategoria,
            'idusuario' => $this->idusuario,
            'estado' => $this->estado,
            'enable' => $this->enable,
            'fecha_registro' => $this->fecha_registro,
            'fecha_aprobado' => $this->fecha_aprobado,
            'idcompra' => $this->idcompra,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'decripcion', $this->decripcion])
            ->andFilterWhere(['like', 'otra_descripcion', $this->otra_descripcion])
            ->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'precio', $this->precio]);
        if (isset($params['filtro'])) {
            $tmp = array();
            foreach ($params['filtro'] as $key => $item)
                $tmp[] = $key;
            $query->innerJoinWith('anunciosFiltros');
            $query->andFilterWhere(['IN', 'idfiltro', $tmp]);
        }


        return $dataProvider;
    }
}
