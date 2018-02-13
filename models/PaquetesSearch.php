<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PaquetesSearch represents the model behind the search form of `app\models\Paquetes`.
 */
class PaquetesSearch extends Paquetes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpaquete', 'estado', 'nro_anuncios', 'tiempo_vida'], 'integer'],
            [['nombre', 'descripcion', 'fecha_registro'], 'safe'],
            [['precio'], 'number'],
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
        $query = Paquetes::find();

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
            'idpaquete' => $this->idpaquete,
            'precio' => $this->precio,
            'estado' => $this->estado,
            'nro_anuncios' => $this->nro_anuncios,
            'tiempo_vida' => $this->tiempo_vida,
            'fecha_registro' => $this->fecha_registro,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
