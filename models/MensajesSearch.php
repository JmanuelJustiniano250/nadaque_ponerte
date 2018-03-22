<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MensajesSearch represents the model behind the search form of `app\models\Mensajes`.
 */
class MensajesSearch extends Mensajes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmensaje', 'idusuario', 'tipo', 'estado', 'idanuncio', 'idvendedor'], 'integer'],
            [['titulo', 'detalle', 'fecha_registro'], 'safe'],
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
        $query = Mensajes::find();

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
            'idmensaje' => $this->idmensaje,
            'idusuario' => $this->idusuario,
            'fecha_registro' => $this->fecha_registro,
            'tipo' => $this->tipo,
            'estado' => $this->estado,
            'idanuncio' => $this->idanuncio,
            'idvendedor' => $this->idvendedor,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'detalle', $this->detalle]);
        $query->orderBy(['idmensaje'=>SORT_DESC]);
        return $dataProvider;
    }
}
